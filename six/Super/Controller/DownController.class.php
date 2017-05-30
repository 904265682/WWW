<?php 

namespace Super\Controller;
use Tools\SuperController;

class DownController extends SuperController{
	/*一级列表页面*/
    public function index(){
        /*删除操作*/
        if (!empty($_GET['id']) && !empty($_GET['action']) && $_GET['action'] == 'del') {
        	$Down = new \Model\DownModel();
            $id = I('get.id');
            $data = $Down->find($id);
            $res = $Down->delete($id);

            $sql = $Down->getLastSql();
            $log = new \Model\SuperLogModel();
            if ($res) {
            	unlink(APP_PATH.ltrim($data['pic'],'/'));
            	unlink(APP_PATH.ltrim($data['file_url'],'/'));
                $action = "删除文件【{$data['title']}】成功";
                $this->success($action,'');
            }else{
                $action = "删除文件【{$data['title']}】失败";
                $this->success($action,'');
            }
            $log->Log($action,$sql);    /*写入日志*/
        }
        $this->display();
    }

    /*为前台输出所有【一级列表】数据*/
    public function oneDownDate(){
        $Down = new \Model\DownModel();
        $data = $Down->order('top_time DESC , show_order DESC')->select();     /*查询日记列表*/
        $Menu = new \Model\MenuModel();
        $menudata = $Menu->where("type=4")->select();
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
            for ($i=0; $i < count($menudata); $i++) {
                if ($value['menu_id'] == $menudata[$i]['id']) {
                    $data[$key]['menu_id'] = $menudata[$i]['menu_name'];
                }
            }
        }

