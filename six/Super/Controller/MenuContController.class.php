<?php 

namespace Super\Controller;
use Tools\SuperController;

class MenuContController extends SuperController{


	public function index(){
		$Menu = new \Model\MenuModel();     /*实例化*/
        $mid = I('get.mid');
        $id = I('get.id');

        if (!empty($id) && !empty($_GET['action']) && $_GET['action'] == 'del') {	/*判断是否为删除*/
        	$MenuCont = new \Model\MenuContModel();/*实例化menu_cont表*/
            $tt = $MenuCont->find($id);
            $res = $MenuCont->delete($id);
            $sql = $MenuCont->getLastSql();
            if ($res) {
                unlink(APP_PATH.ltrim($data['pic'],'/'));
                $action = "删除【{$tt['title']}】内容成功！";
                    $this->success($action,__CONTROLLER__."/index/mid/{$mid}",2);
            }else{
                    $action = "删除【{$tt['title']}】内容失败！";
                    $this->success($action,'',1);
            }
        	$log = new \Model\SuperLogModel();
            $log->Log($action,$sql);    /*添加日志*/
        }
		$this->assign("mid",$mid);	/*向前台传递要操作的菜单id值*/
		$this->display();
	}

	/*为前台输出菜单列表的内容数据*/
    public function menuContDate(){
        $menu_id = I('get.id');
		$MenuCont = new \Model\MenuContModel();		/*实例化*/
    	$data = $MenuCont->where("menu_id={$menu_id}")->order('top_time DESC , show_order DESC')->select();

        foreach ($data as $key => $value) {
            switch ($value['state']) {
                case '0':
                    $data[$key]['state'] = "<span class='label label-sm label-danger'>隐藏</span>";
                    break;
                case '1':
                    $data[$key]['state'] = "<span class='label label-sm label-success'>显示</span>";
                    break;
                default:
                    $data[$key]['state'] = "<span class='label label-sm label-inverse'>未知</span>";
                    break;
            }
        }
        echo json_encode($data);			/*输出到前台*/
    }

   /*添加*/
    public function add(){
        $mid = I('get.mid');
        $MenuCont = new \Model\MenuContModel();     /*实例化*/
        if (!empty($_POST)) {
            $data = $MenuCont -> create();
            if ($data) {
                $data['cont'] = $_POST['cont'];
                //处理上传的图片
                if ($_FILES['pic']['error']<4) {
                    $cfg = array(
                        'rootPath'      =>  './Uploads/MenuContPic/', //保存根路径
                    );
                    $up = new \Think\Upload($cfg);
                    $z = $up -> uploadOne($_FILES['pic']);
                    $big_img = $up->rootPath.$z['savepath'].$z['savename'];
                    $data['pic'] = ltrim($big_img,'.');  
                }

                $data['menu_id'] = $mid;
                $top_time = date("Y-m-d H:i:s");
                $data['top_time'] = $top_time;
                $res = $MenuCont->add_all($data);
                $sql = $MenuCont->getLastSql();
                if ($res) {
                    $action = "添加【{$data['title']}】内容成功！";
                    $this->success($action,'',2);
                }else{
                    $action = "添加【{$data['title']}】内容失败！";
                    $this->success($action,'',1);
                }
                $log = new \Model\SuperLogModel();
                $log->Log($action,$sql);    /*添加日志*/
            }else{
               $this->assign('error',$MenuCont->getError());
            }
        }

        $menu = $MenuCont->where("menu_id={$mid}")->order('show_order desc')->find();
        $show_order = $menu['show_order']+1;
        $this->assign('mid',$mid);                      /*前台nav传值*/
        $this->assign('show_order',$show_order);        /*前台传值显示顺序*/
        $this->display();
    }

    /*修改*/
    public function edit(){
        $id = I('get.id');
        $mid = I('get.mid');
        $MenuCont = new \Model\MenuContModel();     /*实例化*/
        $data = $MenuCont->find($id);      /*查询一级菜单名称*/
        if (!empty($_POST)) {
            $data2 = $MenuCont->create();
            if ($data2) {
                /*操作图片*/
                if ($_FILES['pic']['error']<4) {
                    $cfg = array(
                        'rootPath'      =>  './Uploads/MenuContPic/', //保存根路径
                    );
                    $up = new \Think\Upload($cfg);
                    $z = $up -> uploadOne($_FILES['pic']);
                    $big_img = $up->rootPath.$z['savepath'].$z['savename'];
                    unlink(APP_PATH.ltrim($data['pic'],'/'));
                    $data2['pic'] = ltrim($big_img,'.');
                }
                /*添加相应数据*/
                $data2['cont'] = $_POST['cont'];
                $data2['id'] = $id;
                $res = $MenuCont->update_all($data2);
                $sql = $MenuCont->getLastSql();         //获取SQL语句
                if ($res) {
                    $action = "修改【{$data2['title']}】内容成功";
                   $this->success($action,__CONTROLLER__ . "/index/mid/{$_GET['mid']}",2);
                }else{
                    $action = "修改【{$data2['title']}】内容失败";
                    $this->success($action,'',3);
                }
                $log = new \Model\SuperLogModel();  /*实例化日志模型*/
                $log->Log($action,$sql);
            }else{
               $this->assign('error',$MenuCont->getError());
            }
        }
        $this->assign("mid",$mid);			/*前台传值nav.html里面up_id*/
        $this->assign("data",$data);                     /*传值数据表里的信息*/
        $this->display();
    }

