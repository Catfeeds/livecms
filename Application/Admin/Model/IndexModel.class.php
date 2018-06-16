<?php 
namespace Admin\Model;
use Think\Model;

class IndexModel extends CommonModel
{
	private $_db1 = '';
	private $_db2 = '';
	private $_db3 = '';

	public function __construct() {
		$this->_db1 = M('Admin');	//用户
		$this->_db2 = M('Role');	//角色
		$this->_db3 = M('Auth');	//权限
	}

	/**
	 * 首页显示对应权限
	 */
	public function auth() {
		$admin_id 	= session('admin_id');
		$admin_name = session('admin_name');

		//角色ID
		$admin_role_id = $this->_db1->where(array('admin_id'=>$admin_id))->getField('admin_role_id');
		//权限  
		$sort = 'auth_sort, auth_id';
		if($admin_name == 'admin') {
			//超级管理员admin拥有全部权限
			$authA = $this->_db3->where(array('auth_level'=>0, 'auth_status'=>1))->order($sort)->select();	//一级权限
			$authB = $this->_db3->where(array('auth_level'=>1, 'auth_status'=>1))->order($sort)->select();	//二级权限
		} else {
			//权限ids
			$role_auth_ids = $this->_db2->where(array('role_id'=>$admin_role_id))->getField('role_auth_ids');

			$authA = $this->_db3->where(array('auth_level'=>0, 'auth_id'=>array('in', $role_auth_ids), 'auth_status'=>1))->order($sort)->select();	//一级权限
			$authB = $this->_db3->where(array('auth_level'=>1, 'auth_id'=>array('in', $role_auth_ids), 'auth_status'=>1))->order($sort)->select();	//二级权限
		}
		
		$auth = array('authA'=>$authA, 'authB'=>$authB);
		return $auth;
	}

	
	
}

?>