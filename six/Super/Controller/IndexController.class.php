<?php
namespace Super\Controller;
use Tools\SuperController;
class IndexController extends SuperController {
    public function index(){
    	$superObj = M('super');
    	$dbReturn = $superObj->where("id={$_SESSION['s_id']}")->find();
    	$time = date("Y-m-d");
    	$y = substr($time,0,4);
    	$m = substr($time,5,2);
    	$d = substr($time,8,2);
    	$data['y'] = $y;
    	$data['m'] = $m;
    	$data['d'] = $d;
    	$data['last_time'] = $dbReturn['last_time'];
    	$data['last_ip'] = $dbReturn['last_ip'];
    	$this->assign("data",$data);
    	$this->display();
    }
}