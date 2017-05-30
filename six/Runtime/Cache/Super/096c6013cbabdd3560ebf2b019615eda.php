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
				<a href="/Super/Index" class="navbar-brand">
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
					<a href="<?php echo (SITE_URL); ?>/Super/Link/index">
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
					<a href="<?php echo (SITE_URL); ?>/Super/Security/">
						<i class="menu-icon fa fa-caret-right"></i>
						个人信息修改
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
			<a href="<?php echo (SITE_URL); ?>Super/Index">
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
        <a href="/six/Super/Link/index">
            <i class="green ace-icon fa fa-home bigger-120"></i>
            日记列表
        </a>
    </li>

    <li class="hidden">
        <a href="/six/Super/Link/add">
            日记添加
        </a>
    </li>

    <li class="hidden">
        <a href="/six/Super/Link/edit">
            日记修改
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
<div id="toolbar" class="btn-group">
            <button id="btn_add" type="button" class="btn btn-default">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><a href="/six/Super/Link/add" style="color:#333">新增</a>
            </button>
            <button id="btn_delete" type="button" class="btn btn-default">
                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>批量删除
            </button>
  <!--           <select id="priv" style="height:34px;border-radius:0px;border-left:none;color:#333">
                <option value="维特机动车驾校"> </option>
                <option value="红星美凯龙"> </option>
                <option value="春秋旅行社"> </option>
                <option value="运总医院"> </option>
            </select>   -->
            <select id="zl_export" style="height:34px;border-radius:0px;border-left:none;color:#333">
                <option value="all">导出全部</option>
                <option value="basic">导出本页</option>
                <option value="selected">导出选中</option>
            </select>
        </div>

<table id="tb_departments">

</table>
<!-- <div id="zl_cont"> </div> -->
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

    $("#priv").change(function () {
        $('#tb_departments').bootstrapTable('refreshOptions', {
            exportDataType: $(this).val()
        });
    });

});

var TableInit = function () {
    var oTableInit = new Object();
    //初始化Table
    oTableInit.Init = function () {
        $('#tb_departments').bootstrapTable({
            url: "/six/Super/Link/oneDiaryDate",         //请求后台的URL（*）
            method: 'get',                      //请求方式（*）
            toolbar: '#toolbar',                //工具按钮用哪个容器
            striped: true,                      //是否显示行间隔色
            cache: false,                       //是否使用缓存，默认为true，所以一般情况下需要设置一下这个属性（*）
            pagination: false,                   //是否显示分页（*）
            sortable: true,                     //是否启用排序
            sortOrder: "asc",                   //排序方式
            queryParams: oTableInit.queryParams,//传递参数（*）
            sidePagination: "client",           //分页方式：client客户端分页，Factory服务端分页（*）
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
            // detailView: false,                   //是否显示父子表
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
            {
                checkbox: true
            },{
                field: 'show_order',
                title: '显示顺序',
            },{
                field: 'state',
                title: '显示状态',
            },{
                field: 'checkon',
                title: '是否可以点击',
            },{
                field: 'title',
                title: '日记标题',
            },{
                field: 'writer',
                title: '作者',
            },{
                field: 'created_at',
                title: '添加时间',
            },{
                field: 'add_user',
                title: '添加人',
            },{
                field:'id',
                formatter:function(value,row,index){
                var a='<a href="/six/Super/Link/edit/id/'+value+'">修改</a>&nbsp;|&nbsp;<a href="/six/Super/Link/top/id/'+value+'">置顶</a>&nbsp;|&nbsp;<a href="/six/Super/Link/index/action/del/id/'+value+'" onclick=" return del()">删除</a>';
                    return a;
                },
                title: '操作',
            },
            ]
        });
    };

    // function show(index, row, $detail){
    //     return '<tr>123</tr>';
    // }

    /*批量删除操作*/
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
        $.post("<?php echo (SITE_URL); ?>/Super/Diary/allDel", {id: ids}, function(data) {
            if(data==1){
                $table.bootstrapTable('remove', {field: 'id', values: ids});
            }
            if(data==0){
                alert("请勾选要删除的信息！");
            }
            if(data==2){
                alert("批量删除菜单列表失败！");
            }
        });

    });

    //得到查询的参数
    oTableInit.queryParams = function (params) {
        var temp = {   //这里的键的名字和控制器的变量名必须一直，这边改动，控制器也需要改成一样的
            shop_id: $("#shop_id").val()
            // limit: params.limit,   //页面大小
            // offset: params.offset,  //页码
            // departmentname: $("#txt_search_departmentname").val(),
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

</script>


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
	function del() {
		var msg = "您真的确定要删除吗？\n\n请确认！";
		if (confirm(msg)==true){
			return true;
		}else{
			return false;
		}
	}

	// jQuery(document).ready(function() {
	// 	var active_class = 'active';
	// 	$('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
	// 		var th_checked = this.checked;//checkbox inside "TH" table header
	// 		$(this).closest('table').find('tbody > tr').each(function(){
	// 			var row = this;
	// 			if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
	// 			else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
	// 		});
	// 	});
		
	// 	//select/deselect a row when the checkbox is checked/unchecked
	// 	$('#simple-table').on('click', 'td input[type=checkbox]' , function(){
	// 		var $row = $(this).closest('tr');
	// 		if(this.checked) $row.addClass(active_class);
	// 		else $row.removeClass(active_class);
	// 	});

	// 	/**
	// 	 * 删除按钮警告提示
	// 	 */
		
	// 	$('.delete-btn').click(function(e) {
	// 		if (confirm('您确定要执行此操作吗？请慎重！') == false) {
	// 			return false;
	// 		}
	// 	});
		
	// 	$('.delete-checked').click(function(e) {
	// 		var checkbox = $('#simple-table > tbody > tr > td input[type=checkbox]:checked');
	// 		if (!checkbox.length) {
	// 			alert('您还没有选中任何数据！');
	// 			return false;
	// 		}
	// 		if (confirm('您确定要执行此操作吗？请慎重！') == false) {
	// 			return false;
	// 		}
	// 		var ids = new Array();
	// 		checkbox.each(function () {
	// 			ids.push([$(this).val()]);
	// 		});
	// 		var href = "/six/Super/Link/Index/id" + '/' + ids;
	// 		location.href = href;
	// 	});

	// }); 

</script>
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