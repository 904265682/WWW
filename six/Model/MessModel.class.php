<?php 
namespace Model;
use Model\SuperModel;

class MessModel extends SuperModel{

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