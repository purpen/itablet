<?php
/**
 * Model Common_Model_Keydict
 * 
 * generated by gen-model task.
 */
class Common_Model_Keydict extends Common_Model_Table_Keydict {
    
    //关系映射表
    protected $_relation_map = array(
    );
    /**
     * 默认的magic field
     */
    protected $_magic_field = array(
        'children_count'=>'getChildrenCount'
    );
    
    private $_old_parent_id;
    private $_new_parent_id;
    private $_old_right_ref;
    private $_amount;
    
    const ROOT_ID = 1;
    
    /**
     * @return Common_Model_Keydict
     */
    public static function getModel($data=array(),$class=__CLASS__){
        return parent::getModel($data,$class);
    }
    
    /**
     * validate keyword basic info
     */
    protected function validate(){      
        if ($this->isNew()){
            $required = array('cnname');
        }else{
            $required = array('id');
        }
        if (!$this->validateRequird($required)){
            return false;
        }
        //name isnot null
        if ($this->getCnname()){
            if (!$this->checkIsRepeat()){
                $this->pushValidateError('此关键词已存在！');
                return false;
            }
        }
        if(!$this->isNew()){
            //check parent id on the update
            if (!$this->checkValidParent()){
                $this->pushValidateError('父属性不合法！');
                return false;
            }
        }
        
        return true;
    }
    
    /**
     * check cnname is exist
     */
    public function checkIsRepeat($cnname=null){
        if (is_null($cnname)){
            $cnname = $this->getCnname(); 
        }
        if ($this->hasIf('cnname=?', array($cnname))){
            return false;
        }
        return true;
    }
    
    /**
     * validate parent of the word 
     */
    protected function checkValidParent(){
        $parent_id = $this->getParentId();
        //parent id can't equal 0
        if(empty($parent_id) || $parent_id < 0){
            self::warn("root keyword can't create!", __METHOD__);
            return false;
        }
        
        if (!$this->has($parent_id) || $this->isChild($parent_id)){
            return false;
        }
        
        return true;
    }
    
    /**
     * the word isn't child
     */
    public function isChild($child_id=null,$id=null){
        if (is_null($id)){
            $id = $this->getId();
        }
        if (empty($id)){
            return false;
        }
        $this->findById($id);
        $left_ref = $this->_result['left_ref'];
        $right_ref = $this->_result['right_ref'];
        
        $condition = 'left_ref>? AND right_ref<? AND id=?';
        
        $cnt = $this->countIf($condition, array($left_ref,$right_ref,$child_id));
        
        return $cnt > 0;
    }
    
    protected function afterCreate(){
        $parent_id = $this->getParentId();
        $id = $this->getId();
        
        if (!empty($parent_id)){
            $this->extendSortRef($parent_id);
            $left_ref = $this->_result['right_ref'];
            
        }else{ //default value
            $left_ref = 1;
        }
        
        self::debug("update key[$id] ref value...", __METHOD__);
        
        #update left/right ref value
        $sql = 'UPDATE '.$this->tablelize().' SET left_ref=?,right_ref=? WHERE id=?';
        $this->getDba()->execute($sql, array($left_ref,$left_ref+1, $id));
        
        return true;
    }
    
    protected function beforeDestroy(){
        //keyword has children and can not delete
        if ($this->hasChildren()){
            throw new Common_Model_Exception("keyword has children!");
            return false;
        }

        if($this->isRootKey()){
            throw new Common_Model_Exception("root can't remove!");
            return false;
        }
        
        return true;
    }
    
    protected function afterDestroy(){
        $ref = $this->_result['right_ref'] - 1;
        
        self::debug("free key[$id] and ref[$ref] is ok...", __METHOD__);
        
        $this->freeSortRef($ref);
        
        return true;
    }
    
    protected function beforeUpdate(){
        $parent_id = $this->getParentId();
        
        //get old parent_id
        $this->findById();
        
        $this->_old_parent_id = $this->_result['parent_id'];
        $this->_old_right_ref = $this->_result['right_ref'];
        $this->_new_parent_id = is_null($parent_id) ? $this->_old_parent_id : $parent_id;
        $this->_amount = $this->_result['children_count'] + 1;
    }
    
    protected function afterUpdate(){
        $parent_id = $this->getParentId();
        if (is_null($parent_id)){
            return;
        }
        
        $id = $this->getId();
        
        if ($this->_old_parent_id == $this->_new_parent_id){
            return;
        }
        //free old space
        $this->freeSortRef($this->_old_right_ref,$this->_amount);
        
        //extend new space
        $this->findById($parent_id);
        $start_ref = $this->_result['right_ref']; 
        $this->extendSortRef($parent_id,$this->_amount);
        
        //rebuild sort ref
        $this->buildSortRef($id, $start_ref);
    }
    