        echo json_encode($data);
    }

    /*添加*/
    public function add(){
        $Down = new \Model\DownModel();     /*实例化*/

        if (!empty($_POST)) {
            $data = $Down -> create();
            if ($data) {
            	$data['cont'] = $_POST['cont'];

            	if ($_FILES['pic']['error']<4) {					/*处理图片*/
            	    $cfg = array(
            	        'rootPath'      =>  './Uploads/Down/pic/', //保存根路径
            	    );
            	    $up = new \Think\Upload($cfg);
            	    $z = $up -> uploadOne($_FILES['pic']);
            	    $big_img = $up->rootPath.$z['savepath'].$z['savename'];
            	    $data['pic'] = ltrim($big_img,'.');
            	}

            	if ($_FILES['file_url']['error']<4) {				/*处理文件*/
            	    $cfg = array(
            	        'rootPath'      =>  './Uploads/Down/file/', //保存根路径
            	    );
            	    $up = new \Think\Upload($cfg);
            	    $z = $up -> uploadOne($_FILES['file_url']);
            	    $big_img = $up->rootPath.$z['savepath'].$z['savename'];
            	    $data['file_url'] = ltrim($big_img,'.');
            	}

                $top_time = date("Y-m-d H:i:s");
                $data['top_time'] = $top_time;
                $res = $Down->add_all($data);
                $sql = $Down->getLastSql();
                $log = new \Model\SuperLogModel();
                if ($res) {
                    $action = "添加文件【{$data['title']}】成功！";
                    $this->success($action,'',2);
                }else{
                    $action = "添加文件【{$data['title']}】失败！";
                    $this->success($action,'',2);
                }
                $log->Log($action,$sql);    /*添加日志*/
            }else{
               $this->assign('error',$Down->getError());
            }
        }

        $Down = $Down->order('show_order desc')->find();
        $show_order = $Down['show_order']+1;
        $Menu = new \Model\MenuModel();
        $cd = $Menu->where("type=4")->select();         /*为前台隶属菜单查询数据*/
        $this->assign('cd',$cd);                        /*前台传值隶属菜单*/
        $this->assign('show_order',$show_order);        /*前台传值显示顺序*/
        $this->display();
    }

    /*修改*/
    public function edit(){
        $id = I('get.id');
        $Down = new \Model\DownModel(); /*实例化模型类*/
        $data = $Down->find($id);       /*查询修改前信息*/

        if (!empty($_POST)) {
            $data2 = $Down -> create();
            if ($data2) {
                $data2['id'] = $id;
            	$data2['cont'] = $_POST['cont'];

            	if ($_FILES['pic']['error']<4) {					/*处理图片*/
            	    $cfg = array(
            	        'rootPath'      =>  './Uploads/Down/pic/', //保存根路径
            	    );
            	    $up = new \Think\Upload($cfg);
            	    $z = $up -> uploadOne($_FILES['pic']);
            	    $big_img = $up->rootPath.$z['savepath'].$z['savename'];
                    unlink(APP_PATH.ltrim($data['pic'],'/'));

            	    $data2['pic'] = ltrim($big_img,'.');
            	}

            	if ($_FILES['file_url']['error']<4) {				/*处理文件*/
            	    $cfg = array(
            	        'rootPath'      =>  './Uploads/Down/file/', //保存根路径
            	    );
            	    $up = new \Think\Upload($cfg);
            	    $z = $up -> uploadOne($_FILES['file_url']);
            	    $big_img = $up->rootPath.$z['savepath'].$z['savename'];
                    unlink(APP_PATH.ltrim($data['file_url'],'/'));
            	    $data2['file_url'] = ltrim($big_img,'.');
            	}

                $res = $Down->update_all($data2);
                $log = new \Model\SuperLogModel();  /*实例化日志模型*/
                $sql = $Down->getLastSql();         //获取SQL语句
                if ($res) {
                    $action = "修改文件【{$data2['title']}】成功";
                    $this->success($action,__CONTROLLER__ . "/index",2);
                }else{
                    $action = "修改文件【{$data2['title']}】失败";
                    $this->success($action,'',2);
                }
                $log->Log($action,$sql);
            }else{
               $this->assign('error',$Down->getError());
            }
        }
        $Menu = new \Model\MenuModel();
        $cd = $Menu->where("type=4")->select();         /*为前台隶属菜单查询数据*/
        $this->assign('cd',$cd);                        /*前台传值隶属菜单*/
        $this->assign("data",$data);                     /*传值数据表里的信息*/
        $this->display();
    }

    /*置顶*/
    public function top(){
        $id = I('get.id');
    	$Down = new \Model\DownModel();
    	$res_fd = $Down->find($id);
    	$date = date("Y-m-d H:i:s");
    	$data = array(
			"top"      => "1",
			"top_time" => "{$date}",
			"id"       => "{$id}"
    	);
    	$res = $Down->update_all($data);
    	$sql = $Down->getLastSql();
        $log = new \Model\SuperLogModel();  /*实例化日志模型*/
        if ($res) {
            $action = "置顶文件【{$res_fd['title']}】成功";
            $log->Log($action,$sql);
            $this->redirect('Down/index');
        }else{
            $action = "置顶文件【{$res_fd['title']}】失败";
            $log->Log($action,$sql);
            $this->redirect('Down/index');
        }
    }

    /*批量删除操作*/
    public function allDel(){

        $id=I('post.id');
        $Down = new \Model\DownModel();
        if(is_array($id)){
            $where='id in('.implode(',',$id).')';
             foreach ($id as $key => $value) {   /*遍历查询图片 并删除图片*/
                $data = $Down->find($value);
                unlink(APP_PATH.ltrim($data['pic'],'/'));
                unlink(APP_PATH.ltrim($data['file_url'],'/'));
            }
            $del=$Down->where($where)->delete();
            $sql = $Down->getLastSql();
            $SuperLog = new \Model\SuperLogModel();
            if($del){
                $action = "批量删除菜单列表成功！";
                echo 1;
            }else{
                $action = "批量删除菜单列表失败！";
                echo 2;
            }
            $SuperLog->Log($action,$sql);
        }
    }
}