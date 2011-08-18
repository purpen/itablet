<?php
/**
 * 支付宝接口类(即时到帐)
 *
 * @author purpen
 * @version $Id$
 */
class Eshop_Action_Alipay extends Eshop_Action_Common {
    protected $_model_class='Common_Model_Orders';
    
    /**
     * 订单编号
     * 
     * @var string
     */
    private $_order_ref = null;
    
    /************支付宝配置参数******************/
    /**
     * 合作伙伴ID
     * 
     * @var string
     */
    private $partner = '2088501571997543';
    /**
     * 安全检验码
     * 
     * @var string
     */
    public $security_code = 'rhh9fmr3ndcvh4teo5r0chmvztuytikh';
    /**
     * 卖家邮箱
     * 
     * @var string
     */
    public $seller_email = "chen65288934@yahoo.cn";
    /**
     * 字符编码格式 目前支持GBK或utf-8
     * 
     * @var string
     */
    public $_input_charset = "utf-8";
    /**
     * 加密方式  系统默认(不要修改)
     * 
     * @var string
     */
    public $sign_type = "MD5";
    /**
     * 访问模式,你可以根据自己的服务器是否支持ssl访问而选择http以及https访问模式(系统默认,不要修改)
     * 
     * @var string
     */
    public $transport = "https";
    /**
     * 异步返回地址
     * 
     * @var string
     */
    public $notify_url = "http://www.whshop.com.cn/app/eshop/alipay/secrete_notify";
    /**
     * 同步返回地址
     * 
     * @var string
     */
    public $return_url = "http://www.whshop.com.cn/app/eshop/alipay/direct_notify";
    /**
     * 网站商品的展示地址,可以为空
     * 
     * @var string
     */
    public $show_url = "http://www.whshop.com.cn/";
    
    /**
     * 
     * @return Common_Model_Orders
     */
    public function wiredModel(){
        return parent::wiredModel();
    }
    //~~~~~~~~~~~~~~Action implements~~~~~~~~~~
    /**
     * default action method
     */
    public function execute(){
        return $this->payment();   
    }
    /**
     * 选定支付宝进行支付
     * 
     * @return string
     */
    public function payment(){
        $reference = $this->getOrderRef();
        if(empty($reference)){
            return $this->_hintResult('操作不当，订单号丢失！',true);
        }
        $model = new Common_Model_Orders();
        $options = array(
            'condition'=>'reference=?',
            'vars'=>array($reference)
        );
        $model->findFirst($options);
        if(!$model->count()){
            return $this->_hintResult('很抱歉，系统不存在该订单！',true);
        }
        $status = $model['status'];
        //验证此订单是否已经付款
        if($status != Common_Model_Constant::ORDER_WAIT_PAYMENT){
            return $this->_hintResult("订单[$reference]已付款！",false);
        }
        //start to pay
        $pay_money = $model['pay_money'];
        $subject = "www.100jia.cc";
        $body = "100jia.cc Eshop";
        //支付宝传递参数
        $parameter = array(
            'service'=>'create_direct_pay_by_user',
            'partner'=>$this->partner,
            'return_url'=>$this->return_url,
            'notify_url'=>$this->notify_url,
            '_input_charset'=>$this->_input_charset,
            'subject'=>$subject, #商品名称，必填
            'body'=>$body, #商品描述，必填
            'out_trade_no'=>$reference, #商品外部交易号，必填,每次测试都须修改
            'total_fee'=>$pay_money,
            'payment_type'=>"1", #默认为1，不需要修改
            'show_url'=>$this->show_url, #商品相关网站
            'seller_email'=>$this->seller_email #卖家邮箱，必填
        );
        $alipay = new Anole_Util_AlipayService($parameter,$this->security_code,$this->sign_type,$this->transport);
        $link = $alipay->create_url();
        
        return $this->redirectResult($link);
    }
    
