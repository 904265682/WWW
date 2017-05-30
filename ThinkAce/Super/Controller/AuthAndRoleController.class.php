<?php 
namespace Super\Controller;
use Tools\SuperController;

class AuthAndRoleController extends SuperController{

	/*父级权限*/
	public function index(){

		if (!empty($_GET['auth_id'])) {
			$auth_id = $_GET['auth_id'];			/*获取要操作的id记录*/
			$data = M('Auth')->find($auth_id);		/*查询该操作记录*/
			$res = M('Auth')->delete($auth_id);		/*删除操作记录*/
			$sql = M('Auth')->getLastSql();			/*获取sql语句*/
			$log = new \Model\SuperLogModel();
			if ($res) {
                $action = "删除权限【{$data['auth_name']}】成功";
                $this->success($action,'',3);
            }else{
                $action = "删除权限【{$data['auth_name']}】失败";
                $this->success($action,'',3);
            }
            $log->Log($action,$sql);    /*写入日志*/
		}
		$this->display();
	}

	/*为前台输出父级权限的内容数据*/
    public function AuthDate(){
		$pAuth = M('Auth')->where("auth_pid=0")->order("auth_id DESC")->select();
        echo json_encode($pAuth);			/*输出到前台*/
    }

	/*子级权限*/
	public function index2(){

		if (!empty($_GET['auth_id'])) {
			$auth_id = $_GET['auth_id'];			/*获取要操作的id记录*/
			$data = M('Auth')->find($auth_id);		/*查询该操作记录*/
			$res = M('Auth')->delete($auth_id);		/*删除操作记录*/
			$sql = M('Auth')->getLastSql();			/*获取sql语句*/
			$log = new \Model\SuperLogModel();
			if ($res) {
                $action = "删除权限【{$data['auth_name']}】成功";
                $this->success($action,'',3);
            }else{
                $action = "删除权限【{$data['auth_name']}】失败";
                $this->success($action,'',3);
            }
            $log->Log($action,$sql);    /*写入日志*/
		}
		$this->display();
	}

	/*为前台输出子级权限的内容数据*/
    public function AuthDate2(){
		$pAuth = M('Auth')->where("auth_level=1")->order("auth_id DESC")->select();		/*查询出所有二级菜单*/
		foreach ($pAuth as $key => $value) {											/*遍历二级菜单*/
			/*查找二级菜单所属的上级菜单id*/
			$sql = "select auth_pid from auth where auth_id={$value['auth_id']}";
			$data = M('Auth')->query($sql);
			/*在数据表中查找与其对应的*/
			$sql2 = "select auth_name from auth where auth_id={$data[0]['auth_pid']}";
			$data2 =M('Auth')->query($sql2);
			// echo $data2[0]['auth_name'];
			$pAuth[$key]['auth_pname'] = $data2[0]['auth_name'];
		}
        echo json_encode($pAuth);			/*输出到前台*/
    }


	/*添加权限*/
	public function add(){
		$up_list = M('Auth')->where("auth_level=0")->select();
		if (!empty($_POST)) {
			$auth = new \Model\AuthModel();
			$data = $_POST;
			$data['add_user'] = session('s_name');
			$data['created_at'] = date('Y-m-d H:i:s');
			//只有4个信息(name,pid,controller,action)
			$z = $auth->update($data);//通过算法制作auth_path和auth_level，并实现整条记录的填充
			$sql = $auth->getLastSql();
			if ($z) {
				$action = "添加权限【{$_POST['auth_name']}】成功";
				 $this->success($action,'',3);
			}else{
				$action = "添加权限【{$_POST['auth_name']}】失败";
				 $this->success($action,'',3);
			}
			$log = new \Model\SuperLogModel();
			$log->Log($action,$sql);

		}
		$this->assign("up_list",$up_list);
		$this->display();
	}

	/*修改权限*/
	public function edit(){

		/*查找隶属菜单的一级菜单*/
		$up_list = M('Auth')->where("auth_level=0")->select();
		$auth_id = $_GET['auth_id'];
		$info = M('Auth')->find($auth_id);
		if (!empty($_POST)) {
			$data = $_POST;
			$data['add_user'] = session('s_name');
			$data['created_at'] = date('Y-m-d H:i:s');
			$res = M('Auth')->save($data);
			$sql = M('Auth')->getLastSql();
			if ($res) {
				$action = "修改权限【{$_POST['auth_name']}】成功";
				 $this->success($action,'',3);
			}else{
				$action = "修改权限【{$_POST['auth_name']}】失败";
				 $this->success($action,'',3);
			}
			$log = new \Model\SuperLogModel();
			$log->Log($action,$sql);
		}

		$this->assign("up_list",$up_list);	/*向前台输出*/
		$this->assign("info",$info);		/*前台传输修改前的数据*/
		$this->display();
	}


	/*角色管理*/
	public function roleIndex(){

		if (!empty($_GET['role_id'])) {
			$role_id = $_GET['role_id'];			/*获取要操作的id记录*/
			$data = M('Role')->find($role_id);		/*查询该操作记录*/
			$res = M('Role')->delete($role_id);		/*删除操作记录*/
			$sql = M('Role')->getLastSql();			/*获取sql语句*/
			$log = new \Model\SuperLogModel();
			if ($res) {
                $action = "删除角色【{$data['role_name']}】成功";
                $this->success($action,'',3);
            }else{
                $action = "删除角色【{$data['role_name']}】失败";
                $this->success($action,'',3);
            }
            $log->Log($action,$sql);    /*写入日志*/
		}
		$this->display();
	}

