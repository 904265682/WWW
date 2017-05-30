<?php
namespace Super\Controller;
use Tools\SuperController;
class MenuController extends SuperController{

    /*一级列表页面*/
    public function index(){
        $Menu = new \Model\MenuModel();
        /*删除操作*/
        if (!empty($_GET['id'])) {
            $id = I('get.id');
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
        $numdata = $Menu->select();
        $num = count($numdata);         /*获取总数组的长度*/

        $data = $Menu->where("up_id=0")->order('show_order')->select();     /*查询一级菜单*/
        $arr = array();
        $n = 0;
        for ($i=0; $i < count($data); $i++) {
            $arr[$n] = $data[$i];
            $data2 = $Menu->where("up_id={$arr[$n]['id']}")->order('show_order')->select();
            if ($data2) {
                $n++;
                for ($j=0; $j < count($data2); $j++) {
                    $arr[$n] = $data2[$j];
                    $arr[$n]['menu_name'] = "&nbsp;&nbsp;&nbsp;&nbsp;├─" . $arr[$n]['menu_name'];
                    $arr[$n]['show_order'] = "&nbsp;├─" . $arr[$n]['show_order'];
                    $n++;
                }
                $n--;
            }
            $n++;
        }
        $arr2 = $this->NumText($arr);
        echo json_encode($arr2);

    }

    /*后台判断显示状态和菜单类型(返回原数组)*/
    public function numText($data=array()){
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
                    $data[$key]['type'] = "跳转链接";
                    break;
                case '4':
                    $data[$key]['type'] = "下载列表";
                    break;
                case '5':
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
        $info = $Menu->where("up_id=0")->order('show_order')->select();     /*查询一级菜单*/

        if (!empty($_POST)) {
            $data = $Menu -> create();
            if ($data) {
                $res = $Menu->add_all($data);

                $sql = $Menu->getLastSql();
                $log = new \Model\SuperLogModel();

                if ($res) {
                    $action = "添加菜单【{$data['menu_name']}】成功！";
                    $this->success($action,'index',2);
                }else{
                    $action = "添加菜单【{$data['menu_name']}】失败！";
                    $this->success($action,'',2);
                }
                $log->Log($action,$sql);    /*添加日志*/
            }else{
               $this->assign('error',$Menu->getError());
            }
        }

        $menu = $Menu->order('show_order desc')->find();
        $show_order = $menu['show_order']+1;

        $this->assign('show_order',$show_order);        /*前台传值显示顺序*/
        $this->assign('info',$info);
        $this->display();
    }

    /*修改*/
    public function edit(){
        $id = I('get.id');
        $Menu = new \Model\MenuModel(); /*实例化模型类*/
        $info = $Menu->where("up_id=0")->order('show_order')->select();     /*查询一级菜单*/
        $data = $Menu->find($id);       /*查询修改前信息*/

        if (!empty($_POST)) {
            $data2 = $Menu -> create();
            if ($data2) {
                $data2['id'] = $id;
                $res = $Menu->update_all($data2);
                $log = new \Model\SuperLogModel();  /*实例化日志模型*/
                $sql = $Menu->getLastSql();         //获取SQL语句
                if ($res) {
                    $action = "修改菜单【{$data2['menu_name']}】成功";
                    $this->success($action,__CONTROLLER__ . "/index",2);
                }else{
                    $action = "修改菜单【{$data2['menu_name']}】失败";
                    $this->success($action,'',2);
                }
                $log->Log($action,$sql);
            }else{
               $this->assign('error',$Menu->getError());
            }
        }
        $this->assign('info',$info);                    /*前台传值隶属菜单*/
        $this->assign("data",$data);                     /*传值数据表里的信息*/
        $this->display();
    }

    /*批量删除操作*/
    public function allDel(){

        $id=I('post.id');
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
