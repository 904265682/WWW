<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		
		<title><?php echo (SITE_TITLE); ?>-后台管理系统</title>
		

		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		
		<!-- 好用的js日期选择器 -->
		<link rel="stylesheet" href="<?php echo (SUPER_PUBLIC_URL); ?>/Datepicker/css/font-awesome.4.6.0.css">
		<link href="<?php echo (SUPER_PUBLIC_URL); ?>/Datepicker/css/foundation-datepicker.css" rel="stylesheet" type="text/css">
		<!-- 好用的js日期选择器 -->
		<link rel="stylesheet" href="<?php echo (SUPER_PUBLIC_URL); ?>/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo (SUPER_PUBLIC_URL); ?>/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->


		<!-- text fonts -->
		<link rel="stylesheet" href="<?php echo (SUPER_PUBLIC_URL); ?>/css/ace-fonts.min.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="<?php echo (SUPER_PUBLIC_URL); ?>/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="<?php echo (SUPER_PUBLIC_URL); ?>/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="<?php echo (SUPER_PUBLIC_URL); ?>/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->
		<link rel="stylesheet" href="<?php echo (SUPER_PUBLIC_URL); ?>/css/custom.css" />
		
        
		<!-- ace settings handler -->
		
		<script src="<?php echo (SUPER_PUBLIC_URL); ?>/echarts/echarts.min.js"></script>
				
		<!-- Datepicker/ -->

		<script type="text/javascript" charset="utf-8" src="<?php echo (SITE_URL); ?>Public/ueditor/ueditor.config.js"></script>
	    <script type="text/javascript" charset="utf-8" src="<?php echo (SITE_URL); ?>Public/ueditor/ueditor.all.min.js"> </script>
	    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
	    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
	    <script type="text/javascript" charset="utf-8" src="<?php echo (SITE_URL); ?>Public/ueditor/lang/zh-cn/zh-cn.js"></script>

		<!-- 日历js -->
		<script type="text/javascript" src="<?php echo (SUPER_PUBLIC_URL); ?>/time/js/laydate.js"></script>
		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="<?php echo (SUPER_PUBLIC_URL); ?>/js/html5shiv.min.js"></script>
		<script src="<?php echo (SUPER_PUBLIC_URL); ?>/js/respond.min.js"></script>
		<![endif]-->
		<!-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.min.css"> -->
		<link rel="stylesheet" href="<?php echo (SUPER_PUBLIC_URL); ?>/table/btl.css" />
		<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
		<script src="<?php echo (SUPER_PUBLIC_URL); ?>/table/jq.js"></script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="<?php echo (SUPER_PUBLIC_URL); ?>/table/tbl.js"></script>
		<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.min.js"></script> -->
		<!-- Latest compiled and minified Locales -->
		<script src="<?php echo (SUPER_PUBLIC_URL); ?>/table/tbl_cn.js"></script>
		<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/locale/bootstrap-table-zh-CN.min.js"></script> -->
		<script src="<?php echo (SUPER_PUBLIC_URL); ?>/table/export.js"></script>
		<!-- <script type="text/javascript" src="http://issues.wenzhixin.net.cn/bootstrap-table/assets/bootstrap-table/src/extensions/export/bootstrap-table-export.js"></script> -->
		<script src="<?php echo (SUPER_PUBLIC_URL); ?>/table/tb_export.js"></script>
		<!-- <script type="text/javascript" src="http://rawgit.com/hhurz/tableExport.jquery.plugin/master/tableExport.js"></script> -->
		<script type="text/javascript">
		    jQuery(document).ready(function($) {
		    	var href=$("#btn_add").children('a').attr("href");
		        $("#btn_add").replaceWith(' <div id="btn_add" type="button" class="btn btn-default"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span><a href="'+href+'" >新增</a></div>')
		    });
		</script>
		<style type="text/css">
			#btn_add a{
				color: #333;
			}
		</style>
		
	</head>
	<body class="no-skin">
	<div id="navbar" class="navbar navbar-default">
		<script type="text/javascript">
			try{ace.settings.check('navbar' , 'fixed')}catch(e){}
		</script>

		<div class="navbar-container" id="navbar-container">
			<!-- #section:basics/sidebar.mobile.toggle -->
			<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
				<span class="sr-only">隐藏/显示侧边栏</span>

				<span class="icon-bar"></span>

				<span class="icon-bar"></span>

				<span class="icon-bar"></span>
			</button>

			<!-- /section:basics/sidebar.mobile.toggle -->
			<div class="navbar-header pull-left">
				<!-- #section:basics/navbar.layout.brand -->
				<a href="/Super/Index" class="navbar-brand">
					<small>
						<!-- <img src="<?php echo (SUPER_PUBLIC_URL); ?>/logo2.png" width="24" height="24"> -->
						<?php echo (SITE_TITLE); ?>-后台管理系统
					</small>
				</a>
				<!-- /section:basics/navbar.layout.brand -->

				<!-- #section:basics/navbar.toggle -->

				<!-- /section:basics/navbar.toggle -->
			</div>

			<!-- #section:basics/navbar.dropdown -->
			<div class="navbar-buttons navbar-header pull-right" role="navigation">
				<ul class="nav ace-nav">

					<!-- #section:basics/navbar.user_menu -->
					<li class="light-blue">
						<a data-toggle="dropdown" href="#" class="dropdown-toggle">
							<img class="nav-user-photo" src="<?php echo (SUPER_PUBLIC_URL); ?>/avatars/avatar5.png" alt="Jason's Photo" />
							<span class="user-info">
								<small>您好，</small>
								<?php echo (session('s_name')); ?>
							</span>

							<i class="ace-icon fa fa-caret-down"></i>
						</a>

						<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
							<li>
								<a href="<?php echo (SITE_URL); ?>Super/Login/uppw">
									<i class="ace-icon fa fa-cog"></i>
									安全设置
								</a>
							</li>

							<li class="divider"></li>

							<li>
								<a href="<?php echo (SITE_URL); ?>Super/Login/Logout">
									<i class="ace-icon fa fa-power-off"></i>
									安全退出
								</a>
							</li>
						</ul>
					</li>
					<!-- /section:basics/navbar.user_menu -->
				</ul>
			</div>

			<!-- /section:basics/navbar.dropdown -->
		</div><!-- /.navbar-container -->
	</div>
	<div class="main-container" id="main-container">
		<script type="text/javascript">
			try{ace.settings.check('main-container' , 'fixed')}catch(e){}
		</script>


		<!-- #section:basics/sidebar -->
