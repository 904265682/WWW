<?php
namespace Super\Controller;
use Tools\SuperController;

class SecurityController extends SuperController{

	/*修改密码*/
	public function PwRevise(){
		$super = new \Model\SuperModel();
		$log = new \Model\SuperLogModel();
		$info = $super->find(session('s_id'));
		if (!empty($_POST)) {

			if($_POST['new_pw1'] != $_POST['new_pw2']){
				$this->success('修改失败，请重复输入两次相同的新密码！','',2);
				$action = "密码修改失败：两次新密码不匹配！";
			}else{
				$info2 = $super->checkPwd($_POST['old_pw'],$info['salt'],$info['password']);
				if ($info2) {
					// 	加盐值方法：
					// $salt = md5(uniqid(microtime()));   生成密码盐 ，存入数据库 salt字段
					// $password = md5($salt . md5($password));   使密码盐与输入的密码值结合，生成新的密码，存入数据库password字段
					$salt = md5(uniqid(microtime()));
					$password = md5($salt . md5($_POST['new_pw1']));
					$time = date("Y-m-d H:i:s");
					$data = array(
						"id" => "{$_SESSION['s_id']}",
						"salt" => "{$salt}",
						"password" => "{$password}",
						"updated_at" => "{$time}"
					);
					$super->save($data);
					$this->success("恭喜您，修改成功！",'',2);
					$action = "修改密码成功";
				}else{
					$this->success('修改密码失败：旧密码不正确！','',2);
					$action = "修改密码失败：旧密码不正确！";
				}
			}
				$sql = $super->getLastSql();
				//写入日志
				$log->Log($action,$sql);
			}
		$this->assign('info',$info);
		$this->display();
	}

	/*日志*/
	public function SuperLog(){
		$this->display();
	}

	/*为前台传递日志数据*/
    public function SuperLogDate(){
	    $Super = new \Model\SuperLogModel();
		$name=session("s_name");
        $data=$Super->where("name= '$name' ")->Order("id desc")->select();
    	$data2 = $this->level($data);
	    echo json_encode($data2);
    }

    /*详细信息查看*/
    public function Detail($id=''){
    	$SuperLog = new \Model\SuperLogModel();
    	$data = $SuperLog->find($id);
  		switch ($data['db_level']) {
            case '0':
                $data['db_level'] = "默认";
                break;
            case '1':
                $data['db_level'] = "数据检索";
                break;
            case '2':
                $data['db_level'] = "数据插入";
                break;
            case '3':
                $data['db_level'] = "数据更新";
                break;
            case '4':
                $data['db_level'] = "数据删除";
                break;
            default:
                $data['db_level'] = "未知";
                break;
        }
    	$this->assign("data",$data);
    	$this->display();
    }

        /*后台判断显示状态和菜单类型(返回原数组)只针对二维数组*/
    public function level($data=array()){
        foreach ($data as $key => $value) {
            switch ($value['db_level']) {
                case '0':
                    $data[$key]['db_level'] = "默认";
                    break;
                case '1':
                    $data[$key]['db_level'] = "数据检索";
                    break;
                case '2':
                    $data[$key]['db_level'] = "数据插入";
                    break;
                case '3':
                    $data[$key]['db_level'] = "数据更新";
                    break;
                case '4':
                    $data[$key]['db_level'] = "数据删除";
                    break;
                default:
                    $data[$key]['db_level'] = "未知";
                    break;
            }
        }
        return $data;
    }

    public function Information(){

        $AllMess = M('all_mess');
        if (!empty($_POST)) {
            $data = $_POST;
            unset($data['__hash__']);
            foreach ($data as $key => $value) {
                $sql = "UPDATE all_mess SET v='{$value}' WHERE k='{$key}'";
                $res = $AllMess->execute($sql);
            }
        }
        $data2 = $AllMess->select();
        foreach ($data2 as $key => $value) {
            $this->assign("{$value['k']}",$value['v']);
        }
        $this->display();
    }

    public function Show(){
        $AllMess = M('all_mess');

        if (!empty($_POST)) {
            $data = $_POST;
            unset($data['__hash__']);
            if ($_FILES['logo']['error']<4) {                    /*处理logo图片*/
                $cfg = array(
                    'rootPath'      =>  './Uploads/Show/', //保存根路径
                );
                $up = new \Think\Upload($cfg);
                $z = $up -> uploadOne($_FILES['logo']);
                $big_img = $up->rootPath.$z['savepath'].$z['savename'];
                $filelogo = $AllMess->where("k='logo'")->find();
                unlink(APP_PATH.ltrim($filelogo['v'],'/'));
                $data['logo'] = ltrim($big_img,'.');
            }

            if ($_FILES['qr_code']['error']<4) {                    /*处理二维码图片*/
                $cfg = array(
                    'rootPath'      =>  './Uploads/Show/', //保存根路径
                );
                $up = new \Think\Upload($cfg);
                $z = $up -> uploadOne($_FILES['qr_code']);
                $big_img = $up->rootPath.$z['savepath'].$z['savename'];
                $fileqr = $AllMess->where("k='qr_code'")->find();
                unlink(APP_PATH.ltrim($fileqr['v'],'/'));
                $data['qr_code'] = ltrim($big_img,'.');
            }

            if ($_FILES['banner']['error']<4) {                    /*处理banner图片*/
                $cfg = array(
                    'rootPath'      =>  './Uploads/Show/', //保存根路径
                );
                $up = new \Think\Upload($cfg);
                $z = $up -> uploadOne($_FILES['banner']);
                $big_img = $up->rootPath.$z['savepath'].$z['savename'];
                $filebanner = $AllMess->where("k='banner'")->find();
                unlink(APP_PATH.ltrim($filebanner['v'],'/'));
                $data['banner'] = ltrim($big_img,'.');
            }

            foreach ($data as $key => $value) {
                $sql = "UPDATE all_mess SET v='{$value}' WHERE k='{$key}'";
                $res = $AllMess->execute($sql);
            }
        }

        $data3 = $AllMess->select();
        foreach ($data3 as $key => $value) {
            $this->assign("{$value['k']}",$value['v']);
        }
        $this->display();
    }


}

