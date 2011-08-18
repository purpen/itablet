<div id="header" class="mb-10">
	<div class="site-box mt-10 clearfix">
		<div class="logosite fl">
			<a href="{Common_Smarty_Url_format key=domain}" title="万行商城">
				<img src="/images/eshop/wanhang-logo.jpg" alt="万行商城" />
			</a>
		</div>
		
		<div class="auth mb-10 fr clearfix">
			<div class="topnav ablack fl">
				{if $user_auth_name}
				<a href="{Common_Smarty_Url_format key=register}" class="red">您好，{$user_auth_name}</a> | <a href="{Common_Smarty_Url_format key=manage_center}">我的帐户</a> | <a href="{Common_Smarty_Url_format key=logout}">退出登录</a> | 
				{else}
				<a href="{Common_Smarty_Url_format key=login}" >登录</a> | <a href="{Common_Smarty_Url_format key=register}" >注册</a> | 
				{/if}
				<a href="{Common_Smarty_Url_format key=helper name=register}" >客服中心</a>
			</div>

			<div class="buy-cart awhite fr">
				<h4 class="mb-5 clearfix"><img src="/images/eshop/icon-car.png" />  <a href="{Common_Smarty_Url_format key=cart}" class="fr"><img src="/images/eshop/icon-view.png" /></a></h4>
				<div id="buy-item" class="pl-5">{$items_count}件商品，合计{$total_money}元</div>
			</div>
		</div>
	</div>
	
	<div id="navigation" class="clearfix">
		<div class="menu-box">
			<ul class="clearfix">
				<li>
					<a href="{Common_Smarty_Url_format key=domain}" class="actived">首 页</a>
				</li>
				<li>
					<a href="{Common_Smarty_Url_format key=channel slug=tablet}" >数位板</a>
				</li>
				<li>
					<a href="{Common_Smarty_Url_format key=channel slug=worksite}" >工作站</a>
				</li>
				<li>
					<a href="{Common_Smarty_Url_format key=domain}" >笔记本</a>
				</li>
				<li>
					<a href="{Common_Smarty_Url_format key=domain}" >配件</a>
				</li>
				<li>
					<a href="{Common_Smarty_Url_format key=domain}" >图书</a>
				</li>
				<li>
					<a href="{Common_Smarty_Url_format key=domain}" >教育</a>
				</li>
				<li>
					<a href="{Common_Smarty_Url_format key=domain}" >软件</a>
				</li>
				<li>
					<a href="#" >社区</a>
				</li>
				<li>
					<a href="#" >活动</a>
				</li>
			</ul>
		</div>
		
		<form class="search-form clearfix" action="">
			<input type="text" name="q" value="" class="fl query" />
			<input type="image" src="/images/eshop/icon-search.png" />
		</form>
	</div>
</div>