<div id="sidebar" class="sidebar responsive">
	<script type="text/javascript">
		try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
	</script>

	<div class="sidebar-shortcuts" id="sidebar-shortcuts">
		<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
			<button class="btn btn-success">
				管
			</button>

			<button class="btn btn-info">
				理
			</button>

			<!-- #section:basics/sidebar.layout.shortcuts -->
			<button class="btn btn-warning">
				系
			</button>

			<button class="btn btn-danger">
				统
			</button>

			<!-- /section:basics/sidebar.layout.shortcuts -->
		</div>
		<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
			<span class="btn btn-success"></span>

			<span class="btn btn-info"></span>

			<span class="btn btn-warning"></span>

			<span class="btn btn-danger"></span>
		</div>
	</div><!-- /.sidebar-shortcuts -->
	<ul class="nav nav-list">
		<li class="hidden">
			<a href="<?php echo (SITE_URL); ?>Super/Index">
				<!-- <i class="menu-icon fa fa-tachometer"></i>
				<span class="menu-text"> 欢迎登录【<?php echo (session('s_name')); ?>】 </span> -->
			</a>
		</li>
		<li class="hidden">
			<a href="{{ action('Super\Auth\IndexController@getPassword') }}">
				<i class="menu-icon fa fa-tachometer"></i>
				<span class="menu-text"> 安全设置 </span>
			</a>
		</li>

		<li class="hidden">
			<a href="{{ action('Super\Home\IndexController@getJump') }}">
				<i class="menu-icon fa fa-tachometer"></i>
				<span class="menu-text"> 跳转 </span>
			</a>
		</li>
		<?php if(is_array($auth_infoA)): foreach($auth_infoA as $key=>$v): ?><li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-pencil-square-o"></i>
				<span class="menu-text"> <?php echo ($v["auth_name"]); ?></span>
				<b class="arrow fa fa-angle-down"></b>
			</a>
			<b class="arrow"></b>
			<ul class="submenu">
				<?php if(is_array($auth_infoB)): foreach($auth_infoB as $key=>$vv): if(($v["auth_id"]) == $vv["auth_pid"]): ?><li class="">
						<a href="<?php echo (SITE_URL); ?>Super/<?php echo ($vv["auth_c"]); ?>/<?php echo ($vv["auth_a"]); ?>">
							<i class="menu-icon fa fa-caret-right"></i>
							<?php echo ($vv["auth_name"]); ?>
						</a>
						<b class="arrow"></b>
					</li><?php endif; endforeach; endif; ?>
			</ul>
		</li><?php endforeach; endif; ?>

	</ul><!-- /.nav-list -->
	<!-- #section:basics/sidebar.layout.minimize -->
	<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
		<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
	</div>
	<script type="text/javascript">
		try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
	</script>
