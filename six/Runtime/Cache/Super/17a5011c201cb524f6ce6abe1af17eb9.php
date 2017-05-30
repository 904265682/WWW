<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title><?php echo (SITE_TITLE); ?> -超级管理平台</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?php echo (SITE_PUBLIC_ADMIN); ?>/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo (SITE_PUBLIC_ADMIN); ?>/css/font-awesome.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="<?php echo (SITE_PUBLIC_ADMIN); ?>/css/ace-fonts.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="<?php echo (SITE_PUBLIC_ADMIN); ?>/css/ace.min.css" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="<?php echo (SITE_PUBLIC_ADMIN); ?>/css/ace-part2.min.css" />
		<![endif]-->
		<link rel="stylesheet" href="<?php echo (SITE_PUBLIC_ADMIN); ?>/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="<?php echo (SITE_PUBLIC_ADMIN); ?>/css/ace-ie.min.css" />
		<![endif]-->
		<link rel="stylesheet" href="<?php echo (SITE_PUBLIC_ADMIN); ?>/css/ace.onpage-help.css" />

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="<?php echo (SITE_PUBLIC_ADMIN); ?>/js/html5shiv.js"></script>
		<script src="<?php echo (SITE_PUBLIC_ADMIN); ?>/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="login-layout light-login">

		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									<i class="ace-icon fa fa-leaf green"></i>

									<span class="red"><?php echo (SITE_TITLE); ?></span>
									<span class="white" id="id-text2">超级管理平台</span>
								</h1>
								<h4 class="blue" id="id-company-text">&copy; <?php echo (SITE_COPY); ?></h4>
							</div>
							<div class="space-6"></div>
							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="ace-icon fa fa-coffee green"></i>
												请输入您的账户信息
											</h4>

											<div class="space-6"></div>

											<form method="POST" action="/six/Super/Login/index" >
												<fieldset>

													<?php if(isset($errors)): ?><div class="alert alert-warning">
														<button type="button" class="close" data-dismiss="alert">
															<i class="ace-icon fa fa-times"></i>
														</button>

														<strong>
															<i class="ace-icon fa fa-times"></i>
														</strong>
														<?php echo ($errors); ?>
														<br>
													</div><?php endif; ?>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" autofocus name="name" class="form-control" placeholder="用户名" />
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" name="password" class="form-control" placeholder="密码" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>

													<div class="clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" name="captcha"
															class="" placeholder="验证码">
															<img class="captcha pull-right" src="/six/Super/Login/verifyImg" style="cursor:pointer;" />
														</span>
													<br>
													</div>

													<div class="clearfix">
														<label class="inline">
															<input name="login_state" type="checkbox" class="ace" />
															<span class="lbl"> 保存登录状态</span>
														</label>

														<button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
															<i class="ace-icon fa fa-key"></i>
															<span class="bigger-110">登陆</span>
														</button>
													</div>

													<div class="space-4"></div>
												</fieldset>
											</form>
											<div class="space-6"></div>

											<div class="social-login center">
											</div>
										</div><!-- /.widget-main -->
									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->

							<!-- 	<div class="navbar-fixed-top align-right">
								<br />
								&nbsp;
								<a id="btn-login-dark" href="#">Dark</a>
								&nbsp;
								<span class="blue">/</span>
								&nbsp;
								<a id="btn-login-blur" href="#">Blur</a>
								&nbsp;
								<span class="blue">/</span>
								&nbsp;
								<a id="btn-login-light" href="#">Light</a>
								&nbsp; &nbsp; &nbsp;
							</div> -->
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='<?php echo (SITE_PUBLIC_ADMIN); ?>/js/jquery.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='<?php echo (SITE_PUBLIC_ADMIN); ?>/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo (SITE_PUBLIC_ADMIN); ?>/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="<?php echo (SITE_PUBLIC_ADMIN); ?>/js/bootstrap.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
			 $(document).on('click', '.toolbar a[data-target]', function(e) {
				e.preventDefault();
				var target = $(this).data('target');
				$('.widget-box.visible').removeClass('visible');//hide others
				$(target).addClass('visible');//show target
			 });
			});

			jQuery(function($) {
				var src = $(".captcha").attr('src');
				$(document).on('click', '.captcha', function(e) {
					e.preventDefault();
					var new_src = src + '?' + Math.random();
					$(this).attr('src', new_src);
				});
			});



			//you don't need this, just used for changing background
			jQuery(function($) {
			 $('#btn-login-dark').on('click', function(e) {
				$('body').attr('class', 'login-layout light-login');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-light').on('click', function(e) {
				$('body').attr('class', 'login-layout ');
				$('#id-text2').attr('class', 'grey');
				$('#id-company-text').attr('class', 'blue');
				e.preventDefault();
			 });
			 $('#btn-login-blur').on('click', function(e) {
				$('body').attr('class', 'login-layout blur-login');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'light-blue');
				
				e.preventDefault();
			 }); 
			});
		</script>
	</body>
</html>