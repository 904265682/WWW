<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo ($title); ?></title>
	<meta name="keywords" content="<?php echo ($keywords); ?>">
	<meta name="description" content="<?php echo ($description); ?>">
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, height=device-height, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?php echo (SITE_PUBLIC_HOME); ?>/layui/css/layui.css">
	<link rel="stylesheet" type="text/css" href="<?php echo (SITE_PUBLIC_HOME); ?>/css/style.css">
	<script type="text/javascript" src="<?php echo (SITE_PUBLIC_HOME); ?>/layui/layui.js"></script>
</head>
<body>
<!-- 头部 开始 -->
<div class="layui-header header trans_3">
<div class="main index_main">
	<!-- logo -->
	<a class="logo" href="<?php echo (SITE_URL); ?>/Home/Index/index.html"><img src="<?php echo (SITE_URL); ?>/<?php echo ($logo); ?>" alt="<?php echo ($title); ?>"></a>
	<ul class="layui-nav" lay-filter="top_nav">
	  	<li class="layui-nav-item home"><a href="<?php echo (SITE_URL); ?>/Home/Index/index.html">首页</a></li>

	  	<?php if(is_array($oneMenu)): foreach($oneMenu as $key=>$vo): if(($vo["type"]) != "5"): ?><li class="layui-nav-item">
					<?php if(($vo["type"] == 3) OR ($vo["type"] == 4) ): ?><a href="<?php echo (SITE_URL); ?>/<?php echo ($vo["link"]); ?>"><?php echo ($vo["menu_name"]); ?></a>
				  	<?php elseif($vv["type"] == 0): ?>
				  		<a href="<?php echo (SITE_URL); ?>/Home/Index/cont/id/<?php echo ($vo["id"]); ?>"><?php echo ($vo["menu_name"]); ?></a>
				  	<?php else: ?>
				  		<a href="<?php echo (SITE_URL); ?>/Home/Index/mlist/id/<?php echo ($vo["id"]); ?>"><?php echo ($vo["menu_name"]); ?></a><?php endif; ?>
			  	</li>
	  		<?php else: ?>
			  	<li class="layui-nav-item">
			  		<a href="#"><?php echo ($vo["menu_name"]); ?></a>
					<dl class="layui-nav-child"> <!-- 二级菜单 -->
						<?php if(is_array($twoMenu)): foreach($twoMenu as $key=>$vv): if(($vo["id"]) == $vv["up_id"]): if(($vv["type"] == 3) OR ($vv["type"] == 4) ): ?><dd><a href="<?php echo (SITE_URL); ?>/<?php echo ($vv["link"]); ?>"><?php echo ($vv["menu_name"]); ?></a></dd>
							<?php elseif($vv["type"] == 0): ?>
						      	<dd><a href="<?php echo (SITE_URL); ?>/Home/Index/cont/id/<?php echo ($vv["id"]); ?>"><?php echo ($vv["menu_name"]); ?></a></dd>
							<?php else: ?>
						      	<dd><a href="<?php echo (SITE_URL); ?>/Home/Index/mlist/id/<?php echo ($vv["id"]); ?>"><?php echo ($vv["menu_name"]); ?></a></dd><?php endif; endif; endforeach; endif; ?>
				    </dl>
			  	</li><?php endif; endforeach; endif; ?>
	</ul>
	<div class="title"><?php echo ($title); ?></div>
	<form action="" mothod="post" class="head_search trans_3 layui-form">
	  <div class="layui-form-item trans_3">
	  	<!-- <span class="close trans_3"><i class="layui-icon">&#x1006;</i> </span> -->
	    <div class="layui-input-inline trans_3">
	      <select name="model_id trans_3">
	      	<option value="1" selected >文章模型</option>
	      	<option value="2">列表模型</option>
	      </select>
	    </div>
	    <input type="text" name="keywords" placeholder="搜索" autocomplete="off" class="search_input trans_3">
	    <button class="layui-btn" lay-submit="" style="display: none;"></button>
	  </div>
	</form>
