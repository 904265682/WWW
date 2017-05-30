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
		<link rel="stylesheet" href="<?php echo (SITE_PUBLIC_ADMIN); ?>/Datepicker/css/font-awesome.4.6.0.css">
		<link href="<?php echo (SITE_PUBLIC_ADMIN); ?>/Datepicker/css/foundation-datepicker.css" rel="stylesheet" type="text/css">
		<!-- 好用的js日期选择器 -->
		<link rel="stylesheet" href="<?php echo (SITE_PUBLIC_ADMIN); ?>/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo (SITE_PUBLIC_ADMIN); ?>/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->


		<!-- text fonts -->
		<link rel="stylesheet" href="<?php echo (SITE_PUBLIC_ADMIN); ?>/css/ace-fonts.min.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="<?php echo (SITE_PUBLIC_ADMIN); ?>/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="<?php echo (SITE_PUBLIC_ADMIN); ?>/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="<?php echo (SITE_PUBLIC_ADMIN); ?>/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->
		<link rel="stylesheet" href="<?php echo (SITE_PUBLIC_ADMIN); ?>/css/custom.css" />
		
        
		<!-- ace settings handler -->
		
		<script src="<?php echo (SITE_PUBLIC_ADMIN); ?>/echarts/echarts.min.js"></script>
				
		<!-- Datepicker/ -->

		<script type="text/javascript" charset="utf-8" src="<?php echo (SITE_URL); ?>/Public/ueditor/ueditor.config.js"></script>
	    <script type="text/javascript" charset="utf-8" src="<?php echo (SITE_URL); ?>/Public/ueditor/ueditor.all.min.js"> </script>
	    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
	    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
	    <script type="text/javascript" charset="utf-8" src="<?php echo (SITE_URL); ?>/Public/ueditor/lang/zh-cn/zh-cn.js"></script>

		<!-- 日历js -->
		<script type="text/javascript" src="<?php echo (SITE_PUBLIC_ADMIN); ?>/time/js/laydate.js"></script>
		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="<?php echo (SITE_PUBLIC_ADMIN); ?>/js/html5shiv.min.js"></script>
		<script src="<?php echo (SITE_PUBLIC_ADMIN); ?>/js/respond.min.js"></script>
		<![endif]-->
		<!-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.min.css"> -->
		<link rel="stylesheet" href="<?php echo (SITE_PUBLIC_ADMIN); ?>/table/btl.css" />
		<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
		<script src="<?php echo (SITE_PUBLIC_ADMIN); ?>/table/jq.js"></script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="<?php echo (SITE_PUBLIC_ADMIN); ?>/table/tbl.js"></script>
		<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.min.js"></script> -->
		<!-- Latest compiled and minified Locales -->
		<script src="<?php echo (SITE_PUBLIC_ADMIN); ?>/table/tbl_cn.js"></script>
		<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/locale/bootstrap-table-zh-CN.min.js"></script> -->
		<script src="<?php echo (SITE_PUBLIC_ADMIN); ?>/table/export.js"></script>
		<!-- <script type="text/javascript" src="http://issues.wenzhixin.net.cn/bootstrap-table/assets/bootstrap-table/src/extensions/export/bootstrap-table-export.js"></script> -->
		<script src="<?php echo (SITE_PUBLIC_ADMIN); ?>/table/tb_export.js"></script>
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
				<a href="<?php echo (SITE_URL); ?>/Super/Index" class="navbar-brand">
					<small>
						<!-- <img src="<?php echo (SITE_PUBLIC_ADMIN); ?>/logo2.png" width="24" height="24"> -->
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
							<img class="nav-user-photo" src="<?php echo (SITE_PUBLIC_UPLOADS); ?>/Super/HeadPic/profile-pic.jpg" alt="Jason's Photo" />
							<span class="user-info">
								<small>您好，</small>
								<?php echo (session('s_name')); ?>
							</span>

							<i class="ace-icon fa fa-caret-down"></i>
						</a>

						<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
							<li>
								<a href="<?php echo (SITE_URL); ?>/Super/Login/uppw">
									<i class="ace-icon fa fa-cog"></i>
									安全设置
								</a>
							</li>

							<li class="divider"></li>

							<li>
								<a href="<?php echo (SITE_URL); ?>/Super/Login/Logout">
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
		<li class="">
			<a href="<?php echo (SITE_URL); ?>/Super/Index">
				<i class="menu-icon fa fa-tachometer"></i>
				<span class="menu-text"> 欢迎【<?php echo (session('s_name')); ?>】 </span>
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
		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-pencil-square-o"></i>
				<span class="menu-text"> 菜单管理</span>
				<b class="arrow fa fa-angle-down"></b>
			</a>
			<b class="arrow"></b>
			<ul class="submenu">
				<li class="">
					<a href="<?php echo (SITE_URL); ?>/Super/Menu">
						<i class="menu-icon fa fa-caret-right"></i>
						菜单管理
					</a>
					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="#" class="dropdown-toggle">
						<i class="menu-icon fa fa-caret-right"></i>
						内容管理
						<b class="arrow fa fa-angle-down"></b>
					</a>
					<b class="arrow"></b>

					<ul class="submenu">
				<?php if(is_array($oneMenu)): foreach($oneMenu as $key=>$vo): if($vo["type"] != 5): ?><li class="">
						<?php if(($vo["type"] == 3) OR ($vo["type"] == 4) ): ?><a href="<?php echo (SITE_URL); ?>/Super/MenuCont/link/mid/<?php echo ($vo["id"]); ?>">
								<i class="menu-icon fa fa-caret-right"></i>
								<?php echo ($vo["menu_name"]); ?>
							</a>
						<?php elseif($vv["type"] == 0): ?>
							<a href="<?php echo (SITE_URL); ?>/Super/MenuCont/pictext/mid/<?php echo ($vo["id"]); ?>">
								<i class="menu-icon fa fa-caret-right"></i>
								<?php echo ($vo["menu_name"]); ?>
							</a>
						<?php else: ?>
							<a href="<?php echo (SITE_URL); ?>/Super/MenuCont/">
								<i class="menu-icon fa fa-caret-right"></i>
								<?php echo ($vo["menu_name"]); ?>
							</a><?php endif; ?>
							<b class="arrow"></b>
						</li>
					<?php else: ?>
						<li class="">
							<a href="#" class="dropdown-toggle">
								<i class="menu-icon fa fa-caret-right"></i>
								<?php echo ($vo["menu_name"]); ?>
								<b class="arrow fa fa-angle-down"></b>
							</a>
							<b class="arrow"></b>

							<ul class="submenu">
								<?php if(is_array($twoMenu)): $i = 0; $__LIST__ = $twoMenu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i; if(($vo["id"]) == $vv["up_id"]): ?><li class="">
										<?php if(($vv["type"] == 3) OR ($vv["type"] == 4) ): ?><a href="<?php echo (SITE_URL); ?>/Super/MenuCont/link/mid/<?php echo ($vv["id"]); ?>">
												<i class="menu-icon fa fa-leaf green"></i>
												<?php echo ($vv["menu_name"]); ?>
											</a>
										<?php elseif($vv["type"] == 0): ?>
											<a href="<?php echo (SITE_URL); ?>/Super/MenuCont/pictext/mid/<?php echo ($vv["id"]); ?>">
												<i class="menu-icon fa fa-leaf green"></i>
												<?php echo ($vv["menu_name"]); ?>
											</a>
										<?php else: ?>
											<a href="<?php echo (SITE_URL); ?>/Super/MenuCont/index/mid/<?php echo ($vv["id"]); ?>">
												<i class="menu-icon fa fa-leaf green"></i>
												<?php echo ($vv["menu_name"]); ?>
											</a><?php endif; ?>
											<b class="arrow"></b>
										</li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
							</ul>

						</li><?php endif; endforeach; endif; ?>
					</ul>
				</li>
			</ul>
		</li>

		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-pencil-square-o"></i>
				<span class="menu-text">日记管理 </span>
				<b class="arrow fa fa-angle-down"></b>
			</a>
			<b class="arrow"></b>
			<ul class="submenu">
				<li class="">
					<a href="<?php echo (SITE_URL); ?>/Super/Diary">
						<i class="menu-icon fa fa-caret-right"></i>
						日记列表
					</a>
					<b class="arrow"></b>
				</li>
			</ul>
		</li>

		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-pencil-square-o"></i>
				<span class="menu-text">文件下载管理 </span>
				<b class="arrow fa fa-angle-down"></b>
			</a>
			<b class="arrow"></b>
			<ul class="submenu">
				<li class="">
					<a href="<?php echo (SITE_URL); ?>/Super/Down/index">
						<i class="menu-icon fa fa-caret-right"></i>
						文件下载列表
					</a>
					<b class="arrow"></b>
				</li>
			</ul>
		</li>

		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-pencil-square-o"></i>
				<span class="menu-text">留言管理 </span>
				<b class="arrow fa fa-angle-down"></b>
			</a>
			<b class="arrow"></b>
			<ul class="submenu">
				<li class="">
					<a href="<?php echo (SITE_URL); ?>/Super/Mess/index">
						<i class="menu-icon fa fa-caret-right"></i>
						留言列表
					</a>
					<b class="arrow"></b>
				</li>
			</ul>
		</li>

		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-pencil-square-o"></i>
				<span class="menu-text">友情链接管理 </span>
				<b class="arrow fa fa-angle-down"></b>
			</a>
			<b class="arrow"></b>
			<ul class="submenu">
				<li class="">
					<a href="<?php echo (SITE_URL); ?>/Super/Links/index">
						<i class="menu-icon fa fa-caret-right"></i>
						友情链接列表
					</a>
					<b class="arrow"></b>
				</li>
			</ul>
		</li>


		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-pencil-square-o"></i>
				<span class="menu-text">安全与信息 </span>
				<b class="arrow fa fa-angle-down"></b>
			</a>
			<b class="arrow"></b>
			<ul class="submenu">
				<li class="">
					<a href="<?php echo (SITE_URL); ?>/Super/Security/Information">
						<i class="menu-icon fa fa-caret-right"></i>
						站长信息
					</a>
					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="<?php echo (SITE_URL); ?>/Super/Security/Show">
						<i class="menu-icon fa fa-caret-right"></i>
						前台信息
					</a>
					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="<?php echo (SITE_URL); ?>/Super/Security/PwRevise">
						<i class="menu-icon fa fa-caret-right"></i>
						密码修改
					</a>
					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="<?php echo (SITE_URL); ?>/Super/Security/SuperLog">
						<i class="menu-icon fa fa-caret-right"></i>
						日志管理
					</a>
					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="<?php echo (SITE_URL); ?>/Super/Login/Logout">
						<i class="menu-icon fa fa-caret-right"></i>
						安全退出
					</a>
					<b class="arrow"></b>
				</li>
			</ul>
		</li>

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
			<a href="<?php echo (SITE_URL); ?>/Super/Index">
			首页
			</a>
		</li>
		<!-- <li class="active">Blank Page</li> -->
	</ul><!-- /.breadcrumb -->
