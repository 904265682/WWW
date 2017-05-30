<?php
namespace Model;
use Think\Model;

class SuperModel extends Model{

    public function add_all($data) {
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['add_user'] = session('s_name');
        return $this->add($data);
    }

    public function update_all($data) {
        $data['updated_at'] = date('Y-m-d H:i:s');
        $data['add_user'] = session('s_name');
        return $this->save($data);
    }

	//验证用户名和密码
	public function check($name,$pwd){
		$info = $this->where("name='{$name}'")->find();
		if ($info) {
			$info2 = $this->checkPwd($pwd,$info['salt'],$info['password']);
            if ($info2) {
                return $info;
            }
		}
		return null;
	}

    /*校验密码*/
    public function checkPwd($print_pwd,$sql_salt,$sql_pwd){
    /*
        加盐值方法：
        $salt = md5(uniqid(microtime()));   生成密码盐 ，存入数据库 salt字段
        $password = md5($salt . md5($password));   使密码盐与输入的密码值结合，生成新的密码，存入数据库password字段
    */
        $print_pwd2 = md5($sql_salt . md5($print_pwd));         //给输入的密码值加上当时注册时的盐值
        if ($print_pwd2 == $sql_pwd) {                          //判断输入的密码 和数据库里的密码是否一致
            return true;
        }else{
            return false;
        }
    }

	//获取IP地址
	public function getIP(){
        if($HTTP_SERVER_VARS["HTTP_X_FORWARDED_FOR"]){
            $ip = $HTTP_SERVER_VARS["HTTP_X_FORWARDED_FOR"];
        }
        elseif($HTTP_SERVER_VARS["HTTP_CLIENT_IP"]){
            $ip = $HTTP_SERVER_VARS["HTTP_CLIENT_IP"];
        }
        elseif ($HTTP_SERVER_VARS["REMOTE_ADDR"]){
            $ip = $HTTP_SERVER_VARS["REMOTE_ADDR"];
        }
        elseif (getenv("HTTP_X_FORWARDED_FOR")){
            $ip = getenv("HTTP_X_FORWARDED_FOR");
        }
        elseif (getenv("HTTP_CLIENT_IP")){
            $ip = getenv("HTTP_CLIENT_IP");
        }
        elseif (getenv("REMOTE_ADDR")){
            $ip = getenv("REMOTE_ADDR");
        }
        else{
            $ip = "Unknown";
        }
        return $ip;
    }
}
