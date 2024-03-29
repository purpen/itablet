<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>订单详情-{smarty_include eshop.common.xtitle}</title>
	<meta name="author" content="xiaoyi">
	{smarty_include eshop.common.header_compart}
	<link rel="stylesheet" href="/csstyle/itablet.css" type="text/css" />
	{smarty_include eshop.js-common}
	{smarty_include eshop.js-form}
</head>

<body>
<div id="wrapper">
	
	{smarty_include eshop.common.header}
	
	<div id="container">
		<div class="box">
			<div class="bordor profile">
				<h2>个人帐户管理</h2>
				
				<div class="box clearfix">
					<div class="leftref noborder" id="channelside">
						{smarty_include eshop.account.leftnav}
					</div>
					<div class="righttwo2" id="contentlist">
						<div class="a_item contentbox">
							<div class="contentbaby">
								<p>订单号: <span class="sale_pr">{$order_row.reference} </span> 
									<span id="order_status">{Common_Smarty_DataSet_orderStatus status=$order_row.status} {if $order_row.status eq 0 }该订单您已取消，如需要订购商品请重新下单！{/if} {if ($order_row.status eq 1) or ($order_row.status eq 5)}<a href="/app/eshop/profile/canceled?id={$order_row.id}" class="jq_a_ajax">取消订单</a>{/if} {if $order_row.status eq 1 and $order_row.payment_method eq 'a' }<a href="/app/eshop/alipay?order_ref={$order_row.reference}" title="支付订单" target="_blank">现在支付</a>{/if} {if $order_row.status eq 15}<a href="/app/eshop/profile/finished?id={$order_row.id}" class="jq_a_ajax">完成订单</a>{/if}</span>
								</p>
								
								<table class="ablue">
									<tbody>
										<tr class="tr_lin">
											<td colspan="4">订单信息</td>
										</tr>
									<tr>
										<td>
											<table class="td_child">
												<tbody>
												<tr>
													<td class="td_right">订单编号：</td>
													<td>{$order_row.reference}</td>
													<td class="td_right">订单时间：</td>
													<td class="right_side">{$order_row.created_on}</td>
												</tr>
												<tr>
													<td class="td_right">支付方式：</td>
													<td>{$payment_methods[$order_row.payment_method].name}</td>
													<td class="td_right">订单总金额：</td>
													<td class="right_side">{$order_row.pay_money}元</td>
												</tr>
												<tr>
													<td class="td_right">收货人：</td>
													<td>{$order_row.name}</td>
													<td class="td_right">收货人电话：</td>
													<td class="right_side">{$order_row.mobie}{if $order_row.telephone} ({$order_row.telephone}){/if}</td>
												</tr>
												<tr>
													<td class="td_right">收货地址：</td>
													<td class="right_side" colspan="3">{Common_Smarty_DataSet_placeName id=$order_row.province} {Common_Smarty_DataSet_placeName id=$order_row.city} {$order_row.address}{if $order_row.zip} ({$order_row.zip}){/if}</td>
												</tr>
												<tr>
													<td class="td_right">备注：</td>
													<td class="right_side" colspan="3">{$order_row.summary}</td>
												</tr>
												<tr>
													<td class="td_right bottom_side">送货方式/时间：</td>
													<td class="right_side bottom_side" colspan="3">{$transfer_methods[$order_row.transfer].name} ({$transfer_times[$order_row.transfer_time]})</td>
												</tr>
											 </tbody>
											</table>
										</td>
									</tr>
								</tbody>
							</table>
							
							<div class="a_item">
								<table class="ablue">
									<tr class="tr_lin gs">
										<td>序号</td>
										<td>商品图片</td>
										<td width="50%">商品信息</td>
										<td>数量</td>
										<td>单价</td>
										<td>小计</td>
									</tr>
									{foreach from=$plist item=product name=order}
									<tr class="gs">
										<td>{$smarty.foreach.order.iteration}</td>
										<td>
											<a href="{Common_Smarty_Url_format key=product id=$product.id}" title="{$product.title}">
											<img src="{Common_Smarty_Product_photoThumb thumb_path=$product.thumb}" class="bordor" width="90" height="90" />
										</a></td>
										<td width="50%"><p class="pl"><a href="{Common_Smarty_Url_format key=product id=$product.id}" target="_blank">{$product.title} ({$product.size})</a></p></td>
										<td>{$product.quantity}</td>
										<td>{$product.sale_price}元</td>
										<td>{$product.sale_price*$product.quantity}元</td>
									</tr>
									{/foreach}
									<tr >
										<td colspan="5" class="tr_mony">支付金额<span class="mony">￥{$order_row.pay_money}</span>元 = 商品金额<span class="mony">￥{$order_row.total_money}</span>元 + 运费<span class="mony">￥{$order_row.freight}</span>元 - 优惠金额<span class="mony">￥{$order_row.card_money|default:0}</span>元</td>
									</tr>
								</table>
							</div>
							
							</div>
						</div>
						
						

					</div>

				</div>
			</div>
		</div>

	</div>

	{smarty_include eshop.common.site-help}
	
	{smarty_include eshop.common.footer}
	
</div>
</body>
</html>