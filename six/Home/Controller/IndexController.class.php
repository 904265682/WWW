<?php
namespace Home\Controller;
use Tools\LayoutController;
class IndexController extends LayoutController {

    public function index(){
    	$AllMess = M('all_mess');
    	$banner = $AllMess->where("k='banner'")->find();		/*查询banner图*/
    	$MenuCont = new \Model\MenuContModel();
    	$cont = $MenuCont->where("state=1")->order("top_time DESC , created_at DESC")->limit(10)->select();
    	$news = $MenuCont->where("state=1")->order("created_at DESC")->limit(10)->select();
    	$hot = $MenuCont->where("state=1")->order("click_num DESC")->limit(10)->select();
        $Links = M('links');    /*实例化友情链接数据表*/
        $lk = $Links->where("state=1")->order("top_time DESC , show_order DESC")->limit(8)->select();

    	$this->assign('cont',$cont);				/*前台传值内容数据*/
    	$this->assign('news',$news);				/*前台传值最新数据*/
    	$this->assign('hot',$hot);					/*前台传值最热数据*/
        $this->assign('banner',$banner['v']);       /*前台传值banner图*/
    	$this->assign('lk',$lk);		            /*前台传值友情链接*/
       	$this->display();
    }

    public function cont(){
        $id = I('get.id');
        $MenuCont = new \Model\MenuContModel();
        $data = $MenuCont->find($id);
        $mid = $data['menu_id'];
        $Menu = new \Model\MenuModel();
        $menulist = $Menu->find($mid);      /*查询菜单*/
        $tc2 = $menulist['menu_name'];

        if ($menulist['up_id'] != 0) {      /*查找最上级菜单*/
            $tt1 = $Menu->find($menulist['up_id']);
            $tc1 = $tt1['menu_name'];
            $this->assign('tc1',$tc1);
            $this->assign('tc2',$tc2);
        }else{
            $this->assign('tc1',$tc2);
        }

        $dh_list = $Menu->where("up_id={$menulist['up_id']}  and state=1")->order("show_order")->limit(4)->select();
        $hot = $MenuCont->where("state=1")->order("click_num DESC")->limit(10)->select();       /*查询推荐文章*/
        $this->assign('tj',$hot);               /*传值推荐文章*/
        $this->assign('dh_list',$dh_list);      /*导航传值*/
        $this->assign('data',$data);            /*前台传值*/
        $this->display();
    }

    public function mlist(){
        $menu_id = I('get.id');
        $MenuCont = new \Model\MenuContModel();
        $mlist = $MenuCont->where("state=1 and menu_id=$menu_id")->order("top_time DESC , show_order DESC")->limit(10)->select();

        $Menu = new \Model\MenuModel();
        $upid = $Menu->find($menu_id);
        $dh_list = $Menu->where("up_id={$upid['up_id']} and state=1")->order("show_order")->limit(4)->select();
        $hot = $MenuCont->where("state=1")->order("click_num DESC")->limit(10)->select();       /*查询推荐文章*/

        if ($upid['up_id'] != 0) {      /*查找最上级菜单*/
            $tt1 = $Menu->find($upid['up_id']);
            $tc1 = $tt1['menu_name'];
            $this->assign('tc1',$tc1);
            $this->assign('tc2',$upid['menu_name']);
        }else{
            $this->assign('tc1',$upid['menu_name']);
        }


        $this->assign('tj',$hot);               /*传值推荐文章*/
        $this->assign('dh_list',$dh_list);      /*导航传值*/
        $this->assign('mlist',$mlist);
        $this->display();
    }

    public function diary(){
        $Diary = new \Model\DiaryModel();

        $data = $Diary->where("state=1")->order("top_time DESC , created_at DESC")->limit(10)->select();
        $this->assign('data',$data);
        $this->display();
    }

    public function down(){
        $mid = I('get.mid');
        $Down = new \Model\DownModel();
        $data = $Down->where("state=1 and menu_id={$mid}")->order("top_time DESC , show_order DESC")->limit(8)->select();

        $Menu = new \Model\MenuModel();
        $upid = $Menu->find($mid);

        if ($upid['up_id'] != 0) {      /*查找最上级菜单*/
            $tt1 = $Menu->find($upid['up_id']);
            $tc1 = $tt1['menu_name'];
            $this->assign('tc1',$tc1);
            $this->assign('tc2',$upid['menu_name']);
        }else{
            $this->assign('tc1',$upid['menu_name']);
        }

        $this->assign('data',$data);
        $this->display();
    }

    public function mess(){
        $Mess = new \Model\MessModel();
        $data = $Mess->where("state=1")->order("top_time DESC , created_at DESC")->select();

        // $content = I('post.name');
        // if (is_array($content)) {
        //     echo "1";
        // }else{
        //     echo "0";
        // }
        $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';

        $this->assign('data',$data);
        $this->display();
    }

}