</div>

				<!-- /section:basics/content.breadcrumbs -->
				<div class="page-content">
					<div class="row">
						<div class="col-xs-12">
							<!-- PAGE CONTENT BEGINS -->

								<div class="tabbable">

									
    <ul class="nav nav-tabs">

	<li>
		<a href="<?php echo (SITE_URL); ?>/Super/Security/SuperLog">
			日志查看
		</a>
	</li>

	<li class="hidden">
		<a href="<?php echo (SITE_URL); ?>/Super/Security/Detail">
			详情查看
		</a>
	</li>

	<li>
		<a href="<?php echo (SITE_URL); ?>/Super/Security/PwRevise">
			密码修改
		</a>
	</li>
	<li class="hidden">
		<a href="<?php echo (SITE_URL); ?>/Super/Security/Information">
			站长信息修改
		</a>
	</li>
	<li class="hidden">
		<a href="<?php echo (SITE_URL); ?>/Super/Security/Show">
			前台信息修改
		</a>
	</li>
</ul>


									<div class="tab-content">

									

    <?php if(isset($error)): ?><div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">
                <i class="ace-icon fa fa-times"></i>
            </button>

            <strong>
                <i class="ace-icon fa fa-times"></i>
            </strong>
            <?php echo ($error); ?>
            页面自动 <a id="href" href="<?php echo($jumpUrl); ?>">跳转</a> 等待时间： <b id="wait"><?php echo($waitSecond); ?></b>
            <br>
        </div><?php endif; ?>

    <?php if(isset($message)): ?><div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">
                <i class="ace-icon fa fa-times"></i>
            </button>

            <strong>
                <i class="ace-icon fa fa-check"></i>
            </strong>
            <?php echo ($message); ?>
            页面自动 <a id="href" href="<?php echo($jumpUrl); ?>">跳转</a> 等待时间： <b id="wait"><?php echo($waitSecond); ?></b>
            <br>
        </div><?php endif; ?>
            <!-- PAGE CONTENT BEGINS -->

