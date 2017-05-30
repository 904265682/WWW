<?php 

namespace Super\Controller;
use Tools\SuperController;

class MenuContController extends SuperController{


	public function index($up_id){
		$Menu = new \Model\MenuModel();     /*实例化*/
        $updata = $Menu->find($up_id);      /*查询一级菜单名称*/

        if (!empty($up_id) && !empty($_GET['id'])) {	/*判断是否为删除*/
        	$id = $_GET['id'];
        	$MenuCont = new \Model\MenuContModel();/*实例化menu_cont表*/
        	$log = new \Model\SuperLogModel();
        	$dd = $MenuCont->find($id);
        	$res = $MenuCont->delete($id);
            $sql = $MenuCont->getLastSql();
        	if ($res) {
        		$action = "删除【{$dd['title']}】内容成功！";
                    $this->success($action,__CONTROLLER__."/index/up_id/{$up_id}",2);
        	}else{
                    $action = "删除【{$dd['title']}】内容失败！";
                    $this->success($action,'',1);
            }
            $log->Log($action,$sql);    /*添加日志*/
        }
        $this->assign("updata",$updata);                /*前台传值nav.html里面一级菜单名称*/
		$this->assign("up_id",$up_id);	/*向前台传递要操作的菜单id值*/
		$this->display();
	}

	/*为前台输出菜单列表的内容数据*/
    public function menuContDate($up_id){
		$MenuCont = new \Model\MenuContModel();		/*实例化*/
    	$data = $MenuCont->where("up_id={$up_id}")->order('top_time DESC , show_order DESC')->select();
        $Menu = new MenuController();
        $data2 = $Menu->NumText($data);		/*调用方法，把字段中的显示隐藏，和菜单类型数字替换为汉字*/
        echo json_encode($data2);			/*输出到前台*/
    }

   /*添加*/
    public function add(){
        $Menu = new \Model\MenuModel();     /*实例化*/
        if (!empty($_POST)) {
			$data = $_POST;
            $show = is_numeric($data['show_order']);
            if ($show) {
            	$MenuCont = new \Model\MenuContModel(); /*实例化模型类*/
            	$upid = $_GET['up_id'];
            	$data['up_id'] = $upid;
                $data['add_user'] = session('s_name');
                $data['created_at'] = date("Y-m-d H:i:s");
                $res = $MenuCont->add($data);
                $sql = $MenuCont->getLastSql();

                $log = new \Model\SuperLogModel();
                if ($res) {
                    $action = "添加【{$data['title']}】内容成功！";
                    $this->success($action,__CONTROLLER__."/index/up_id/{$upid}",2);
                }else{
                    $action = "添加【{$data['title']}】内容失败！";
                    $this->success($action,'',1);
                }
                $log->Log($action,$sql);    /*添加日志*/
            }else{
                $this->success("显示顺序错误，请重新输入！",'',2);
            }
        }
        $this->assign("up_id",$_GET['up_id']);
        $this->assign("add_user",session("s_name"));    /*前台传值*/
        $this->display();
    }

    /*修改*/
    public function edit($id){
        $MenuCont = new \Model\MenuContModel();     /*实例化*/
        $data = $MenuCont->find($id);      /*查询一级菜单名称*/
        if (!empty($_POST)) {
            $show = is_numeric($_POST['show_order']);
            if ($show) {        /*判断显示顺序是否为数字*/
                $data = $_POST;
                $data['add_user'] = session('s_name');
                $data['updated_at'] = date("Y-m-d H:i:s");
                $data['id'] = $id;
                $res = $MenuCont->save($data);
                $log = new \Model\SuperLogModel();  /*实例化日志模型*/
                $sql = $MenuCont->getLastSql();         //获取SQL语句
                if ($res) {
                    $action = "修改【{$data['title']}】内容成功";
                   $this->success($action,__CONTROLLER__ . "/index/up_id/{$_GET['up_id']}",3);
                }else{
                    $action = "修改【{$data['title']}】内容失败";
                    $this->success($action,'',3);
                }
                $log->Log($action,$sql);
            }else{
                $this->success("显示顺序错误，请重新输入！",'',2);
            }
        }
        $this->assign("up_id",$_GET['up_id']);			/*前台传值nav.html里面up_id*/
        $this->assign("data",$data);                     /*传值数据表里的信息*/
        $this->assign("add_user",session('s_name'));    /*传值SESSION*/
        $this->display();
    }
    /*置顶*/
    public function top($id){
    	$MenuCont = new \Model\MenuContModel();
    	$res_fd = $MenuCont->find($id);
    	$date = date("Y-m-d H:i:s");
    	$data = array(
			"top"      => "1",
			"top_time" => "{$date}",
			"id"       => "{$id}"
    	);
    	$res = $MenuCont->save($data);
    	$sql = $MenuCont->getLastSql();
    	if ($res) {
            $action = "置顶【{$res_fd['title']}】成功";
           	$this->redirect('MenuCont/index',array('up_id'=>"{$_GET['up_id']}"));
        }else{
            $action = "置顶【{$res_fd['title']}】失败";
           	$this->redirect('MenuCont/index',array('up_id'=>"{$_GET['up_id']}"));
        }
        $log = new \Model\SuperLogModel();
        $log->Log($action,$sql);
    }

    /*批量删除操作*/
    public function allDel(){
        $id=$_POST["id"];
        $MenuCont = new \Model\MenuContModel();
        if(is_array($id)){
            $where='id in('.implode(',',$id).')';
            $del=$MenuCont->where($where)->delete();
            $SuperLog = new \Model\SuperLogModel();
            $sql = $Menu->getLastSql();
            if($del){
                $action = "批量删除菜单内容成功！";
                echo 1;
            }else{
                $action = "批量删除菜单内容失败！";
                echo 2;
            }
            $SuperLog->Log($action,$sql);
        }
    }

}