</div>
</div>
<div class="header_back"></div>
<!-- 头部 结束 -->
<!-- 左边导航 开始 -->
<div class="layui-side layui-bg-black left_nav trans_2">
  <div class="layui-side-scroll">
	<ul class="layui-nav layui-nav-tree"  lay-filter="left_nav">
		<li class="layui-nav-item home"><a href="<?php echo (SITE_URL); ?>/Home/Index/index.html">首页</a></li>
		<?php if(is_array($oneMenu)): foreach($oneMenu as $key=>$vo): if(($vo["type"]) != "5"): ?><li class="layui-nav-item">
				  	<?php if(($vo["type"] == 3) OR ($vo["type"] == 4) ): ?><a href="<?php echo (SITE_URL); ?>/<?php echo ($vo["link"]); ?>"><?php echo ($vo["menu_name"]); ?></a>
				  	<?php elseif($vv["type"] == 0): ?>
				  		<a href="<?php echo (SITE_URL); ?>/Home/Index/cont/id/<?php echo ($vo["id"]); ?>"><?php echo ($vo["menu_name"]); ?></a>
				  	<?php else: ?>
				  		<a href="<?php echo (SITE_URL); ?>/Home/Index/mlist/id/<?php echo ($vo["id"]); ?>"><?php echo ($vo["menu_name"]); ?></a><?php endif; ?>
			  	</li>
		  	<?php else: ?>
			  	<li class="layui-nav-item">
			  		<a href="javascript:void();"><?php echo ($vo["menu_name"]); ?></a>
					<dl class="layui-nav-child"> <!-- 二级菜单 -->
					<?php if(is_array($twoMenu)): foreach($twoMenu as $key=>$vv): if(($vo["id"]) == $vv["up_id"]): if(($vv["type"] == 3) OR ($vv["type"] == 4) ): ?><dd><a href="<?php echo (SITE_URL); ?>/<?php echo ($vv["link"]); ?>"><?php echo ($vv["menu_name"]); ?></a></dd>
					      	<?php elseif($vv["type"] == 0): ?>
					      		<dd><a href="<?php echo (SITE_URL); ?>/Home/Index/cont/id/<?php echo ($vv["id"]); ?>"><?php echo ($vv["menu_name"]); ?></a></dd>
					      	<?php else: ?>
					      		<dd><a href="<?php echo (SITE_URL); ?>/Home/Index/mlist/id/<?php echo ($vv["id"]); ?>"><?php echo ($vv["menu_name"]); ?></a></dd><?php endif; endif; endforeach; endif; ?>
				    </dl>
			  	</li><?php endif; endforeach; endif; ?>
	</ul>
  </div>
</div>
<div class="left_nav_mask"></div>
<div class="left_nav_btn"><i class="layui-icon">&#xe602;</i></div>
<!-- 左边导航 结束 -->


<!-- 面包屑导航 开始 -->
<div class="main breadcrumb_nav trans_3">
	<span class="layui-breadcrumb" lay-separator="—">
	  <a href="./index.html">首页</a><a href=""><?php echo ($tc1); ?></a><a><cite><?php echo ($tc2); ?></cite></a>
	</span>