    /**
     * free the space
     */
    protected function freeSortRef($ref,$amount=1){
        
        self::debug("free key sort ref[$ref]...", __METHOD__);
        
        $amount=$amount*2;
        
        $sql = 'UPDATE '.$this->tablelize().' SET right_ref=right_ref-'.$amount.' WHERE right_ref>?';
        $this->getDba()->execute($sql, array($ref));
        
        $sql = 'UPDATE '.$this->tablelize().' SET left_ref=left_ref-'.$amount.' WHERE left_ref>?';
        $this->getDba()->execute($sql, array($ref));
        
    }
    
    /**
     * extend the space for target keyword 
     */
    protected function extendSortRef($parent_id=null,$amount=1){
        
        self::debug("extend other key ref of [$parent_id]...", __METHOD__);
        
        $this->findById($parent_id);
        $ref = $this->_result['right_ref'] - 1;
        $amount = $amount*2;
        
        #update other keyword
        $sql = 'UPDATE '.$this->tablelize().' SET right_ref=right_ref+'.$amount.' WHERE right_ref>?';
        $this->getDba()->execute($sql,array($ref));
        $sql = 'UPDATE '.$this->tablelize().' SET left_ref=left_ref+'.$amount.' WHERE left_ref>?';
        $this->getDba()->execute($sql,array($ref));
    }
    
    protected function buildSortRef($id=null,$left_ref=1){

        $right_ref = $left_ref+1;
        
        $options = array(
            'condition' => 'parent_id=?',
            'vars'      => array($id),
            'order'     => 'id ASC'
        );
        $result = $this->find($options)->getResultArray();
        foreach($result as $kw){
            self::debug("start build id[".$kw['id']."] and right_ref[$right_ref].", __METHOD__);
            $right_ref = $this->buildSortRef($kw['id'], $right_ref);
        }
        
        self::debug("build key ref[$left_ref] of [$id]...", __METHOD__);
        
        //update current keyword
        $sql = 'UPDATE '.$this->tablelize().' SET left_ref=?,right_ref=? WHERE id=?';
        $this->getDba()->execute($sql, array($left_ref,$right_ref,$id));
        
        return $right_ref+1;
    }
    
    /**
     * get the children count of current keyword
     */
    protected function getChildrenCount(){
        $right_ref = $this->getRightRef();
        $left_ref = $this->getLeftRef();
        return ($right_ref - $left_ref -1)/2;
    }
    /**
     * check hasn't children of current keyword
     */
    public function hasChildren(){
        return $this->getChildrenCount() > 0;
    }
    /**
     * validate keyword is root
     *
     * @param int $id
     * @return bool
     */
    public function isRootKey($id=null){
        if(is_null($id)){
            $id = $this->getId();
        }
        if(empty($id)){
            $this->pushValidateError('key id is null');
            return false;
        }
        $condition = 'id=? AND parent_id=?';
        $vars = array($id,0);
        if($this->countIf($condition, $vars)){
            return true;
        }
        return false;
    }
    
    /**
     * get root keyword
     */
    public function findRootKey($parent_id=0){
        if(is_null($parent_id)){
            $parent_id = self::ROOT_ID;
        }
        $options = array(
            'condition'=>'parent_id=?',
            'vars'=>array($parent_id),
            'order'=>'id DESC'
        );
        
        return $this->find($options)->getResultArray();
    }
    /**
     * 获取所有父级关键词
     *
     * @param string $cnname
     */
    public function findParentKey($cnname=null){
        if(is_null($cnname)){
            self::warn("find parent key condition is null.", __METHOD__);
            return;
        }
        //match cnname keyword
        $this->findFirst(array('condition'=>'cnname=?', 'vars'=>array($cnname)));
        if(!$this->count()){
            self::warn("cnname[$cnname] is not in the keydict.", __METHOD__);
            return;
        }
        $left_ref = $this->_result['left_ref'];
        $right_ref = $this->_result['right_ref'];
        //select parent keyword
        $options = array(
          'condition'=>'left_ref<? AND right_ref>? AND left_ref>0', //left_ref>0 防止测试时的脏数据
          'vars'=>array($left_ref,$right_ref),
          'order'=>'left_ref ASC'
        );
        
        return $this->find($options);
    }
    /**
     * get target keyword 's children words
     *
     * @param int $parent_id
     * @param bool $recursive
     * @return array
     */
    public function findAllChildren($parent_id,$recursive=true){
        if(empty($parent_id)){
            return;
        }
        if ($recursive){ //所有子关键词
            $condition = 'parent_id=?';
            $vars = array($parent_id);
        }else{ //所有子孙关键词
            $this->findById($parent_id);
            if(!$this->count()){
                return;
            }
            $left_ref = $this->_result['left_ref'];
            $right_ref = $this->_result['right_ref'];
            
            $condition = 'left_ref BETWEEN ? AND ?';
            $vars = array($left_ref,$right_ref);
        }
        $options = array(
          'condition'=>$condition,
          'vars'=>$vars,
          'order'=>'left_ref ASC'
        );
        
        return $this->find($options);
    }
}
/**vim:sw=4 et ts=4 **/
?>