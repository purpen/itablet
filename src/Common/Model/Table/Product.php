<?php
/**
 * Table:product mapping class 
 * 
 * This class is auto generated by gen-model task
 */
abstract class Common_Model_Table_Product extends Anole_ActiveRecord_Base {
    
    /**
     * mapping table name
     * 
     * @var string
     */
    protected $_table_name='product';
    
    /**
     * table fields meta list
     * 
     * @var array
     */
    protected $_attributes = array (
  'id' => 
  array (
    'name' => 'id',
    'type' => 'S',
    'length' => '11',
  ),
  'title' => 
  array (
    'name' => 'title',
    'type' => 'S',
    'length' => '100',
  ),
  'tags' => 
  array (
    'name' => 'tags',
    'type' => 'S',
    'length' => '200',
  ),
  'summary' => 
  array (
    'name' => 'summary',
    'type' => 'S',
    'length' => '220',
  ),
  'content' => 
  array (
    'name' => 'content',
    'type' => 'S',
    'length' => -1,
  ),
  'retail_price' => 
  array (
    'name' => 'retail_price',
    'type' => 'N',
    'length' => -1,
  ),
  'market_price' => 
  array (
    'name' => 'market_price',
    'type' => 'N',
    'length' => -1,
  ),
  'sale_price' => 
  array (
    'name' => 'sale_price',
    'type' => 'N',
    'length' => -1,
  ),
  'member_price' => 
  array (
    'name' => 'member_price',
    'type' => 'N',
    'length' => -1,
  ),
  'hot_price' => 
  array (
    'name' => 'hot_price',
    'type' => 'N',
    'length' => -1,
  ),
  'material' => 
  array (
    'name' => 'material',
    'type' => 'S',
    'length' => '100',
  ),
  'color' => 
  array (
    'name' => 'color',
    'type' => 'S',
    'length' => '50',
  ),
  'mode' => 
  array (
    'name' => 'mode',
    'type' => 'S',
    'length' => '200',
  ),
  'length' => 
  array (
    'name' => 'length',
    'type' => 'N',
    'length' => -1,
  ),
  'width' => 
  array (
    'name' => 'width',
    'type' => 'N',
    'length' => -1,
  ),
  'height' => 
  array (
    'name' => 'height',
    'type' => 'N',
    'length' => -1,
  ),
  'agent_discount' => 
  array (
    'name' => 'agent_discount',
    'type' => 'N',
    'length' => -1,
  ),
  'stick' => 
  array (
    'name' => 'stick',
    'type' => 'S',
    'length' => '1',
  ),
  'markshop' => 
  array (
    'name' => 'markshop',
    'type' => 'S',
    'length' => '1',
  ),
  'unit' => 
  array (
    'name' => 'unit',
    'type' => 'S',
    'length' => '10',
  ),
  'state' => 
  array (
    'name' => 'state',
    'type' => 'S',
    'length' => '1',
  ),
  'thumb' => 
  array (
    'name' => 'thumb',
    'type' => 'S',
    'length' => '100',
  ),
  'catcode' => 
  array (
    'name' => 'catcode',
    'type' => 'S',
    'length' => '25',
  ),
  'parent_id' => 
  array (
    'name' => 'parent_id',
    'type' => 'N',
    'length' => '3',
  ),
  'category_id' => 
  array (
    'name' => 'category_id',
    'type' => 'N',
    'length' => '11',
  ),
  'created_on' => 
  array (
    'name' => 'created_on',
    'type' => 'S',
    'length' => -1,
  ),
  'created_by' => 
  array (
    'name' => 'created_by',
    'type' => 'S',
    'length' => '11',
  ),
  'published_on' => 
  array (
    'name' => 'published_on',
    'type' => 'T',
    'length' => -1,
  ),
  'published_by' => 
  array (
    'name' => 'published_by',
    'type' => 'S',
    'length' => '11',
  ),
  'sticked_on' => 
  array (
    'name' => 'sticked_on',
    'type' => 'T',
    'length' => -1,
  ),
  'marked_on' => 
  array (
    'name' => 'marked_on',
    'type' => 'T',
    'length' => -1,
  ),
  'view_count' => 
  array (
    'name' => 'view_count',
    'type' => 'N',
    'length' => '11',
  ),
  'sale_count' => 
  array (
    'name' => 'sale_count',
    'type' => 'N',
    'length' => '4',
  ),
  'coment_count' => 
  array (
    'name' => 'coment_count',
    'type' => 'N',
    'length' => '4',
  ),
  'fav_count' => 
  array (
    'name' => 'fav_count',
    'type' => 'N',
    'length' => '4',
  ),
  'version' => 
  array (
    'name' => 'version',
    'type' => 'S',
    'length' => '1',
  ),
  'service_item' => 
  array (
    'name' => 'service_item',
    'type' => 'S',
    'length' => '255',
  ),
  'remark' => 
  array (
    'name' => 'remark',
    'type' => 'S',
    'length' => -1,
  ),
  'is_gift' => 
  array (
    'name' => 'is_gift',
    'type' => 'S',
    'length' => '1',
  ),
  'in_marketing' => 
  array (
    'name' => 'in_marketing',
    'type' => 'S',
    'length' => '100',
  ),
);
    
