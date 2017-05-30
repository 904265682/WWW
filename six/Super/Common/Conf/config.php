<?php
return array(
	//'配置项'=>'配置值'
	'TMPL_ACTION_ERROR'     =>  'Jump/error', // 默认错误跳转对应的模板文件
    'TMPL_ACTION_SUCCESS'   =>  'Jump/success', // 默认成功跳转对应的模板文件
    'PER_PAGE'               =>  '10',
    'TOKEN_ON'      =>    true,  // 是否开启令牌验证 默认关闭
	'TOKEN_NAME'    =>    '__hash__',    // 令牌验证的表单隐藏字段名称，默认为__hash__
	'TOKEN_TYPE'    =>    'md5',  //令牌哈希验证规则 默认为MD5
	'TOKEN_RESET'   =>    true,  //令牌验证出错后是否重置令牌 默认为true
);