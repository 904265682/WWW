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
    <?php if((ACTION_NAME == pictext) OR (ACTION_NAME == link)): ?><li class="hidden">
            <a href="/six/Super/MenuCont/pictext/mid/<?php echo ($mid); ?>">
                【<?php echo ($name); ?>】内容修改
            </a>
        </li>
    <?php elseif((ACTION_NAME != pictext) OR (ACTION_NAME != link)): ?>
        <li>
            <a href="/six/Super/MenuCont/index/mid/<?php echo ($mid); ?>">
                <i class="green ace-icon fa fa-home bigger-120"></i>
                菜单内容列表
            </a>
        </li>
    </else>
        <li class="hidden">
            <a href="/six/Super/MenuCont/pictext/mid/<?php echo ($mid); ?>">
                未知错误
            </a>
        </li><?php endif; ?>

    <?php if((ACTION_NAME != pictext) OR (ACTION_NAME != link)): ?><li class="hidden">
            <a href="/six/Super/MenuCont/add/mid/<?php echo ($mid); ?>">
                菜单内容添加
            </a>
        </li>
        <li class="hidden">
            <a href="/six/Super/MenuCont/edit/mid/<?php echo ($mid); ?>">
                菜单内容修改
            </a>
        </li><?php endif; ?>


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

<div class="row">
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->
        <form action="/six/Super/MenuCont/edit/mid/5/id/20" class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
            <!-- #section:elements.form -->
            <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" for="form-field-1">显示顺序：</label>
                <div class="col-sm-2">
                   <input type="text" name="show_order" value="<?php echo ($data["show_order"]); ?>" class="col-xs-10 col-sm-6" placeholder="显示顺序">
                </div>
                <label class="col-sm-2 control-label no-padding-right" for="form-field-1">访问次数：</label>
                <div class="col-sm-2">
                   <input type="text" name="click_num" value="<?php echo ($data["click_num"]); ?>" class="col-xs-10 col-sm-6" placeholder="访问次数">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right"  for="form-field-1">标题：</label>
                <div class="col-sm-3">
                   <input type="text" name="title" value="<?php echo ($data["title"]); ?>" class="col-xs-10 col-sm-12" placeholder="请输入标题">
                </div>
                <label class="col-sm-1 control-label no-padding-right"  for="form-field-1">作者：</label>
                <div class="col-sm-3">
                   <input type="text" name="writer" value="<?php echo ($data["writer"]); ?>" class="col-xs-10 col-sm-8" placeholder="请输入作者">
                </div>
            </div>
           
            <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" for="form-field-1">选择图片：</label>

                <div class="col-sm-2">
                    <input type="file" placeholder="" name="pic" class="col-xs-10 col-sm-9"  />
                    <br>
                    <br>
                    <?php if(!empty($data["pic"])): ?><img width="150px" src="<?php echo (SITE_URL); ?>/<?php echo ($data["pic"]); ?>"><?php endif; ?>
                </div>

                <label class="col-sm-2 control-label no-padding-right" for="form-field-1">标签：</label>
                <div class="col-sm-3">
                   <input type="text" name="label" value="<?php echo ($data["label"]); ?>" class="col-xs-10 col-sm-12" placeholder="标签">
                </div>
            </div>
            <div class="form-group">
            <label class="col-sm-2 control-label no-padding-right" for="form-field-1">显示状态：</label>
                <div class="col-sm-2">
                    <div class="radio">
                        <label>
                            <input class="ace" checked name="state" type="radio" value="1">
                            <span class="lbl"> 显示</span>
                        </label>
                        <label>
                            <input class="ace" name="state" type="radio" value="0">
                            <span class="lbl"> 隐藏</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" for="form-field-1">摘要：</label>
                <div class="col-sm-10">
                    <textarea name="abstract" cols="110" rows="5"><?php echo ($data["abstract"]); ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" for="form-field-1" >内容：</label><div class="col-sm-10"><script id="editor" type="text/plain" name="cont" style="width:800px;height:500px;"><?php echo ($data["cont"]); ?></script></div>
            </div>
            <script>
                var ue = UE.getEditor('editor');
            </script>
            <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" for="form-field-1">注册时间：</label>
                <div class="col-sm-2" style="margin-top:10px">
                   系统自动添加
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" for="form-field-1">添加人：</label>
                <div class="col-sm-2" style="margin-top:10px">
                  <?php echo (session('s_name')); ?>
                </div>
            </div>
            <div class="clearfix form-actions">
                <div class="col-md-offset-3 col-md-9">
                    <button class="btn btn-info" type="submit">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        提交
                    </button>
                    &nbsp; &nbsp; &nbsp;
                    <button class="btn" type="reset">
                        <i class="ace-icon fa fa-undo bigger-110"></i>
                        重置
                    </button>
                </div>
            </div>
            
        </form> 
    </div><!-- /.col -->
</div><!-- /.row -->


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
var nowTemp = new Date();

    $('#apply_start').fdatepicker({
        format: 'yyyy-mm-dd hh:ii',
        pickTime: true
    });
    $('#apply_over').fdatepicker({
        format: 'yyyy-mm-dd hh:ii',
        pickTime: true
    });
    $('#start').fdatepicker({
        format: 'yyyy-mm-dd hh:ii',
        pickTime: true
    });
    $('#over').fdatepicker({
        format: 'yyyy-mm-dd hh:ii',
        pickTime: true
    });

    window.onload=function(){
    var one=document.getElementById('one');
    var twor=document.getElementById('two');
    var two=twor.getElementsByTagName('option');
    var a=one.getElementsByTagName('option');
    document.getElementById("one").onchange=function(){
        var v = one.value;
        if (v==a[0].value) {
            two[2].style.display="block";
        }else{
            two[2].style.display="none";
        }
    }

    twor.onchange=function(){
        var vv = twor.value;
        if (vv==two[3].value) {
            for (var i = 1; i < a.length; i++) {
            a[i].style.display="none";
            }
        }else{
            for (var i = 1; i < a.length; i++) {
            a[i].style.display="block";
            }
        }
    }
}

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

</script>
<script type="text/javascript">
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
</script>


	</body>
</html>