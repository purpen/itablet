<?php
/**
 * Table:category mapping class 
 * 
 * This class is auto generated by gen-model task
 */
abstract class Common_Model_Table_Category extends Anole_ActiveRecord_Base {
    
    /**
     * mapping table name
     * 
     * @var string
     */
    protected $_table_name='category';
    
    /**
     * table fields meta list
     * 
     * @var array
     */
    protected $_attributes = array (
  'id' => 
  array (
    'name' => 'id',
    'type' => 'N',
    'length' => '4',
  ),
  'name' => 
  array (
    'name' => 'name',
    'type' => 'S',
    'length' => '25',
  ),
  'code' => 
  array (
    'name' => 'code',
    'type' => 'S',
    'length' => '9',
  ),
  'slug' => 
  array (
    'name' => 'slug',
    'type' => 'S',
    'length' => '200',
  ),
  'description' => 
  array (
    'name' => 'description',
    'type' => 'S',
    'length' => -1,
  ),
  'state' => 
  array (
    'name' => 'state',
    'type' => 'S',
    'length' => '1',
  ),
  'stick' => 
  array (
    'name' => 'stick',
    'type' => 'S',
    'length' => '1',
  ),
  'total' => 
  array (
    'name' => 'total',
    'type' => 'S',
    'length' => '11',
  ),
);
    
        /**
     * 设置属性'id'的值
     *
     * @param  integer $value
     * 
     * @return Category
     */
    public function setId($value){
        $this->set('id',$value);
        return $this;
    }
    /**
     * 获取属性:'id'的值
     * 
     * @return integer
     */
    public function getId(){
        return $this->get('id');
    }
        /**
     * 设置属性'name'的值
     *
     * @param  string $value
     * 
     * @return Category
     */
    public function setName($value){
        $this->set('name',$value);
        return $this;
    }
    /**
     * 获取属性:'name'的值
     * 
     * @return string
     */
    public function getName(){
        return $this->get('name');
    }
        /**
     * 设置属性'code'的值
     *
     * @param  string $value
     * 
     * @return Category
     */
    public function setCode($value){
        $this->set('code',$value);
        return $this;
    }
    /**
     * 获取属性:'code'的值
     * 
     * @return string
     */
    public function getCode(){
        return $this->get('code');
    }
        /**
     * 设置属性'slug'的值
     *
     * @param  string $value
     * 
     * @return Category
     */
    public function setSlug($value){
        $this->set('slug',$value);
        return $this;
    }
    /**
     * 获取属性:'slug'的值
     * 
     * @return string
     */
    public function getSlug(){
        return $this->get('slug');
    }
        /**
     * 设置属性'description'的值
     *
     * @param  string $value
     * 
     * @return Category
     */
    public function setDescription($value){
        $this->set('description',$value);
        return $this;
    }
    /**
     * 获取属性:'description'的值
     * 
     * @return string
     */
    public function getDescription(){
        return $this->get('description');
    }
        /**
     * 设置属性'state'的值
     *
     * @param  string $value
     * 
     * @return Category
     */
    public function setState($value){
        $this->set('state',$value);
        return $this;
    }
    /**
     * 获取属性:'state'的值
     * 
     * @return string
     */
    public function getState(){
        return $this->get('state');
    }
        /**
     * 设置属性'stick'的值
     *
     * @param  string $value
     * 
     * @return Category
     */
    public function setStick($value){
        $this->set('stick',$value);
        return $this;
    }
    /**
     * 获取属性:'stick'的值
     * 
     * @return string
     */
    public function getStick(){
        return $this->get('stick');
    }
        /**
     * 设置属性'total'的值
     *
     * @param  string $value
     * 
     * @return Category
     */
    public function setTotal($value){
        $this->set('total',$value);
        return $this;
    }
    /**
     * 获取属性:'total'的值
     * 
     * @return string
     */
    public function getTotal(){
        return $this->get('total');
    }
    }
/**vim:sw=4 et ts=4 **/
?>