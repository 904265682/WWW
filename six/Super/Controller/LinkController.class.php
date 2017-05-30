<?php 

namespace Super\Controller;
use Tools\SuperController;

class LinksController extends SuperController{

	/*一级列表页面*/
    public function index(){
        $Links = new \Model\LinksModel();
        /*删除操作*/
        if (!empty($_GET['id']) && !empty($_GET['action']) && $_GET['action'] == 'del') {
            $id = I('get.id');
            $data = $Links->find($id);
            $res = $Links->delete($id);
            $sql = $Links->getLastSql();
            $log = new \Model\SuperLogModel();
            if ($res) {
                $action = "删除日记【{$data['title']}】成功";
                $this->success($action,'',2);
            }else{
                $action = "删除日记【{$data['title']}】失败";
                $this->success($action,'',2);
            }
            $log->Log($action,$sql);    /*写入日志*/
        }
        $this->display('index');
    }

    /*为前台输出所有【一级列表】数据*/
    public function oneLinksDate(){
        $Links = new \Model\LinksModel();
        $data = $Links->order('top_time DESC , show_order DESC')->select();     /*查询日记列表*/
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
            switch ($value['checkon']) {
                case '0':
                    $data[$key]['checkon'] = "<span class='label label-sm label-danger'>不可点击</span>";
                    break;
                case '1':
                    $data[$key]['checkon'] = "<span class='label label-sm label-success'>可以点击</span>";
                    break;
                default:
                    $data[$key]['checkon'] = "<span class='label label-sm label-inverse'>未知</span>";
                    break;
            }
        }
        echo json_encode($data);

    }

    /*添加*/
    public function add(){
        $Links = new \Model\LinksModel();     /*实例化*/

        if (!empty($_POST)) {
            $data = $Links -> create();
            if ($data) {
            	$data['cont'] = $_POST['cont'];
                $res = $Links->add_all($data);
                $sql = $Links->getLastSql();
                $log = new \Model\SuperLogModel();
                if ($res) {
                    $action = "添加日记【{$data['title']}】成功！";
                    $this->success($action,'index',2);
                }else{
                    $action = "添加日记【{$data['title']}】失败！";
                    $this->success($action,'',2);
                }
                $log->Log($action,$sql);    /*添加日志*/
            }else{
               $this->assign('error',$Links->getError());
            }
        }

        $Links = $Links->order('show_order desc')->find();
        $show_order = $Links['show_order']+1;
        $this->assign('show_order',$show_order);        /*前台传值显示顺序*/
        $this->display();
    }

    /*修改*/
    public function edit(){
        $id = I('get.id');
        $Links = new \Model\LinksModel(); /*实例化模型类*/
        $data = $Links->find($id);       /*查询修改前信息*/

        if (!empty($_POST)) {
            $data2 = $Links -> create();
            if ($data2) {
                $data2['id'] = $id;
            	$data2['cont'] = $_POST['cont'];
                $res = $Links->update_all($data2);
                $log = new \Model\SuperLogModel();  /*实例化日志模型*/
                $sql = $Links->getLastSql();         //获取SQL语句
                if ($res) {
                    $action = "修改日记【{$data2['title']}】成功";
                    $this->success($action,__CONTROLLER__ . "/index",2);
                }else{
                    $action = "修改日记【{$data2['title']}】失败";
                    $this->success($action,'',2);
                }
                $log->Log($action,$sql);
            }else{
               $this->assign('error',$Links->getError());
            }
        }
        $this->assign("data",$data);                     /*传值数据表里的信息*/
        $this->display();
    }

    /*置顶*/
    public function top(){
        $id = I('get.id');
    	$Links = new \Model\LinksModel();
    	$res_fd = $Links->find($id);
    	$date = date("Y-m-d H:i:s");
    	$data = array(
			"top"      => "1",
			"top_time" => "{$date}",
			"id"       => "{$id}"
    	);
    	$res = $Links->update_all($data);
    	$sql = $Links->getLastSql();
        $log = new \Model\SuperLogModel();  /*实例化日志模型*/
        if ($res) {
            $action = "置顶日记【{$res_fd['title']}】成功";
            $log->Log($action,$sql);
            $this->redirect('Links/index');
        }else{
            $action = "置顶日记【{$res_fd['title']}】失败";
            $log->Log($action,$sql);
            $this->redirect('Links/index');
        }
    }

    /*批量删除操作*/
    public function allDel(){

        $id=I('post.id');
        $Links = new \Model\LinksModel();
        if(is_array($id)){
            $where='id in('.implode(',',$id).')';
            $del=$Links->where($where)->delete();
            $SuperLog = new \Model\SuperLogModel();
            $sql = $Links->getLastSql();
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