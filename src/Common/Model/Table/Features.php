<?php
/**
 * Table:features mapping class 
 * 
 * This class is auto generated by gen-model task
 */
abstract class Common_Model_Table_Features extends Anole_ActiveRecord_Base {
    
    /**
     * mapping table name
     * 
     * @var string
     */
    protected $_table_name='features';
    
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
  'featurekey' => 
  array (
    'name' => 'featurekey',
    'type' => 'S',
    'length' => '100',
  ),
  'featurename' => 
  array (
    'name' => 'featurename',
    'type' => 'S',
    'length' => '100',
  ),
  'parent_id' => 
  array (
    'name' => 'parent_id',
    'type' => 'N',
    'length' => '4',
  ),
);
    
        /**
     * 设置属性'id'的值
     *
     * @param  integer $value
     * 
     * @return Features
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
     * 设置属性'featurekey'的值
     *
     * @param  string $value
     * 
     * @return Features
     */
    public function setFeaturekey($value){
        $this->set('featurekey',$value);
        return $this;
    }
    /**
     * 获取属性:'featurekey'的值
     * 
     * @return string
     */
    public function getFeaturekey(){
        return $this->get('featurekey');
    }
        /**
     * 设置属性'featurename'的值
     *
     * @param  string $value
     * 
     * @return Features
     */
    public function setFeaturename($value){
        $this->set('featurename',$value);
        return $this;
    }
    /**
     * 获取属性:'featurename'的值
     * 
     * @return string
     */
    public function getFeaturename(){
        return $this->get('featurename');
    }
        /**
     * 设置属性'parent_id'的值
     *
     * @param  integer $value
     * 
     * @return Features
     */
    public function setParentId($value){
        $this->set('parent_id',$value);
        return $this;
    }
    /**
     * 获取属性:'parent_id'的值
     * 
     * @return integer
     */
    public function getParentId(){
        return $this->get('parent_id');
    }
    }
/**vim:sw=4 et ts=4 **/
?>