    /*跳转链接和下载页面*/
    public function link(){
        $mid = I('get.mid');
        $Menu = new \Model\MenuModel();
        $data2 = $Menu->find($mid);         /*查询菜单数据，为日志做准备*/
        if (!empty($_POST)) {
            $data = $Menu -> create();  /*自动验证*/
            if ($data) {
                $data['id'] = $mid;
                $res = $Menu->update_all($data);
                $sql = $Menu->getLastSql();
                if ($res) {
                   $action = "修改【{$data2['menu_name']}】跳转链接成功";
                   $this->success($action,__CONTROLLER__ . "/link/mid/{$_GET['mid']}",2);
                }else{
                   $action = "修改【{$data2['menu_name']}】跳转链接失败";
                   $this->success($action,'',3);
                }
                $log = new \Model\SuperLogModel();  /*实例化日志模型*/
                $log->Log($action,$sql);
            }else{
                $this->assign('error',$Menu->getError());
            }
        }
        $this->assign('name',$data2['menu_name']);
        $this->assign('link',$data2['link']);
        $this->display();
    }

    /*图文混排页面*/
    public function pictext(){
        $mid = I('get.mid');
        $MenuCont = new \Model\MenuContModel();     /*实例化*/
        $Menu = new \Model\MenuModel();
        $data2 = $Menu->find($mid);         /*查询菜单数据，为日志做准备*/ 
        
        $data = $MenuCont->where("menu_id={$mid}")->order("created_at DESC")->find();
        if (!empty($_POST)) {
            $info = $MenuCont -> create();  /*自动验证*/
            if ($info) {
                $info['cont'] = $_POST['cont'];
                if($data){                          /*判断是添加还是修改*/    
                    $info['id'] = $data['id'];
                    $res = $MenuCont->update_all($info);
                    $sql = $MenuCont->getLastSql();
                    if ($res) {
                       $action = "修改【{$data2['menu_name']}】内容成功";
                       $this->success($action,__CONTROLLER__ . "/pictext/mid/{$_GET['mid']}",2);
                    }else{
                       $action = "修改【{$data2['menu_name']}】内容失败";
                       $this->success($action,'',3);
                    }
                }else{
                    $info['menu_id'] = $mid;
                    $res = $MenuCont->add_all($info);
                    $sql = $MenuCont->getLastSql();
                    if ($res) {
                       $action = "添加【{$data2['menu_name']}】内容成功";
                       $this->success($action,__CONTROLLER__ . "/pictext/mid/{$_GET['mid']}",2);
                    }else{
                       $action = "添加【{$data2['menu_name']}】内容失败";
                       $this->success($action,'',3);
                    }
                }
                $log = new \Model\SuperLogModel();  /*实例化日志模型*/
                $log->Log($action,$sql);
            }else{
                $this->assign('error',$MenuCont->getError());
            }
        }

        $this->assign('name',$data2['menu_name']);
        $this->assign("data",$data);
        $this->display();
    }

    /*置顶*/
    public function top(){
        $id = I('get.id');
        $mid = I('get.mid');
    	$MenuCont = new \Model\MenuContModel();
    	$res_fd = $MenuCont->find($id);
    	$date = date("Y-m-d H:i:s");
    	$data = array(
			"top"      => "1",
			"top_time" => "{$date}",
			"id"       => "{$id}"
    	);
    	$res = $MenuCont->update_all($data);
    	$sql = $MenuCont->getLastSql();
        $log = new \Model\SuperLogModel();  /*实例化日志模型*/
        if ($res) {
            $action = "置顶【{$res_fd['title']}】成功";
            $log->Log($action,$sql);
            $this->redirect('MenuCont/index',array('mid'=>"{$mid}"));
        }else{
            $action = "置顶【{$res_fd['title']}】失败";
            $log->Log($action,$sql);
            $this->redirect('MenuCont/index',array('mid'=>"{$mid}"));
        }
    }

    /*批量删除操作*/
    public function allDel(){
        $id=I('post.id');
        $MenuCont = new \Model\MenuContModel();
        if(is_array($id)){
             foreach ($id as $key => $value) {   /*遍历查询图片 并删除图片*/
                $data = $MenuCont->find($value);
                unlink(APP_PATH.ltrim($data['pic'],'/'));
            }
            $where='id in('.implode(',',$id).')';
            $del=$MenuCont->where($where)->delete();
            $sql = $MenuCont->getLastSql();
            $SuperLog = new \Model\SuperLogModel();
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