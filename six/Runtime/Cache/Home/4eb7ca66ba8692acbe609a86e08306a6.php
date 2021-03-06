<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>老张博客前台模版</title>
	<meta name="keywords" content="老张博客前台模版">
	<meta name="description" content="老张博客前台模版">
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
	<a class="logo" href="./index.html"><img src="<?php echo (SITE_PUBLIC_HOME); ?>/images/logo.png" alt="老张博客前台模版"></a>
	<ul class="layui-nav" lay-filter="top_nav">
	  	<li class="layui-nav-item home"><a href="./index.html">首页</a></li>
	  	<li class="layui-nav-item">
	  		<a href="./article_list.html">学无止境</a>
			<dl class="layui-nav-child"> <!-- 二级菜单 -->
		      	<dd><a href="./article_list.html">PHP</a></dd>
		      	<dd><a href="./article_list.html">WEB前端</a></dd>
		    </dl>
	  	</li>
	  	<li class="layui-nav-item">
	  		<a href="./case_list.html">分享无价</a>
			<dl class="layui-nav-child"> <!-- 二级菜单 -->
		      	<dd><a href="./case_list.html">源码分享</a></dd>
		      	<dd><a href="./case_list.html">jQuery特效</a></dd>
		    </dl>
	  	</li>
	  	<li class="layui-nav-item">
	  		<a href="./diary.html">日记</a>
	  	</li>
	  	<li class="layui-nav-item">
	  		<a href="./about_laozhang.html">关于</a>
			<dl class="layui-nav-child"> <!-- 二级菜单 -->
		      	<dd><a href="./about_lzcms.html">关于老张</a></dd>
		      	<dd><a href="./about_lzcms.html">关于Lz_CMS</a></dd>
		      	<dd><a href="./feedback.html">留言</a></dd>
		    </dl>
	  	</li>
	</ul>
	<div class="title">老张博客前台模版</div>
	<form action="" mothod="post" class="head_search trans_3 layui-form">
	  <div class="layui-form-item trans_3">
	  	<!-- <span class="close trans_3"><i class="layui-icon">&#x1006;</i> </span> -->
	    <div class="layui-input-inline trans_3">
	      <select name="model_id trans_3">
	      	<option value="1" selected >文章模型</option>
	      	<option value="2">图集模型</option>
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
		<li class="layui-nav-item home"><a href="/">首页</a></li>
	  	<li class="layui-nav-item">
	  		<a href="javascript:void();">学无止境</a>
			<dl class="layui-nav-child"> <!-- 二级菜单 -->
		      	<dd><a href="./article_list.html">PHP</a></dd>
		      	<dd><a href="./article_list.html">WEB前端</a></dd>
		    </dl>
	  	</li>
	  	<li class="layui-nav-item">
	  		<a href="javascript:void();">分享无价</a>
			<dl class="layui-nav-child"> <!-- 二级菜单 -->
		      	<dd><a href="./case_list.html">源码分享</a></dd>
		      	<dd><a href="./case_list.html">jQuery特效</a></dd>
		    </dl>
	  	</li>
	  	<li class="layui-nav-item">
	  		<a href="./diary.html">日记</a>
	  	</li>
	  	<li class="layui-nav-item">
	  		<a href="javascript:void();">关于</a>
			<dl class="layui-nav-child"> <!-- 二级菜单 -->
		      	<dd><a href="./about_lzcms.html">关于老张</a></dd>
		      	<dd><a href="./about_lzcms.html">关于Lz_CMS</a></dd>
		      	<dd><a href="./feedback.html">留言</a></dd>
		    </dl>
	  	</li>
	</ul>
  </div>
</div>
<div class="left_nav_mask"></div>
<div class="left_nav_btn"><i class="layui-icon">&#xe602;</i></div>
<!-- 左边导航 结束 -->


<!-- banner 开始 -->
<div class="banner">
<div class="main index_main"> 
	<img class="banner_pic" src="<?php echo (SITE_PUBLIC_HOME); ?>/images/banner.jpg" alt="banner_学无止境">