</div>


		<div class="main-content">

			<div class="main-content-inner">

				<div class="breadcrumbs" id="breadcrumbs">
	<script type="text/javascript">
		try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
	</script>

	<ul class="breadcrumb">
		<li>
			<i class="ace-icon fa fa-home home-icon"></i>
			<a href="<?php echo (SITE_URL); ?>Super/Index">
			首页
			</a>
		</li>
		<!-- <li class="active">Blank Page</li> -->
	</ul><!-- /.breadcrumb -->

	<!-- #section:basics/content.searchbox -->
	<!-- <div class="nav-search" id="nav-search">
		<form class="form-search">
			<span class="input-icon">
				<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
				<i class="ace-icon fa fa-search nav-search-icon"></i>
			</span>
		</form>
	</div> -->
	<!-- /.nav-search -->

	<!-- /section:basics/content.searchbox -->
</div>

				<!-- /section:basics/content.breadcrumbs -->
				<div class="page-content">
					<div class="row">
						<div class="col-xs-12">
							<!-- PAGE CONTENT BEGINS -->

								<div class="tabbable">

									
  <ul class="nav nav-tabs">
    <li>
        <a href="<?php echo (SITE_URL); ?>Super/User/index">
            用户管理
        </a>
    </li>
    <li class="hidden">
        <a href="<?php echo (SITE_URL); ?>Super/User/add">
            用户添加
        </a>
    </li>
    <li class="hidden">
        <a href="<?php echo (SITE_URL); ?>Super/User/edit">
            密码修改
        </a>
    </li>
    <li class="hidden">
        <a href="<?php echo (SITE_URL); ?>Super/User/powerEdit">
            角色修改
        </a>
    </li>
     <li class="hidden">
        <a href="<?php echo (SITE_URL); ?>Super/User/powerGuide">
            选择级别
        </a>
    </li>
</ul>



									<div class="tab-content">

									
<style type="text/css">
    p{
        margin-bottom:20px;
        margin-top:20px;
    }
