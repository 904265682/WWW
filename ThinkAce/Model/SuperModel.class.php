<?php 

namespace Model;
use Think\Model;

class SuperModel extends Model{
    // protected $patchValidate = true;
/*    protected $_validate = array(
        //arra(字段,验证规则,错误提示,[验证条件,附加规则,验证时间]);
        
        //1、用户名验证,不能为空(唯一)
        array('name','require','用户名不能为空'),
        // array('name','','用户名已经存在',0,'unique'),
        //2、密码验证
        array('password','require','密码不能为空'),
        
        // //3、确认密码，不能为空并且和密码保持一致
        // array('password2','require','确认密码不能为空'),
        // array('password2','password','两次密码必须一致',0,'confirm'),       //具体在手册 模型->自动验证
        
        // //4.邮箱验证
        // array('user_email','email','邮箱格式不正确'),
        
        // //5、qq号码验证：纯数组、位数5-12
        // array('user_qq','number','QQ号码必须为纯数组'),
        // array('user_qq','5,12','QQ号码长度为5-12之间',0,'length'),
        
        // //6、学历必须选择一项  复选框
        // array('user_xueli','2,5','学历必须选择一项',0,'between'),
        
        // //7、爱好、必须选择两项或以上  callback  验证条件应该为 1 ，任何情况下都验证
        // array('user_hobby','check_hobby','爱好、必须选择两项或以上',1,'callback'),   
    
    );*/

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