	/*为前台输出父级权限的内容数据*/
    public function RoleDate(){
		$Role = M('Role')->order("created_at DESC")->select();
        echo json_encode($Role);			/*输出到前台*/
    }

    /*添加角色*/
	public function roleAdd(){
		if (!empty($_POST)) {
			$data = $_POST;
			$data['add_user'] = session('s_name');
			$data['created_at'] = date('Y-m-d H:i:s');
			$res = M('Role')->add($data);
			$sql = M('Role')->getLastSql();	/*获取最后操作的sql语句*/
			if ($res) {
				$action = "添加角色【{$data['role_name']}】成功";
				 $this->success($action,'roleIndex',3);
			}else{
				$action = "添加角色【{$data['role_name']}】失败";
				 $this->success($action,'',3);
			}
			$log = new \Model\SuperLogModel();
			$log->Log($action,$sql);
		}
		$this->display();
	}

	/*修改角色*/
	public function roleEdit(){
		/*查找隶属菜单的一级菜单*/
		$role_id = $_GET['role_id'];
		$info = M('Role')->find($role_id);

		if (!empty($_POST)) {
			$data = $_POST;
			$data['role_id'] = $_GET['role_id'];
			$data['add_user'] = session('s_name');
			$data['created_at'] = date('Y-m-d H:i:s');
			$res = M('Role')->save($data);
			$sql = M('Role')->getLastSql();
			if ($res) {
				$action = "修改角色【{$data['role_name']}】成功";
				 $this->success($action,__CONTROLLER__.'/roleIndex',3);
			}else{
				$action = "修改角色【{$data['role_name']}】失败";
				 $this->success($action,'',3);
			}
			$log = new \Model\SuperLogModel();
			$log->Log($action,$sql);
		}
		$this->assign("info",$info);		/*前台传输修改前的数据*/
		$this->display();
	}

	/*角色赋权*/
	public function rolePower($role_id){
		$role_info = M('Role')->find($role_id);	/*查询被分配权限的角色信息*/
		$have_authids = $role_info['role_auth_ids'];    /*字符串判断不严谨，转换为数组*/
		$have_authids = explode(',', $have_authids);    /*把字符串转换为数组*/

		/*获得可供选取分配的权限信息*/
		$auth_infoA = M('Auth')->where('auth_level=0')->select();
		$auth_infoB = M('Auth')->where('auth_level=1')->select();

		if (!empty($_POST)) {
			/*数据处理一般放在model模型中操作*/
			/*收集好设置的权限，并知错为数据表要求格式 并存储*/
			$role = new \Model\RoleModel();
			$z =$role->saveAuth($role_id,$_POST['auth_id']);
			if ($z) {
				$action = "为角色【{$role_info['role_name']}】分配权限成功";
				 $this->success($action,'',3);
			}else{
				$action = "为角色【{$role_info['role_name']}】分配权限失败";
				 $this->success($action,'',3);
			}
		}
		$this->assign("have_authids",$have_authids);	/*该用户所拥有的权限信息*/
		$this->assign("auth_infoA",$auth_infoA);		/*父级权限信息*/
		$this->assign("auth_infoB",$auth_infoB);		/*子级权限信息*/
		$this->assign('role_info',$role_info);			/*被分配权限的角色信息*/
		$this->display();
	}


	/*用户管理*/
	public function userIndex(){
		$this->display();
	}

	


    /*批量删除父级列表操作*/
    public function allDel(){
        $id=$_POST["id"];
        if(is_array($id)){
            $where='auth_id in('.implode(',',$id).')';
            $del = M('Auth')->where($where)->delete();
            $SuperLog = new \Model\SuperLogModel();
            $sql = M('Auth')->getLastSql();
            if($del){
                $action = "批量删除父级列表成功！";
                echo 1;
            }else{
                $action = "批量删除父级列表失败！";
                echo 2;
            }
            $SuperLog->Log($action,$sql);
        }
    }

     /*批量删除子级列表操作*/
    public function allDel2(){
        $id=$_POST["id"];
        if(is_array($id)){
            $where='auth_id in('.implode(',',$id).')';
            $del = M('Auth')->where($where)->delete();
            $SuperLog = new \Model\SuperLogModel();
            $sql = M('Auth')->getLastSql();
            if($del){
                $action = "批量删除子级列表成功！";
                echo 1;
            }else{
                $action = "批量删除子级列表失败！";
                echo 2;
            }
            $SuperLog->Log($action,$sql);
        }
    }

    /*批量删除角色列表操作*/
    public function allRoleDel(){
    	$id=$_POST["id"];
        if(is_array($id)){
            $where='role_id in('.implode(',',$id).')';
            $del = M('Role')->where($where)->delete();
            $SuperLog = new \Model\SuperLogModel();
            $sql = M('Role')->getLastSql();
            if($del){
                $action = "批量删除角色成功！";
                echo 1;
            }else{
                $action = "批量删除角色失败！";
                echo 2;
            }
            $SuperLog->Log($action,$sql);
        }
    }

}