<!--             <?php if($grade != 4 or session('s_name') == 'admin'): ?><input class="server_search" placeholder=" 操作人" id="name" name="name" type="text" style="height:34px;border-radius:0px;color:#333;margin-left: -3px;padding:0"><?php endif; ?>
            <input class="server_search" id="start_time" class="laydate-icon" onClick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" value="" name="start_time" placeholder=" 起始时间" style="height:34px;border-radius:0px;color:#333;margin-left: -3px;padding:0">
            <input class="server_search" id="over_time" value="" class="laydate-icon" onClick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" name="over_time" placeholder=" 结束时间" style="height:34px;border-radius:0px;color:#333;margin-left: -3px;border-left:none;padding:0">
            <input id="sc" type="button" style="font-size:15px;margin-left: 10px; height:30px;width:100px;border-radius:0px;color:#333;padding:0" value="搜索">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->

            <!-- <a href="" style="display:inline-block;width:100px;height:40px;border:1px solid #CCC;background:#FFF;"></a> -->
            <!-- <a href="http://192.168.160.12"><input id="gz" type="button" style="font-size:15px;margin-left: 10px; height:30px;width:100px;border-radius:0px;color:#333;padding:0" value="日志跟踪"></a> -->
        <div id="toolbar" class="btn-group">
            <select id="zl_export" style="height:34px;border-radius:0px;color:#333">
                <option value="all">导出全部</option>
                <option value="basic">导出本页</option>
                <!-- <option value="selected">导出选中</option> -->
            </select>

             <!-- <input type="text" id="name" name="name" placeholder="请输入乡镇名称" style="height:34px;border-radius:0px;color:#333;margin-left: -3px;border-left:none;padding:0"> -->

            <!-- <form method="GET" action="" accept-charset="UTF-8" class="form-inline form-search" role="form">
                <div class="form-group col-sm-4">
                    用户：<input class="form-control " placeholder="用户" name="kw" type="text" value="<?php echo ($kw); ?>">
                </div>
                <div class="form-group col-sm-14">
                    <input  style="width:160px;height:33px;" class="laydate-icon" onClick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" value="" name="start_time" placeholder="起始时间">
                    <input  style="width:160px;height:33px;" value="" class="laydate-icon" onClick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" name="over_time" placeholder="结束时间">
                </div>
                <div class="col-sm-2">
                    <button type="submit" class="btn btn-info btn-xs" id="condition">
                        <i class="ace-icon fa fa-search-plus bigger-110"></i> 搜索
                    </button>
                </div>
            </form> -->
        </div>

