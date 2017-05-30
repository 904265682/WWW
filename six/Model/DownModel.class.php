<?php 
namespace Model;
use Think\Model;

class DownModel extends Model{

    protected $_validate = array(
        array('show_order','require','显示序号不能为空！') ,
        array('show_order','number','显示序号只能是纯数字！') ,
        array('title','require','标题不能为空！'),
    );

	public function add_all($data) {
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['add_user'] = session('s_name');
        return $this->add($data);
    }

    public function update_all($data) {
        $data['updated_at'] = date('Y-m-d H:i:s');
        $data['add_user'] = session('s_name');
        return $this->save($data);
    }
}