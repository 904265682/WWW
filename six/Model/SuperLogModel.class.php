<?php 
namespace Model;
use Model\SuperModel;

class SuperLogModel extends SuperModel{
	//日志函数
        public function Log($action='',$sql='',$bz=''){
        	 /*构造基本数据*/
                $data['sql_cont'] = $sql;
                $data['name'] = $_SESSION['s_name'];
                $data['created_at'] = date('Y-m-d H:i:s');
                $data['ip'] = $this->getIP();
                $data['action'] = $action;
                $data['bz'] = $bz;
                $data['updated_at'] = date('Y-m-d H:i:s');
                /*构造sql级别*/
                $data['db_level'] = '0';
                if(stristr($data['sql_cont'],'select')) $data['db_level']='1';
                if(stristr($data['sql_cont'],'insert')) $data['db_level']='2';
                if(stristr($data['sql_cont'],'update')) $data['db_level']='3';
                if(stristr($data['sql_cont'],'delete')) $data['db_level']='4';
                /*插入数据*/
                $this->add($data);
        }
}