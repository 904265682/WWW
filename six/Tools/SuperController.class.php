<?php 

namespace Tools;
use Think\Controller;

class SuperController extends Controller{
	//1、判断是否登录。2、更新最后操作时间
	function __construct(){
		parent::__construct();

		//获得登录系统管理员信息，进而获得角色id
		$s_id   = session('s_id');
		$s_name = session('s_name');

		if (session('s_id')=="" && CONTROLLER_NAME!='Login'){
			$this->redirect("Login/index");
			exit;
		}else{
			$Menu = new \Model\MenuModel();
			$oneMenu = $Menu->where("up_id=0")->order('show_order')->select();     /*查询一级菜单*/
			$twoMenu = $Menu->where("up_id!=0")->order('show_order')->select();     /*查询二级菜单*/

			$this->assign('oneMenu',$oneMenu);		/*一级菜单*/
			$this->assign('twoMenu',$twoMenu);		/*二级菜单*/
		}
	}
}