<?php 

namespace Tools;
use Think\Controller;

class LayoutController extends Controller{

	function __construct(){
		parent::__construct();
		$Menu = new \Model\MenuModel();
		$oneMenu = $Menu->where("up_id=0")->order('show_order')->select();     /*查询一级菜单*/
		$twoMenu = $Menu->where("up_id!=0")->order('show_order')->select();     /*查询二级菜单*/
		$this->assign('oneMenu',$oneMenu);		/*一级菜单*/
		$this->assign('twoMenu',$twoMenu);		/*二级菜单*/
		$AllMess = M('all_mess');				/*实例化all_mess数据表*/
		$mess = $AllMess->select();
        foreach ($mess as $key => $value) {
            $this->assign("{$value['k']}",$value['v']);
        }
	}
}
