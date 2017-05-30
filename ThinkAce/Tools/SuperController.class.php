<?php 

namespace Tools;
use Think\Controller;

class SuperController extends Controller{
	//1、判断是否登录。2、更新最后操作时间
	function __construct(){
		parent::__construct();

		//获得当前用户访问的"控制器/操作方法"权限信息
		$nowac = CONTROLLER_NAME."-".ACTION_NAME;
		//获得当前用户“允许”访问的权限信息
		//s_id-----role------auth

		//获得登录系统管理员信息，进而获得角色id
		$s_id   = session('s_id');
		$s_name = session('s_name');

		//未登录系统用户判断，如果未登录则跳转到登录页面去
		//(如果访问的是"登录页、验证码、退出页"则允许访问)
		$loginac = "Login-index,Login-verifyImg,Login-logout";
		if(empty($s_name) && strpos($loginac,$nowac)===false){
			$moduleurl = __MODULE__;
			$js = <<<eof
			   <script type="text/javascript">
			   window.top.location.href="{$moduleurl}/Login/index"; 
			   </script>
eof;
			 echo $js;
			exit;
		}
		/*1、根据管理员的id信息，获得对应的角色信息*/
		$super_info = M('Super')->find($s_id);
		$role_id = $super_info['role_id'];

		/*2、根据$role_id获得本身记录信息*/
		$role_info = M('Role')->find($role_id);
		$auth_ac = $role_info['role_auth_ac']; //获得角色对应权限的"控制器-操作方法"信息
		$auth_ids = $role_info['role_auth_ids'];//获得角色对应权限的ids
		//默认允许大家都可以访问的权限
		$allow_ac = "Login-index,Login-logout,Login-verifyImg,Index-index,";
		//strpos() 判断一个小的字符串在一个大的字符串中"第一次"出现的位置
		//越权翻墙访问过滤判断：
		//① 当前访问的权限没有出现在其“拥有权限”列表里边
		//② 当前访问的权限 也 没有出现在 “默认允许权限” 里边
		//③ 访问者还不是admin超级管理员
		//那么当前权限就“没有权限访问”
		if(strpos($auth_ac,$nowac)===false && strpos($allow_ac,$nowac)===false && $s_name!=='admin'){
			exit('没有权限访问！');
		}else{
			if (session('s_id')=="" && CONTROLLER_NAME!='Login'){
				$this->redirect("Login/index");
				exit;
			}else{
				// $superinfo = M('Super')->select();
				/*3、根据$auth_ids获得获得具体权限*/
				/*超级管理员没有权限限制*/
				if ($s_name === 'admin') {
					$auth_infoA = M('Auth')->where("auth_level=0")->select();	/*父级*/
					$auth_infoB = M('Auth')->where("auth_level=1")->select();	/*子级*/
				}elseif(!empty($s_name)){	/*如果session不为空*/
					$auth_infoA = M('Auth')->where("auth_level=0 and auth_id in ($auth_ids)")->select();	/*父级*/
					$auth_infoB = M('Auth')->where("auth_level=1 and auth_id in ($auth_ids)")->select();	/*子级*/
				}
				$this->assign("auth_infoA",$auth_infoA);
				$this->assign("auth_infoB",$auth_infoB);
			}
		}
	}
}