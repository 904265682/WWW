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
	  <a href="<?php echo (SITE_URL); ?>/Home/Index/index.html">首页</a><a><cite>留言</cite></a>
	</span>
</div>
<!-- 面包屑导航 结束 -->
<div class="main">
	<div class="page_left">	
	<form class="layui-form feedback-form">
		<div class="layui-form-item">
		    <div class="" id="neirong">
		    	<textarea name="content" lay-verify="layedit" autocomplete="off" placeholder="我要留言" class="llayui-textarea layui-hide" id="content" value="aaa"></textarea>
		    </div>
		</div>
		<div class="layui-form-item">
		    <button class="layui-btn" lay-submit="" type="submit" lay-filter="feedback">提交留言</button>
		</div>
	</form>
	<ul class="feedback_list">
<!-- 		<li>
			<div class="feedback_member">
			 	<div class="avatar"><img src="<?php echo (SITE_PUBLIC_HOME); ?>/images/laozhang_avatar.png" alt="老张头像"></div>
				<div class="name_date"><p class="name">老张</p>
			 	<p class="date">3天前</p></div>
			 	<div class="feedback_content">老张不赖呀</div>
			</div>
			<div class="feedback_member feedback_reply">
			 	<div class="avatar"><img src="<?php echo (SITE_PUBLIC_HOME); ?>/images/laozhang_avatar.png" alt="老张头像"></div>
				<div class="name_date"><p class="name">老张</p>
			 	<p class="date">3天前</p></div>
			 	<div class="feedback_content reply_content">回复：老张不赖呀</div>
			</div>
		</li> -->
		<?php if(is_array($data)): foreach($data as $key=>$dt): ?><li>
				<div class="feedback_member">
					<div class="avatar"><i class="layui-icon">&#xe612;</i></div>
				 	<div class="name_date"><p class="name">游客留言</p>
				 	<p class="date"><?php $dt1 = $dt['created_at']; echo substr($dt1,0,10);?></p></div>
				 	<div class="feedback_content"><?php echo ($dt["cont"]); ?></div>
				</div>
				<?php if(!empty($dt["reply_on"])): ?><div class="feedback_member feedback_reply">
				 	<div class="avatar"><img src="<?php echo (SITE_URL); ?>/<?php echo ($logo); ?>" alt="<?php echo ($site_name); ?>"></div>
					<div class="name_date"><p class="name"><?php echo ($dt["reply_user"]); ?></p>
				 	<p class="date"><?php $dt2 = $dt['reply_at']; echo substr($dt2,0,10);?></p></div>
				 	<div class="feedback_content reply_content">回复：<?php echo ($dt["reply"]); ?></div>
				</div><?php endif; ?>
			</li><?php endforeach; endif; ?>
	</ul>
	</div>
	<div class="page_right">
		<div class="about_stationmaster_container">
			<h3>博主信息</h3>
			<ol class="page_right_list trans_3">
				<li>姓名：<?php echo ($name); ?></li>
				<li>职业：<?php echo ($profession); ?></li>
				<li>座右铭：<?php echo ($motto); ?></li>
				<li>站长QQ：<?php echo ($qq); ?></li>
			</ol>
		</div>
	</div>
	<div class="clear"></div>
</div>
<script type="text/javascript">
layui.use(['form', 'layedit'], function(){
	var form = layui.form(),
  	layer = layui.layer,
  	layedit = layui.layedit,
  	$ = layui.jquery;

  //创建一个编辑器
  var content = layedit.build('content',{
  	tool: ['face', '|', 'left', 'center', 'right']
    ,height: 150
  });
  //表单验证
  form.verify({
    //编辑器数据同步
    layedit: function(value){
      layedit.sync(content);
      if(layedit.getText(content).length < 1){
        return '至少得 1 个字吧...';
      }
    }

  });
  // //监听提交
  // form.on('submit(feedback)', function(data){
  // 	var is_login = false;
  // 	$.post(
  // 	// 	"<?php echo (SITE_URL); ?>/Home/Index/mess",
  // 	// {
  // 	// 	content : $("#content").value;

  // 	// },function(data,status){
  //  //      alert("数据: \n" + data + "\n状态: " + status);
  //  //  }
  // 	{
  // 		type:"POST",
  //       async:false,  //设置同步请求
  //       url:'',
  //       dataType:'json',
  //       success:function(data) {
  //       	if(data.code == 200){
		//         is_login = true;
		//     }
  //       }
  // 	}

  // 	);
  //   return false;
  // });
  	$("button").click(function(){
  		alert($("#neirong").val());
  	    // $.post("<?php echo (SITE_URL); ?>/Home/Index/mess",
  	    // {
  	    //     name:$("#content").val()
  	    // },
  	    //     function(data){
  	    //     	alert(data);
  	    // 	}
  	    // );
  	});
});
  
</script>


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