<?php 
namespace Admin\Controller;
use Think\Controller;

/**
 * 角色模块
 */

class RoleController extends CommonController
{
	/**
	 * 列表
	 */
	public function index() {
		$res = D('Common')->datalist('Role', array(), 'role_id, role_name', 'role_id desc');

		$this->assign('list', $res['list']);
		$this->assign('page', $res['page']);
		$this->assign('count', $res['count']);
		$this->display();
	}

	/**
	 * 删除
	 */
	public function del() {
		$role_id 	= intval($_POST['data']);
		$where 		= array('role_id'=>$role_id);
		$res 		= D('Common')->del('Role', $where);

		if($res) {
			//删除角色之后删除相关用户的角色
			$infos = D('Common')->infos('Admin', array('admin_role_id'=>$role_id), 'admin_id');
			foreach($infos as $key => $value) {
				$res = D('Common')->edit('Admin', array('admin_id'=>$value['admin_id']), array('admin_role_id'=>0));
			}

			$this->ajaxReturn(array('msg'=>'删除成功!', 'code'=>'200'), 'json');
		} else {
			$this->ajaxReturn(array('msg'=>'删除失败!', 'code'=>'201'), 'json');
		}
	}

	/**
	 * 批量删除
	 */
	public function dels() {
		$role_ids 	= $_POST['data'];
		$where 		= array('role_id'=>array('in', $role_ids));
		$res 		= D('Common')->del('Role', $where);

		if($res) {
			$this->ajaxReturn(array('msg'=>'删除成功!', 'code'=>'200'), 'json');
		} else {
			$this->ajaxReturn(array('msg'=>'删除失败!', 'code'=>'201'), 'json');
		}
	}

	/**
	 * 添加-页面
	 */
	public function add() {
		$this->display();
	}

	/**
	 * 添加-数据
	 */
	public function addData() {
		$data = $_POST;

		$res = D('Common')->add('Role', $data);

		if($res) {
			$this->ajaxReturn(array('msg'=>'添加成功!', 'code'=>'200'), 'json');
		} else {
			$this->ajaxReturn(array('msg'=>'添加失败!', 'code'=>'201'), 'json');
		}
	}

	/**
	 * 编辑-页面
	 */
	public function edit() {
		$role_id 	= intval($_GET['role_id']); 
		$info 		= D('Common')->info('Role', array('role_id'=>$role_id), 'role_id, role_name');

		$this->assign('info', $info);
		$this->display();
	}

	/**
	 * 编辑-数据
	 */
	public function editData() {
		$data = $_POST;

		$where = array('role_id'=>$data['role_id']);
		unset($data['role_id']);
		
		$res = D('Common')->edit('Role	', $where, $data);
		if($res) {
			$this->ajaxReturn(array('msg'=>'数据更新成功!', 'code'=>'200'), 'json');
		} else {
			$this->ajaxReturn(array('msg'=>'数据更新失败!', 'code'=>'201'), 'json');
		}
	}

	/**
	 * 分配权限
	 */
	public function info() {
		$role_id 		= intval($_GET['role_id']);
		$role_info 		= D('Common')->info('Role', array('role_id'=>$role_id), '*');
		$role_auth_ids 	= explode(',', $role_info['role_auth_ids']);
		$field 			= 'auth_id, auth_name, auth_pid, auth_level';
		$sort  			= 'auth_sort, auth_id';

		$listA = D('Common')->infosOrder('Auth', array('auth_level'=>0), $field, $sort);	//一级权限
		$listB = D('Common')->infosOrder('Auth', array('auth_level'=>1), $field, $sort);	//二级权限
		$listC = D('Common')->infosOrder('Auth', array('auth_level'=>2), $field, $sort);	//三级权限

		$list = array();
		foreach($listA as $k1 => $v1) {
			$list[] = $v1;
			foreach($listB as $k2 => $v2) {
				if($v2['auth_pid'] == $v1['auth_id']) {
					$v2['auth_name'] = '|--------'.$v2['auth_name'];
					$list[] = $v2;
					foreach($listC as $k3 => $v3) {
						if($v3['auth_pid'] == $v2['auth_id']) {
							$v3['auth_name'] = '|--------|--------'.$v3['auth_name'];
							$list[] = $v3;
						}
					}
				}
			}
		}

		$this->assign('list', $list);
		$this->assign('role_auth_ids', $role_auth_ids);
		$this->assign('role_info', $role_info);
		
		$this->display();
	}

	/**
	 * 修改角色权限ids
	 */
	public function authEdit() {
		$role_id = $_POST['role_id'];
		$role_auth_ids = $_POST['role_auth_ids'];

		$res = D('Common')->edit('Role', array('role_id'=>$role_id), array('role_auth_ids'=>$role_auth_ids));
		if($res) {
			$this->ajaxReturn(array('msg'=>'更新成功!', 'code'=>'200'), 'json');
		} else {
			$this->ajaxReturn(array('msg'=>'更新失败!', 'code'=>'201'), 'json');
		}
	}


}

?>