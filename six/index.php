<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用入口文件

// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',True);

define('SITE_TITLE', 'SIX博客');   	//标题
define('SITE_COPY', 'SIX博客');		//底部

define("SITE_URL","http://118.89.237.199/six");
define("SITE_PUBLIC_HOME",SITE_URL."/Public");			/*前台样式公用路径*/
define("SITE_PUBLIC_ADMIN",SITE_URL."/Public/Super");	/*后台样式公用路径*/

define('SITE_PUBLIC_UPLOADS',SITE_URL."/Uploads");

// 定义应用目录
// define('APP_PATH','./Home/');

// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';

// 亲^_^ 后面不需要任何代码了 就是如此简单