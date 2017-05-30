<?php
namespace Super\Controller;
use Tools\SuperController;
class MenuController extends SuperController{

    /*一级列表页面*/
    public function index(){
        $Menu = new \Model\MenuModel();
        /*删除操作*/
        if (!empty($_GET['id'])) {
            $id = $_GET['id'];
            $data = $Menu->find($id);
            $res = $Menu->delete($id);
            $sql = $Menu->getLastSql();
            $log = new \Model\SuperLogModel();
            if ($res) {
                $action = "删除菜单【{$data['menu_name']}】成功";
                $this->success("删除菜单【{$data['menu_name']}】成功",'',3);
            }else{
                $action = "删除菜单【{$data['menu_name']}】失败";
                $this->success("删除菜单【{$data['menu_name']}】失败",'',3);
            }
            $log->Log($action,$sql);    /*写入日志*/
        }
        $this->display('index');
    }

    /*为前台输出所有【一级列表】数据*/
    public function oneMenuDate(){
        $Menu = new \Model\MenuModel();
        $data = $Menu->where("up_id=0")->order('show_order')->select();
        $data2 = $this->NumText($data);
        echo json_encode($data2);
    }


    /*二级列表页面*/
    public function index2(){
        $Menu = new \Model\MenuModel();
        $up_id = $_GET['up_id'];
        $updata = $Menu->find($up_id);
        $id = $_GET['id'];
        /*删除操作*/
        if (!empty($_GET['id'])) {
            $id = $_GET['id'];
            $data = $Menu->find($id);
            $res = $Menu->delete($id);
            $sql = $Menu->getLastSql();
            $log = new \Model\SuperLogModel();
            if ($res) {
                $action = "删除菜单【{$data['menu_name']}】成功";
                $this->success("删除菜单【{$data['menu_name']}】成功","",3);
            }else{
                $action = "删除菜单【{$data['menu_name']}】失败";
                $this->success("删除菜单【{$data['menu_name']}】失败",'',3);
            }
            $log->Log($action,$sql);    /*写入日志*/
        }
        $this->assign("data",$data);
        $this->assign("updata",$updata);
        $this->assign("up_id",$id);
        $this->display('index2');
    }

    /*为前台输出所有【二级列表】数据*/
    public function twoMenuDate(){
        $Menu = new \Model\MenuModel();
        $id = $_GET['up_id'];     /*获取一级列表中有二级列表的字段id*/
        $res = $Menu->where("up_id={$id}")->order("show_order")->select();
        $res2 = $this->NumText($res);
        echo json_encode($res2);
    }

    /*后台判断显示状态和菜单类型(返回原数组)*/
    public function numText($data=array()){
        foreach ($data as $key => $value) {
            switch ($value['state']) {
                case '0':
                    $data[$key]['state'] = "隐藏";
                    break;
                case '1':
                    $data[$key]['state'] = "显示";
                    break;
                default:
                    $data[$key]['state'] = "未知";
                    break;
            }
            switch ($value['type']) {
                case '0':
                    $data[$key]['type'] = "图文混排";
                    break;
                case '1':
                    $data[$key]['type'] = "新闻列表";
                    break;
                case '2':
                    $data[$key]['type'] = "图片列表";
                    break;
                case '3':
                    $data[$key]['type'] = "有下级菜单";
                    break;
                default:
                    $data[$key]['type'] = "未知";
                    break;
            }
        }
        return $data;
    }

    /*添加*/
    public function add(){
        $Menu = new \Model\MenuModel();     /*实例化*/
        $up_id = $_GET['up_id'];
        $updata = $Menu->find($up_id);      /*查询一级菜单名称*/
        if (!empty($_POST)) {
            $show = is_numeric($_POST['show_order']);
            if ($show) {
                $data = $_POST;
                if (!empty($_GET['up_id'])) {       /*判断是否为二级菜单的添加----添加信息*/
                    $data['up_id'] = $_GET['up_id'];
                }
                $data['add_user'] = session('s_name');
                $data['created_at'] = date("Y-m-d H:i:s");
                $res = $Menu->add($data);
                $sql = $Menu->getLastSql();

                $log = new \Model\SuperLogModel();

                if ($res) {
                    $action = "添加菜单【{$data['menu_name']}】成功！";
                    if (!empty($_GET['up_id'])) {   /*判断是否为二级菜单的添加---跳转*/
                        $upid = $_GET['up_id'];
                        $this->success($action,__CONTROLLER__."/index2/up_id/$upid",2);
                    }else{
                        $this->success($action,'index',2);
                    }
                }else{
                    $action = "添加菜单【{$data['menu_name']}】失败！";
                    $this->success($action,'',2);
                }
                $log->Log($action,$sql);    /*添加日志*/
            }else{
                $this->success("显示顺序错误，请重新输入！",'',2);
            }
        }
        $this->assign("updata",$updata);                /*前台传值nav.html里面一级菜单名称*/
        $this->assign("add_user",session("s_name"));    /*前台传值*/
        $this->display();
    }

    /*修改*/
    public function edit(){
        $id = $_GET['id'];
        $Menu = new \Model\MenuModel(); /*实例化模型类*/
        $data = $Menu->find($id);       /*查询修改前信息*/

        $up_id = $_GET['up_id'];
        $updata = $Menu->find($up_id);      /*查询一级菜单名称*/
        if (!empty($_POST)) {
            $show = is_numeric($_POST['show_order']);
            if ($show) {        /*判断显示顺序是否为数字*/
                $data = $_POST;
                $data['add_user'] = session('s_name');
                $data['updated_at'] = date("Y-m-d H:i:s");
                $data['id'] = $id;
                $res = $Menu->save($data);
                $log = new \Model\SuperLogModel();  /*实例化日志模型*/
                $sql = $Menu->getLastSql();         //获取SQL语句
                if ($res) {
                    $action = "修改菜单【{$data['menu_name']}】成功";
                    if (!empty($_GET['up_id'])) {   /*判断是否为二级菜单的添加---跳转*/
                        $upid = $_GET['up_id'];
                       $this->success($action,__CONTROLLER__ . "/index2/up_id/$upid",3);
                    }else{
                       $this->success($action,__CONTROLLER__ . "/index",3);
                    }
                }else{
                    $action = "修改菜单【{$data['menu_name']}】失败";
                    $this->success($action,'',3);
                }
                $log->Log($action,$sql);
            }else{
                $this->success("显示顺序错误，请重新输入！",'',2);
            }
        }

        $this->assign("updata",$updata);                /*前台传值nav.html里面一级菜单名称*/
        $this->assign("data",$data);                     /*传值数据表里的信息*/
        $this->assign("add_user",session('s_name'));    /*传值SESSION*/
        $this->display();
    }

    /*批量删除操作*/
    public function allDel(){

        $id=$_POST["id"];
        $Menu = new \Model\MenuModel();
        if(is_array($id)){
            $where='id in('.implode(',',$id).')';
            $del=$Menu->where($where)->delete();
            $SuperLog = new \Model\SuperLogModel();
            $sql = $Menu->getLastSql();
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