    /**
     * 支付成功后，后台通知到action
     * 即支付宝中指定的notify_url
     * 
     * @return string
     */
    public function secreteNotify(){
        $alipay = new Anole_Util_AlipayNotify($this->partner,$this->security_code,$this->sign_type,$this->_input_charset,$this->transport);
        $verify_result = $alipay->notify_verify();
        
        if($verify_result){
            $order_ref = $_POST['out_trade_no'];
            $payAmount = $_POST['total_fee'];
            
            $receive_name = $_POST['receive_name'];
            $receive_address = $_POST['receive_address'];
            $receive_zip = $_POST['receive_zip'];
            $receive_phone = $_POST['receive_phone'];
            $receive_mobile = $_POST['receive_mobile'];
            
            $trade_status = $_POST['trade_status'];
            if($trade_status == 'TRADE_FINISHED' || $trade_status == 'TRADE_SUCCESS'){
                //支付成功
                self::warn("verify_success", __METHOD__);
                try{
                    $order = new Common_Model_Orders();
                    $options = array(
                        'condition'=>'reference=?',
                        'vars'=>array($order_ref)
                    );
                    $order->findFirst($options);
                        
                    if($order->count()){
                        $_id = $order['id'];
                        $pay_money = $order['pay_money'];
                        $status = $order['status'];
                        /*
                        if($pay_money != $payAmount){
                            self::warn("支付金额[$payAmount]与应付金额[$pay_money]不等!", __METHOD__);
                            $result = "fail";
                            return $this->rawResult($result);
                        }*/
                        //验证此订单是否已经付款
                        if($status < Common_Model_Constant::ORDER_READY_GOODS){
                            //设置订单状态为已配货中
                            $order->setReadyGoods($_id);
                            self::debug("更新订单状态完成 -alipay。",__METHOD__);
                        }else{
                            self::warn("此订单[$order_ref]已支付成功！-alipay",__METHOD__);
                        }
                        $result = "success";
                    }else{
                        $msg = "此订单号[$order_ref]不存在!";
                        self::warn("此订单号[$order_ref]不存在!",__METHOD__);
                    }
                }catch(Anole_Exception $e){
                    $result = "fail";
                    self::warn("支付宝支付订单[$order_ref]异常：".$e->getMessage(),__METHOD__);
                }
            }else{
                self::warn("支付未完成-alipay", __METHOD__);
                $result = "fail";
            }
        }else{
            //支付失败
            self::warn("verify_failed", __METHOD__);
            $result = "fail";
        }
        
        return $this->rawResult($result);
    }
    
    /**
     * 支付成功后，直接跳转到action
     * 即支付宝中指定的return_url
     * 
     * @return string
     */
    public function directNotify(){
        $alipay = new Anole_Util_AlipayNotify($this->partner,$this->security_code,$this->sign_type,$this->_input_charset,$this->transport);
        $verify_result = $alipay->return_verify();
        
        //获取支付宝的反馈参数
        $order_ref = $_GET['out_trade_no'];
        $payAmount = $_GET['total_fee'];
        
        $receive_name = $_GET['receive_name'];
        $receive_address = $_GET['receive_address'];
        $receive_zip = $_GET['receive_zip'];
        $receive_phone = $_GET['receive_phone'];
        $receive_mobile = $_GET['receive_mobile'];
        
        $msg = "";
        if($verify_result){
            //买家付款成功
            self::debug("通过支付宝支付成功！",__METHOD__);
            
            $trade_status = $_GET['trade_status'];
            if($trade_status == 'TRADE_FINISHED' || $trade_status == 'TRADE_SUCCESS'){
                try{
                    $order = new Common_Model_Orders();
                    $options = array(
                        'condition'=>'reference=?',
                        'vars'=>array($order_ref)
                    );
                    $order->findFirst($options);
                        
                    if($order->count()){
                        $_id = $order['id'];
                        $status = $order['status'];
                        //验证此订单是否已经付款
                        if($status < Common_Model_Constant::ORDER_READY_GOODS){
                            //设置订单状态为已配货中
                            $order->setReadyGoods($_id);
                            self::debug("更新订单状态完成 -alipay。",__METHOD__);
                        }else{
                            self::warn("此订单[$order_ref]已支付成功！-alipay",__METHOD__);
                        }
                        $result = "success";
                    }else{
                        $msg = "此订单号[$order_ref]不存在!";
                        self::warn("此订单号[$order_ref]不存在!",__METHOD__);
                    }
                }catch(Anole_Exception $e){
                    $result = "fail";
                    self::warn("支付宝支付订单[$order_ref]异常：".$e->getMessage(),__METHOD__);
                }
                
            }else{
                //支付失败
                self::debug("通过支付宝支付失败！",__METHOD__);
                $msg = "通过支付宝支付失败,请认真检查！";
            }
            
        }else{
            //支付失败
            self::debug("通过支付宝支付失败！",__METHOD__);
            $msg = "通过支付宝支付失败,请认真检查！";
        }
        
        $this->putContext('payAmount', $payAmount);
        $this->putContext('order_ref', $order_ref);
        $this->putContext('msg', $msg);
        
        return $this->smartyResult('eshop.shopping.pay_result');
    }
    
    public function setOrderRef($ref){
        $this->_order_ref = $ref;
        return $this;   
    }
    public function getOrderRef(){
        return $this->_order_ref;
    }
    
}
/**vim:sw=4 et ts=4 **/
?>