</div>
<!-- 面包屑导航 结束 -->
<!-- 图片列表开始 -->
<div class="main">
	<div class="picture_list_container">
		<ul>
			<?php if(is_array($data)): foreach($data as $key=>$vo): ?><li class="trans_3">
					<a href="<?php echo ($vo["link"]); ?>" class="pic"><img src="<?php echo (SITE_URL); ?>/<?php echo ($vo["pic"]); ?>" alt="<?php echo ($vo["title"]); ?>"></a>
					<h2 class="title"><a href="<?php echo ($vo["link"]); ?>"><?php echo ($vo["title"]); ?></a></h2>
					<p class="desc"><?php echo ($vo["cont"]); ?></p>
					<div class="date_hits">
						<p class="date"><span><?php echo ($vo["writer"]); ?></span><span><?php $vo1 = $vo['created_at']; echo substr($vo1,0,10);?></span></p>
						<span class="hits"><i class="layui-icon" title="点击量">&#xe62c;</i><?php echo ($vo["click_num"]); ?> ℃</span>
						<a href="<?php echo ($vo["link"]); ?>" class="layui-btn layui-btn-primary">下载</a>
					</div>
				</li><?php endforeach; endif; ?>
			<div class="clear"></div>
		</ul>
	</div>
	<div id="page" style="min-height: 10px;">
		<ul class="pagination">
			<li class="disabled"><span>&laquo;</span></li><li class="active"><span>1</span></li><li><a href="">2</a></li> <li><a href="">&raquo;</a></li>
		</ul>
	</div>
</div>
<!-- 图片列表结束 -->


<!-- 底部 开始 --> 
<ul class="layui-fixbar">
	<!-- <li class="layui-icon qr_code">&#xe63b;<img class="qr_code_pic" src="<?php echo ($settings["qr_code"]); ?>" alt="微信公众号二维码"></li> -->
	<li class="layui-icon layui-fixbar-top" id="to_top">&#xe604;</li>
</ul>
<div class="layui-footer footer">
  <div class="main index_main">
    <p><?php echo ($site_name); ?><a href="http://www.phpsix.com"> © phpsix.com</a></p>
    <p>
      <a href="http://www.phpsix.com">网站地图</a>
    </p>
    <p class="beian">
    	<a class="gongan" target="_blank" href=""><img src="<?php echo (SITE_PUBLIC_HOME); ?>/images/gonganbeian.png" alt="豫公网安备 410xxxxxxx号">豫公网安备 410xxxxxxx号</a>
    	<a class="icp" target="_blank" href="http://www.miitbeian.gov.cn"><?php echo ($icp); ?></a>
    </p>
  </div>
</div>
<!-- 底部 结束 -->

<script type="text/javascript">
layui.use(['form','element'], function(){
	var layer = layui.layer,
	form = layui.form(),
	element = layui.element(),
	$ = layui.jquery;
  	
	//左边导航点击显示
	$('.left_nav_btn').click(function(){
		$('.left_nav_mask').show();
		$('.left_nav').addClass('left_nav_show');
	});
	//左边导航点击消失
	$('.left_nav_mask').click(function(){
		$('.left_nav').removeClass('left_nav_show');
		$('.left_nav_mask').hide();
	});

	//搜索框特效
	$('.header .head_search .search_input').focus(function(){
		$('.header .head_search').addClass('focus');
		$(this).attr('placeholder','输入关键词搜索');
	});
	$(document).click(function(){
		$('.header .head_search').removeClass('focus');
		$('.header .head_search .search_input').attr('placeholder','搜索');
	});
	$('.header .head_search').click(function(e){
		$(this).addClass('focus');
		e.stopPropagation(); 
	});
	/*$('.header .head_search .close').click(function(){
		$('.header .head_search').removeClass('focus');
		$('.header .head_search .search_input').attr('placeholder','搜索');
	});*/
	
	//回到顶部
	$("#to_top").click(function() {
      $("html,body").animate({scrollTop:0}, 200);
    });
    $(document).scroll(function(){
    	var	scroll_top = $(document).scrollTop();
    	if(scroll_top > 500){
    		$("#to_top").show();
    	}else{
    		$("#to_top").hide(); 
    	}
    }); 
    //底部版权始终在底部 
    /*var win_height = $(window).height();
    var body_height = $('body').height();  
    var footer_height = $('.footer').height();
    if(body_height - win_height < 0){
    	$('.footer').addClass('footer_fixed');
    } */
});
</script>
</body>
</html>