</div>
</div>
<!-- banner 结束 -->
<div class="main index_main">
	<ul class="index-learn">
		<li>
	      <fieldset class="layui-elem-field layui-field-title">
	        <legend>业精于勤</legend>
	        <p>“业精于勤荒于嬉”，精深的业技靠的是勤学、刻苦努力，靠的是争分夺秒的勤学苦练才会有精深的技术。得在认真，失在随便。</p>
	      </fieldset>
	    </li>
	    <li>
	      <fieldset class="layui-elem-field layui-field-title">
	        <legend>学无止境</legend>
	        <p>学习，探索，研究，从不了解到了解，从无知到掌握，到灵活运用，在不断的学习中加深认识。由浅入深，由表及里。</p>
	      </fieldset>
	    </li>
	    <li>
	      <fieldset class="layui-elem-field layui-field-title">
	        <legend>工匠精神</legend>
	        <p>精益求精，注重细节，追求完美和极致，不惜花费时间精力，孜孜不倦，反复改进产品，把99%提高到99.99%。</p>
	      </fieldset>
	    </li>
  	</ul>
</div>
<div class="main index_main lzcms_banner">
	<a href="http://www.phplaozhang.com/download-lists/13.html" target="_blank"><img src="<?php echo (SITE_PUBLIC_HOME); ?>/images/lzcms_banner.png" alt="LzCMS下载"></a>