<table id="tb_departments">

</table>
<div id="zl_cont"> </div>
<!-- 模态框（Modal） -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width:60%;height:80%;overflow:scroll;overflow-x:auto;overflow-y:auto;">
        <div class="modal-content" style="border:none">
            <div class="modal-header" style="border:none;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body" >
                <table class="table">
                    <tr>
                        <td width="17%">操作人：</td>
                        <td id="c_name"></td>
                    </tr>
                    <tr>
                        <td width="17%">操作时间：</td>
                        <td id="c_created_at"></td>
                    </tr>
                    <tr>
                        <td width="17%">操作ip：</td>
                        <td id="c_ip"></td>
                    </tr>
                    <tr>
                        <td width="17%">动作：</td>
                        <td id="c_action"></td>
                    </tr>
                    <tr>
                        <td width="17%">SQL语句：</td>
                        <td id="c_sql_cont"></td>
                    </tr>
                    <tr>
                        <td width="17%">操作级别：</td>
                        <td id="c_db_level"></td>
                    </tr>
                    <tr>
                        <td width="17%">备注：</td>
                        <td id="c_bz"></td>
                    </tr>
                    <tr>
                        <td width="17%">最后更新时间：</td>
                        <td id="c_updated_at"></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
<!-- end -->

<script type="text/javascript">
    $(function () {
    //1.初始化Table
    var oTable = new TableInit();
    oTable.Init();

    //2.初始化Button的点击事件
    var oButtonInit = new ButtonInit();
    oButtonInit.Init();

    //3.初始化select的change事件
    $("#zl_export").change(function () {
        $('#tb_departments').bootstrapTable('refreshOptions', {
            exportDataType: $(this).val()
        });
    });
     //   $(".server_search").blur(function () {
        //     $('#tb_departments').bootstrapTable('refresh');
        // });
    $('#sc').click(function() {
        $('#tb_departments').bootstrapTable('refresh');
    });

 

});