        /**
     * 设置属性'id'的值
     *
     * @param  string $value
     * 
     * @return Product
     */
    public function setId($value){
        $this->set('id',$value);
        return $this;
    }
    /**
     * 获取属性:'id'的值
     * 
     * @return string
     */
    public function getId(){
        return $this->get('id');
    }
        /**
     * 设置属性'title'的值
     *
     * @param  string $value
     * 
     * @return Product
     */
    public function setTitle($value){
        $this->set('title',$value);
        return $this;
    }
    /**
     * 获取属性:'title'的值
     * 
     * @return string
     */
    public function getTitle(){
        return $this->get('title');
    }
        /**
     * 设置属性'tags'的值
     *
     * @param  string $value
     * 
     * @return Product
     */
    public function setTags($value){
        $this->set('tags',$value);
        return $this;
    }
    /**
     * 获取属性:'tags'的值
     * 
     * @return string
     */
    public function getTags(){
        return $this->get('tags');
    }
        /**
     * 设置属性'summary'的值
     *
     * @param  string $value
     * 
     * @return Product
     */
    public function setSummary($value){
        $this->set('summary',$value);
        return $this;
    }
    /**
     * 获取属性:'summary'的值
     * 
     * @return string
     */
    public function getSummary(){
        return $this->get('summary');
    }
        /**
     * 设置属性'content'的值
     *
     * @param  string $value
     * 
     * @return Product
     */
    public function setContent($value){
        $this->set('content',$value);
        return $this;
    }
    /**
     * 获取属性:'content'的值
     * 
     * @return string
     */
    public function getContent(){
        return $this->get('content');
    }
        /**
     * 设置属性'retail_price'的值
     *
     * @param  integer $value
     * 
     * @return Product
     */
    public function setRetailPrice($value){
        $this->set('retail_price',$value);
        return $this;
    }
    /**
     * 获取属性:'retail_price'的值
     * 
     * @return integer
     */
    public function getRetailPrice(){
        return $this->get('retail_price');
    }
        /**
     * 设置属性'market_price'的值
     *
     * @param  integer $value
     * 
     * @return Product
     */
    public function setMarketPrice($value){
        $this->set('market_price',$value);
        return $this;
    }
    /**
     * 获取属性:'market_price'的值
     * 
     * @return integer
     */
    public function getMarketPrice(){
        return $this->get('market_price');
    }
        /**
     * 设置属性'sale_price'的值
     *
     * @param  integer $value
     * 
     * @return Product
     */
    public function setSalePrice($value){
        $this->set('sale_price',$value);
        return $this;
    }
    /**
     * 获取属性:'sale_price'的值
     * 
     * @return integer
     */
    public function getSalePrice(){
        return $this->get('sale_price');
    }
        /**
     * 设置属性'member_price'的值
     *
     * @param  integer $value
     * 
     * @return Product
     */
    public function setMemberPrice($value){
        $this->set('member_price',$value);
        return $this;
    }
    /**
     * 获取属性:'member_price'的值
     * 
     * @return integer
     */
    public function getMemberPrice(){
        return $this->get('member_price');
    }
        /**
     * 设置属性'hot_price'的值
     *
     * @param  integer $value
     * 
     * @return Product
     */
    public function setHotPrice($value){
        $this->set('hot_price',$value);
        return $this;
    }
    /**
     * 获取属性:'hot_price'的值
     * 
     * @return integer
     */
    public function getHotPrice(){
        return $this->get('hot_price');
    }
        /**
     * 设置属性'material'的值
     *
     * @param  string $value
     * 
     * @return Product
     */
    public function setMaterial($value){
        $this->set('material',$value);
        return $this;
    }
    /**
     * 获取属性:'material'的值
     * 
     * @return string
     */
    public function getMaterial(){
        return $this->get('material');
    }
        /**
     * 设置属性'color'的值
     *
     * @param  string $value
     * 
     * @return Product
     */
    public function setColor($value){
        $this->set('color',$value);
        return $this;
    }
    /**
     * 获取属性:'color'的值
     * 
     * @return string
     */
    public function getColor(){
        return $this->get('color');
    }
	   /**
     * 设置属性'mode'的值
     *
     * @param  string $value
     * 
     * @return Product
     */
    public function setMode($value){
        $this->set('mode',$value);
        return $this;
    }
    /**
     * 获取属性:'mode'的值
     * 
     * @return string
     */
    public function getMode(){
        return $this->get('mode');
    }
        /**
     * 设置属性'length'的值
     *
     * @param  integer $value
     * 
     * @return Product
     */
    public function setLength($value){
        $this->set('length',$value);
        return $this;
    }
    /**
     * 获取属性:'length'的值
     * 
     * @return integer
     */
    public function getLength(){
        return $this->get('length');
    }
        /**
     * 设置属性'width'的值
     *
     * @param  integer $value
     * 
     * @return Product
     */
    public function setWidth($value){
        $this->set('width',$value);
        return $this;
    }
    /**
     * 获取属性:'width'的值
     * 
     * @return integer
     */
    public function getWidth(){
        return $this->get('width');
    }
        /**
     * 设置属性'height'的值
     *
     * @param  integer $value
     * 
     * @return Product
     */
    public function setHeight($value){
        $this->set('height',$value);
        return $this;
    }
    /**
     * 获取属性:'height'的值
     * 
     * @return integer
     */
    public function getHeight(){
        return $this->get('height');
    }
        /**
     * 设置属性'agent_discount'的值
     *
     * @param  integer $value
     * 
     * @return Product
     */
    public function setAgentDiscount($value){
        $this->set('agent_discount',$value);
        return $this;
    }
    /**
     * 获取属性:'agent_discount'的值
     * 
     * @return integer
     */
    public function getAgentDiscount(){
        return $this->get('agent_discount');
    }
        /**
     * 设置属性'stick'的值
     *
     * @param  string $value
     * 
     * @return Product
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
     * 设置属性'markshop'的值
     *
     * @param  string $value
     * 
     * @return Product
     */
    public function setMarkshop($value){
        $this->set('markshop',$value);
        return $this;
    }
    /**
     * 获取属性:'markshop'的值
     * 
     * @return string
     */
    public function getMarkshop(){
        return $this->get('markshop');
    }
        /**
     * 设置属性'unit'的值
     *
     * @param  string $value
     * 
     * @return Product
     */
    public function setUnit($value){
        $this->set('unit',$value);
        return $this;
    }
    /**
     * 获取属性:'unit'的值
     * 
     * @return string
     */
    public function getUnit(){
        return $this->get('unit');
    }
        /**
     * 设置属性'state'的值
     *
     * @param  string $value
     * 
     * @return Product
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
     * 设置属性'thumb'的值
     *
     * @param  string $value
     * 
     * @return Product
     */
    public function setThumb($value){
        $this->set('thumb',$value);
        return $this;
    }
    /**
     * 获取属性:'thumb'的值
     * 
     * @return string
     */
    public function getThumb(){
        return $this->get('thumb');
    }
        /**
     * 设置属性'catcode'的值
     *
     * @param  string $value
     * 
     * @return Product
     */
    public function setCatcode($value){
        $this->set('catcode',$value);
        return $this;
    }
    /**
     * 获取属性:'catcode'的值
     * 
     * @return string
     */
    public function getCatcode(){
        return $this->get('catcode');
    }
        /**
     * 设置属性'parent_id'的值
     *
     * @param  integer $value
     * 
     * @return Product
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
        /**
     * 设置属性'category_id'的值
     *
     * @param  integer $value
     * 
     * @return Product
     */
    public function setCategoryId($value){
        $this->set('category_id',$value);
        return $this;
    }
    /**
     * 获取属性:'category_id'的值
     * 
     * @return integer
     */
    public function getCategoryId(){
        return $this->get('category_id');
    }
        /**
     * 设置属性'created_on'的值
     *
     * @param  string $value
     * 
     * @return Product
     */
    public function setCreatedOn($value){
        $this->set('created_on',$value);
        return $this;
    }
    /**
     * 获取属性:'created_on'的值
     * 
     * @return string
     */
    public function getCreatedOn(){
        return $this->get('created_on');
    }
        /**
     * 设置属性'created_by'的值
     *
     * @param  string $value
     * 
     * @return Product
     */
    public function setCreatedBy($value){
        $this->set('created_by',$value);
        return $this;
    }
    /**
     * 获取属性:'created_by'的值
     * 
     * @return string
     */
    public function getCreatedBy(){
        return $this->get('created_by');
    }
        /**
     * 设置属性'published_on'的值
     *
     * @param  date $value
     * 
     * @return Product
     */
    public function setPublishedOn($value){
        $this->set('published_on',$value);
        return $this;
    }
    /**
     * 获取属性:'published_on'的值
     * 
     * @return date
     */
    public function getPublishedOn(){
        return $this->get('published_on');
    }
        /**
     * 设置属性'published_by'的值
     *
     * @param  string $value
     * 
     * @return Product
     */
    public function setPublishedBy($value){
        $this->set('published_by',$value);
        return $this;
    }
    /**
     * 获取属性:'published_by'的值
     * 
     * @return string
     */
    public function getPublishedBy(){
        return $this->get('published_by');
    }
        /**
     * 设置属性'sticked_on'的值
     *
     * @param  date $value
     * 
     * @return Product
     */
    public function setStickedOn($value){
        $this->set('sticked_on',$value);
        return $this;
    }
    /**
     * 获取属性:'sticked_on'的值
     * 
     * @return date
     */
    public function getStickedOn(){
        return $this->get('sticked_on');
    }
        /**
     * 设置属性'marked_on'的值
     *
     * @param  date $value
     * 
     * @return Product
     */
    public function setMarkedOn($value){
        $this->set('marked_on',$value);
        return $this;
    }
    /**
     * 获取属性:'marked_on'的值
     * 
     * @return date
     */
    public function getMarkedOn(){
        return $this->get('marked_on');
    }
        /**
     * 设置属性'view_count'的值
     *
     * @param  integer $value
     * 
     * @return Product
     */
    public function setViewCount($value){
        $this->set('view_count',$value);
        return $this;
    }
    /**
     * 获取属性:'view_count'的值
     * 
     * @return integer
     */
    public function getViewCount(){
        return $this->get('view_count');
    }
        /**
     * 设置属性'sale_count'的值
     *
     * @param  integer $value
     * 
     * @return Product
     */
    public function setSaleCount($value){
        $this->set('sale_count',$value);
        return $this;
    }
    /**
     * 获取属性:'sale_count'的值
     * 
     * @return integer
     */
    public function getSaleCount(){
        return $this->get('sale_count');
    }
        /**
     * 设置属性'coment_count'的值
     *
     * @param  integer $value
     * 
     * @return Product
     */
    public function setComentCount($value){
        $this->set('coment_count',$value);
        return $this;
    }
    /**
     * 获取属性:'coment_count'的值
     * 
     * @return integer
     */
    public function getComentCount(){
        return $this->get('coment_count');
    }
        /**
     * 设置属性'fav_count'的值
     *
     * @param  integer $value
     * 
     * @return Product
     */
    public function setFavCount($value){
        $this->set('fav_count',$value);
        return $this;
    }
    /**
     * 获取属性:'fav_count'的值
     * 
     * @return integer
     */
    public function getFavCount(){
        return $this->get('fav_count');
    }
        /**
     * 设置属性'version'的值
     *
     * @param  string $value
     * 
     * @return Product
     */
    public function setVersion($value){
        $this->set('version',$value);
        return $this;
    }
    /**
     * 获取属性:'version'的值
     * 
     * @return string
     */
    public function getVersion(){
        return $this->get('version');
    }
        /**
     * 设置属性'service_item'的值
     *
     * @param  string $value
     * 
     * @return Product
     */
    public function setServiceItem($value){
        $this->set('service_item',$value);
        return $this;
    }
    /**
     * 获取属性:'service_item'的值
     * 
     * @return string
     */
    public function getServiceItem(){
        return $this->get('service_item');
    }
        /**
     * 设置属性'remark'的值
     *
     * @param  string $value
     * 
     * @return Product
     */
    public function setRemark($value){
        $this->set('remark',$value);
        return $this;
    }
    /**
     * 获取属性:'remark'的值
     * 
     * @return string
     */
    public function getRemark(){
        return $this->get('remark');
    }
        /**
     * 设置属性'is_gift'的值
     *
     * @param  string $value
     * 
     * @return Product
     */
    public function setIsGift($value){
        $this->set('is_gift',$value);
        return $this;
    }
    /**
     * 获取属性:'is_gift'的值
     * 
     * @return string
     */
    public function getIsGift(){
        return $this->get('is_gift');
    }
        /**
     * 设置属性'in_marketing'的值
     *
     * @param  string $value
     * 
     * @return Product
     */
    public function setInMarketing($value){
        $this->set('in_marketing',$value);
        return $this;
    }
    /**
     * 获取属性:'in_marketing'的值
     * 
     * @return string
     */
    public function getInMarketing(){
        return $this->get('in_marketing');
    }
    }
/**vim:sw=4 et ts=4 **/
?>