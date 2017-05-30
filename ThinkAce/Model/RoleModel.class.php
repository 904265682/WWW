<?php 
namespace Model;
use Model\SuperLogModel;
		//为role数据表创建一个Model模型类
		class RoleModel extends SuperLogModel{
			//可以自定义方法并访问
			//制作数据(role_auth_ids和role_auth_ac)、存储数据
			function saveAuth($roleid,$authid){
				//① 制作 role_auth_ids
				// dump($authid);
				// if (in_array('23',$authid)) {
				// 	echo "有";
				// }else{
				// 	echo "无";
				// }
				$num = count($authid)-1;
				for ($i=0; $i <= $num ; $i++) { 
					$ids = $authid[$i];
					$info = M('Auth')->find($ids);
					if (!in_array($info['auth_pid'],$authid)) {
						$authid[$num+1+$i] = $info['auth_pid'];
					}
				}
				$authids = implode(',',$authid);

				//② 制作 role_auth_ac（控制器和操作方法连接的字符串）
				//根据把选中的权限id信息，查询对应的权限记录，遍历并从中获得每个权限的 controller 和 action信息
				$authinfo = M('Auth')->select($authids);
				foreach ($authinfo as $k => $v) {
					if (!empty($v['auth_c']) && !empty($v['auth_a'])) {
						$s .= $v['auth_c']. '-' . $v['auth_a'] . ',';
					}
				}
				$s = rtrim($s,',');

				$sql = "update role set role_auth_ids='$authids',role_auth_ac='$s' where role_id='$roleid'";
				//$this代表调用该方法的当前对象  $role
				return $this->execute($sql);

			}
		}