var TableInit = function () {
    var oTableInit = new Object();
    //初始化Table
    oTableInit.Init = function () {
        $('#tb_departments').bootstrapTable({
            url: "<?php echo (SITE_URL); ?>/Super/Security/SuperLogDate",         //请求后台的URL（*）
            method: 'get',                      //请求方式（*）
            toolbar: '#toolbar',                //工具按钮用哪个容器
            striped: true,                      //是否显示行间隔色
            cache: false,                       //是否使用缓存，默认为true，所以一般情况下需要设置一下这个属性（*）
            pagination: true,                   //是否显示分页（*）
            sortable: true,                     //是否启用排序
            sortOrder: "asc",                   //排序方式
            queryParams: oTableInit.queryParams,//传递参数（*）
            sidePagination: "client",           //分页方式：client客户端分页，server服务端分页（*）
            pageNumber:1,                       //初始化加载第一页，默认第一页
            pageSize: 10,                       //每页的记录行数（*）
            pageList: [10, 25, 50, 100],        //可供选择的每页的行数（*）
            search: true,                       //是否显示表格搜索
            // strictSearch: false, //是否启用全匹配搜索
            showColumns: true,                  //是否显示所有的列
            showRefresh: true,              //是否显示刷新按钮
            // showPaginationSwitch: true,
            minimumCountColumns: 2,             //最少允许的列数
            // clickToSelect: true,                //是否启用点击选中行
            // height: 500,                        //行高，如果没有设置height属性，表格自动根据记录条数觉得表格高度
            uniqueId: "id",                     //每一行的唯一标识，一般为主键列
            showToggle:true,                    //是否显示详细视图和列表视图的切换按钮
            cardView: false,                    //是否显示详细视图
            // detailView: true,                   //是否显示父子表
            showExport:true,
            exportDataType: "basic",
            //注册加载子表的事件。注意下这里的三个参数！
            // onExpandRow: function (index, row, $detail) {
            //     show(index, row, $detail);
            // },
            onDblClickCell:function(field,value,row,$element){
                show(field,value,row,$element);
            },
            columns: [
            // {
            //     field: 'id',
            //     title: '序号',
            //     sortable:true
            // },
            {
                field: 'name',
                title: '操作人',
                sortable:true
            }, {
                field: 'created_at',
                title: '操作时间',
            }, {
                field: 'ip',
                title: '操作ip'
            }, {
                field: 'action',
                title: '动作',
                sortable:true
            }, {
                field: 'db_level',
                title: '操作级别',
                sortable:true
            }, {
                field:'id',
                formatter:function(value,row,index){
                    if(typeof(row.server) == 'undefined') {
                        var a='<a href="<?php echo (SITE_URL); ?>/Super/Security/Detail/id/'+value+'">详情</a>';
                    }
                    //  else {
                    //     var a='<a href="<?php echo (SITE_URL); ?>/Super/LogCheck/detail/id/'+value+'">详情</a> &nbsp;<a href="http://'+row.server+'?msg='+row.name+',Sg/LogCheck/index,'+row.p_id+'"  target="_blank">跟踪</a>';//
                    // }
                    return a;
                },
                title: '操作',
            }, 
            ]
        });
    };

    // 详细信息展示
    function show(field,value,row,$element){
        $('#myModal').modal({
            keyboard: true
        });
        $("#myModalLabel").html(row.name+'--详情查看')
        $("#c_name").html(row.name);
        $("#c_ip").html(row.ip);
        $("#c_created_at").html(row.created_at);
        $("#c_updated_at").html(row.updated_at);
        $("#c_action").html(row.action);
        $("#c_db_level").html(row.db_level);
        $("#c_sql_cont").html(row.sql_cont);

        var bz = '无';
        if(row.bz != '') {  
            bz = row.bz;
        }
        $('#c_bz').html(bz);
        
     };

    // 批量删除
    $("#btn_delete").click(function(event) {
        // var check=$('#tb_departments').bootstrapTable('getSelections');
        // var check=JSON.stringify(check);
        // var check=$.parseJSON(check);
        // var id_array=new Array();
        // $.each(check,function(index, el) {
        //     id_array.push(el.id);
        // });
        $table=$('#tb_departments');
            var ids = $.map($table.bootstrapTable('getSelections'), function (row) {
                return row.id;
        });
        $.post("<?php echo (SITE_URL); ?>/Super/Area/p_alldel", {id: ids}, function(data) {
            if(data==1){
                $table.bootstrapTable('remove', {field: 'id', values: ids});
            }
            if(data==0){
                alert("请先删除下级地级市！");
            }
        });

    });

    //得到查询的参数
    oTableInit.queryParams = function (params) {
        var temp = {   //这里的键的名字和控制器的变量名必须一直，这边改动，控制器也需要改成一样的
            limit: params.limit,   //页面大小
            offset: params.offset,  //页码
            name:$("#name").val(),
            start_time:$("#start_time").val(),
            over_time:$("#over_time").val()
        };
        return temp;
    };
    return oTableInit;
};


