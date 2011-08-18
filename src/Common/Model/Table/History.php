<?php
/**
 * Table:history mapping class 
 * 
 * This class is auto generated by gen-model task
 */
abstract class Common_Model_Table_History extends Anole_ActiveRecord_Base {
    
    /**
     * mapping table name
     * 
     * @var string
     */
    protected $_table_name='history';
    
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
    'length' => '11',
  ),
  'user_id' => 
  array (
    'name' => 'user_id',
    'type' => 'N',
    'length' => '11',
  ),
  'product_id' => 
  array (
    'name' => 'product_id',
    'type' => 'N',
    'length' => '11',
  ),
  'updated_on' => 
  array (
    'name' => 'updated_on',
    'type' => 'T',
    'length' => -1,
  ),
);
    
        /**
     * 设置属性'id'的值
     *
     * @param  integer $value
     * 
     * @return History
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
     * 设置属性'user_id'的值
     *
     * @param  integer $value
     * 
     * @return History
     */
    public function setUserId($value){
        $this->set('user_id',$value);
        return $this;
    }
    /**
     * 获取属性:'user_id'的值
     * 
     * @return integer
     */
    public function getUserId(){
        return $this->get('user_id');
    }
        /**
     * 设置属性'product_id'的值
     *
     * @param  integer $value
     * 
     * @return History
     */
    public function setProductId($value){
        $this->set('product_id',$value);
        return $this;
    }
    /**
     * 获取属性:'product_id'的值
     * 
     * @return integer
     */
    public function getProductId(){
        return $this->get('product_id');
    }
        /**
     * 设置属性'updated_on'的值
     *
     * @param  date $value
     * 
     * @return History
     */
    public function setUpdatedOn($value){
        $this->set('updated_on',$value);
        return $this;
    }
    /**
     * 获取属性:'updated_on'的值
     * 
     * @return date
     */
    public function getUpdatedOn(){
        return $this->get('updated_on');
    }
    }
/**vim:sw=4 et ts=4 **/
?>