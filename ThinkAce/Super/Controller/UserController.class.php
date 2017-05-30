<?php 
namespace Super\Controller;
use Tools\SuperController;

class UserController extends SuperController{

	/*用户管理页面*/
	public function index(){
		if (!empty($_GET['id'])) {
			$id = $_GET['id'];
			$info = M('Super')->find($id);
			$del = M('Super')->delete($id);
			$sql = M('Super')->getLastSql();
			if ($del) {
				$action = "删除用户【{$info['name']}】成功";
				$this->success($action,'',3);
			}else{
				$action = "删除用户【{$info['name']}】失败";
				$this->success($action,'',3);
			}
			$log = new \Model\SuperLogModel();		/*实例化日志函数*/
			$log->Log($action,$sql);		/*写入日志*/
		}

		$this->display('AuthAndRole/User/index');
	}

	/*为用户管理页面传递数据*/
	public function areaData(){
		$info = M('Super')->select();
		foreach ($info as $key => $value) {			
			if ($value['role_id'] == 0) {
				$info[$key]['role_id'] = "超级管理员";
			}else{
				$data = M('Role')->find($value['role_id']);
				$info[$key]['role_id'] = $data['role_name'];
			}
		}
		echo json_encode($info);			/*输出到前台*/
	}

	/*添加用户*/
	public function add(){
		$role_list = M('Role')->select();	/*查询角色类型*/
		$Super = new \Model\SuperModel();
		$shuju = $Super->create();
		// if (!empty($_POST)) {
		// 	$data = $_POST;
		// 	$salt = md5(uniqid(microtime()));
		// 	$password = md5($salt . md5($data['password']));
		// 	/*将数据转换为数组*/
		// 	$data['salt']       = $salt;
		// 	$data['password']   = $password;
		// 	$data['add_user']   = session('s_name');
		// 	$data['created_at'] = date('Y-m-d H:i:s');
		// 	$info = M('Super')->add($data);			/*添加数据*/
		// 	$sql  = M('Super')->getLastSql();		/*获取最后操作的sql语句*/
		// 	if ($info) {
		// 		$action = "添加用户【{$data['name']}】成功";
		// 		$this->success($action,'index',2);
		// 	}else{
		// 		$action = "添加用户【{$data['name']}】失败";
		// 		$this->success($action,'',2);
		// 	}
		// 	$log = new \Model\SuperLogModel();
		// 	$log->Log($action,$sql);
		// }
		if ($shuju) {
			echo "成功";
		}else{
			$this->assign('error',$Super->getError());
		}
		$this->assign("role_list",$role_list);	/*为前台角色类型传值*/
		$this->display('AuthAndRole/User/add');
	}

	/*用户密码修改*/
	public function edit($id){
		$Super = new \Model\SuperModel();
		$info = $Super->find($id);
		if (!empty($_POST)) {
			$salt = md5(uniqid(microtime()));
			$password = md5($salt . md5($data['password']));
			$data = $_POST;
			/*将数据转换为数组*/
			$data['salt']       = $salt;
			$data['password']   = $password;
			$data['add_user']   = session('s_name');
			$data['updated_at'] = date('Y-m-d H:i:s');
			$res = $Super->save($data);
			$sql = $Super->getLastSql();
			if ($res) {
				$action = "修改用户【{$data['name']}】密码成功！";
				$this->success($action,__CONTROLLER__.'/index',2);
			}else{
				$action = "修改用户【{$res['name']}】密码失败！";
				$this->success($action,'',2);
			}
			$log = new \Model\SuperLogModel();
			$log->Log($action,$sql);
		}

		$this->assign("info",$info);
		$this->display('AuthAndRole/User/edit');
	}

	/*角色修改*/
	public function powerEdit($id){

		$Super = new \Model\SuperModel();
		$info = $Super->find($id);			/*查询要修改的数据*/
		$role_list = M('Role')->select();	/*查询角色*/

		if (!empty($_POST)) {
			$data = $_POST;
			$data['add_user']   = session('s_name');
			$data['updated_at'] = date('Y-m-d H:i:s');
			$res = $Super->save($data);
			$sql = $Super->getLastSql();
			if ($res) {
				$action = "修改用户【{$data['name']}】角色成功！";
				$this->success($action,__CONTROLLER__.'/index',2);
			}else{
				$action = "修改用户【{$res['name']}】角色失败！";
				$this->success($action,'',2);
			}
			$log = new \Model\SuperLogModel();
			$log->Log($action,$sql);
		}

		$this->assign("info",$info);
		$this->assign("role_list",$role_list);
		$this->display('AuthAndRole/User/powerEdit');
	}
}