var ButtonInit = function () {
    var oInit = new Object();
    var postdata = {};

    oInit.Init = function () {
        //初始化页面上面的按钮事件

    };

    return oInit;
};

$(document).ready(function(){
    $('#condition').on('click',function() {
        $.get(
            "<?php echo (SITE_URL); ?>/Super/LogCheck/log_data", 
            {id: ids}, 
            function(data) {
            if(data==1){
                $table.bootstrapTable('remove', {field: 'id', values: ids});
            }
            if(data==0){
                alert("请先删除下级地级市！");
            }
        });
    });




});


</script>
            
<pre>
根据用户名、角色、时间段进行模糊组合查询，分页列表显示总服务器相关的日志信息。提供详情查看和日志跟踪功能。
点击“查看”弹出“详情查看”选项卡，显示该日志的详细信息，如具体的SQL语句等。
双击日志栏信息，可以弹出对应操作的相信信息。
另外，还提供对检索结果的快速、显示切换、列选择以及丰富的数据导出功能。


</pre>



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
		window.jQuery || document.write("<script src='<?php echo (SITE_PUBLIC_ADMIN); ?>/js/jquery.min.js'>"+"<"+"/script>");
	</script>

	<!-- <![endif]-->

	<!--[if IE]>
<script type="text/javascript">
window.jQuery || document.write("<script src='{{ asset('resources/admin/js/jquery1x.min.js') }}'>"+"<"+"/script>");
</script>
<![endif]-->
	<script type="text/javascript">
		if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo (SITE_PUBLIC_ADMIN); ?>/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
	</script>
	<script src="<?php echo (SITE_PUBLIC_ADMIN); ?>/js/bootstrap.min.js"></script>

	<!-- page specific plugin scripts -->

	<!--@yield('plugins')-->
	

    


	<!-- ace scripts -->
	<script src="<?php echo (SITE_PUBLIC_ADMIN); ?>/js/ace-elements.min.js"></script>
	<script src="<?php echo (SITE_PUBLIC_ADMIN); ?>/js/ace.min.js"></script>

	<!-- inline scripts related to this page -->
	<script src="<?php echo (SITE_PUBLIC_ADMIN); ?>/js/custom.js"></script>

	<script src="<?php echo (SITE_PUBLIC_ADMIN); ?>/js/jquery.cookie.js"></script>
	
	<!-- 好用的js日期选择器 -->
	<script src="<?php echo (SITE_PUBLIC_ADMIN); ?>/Datepicker/js/foundation-datepicker.js"></script>
	<script src="<?php echo (SITE_PUBLIC_ADMIN); ?>/Datepicker/js/locales/foundation-datepicker.zh-CN.js"></script>
	<!-- 好用的js日期选择器 -->
	<!--@yield('scripts')-->
	