</div>
<!-- 文章 开始 -->
<div class="main index_main">
	<div class="page_left">	
	<ul class="page_left_list"> 
		<li>
			<a href="./article_view.html" class="pic"><img src="<?php echo (SITE_PUBLIC_HOME); ?>/images/article_pic.png" alt="老张博客上线了！"></a>
			<h2 class="title"><a href="./article_view.html">老张博客上线了！</a></h2>
			<div class="date_hits">
				<span>老张</span>
				<span>2个月前</span>
				<span><a href="http://www.phplaozhang.com">老张博客</a></span>
				<span class="hits"><i class="layui-icon" title="点击量"></i> 888 ℃</span>
				<p class="commonts"><i class="layui-icon" title="点击量">&#xe63a;</i> <span id="" class="cy_cmt_count">888</span></p>
			</div>
			<div class="desc">今年(2016年)年初就打算做一个个人博客了，在年初时候想着才年初，今年还有很长时间，所以就没有着急，一直拖着，这一拖就是半年。在五六月分的时候，想着这都半年过去了，博</div>
		</li>
		<li class="no_pic">
			<h2 class="title"><a href="./article_view.html">老张博客上线了！</a></h2>
			<div class="date_hits">
				<span>老张</span>
				<span>2个月前</span>
				<span><a href="http://www.phplaozhang.com">老张博客</a></span>
				<span class="hits"><i class="layui-icon" title="点击量"></i> 888 ℃</span>
				<p class="commonts"><i class="layui-icon" title="点击量">&#xe63a;</i> <span id="" class="cy_cmt_count">888</span></p>
			</div>
			<div class="desc">今年(2016年)年初就打算做一个个人博客了，在年初时候想着才年初，今年还有很长时间，所以就没有着急，一直拖着，这一拖就是半年。在五六月分的时候，想着这都半年过去了，博</div>
		</li>
		<li>
			<a href="./article_view.html" class="pic"><img src="./images/article_pic.png" alt="老张博客上线了！"></a>
			<h2 class="title"><a href="./article_view.html">老张博客上线了！</a></h2>
			<div class="date_hits">
				<span>老张</span>
				<span>2个月前</span>
				<span><a href="http://www.phplaozhang.com">老张博客</a></span>
				<span class="hits"><i class="layui-icon" title="点击量"></i> 888 ℃</span>
				<p class="commonts"><i class="layui-icon" title="点击量">&#xe63a;</i> <span id="" class="cy_cmt_count">888</span></p>
			</div>
			<div class="desc">今年(2016年)年初就打算做一个个人博客了，在年初时候想着才年初，今年还有很长时间，所以就没有着急，一直拖着，这一拖就是半年。在五六月分的时候，想着这都半年过去了，博</div>
		</li>
		<li class="no_pic">
			<h2 class="title"><a href="./article_view.html">老张博客上线了！</a></h2>
			<div class="date_hits">
				<span>老张</span>
				<span>2个月前</span>
				<span><a href="http://www.phplaozhang.com">老张博客</a></span>
				<span class="hits"><i class="layui-icon" title="点击量"></i> 888 ℃</span>
				<p class="commonts"><i class="layui-icon" title="点击量">&#xe63a;</i> <span id="" class="cy_cmt_count">888</span></p>
			</div>
			<div class="desc">今年(2016年)年初就打算做一个个人博客了，在年初时候想着才年初，今年还有很长时间，所以就没有着急，一直拖着，这一拖就是半年。在五六月分的时候，想着这都半年过去了，博</div>
		</li>
		<li>
			<a href="./article_view.html" class="pic"><img src="./images/article_pic.png" alt="老张博客上线了！"></a>
			<h2 class="title"><a href="./article_view.html">老张博客上线了！</a></h2>
			<div class="date_hits">
				<span>老张</span>
				<span>2个月前</span>
				<span><a href="http://www.phplaozhang.com">老张博客</a></span>
				<span class="hits"><i class="layui-icon" title="点击量"></i> 888 ℃</span>
				<p class="commonts"><i class="layui-icon" title="点击量">&#xe63a;</i> <span id="" class="cy_cmt_count">888</span></p>
			</div>
			<div class="desc">今年(2016年)年初就打算做一个个人博客了，在年初时候想着才年初，今年还有很长时间，所以就没有着急，一直拖着，这一拖就是半年。在五六月分的时候，想着这都半年过去了，博</div>
		</li>
		<li class="no_pic">
			<h2 class="title"><a href="./article_view.html">老张博客上线了！</a></h2>
			<div class="date_hits">
				<span>老张</span>
				<span>2个月前</span>
				<span><a href="http://www.phplaozhang.com">老张博客</a></span>
				<span class="hits"><i class="layui-icon" title="点击量"></i> 888 ℃</span>
				<p class="commonts"><i class="layui-icon" title="点击量">&#xe63a;</i> <span id="" class="cy_cmt_count">888</span></p>
			</div>
			<div class="desc">今年(2016年)年初就打算做一个个人博客了，在年初时候想着才年初，今年还有很长时间，所以就没有着急，一直拖着，这一拖就是半年。在五六月分的时候，想着这都半年过去了，博</div>
		</li>
	</ul>
	</div>
	<div class="page_right">
		<div class="about_stationmaster_container">
			<h3>博主信息</h3>
			<ol class="page_right_list trans_3">
				<li>姓名：张丹峰</li>
				<li>职业：PHP程序猿、WEB前端</li>
				<li>座右铭：业精于请、学无止境、工匠精神</li>
				<li>QQ群：602099721 </li>
			</ol>
		</div>
		<div class="new_list">
			<h3>最新文章</h3>
			<ol class="page_right_list trans_3">
				<li><a href="http://www.phplaozhang.com">老张博客上线啦(二)</a><span class="hits"> 888 ℃ </span></li>
				<li><a href="http://www.phplaozhang.com">老张博客上线啦(二)</a><span class="hits"> 5 ℃ </span></li>
				<li><a href="http://www.phplaozhang.com">老张博客上线啦(二)</a><span class="hits"> 320 ℃ </span></li>
				<li><a href="http://www.phplaozhang.com">老张博客上线啦(二)</a><span class="hits"> 135 ℃ </span></li>
			</ol>
		</div>
		<div class="hot_list">
			<h3>最近热文</h3>
			<ol class="page_right_list trans_3">
				<li><a href="http://www.phplaozhang.com">老张博客上线啦(二)</a><span class="hits"> 888 ℃ </span></li>
				<li><a href="http://www.phplaozhang.com">老张博客上线啦(二)</a><span class="hits"> 5 ℃ </span></li>
				<li><a href="http://www.phplaozhang.com">老张博客上线啦(二)</a><span class="hits"> 320 ℃ </span></li>
				<li><a href="http://www.phplaozhang.com">老张博客上线啦(二)</a><span class="hits"> 135 ℃ </span></li>
			</ol>
		</div>
		<h3>友情连接</h3>
		<div class="links trans_3">
			<a href="http://www.phplaozhang.com" target="_blank">老张博客</a>
		</div>
	</div>
	<div class="clear"></div>
</div>
<!-- 文章 结束 -->


<!-- 底部 开始 --> 
<ul class="layui-fixbar">
	<!-- <li class="layui-icon qr_code">&#xe63b;<img class="qr_code_pic" src="<?php echo ($settings["qr_code"]); ?>" alt="微信公众号二维码"></li> -->
	<li class="layui-icon layui-fixbar-top" id="to_top">&#xe604;</li>
</ul>
<div class="layui-footer footer">
  <div class="main index_main">
    <p><a href="http://www.phplaozhang.com">老张博客</a> © phplaozhang.com</p>
    <p>
      <a href="">网站地图</a>
    </p>
    <p class="beian">
    	<a class="gongan" target="_blank" href=""><img src="<?php echo (SITE_PUBLIC_HOME); ?>/images/gonganbeian.png" alt="豫公网安备 410xxxxxxx号">豫公网安备 410xxxxxxx号</a>
    	<a class="icp" target="_blank" href="http://www.miitbeian.gov.cn">豫ICP备xxxxxxxxx号-1</a>
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