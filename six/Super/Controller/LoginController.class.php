<?php 
namespace Super\Controller;
use Tools\SuperController;
class LoginController extends SuperController{
    function index(){

    	if (!empty($_POST)) {
    		$errors = "";
    		$Super = new \Model\SuperModel();
    		$vry = new \Think\Verify();
            $SuperlLog = new \Model\SuperLogModel();
    		if ($vry -> check($_POST['captcha'])) {
    			$info = $Super->check($_POST['name'],$_POST['password']);
    			if ($info) {
    				session("s_id",$info['id']);
    				session("s_name",$info['name']);
                    $addtime = date("Y-m-d H:i:s");     //登录时间
                    $ip = $Super->getIP();

                    $res_last = $Super->find($info['id']);  //查询数据库

                    $last_time_data = array(
                        "last_time" => "{$res_last['time']}",
                        "time"      => "{$addtime}",
                        "last_ip"   => "{$res_last['ip']}",
                        "ip"        => "{$ip}",
                        "id"        => "{$info['id']}"
                    );
                    $res_last_time = $Super->save($last_time_data);     //更新登录时间和登录IP
                    $sql = $Super->getLastSql();
                    $SuperlLog->Log("用户登录",$sql);

                    //成功跳转
                    $this->redirect("Index/index");
    			}else{
                    $errors = "用户名或密码错误！";
                }
    		}else{
    			$errors = "验证码错误，请重新输入！";
    		}
    	}
        $this->assign('errors',$errors);
        $this->assign('post',$_POST);
        $this->display();
    }

    /*退出登录*/
    public function logout(){
        $SuperlLog = new \Model\SuperLogModel();
        $SuperlLog->Log("用户登出");
        unset($_SESSION['s_name']);
        unset($_SESSION['s_id']);
        $this->redirect("index");
    }

    /*生成验证码*/
    function verifyImg(){
    	//验证码配置
    	$cfg = array(
    		"imageH" => 32,
    		"imageW" => 110,
    		"fontSize" => 15,
    		"length" => 4,
    		"fontttf" => "4.ttf",
            'useCurve'=>false,//是否使用混淆曲线
    	);
        //实例化
    	$very = new \Think\Verify($cfg);
        //输出验证码
    	$very ->entry();
    }

}
