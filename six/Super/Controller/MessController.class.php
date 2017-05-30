<?php 

namespace Super\Controller;
use Tools\SuperController;

class MessController extends SuperController{

	/*一级列表页面*/
    public function index(){
        $Mess = new \Model\MessModel();
        /*删除操作*/
        if (!empty($_GET['id']) && !empty($_GET['action']) && $_GET['action'] == 'del') {
            $id = I('get.id');
            $data = $Mess->find($id);
            $res = $Mess->delete($id);
            $sql = $Mess->getLastSql();
            $log = new \Model\SuperLogModel();
            if ($res) {
                $action = "删除留言【{$data['cont']}】成功";
                $this->success($action,'',2);
            }else{
                $action = "删除留言【{$data['cont']}】失败";
                $this->success($action,'',2);
            }
            $log->Log($action,$sql);    /*写入日志*/
        }
        $this->display('index');
    }

    /*为前台输出所有【一级列表】数据*/
    public function oneMessDate(){
        $Mess = new \Model\MessModel();
        $data = $Mess->order('top_time DESC , created_at DESC')->select();     /*查询留言列表*/
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
            switch ($value['reply_on']) {
                case '0':
                    $data[$key]['reply_on'] = "<span class='label label-sm label-danger'>未回复</span>";
                    break;
                case '1':
                    $data[$key]['reply_on'] = "<span class='label label-sm label-success'>已回复</span>";
                    break;
                default:
                    $data[$key]['reply_on'] = "<span class='label label-sm label-inverse'>未知</span>";
                    break;
            }
        }
        echo json_encode($data);
    }

    /*添加*/
    public function add(){
        $Mess = new \Model\MessModel();     /*实例化*/
        if (!empty($_POST)) {
        	$data = $_POST;
            $top_time = date("Y-m-d H:i:s");
            $data['top_time'] = $top_time;
            $res = $Mess->add_all($data);
            $sql = $Mess->getLastSql();
            $log = new \Model\SuperLogModel();
            if ($res) {
                $action = "添加留言【{$data['cont']}】成功！";
                $this->success($action,'index',2);
            }else{
                $action = "添加留言【{$data['cont']}】失败！";
                $this->success($action,'',2);
            }
            $log->Log($action,$sql);    /*添加日志*/
        }
        $this->display();
    }

    /*修改*/
    public function edit(){
        $id = I('get.id');
        $Mess = new \Model\MessModel(); /*实例化模型类*/
        $data = $Mess->find($id);       /*查询修改前信息*/
        if (!empty($_POST)) {
        	$data2 = $_POST;
            $data2['id'] = $id;

            if (!empty($data2['reply'])) {
            	$data2['reply_on'] = "1";
                $data2['reply_at'] = date("Y-m-d H:i:s");
            }

            $res = $Mess->update_all($data2);
            $log = new \Model\SuperLogModel();  /*实例化日志模型*/
            $sql = $Mess->getLastSql();         //获取SQL语句
            if ($res) {
                $action = "修改留言【{$data2['cont']}】成功";
                $this->success($action,__CONTROLLER__ . "/index",2);
            }else{
                $action = "修改留言【{$data2['cont']}】失败";
                $this->success($action,'',2);
            }
            $log->Log($action,$sql);

        }
        $this->assign("data",$data);                     /*传值数据表里的信息*/
        $this->display();
    }

    /*置顶*/
    public function top(){
        $id = I('get.id');
    	$Mess = new \Model\MessModel();
    	$res_fd = $Mess->find($id);
    	$date = date("Y-m-d H:i:s");
    	$data = array(
			"top"      => "1",
			"top_time" => "{$date}",
			"id"       => "{$id}"
    	);
    	$res = $Mess->update_all($data);
    	$sql = $Mess->getLastSql();
        $log = new \Model\SuperLogModel();  /*实例化日志模型*/
        if ($res) {
            $action = "置顶留言【{$res_fd['cont']}】成功";
            $log->Log($action,$sql);
            $this->redirect('Mess/index');
        }else{
            $action = "置顶留言【{$res_fd['cont']}】失败";
            $log->Log($action,$sql);
            $this->redirect('Mess/index');
        }
    }

    /*批量删除操作*/
    public function allDel(){

        $id=I('post.id');
        $Mess = new \Model\MessModel();
        if(is_array($id)){
            $where='id in('.implode(',',$id).')';
            $del=$Mess->where($where)->delete();
            $SuperLog = new \Model\SuperLogModel();
            $sql = $Mess->getLastSql();
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