<script type="text/javascript">
    jQuery(document).ready(function() {

        /*var active_class = 'active';
        $('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
            var th_checked = this.checked;//checkbox inside "TH" table header
            
            $(this).closest('table').find('tbody > tr').each(function(){
                var row = this;
                if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
                else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
            });
        });
        
        //select/deselect a row when the checkbox is checked/unchecked
        $('#simple-table').on('click', 'td input[type=checkbox]' , function(){
            var $row = $(this).closest('tr');
            if(this.checked) $row.addClass(active_class);
            else $row.removeClass(active_class);
        });

        *//**
         * 删除按钮警告提示
         *//*
        
        $('.delete-btn').click(function(e) {
            if (confirm('您确定要执行此操作吗？请慎重！') == false) {
                return false;
            }
        });
        
        $('.delete-checked').click(function(e) {
            var checkbox = $('#simple-table > tbody > tr > td input[type=checkbox]:checked');
            if (!checkbox.length) {
                alert('您还没有选中任何数据！');
                return false;
            }
            if (confirm('您确定要执行此操作吗？请慎重！') == false) {
                return false;
            }
            var ids = new Array();
            checkbox.each(function () {
                ids.push([$(this).val()]);
            });
            var href = "<?php echo (SITE_URL); ?>/Super/Dep/Index/id" + '/' + ids;
            location.href = href;
        });
*/

    });
</script>
<!-- 日历js -->
    <script type="text/javascript" src="<?php echo (SUPER_PUBLIC_URL); ?>/js/laydate.js"></script>
    <!-- 日历over -->

<?php if(isset($message)): ?><script type="text/javascript">
(function(){
var wait = document.getElementById('wait'),href = document.getElementById('href').href;
var interval = setInterval(function(){
    var time = --wait.innerHTML;
    if(time <= 0) {
        location.href = href;
        clearInterval(interval);
    };
}, 1000);
})();
</script><?php endif; ?>


	</body>
</html>