</style>
<!-- <?php $sid=session("s_id"); $super=new \Model\SuperModel(); $data=$super->relation(true)->find($sid); $name=$data['role']['name']; $id=$_GET["id"]; $user=$super->find($id); ?> -->
<kbd>当前选择用户：<?php echo ($user["name"]); ?></kbd>
<?php if($_SESSION['s_name']=='admin' or $name=='国家项目办'): ?><p><a href="<?php echo (SITE_URL); ?>Super/User/province?id=<?php echo ($_GET[id]); ?>" class="btn btn-danger">省级管理员权限</a> &nbsp;&nbsp;<kbd>管理一个省内所有的市，区，机构</kbd></p><?php endif; ?>
<?php if($_SESSION['s_name']=='admin' or $name=='国家项目办' or $name=='省级管理员'): ?><p><a href="<?php echo (SITE_URL); ?>Super/User/city?id=<?php echo ($_GET[id]); ?>" class="btn btn-warning">地市级管理员权限</a> &nbsp;&nbsp;<kbd>管理一个市内所有的区，机构</kbd></p><?php endif; ?>
<?php if($_SESSION['s_name']=='admin' or $name=='国家项目办' or $name=='省级管理员' or $name=='地市级管理员' ): ?><p><a href="<?php echo (SITE_URL); ?>Super/User/dis?id=<?php echo ($_GET[id]); ?>" class="btn btn-primary">区县级管理员权限</a> &nbsp;&nbsp;<kbd>管理一个区内所有的机构</kbd></p><?php endif; ?>
<?php if($_SESSION['s_name']=='admin' or $name=='国家项目办' or $name=='省级管理员' or $name=='地市级管理员' or $name=='区县级管理员'): ?><p><a href="<?php echo (SITE_URL); ?>Super/User/ins?id=<?php echo ($_GET[id]); ?>" class="btn btn-default">机构管理员权限</a> &nbsp;&nbsp;<kbd>管理机构</kbd></p><?php endif; ?>


									</div>
								</div>


							<!-- PAGE CONTENT ENDS -->
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.page-content -->
			</div>
		</div><!-- /.main-content -->


		<div class="footer">
	<div class="footer-inner">
		<!-- #section:basics/footer -->
		<div class="footer-content">

			<span class="bigger-120">
				<span class="blue bolder"><?php echo (SITE_COPY); ?></span>
				&copy; <?php echo (SITE_TITLE); ?>
			</span>
		</div>

		<!-- /section:basics/footer -->
	</div>
</div>


		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
			<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
		</a>
	</div><!-- /.main-container -->

	<!-- basic scripts -->

	<!--[if !IE]> -->
	<script type="text/javascript">
		window.jQuery || document.write("<script src='<?php echo (SUPER_PUBLIC_URL); ?>/js/jquery.min.js'>"+"<"+"/script>");
	</script>

	<!-- <![endif]-->

	<!--[if IE]>
<script type="text/javascript">
window.jQuery || document.write("<script src='{{ asset('resources/admin/js/jquery1x.min.js') }}'>"+"<"+"/script>");
</script>
<![endif]-->
	<script type="text/javascript">
		if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo (SUPER_PUBLIC_URL); ?>/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
	</script>
	<script src="<?php echo (SUPER_PUBLIC_URL); ?>/js/bootstrap.min.js"></script>

	<!-- page specific plugin scripts -->

	<!--@yield('plugins')-->
	



	<!-- ace scripts -->
	<script src="<?php echo (SUPER_PUBLIC_URL); ?>/js/ace-elements.min.js"></script>
	<script src="<?php echo (SUPER_PUBLIC_URL); ?>/js/ace.min.js"></script>

	<!-- inline scripts related to this page -->
	<script src="<?php echo (SUPER_PUBLIC_URL); ?>/js/custom.js"></script>

	<script src="<?php echo (SUPER_PUBLIC_URL); ?>/js/jquery.cookie.js"></script>
	
	<!-- 好用的js日期选择器 -->
	<script src="<?php echo (SUPER_PUBLIC_URL); ?>/Datepicker/js/foundation-datepicker.js"></script>
	<script src="<?php echo (SUPER_PUBLIC_URL); ?>/Datepicker/js/locales/foundation-datepicker.zh-CN.js"></script>
	<!-- 好用的js日期选择器 -->
	<!--@yield('scripts')-->
	

</present>


	</body>
</html>