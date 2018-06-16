<?php 
namespace Admin\Controller;
use Think\Controller;

/**
 * 管理员模块
 */

class ManagerController extends CommonController
{
	/**
	 * 列表
	 */
	public function index() {
		$list = D('Common')->infos('Admin', array(), 'admin_id, admin_name, admin_role_id');
		foreach($list as $key => $value) {
			$list[$key]['role_name'] = D('Common')->getField('Role', array('role_id'=>$value['admin_role_id']), 'role_name');
		}

		$this->assign('list', $list);
		$this->display();
	}

	/**
	 * 添加-页面
	 */
	public function add() {
		$role_list = D('Common')->infos('Role',array(),'role_id, role_name');

		$this->assign('role_list', $role_list);
		$this->display();
	}

	/**
	 * 添加-数据
	 */
	public function addData() {
		$data = $_POST;
		unset($data['admin_repass']);
		$data['admin_pass'] = encrypt($data['admin_pass']);

		$res = D('Common')->add('Admin', $data);
		if($res) {
			$this->ajaxReturn(array('msg'=>'添加成功!', 'code'=>'200'), 'json');
		} else {
			$this->ajaxReturn(array('msg'=>'添加失败!', 'code'=>'201'), 'json');
		}
	}

	/**
	 * 删除
	 */
	public function del() {
		$admin_id 	= intval($_POST['data']);

		//超级管理员admin不允许删除
		$info = D('Common')->info('Admin', array('admin_id'=>$admin_id), 'admin_name');
		if($info['admin_name'] == 'admin') {
			$this->ajaxReturn(array('msg'=>'删除失败! 超级管理员admin不允许删除', 'code'=>'201'), 'json');
		}

		$where 		= array('admin_id'=>$admin_id);
		$res 		= D('Common')->del('Admin', $where);

		if($res) {
			$this->ajaxReturn(array('msg'=>'删除成功!', 'code'=>'200'), 'json');
		} else {
			$this->ajaxReturn(array('msg'=>'删除失败!', 'code'=>'201'), 'json');
		}
	}

	/**
	 * 编辑-页面
	 */
	public function edit() {
		$admin_id 	= intval($_GET['admin_id']); 
		$info 		= D('Common')->info('Admin', array('admin_id'=>$admin_id), 'admin_id, admin_name, admin_role_id');
		if($info['admin_name'] == 'admin') {
			$this->error('超级管理员admin不允许编辑');
		}
		$role_list 	= D('Common')->infos('Role',array(),'role_id, role_name');

		$this->assign('role_list', $role_list);
		$this->assign('info', $info);
		$this->display();
	}

	/**
	 * 编辑-数据
	 */
	public function editData() {
		$data = $_POST;

		//超级管理员admin不允许编辑
		$info = D('Common')->info('Admin', array('admin_id'=>$data['admin_id']), 'admin_name');
		if($info['admin_name'] == 'admin') {
			$this->ajaxReturn(array('msg'=>'删除失败! 超级管理员admin不允许编辑', 'code'=>'201'), 'json');
		}

		$where = array('admin_id'=>$data['admin_id']);
		unset($data['admin_id']);
		
		$res = D('Common')->edit('Admin', $where, $data);
		if($res) {
			$this->ajaxReturn(array('msg'=>'数据更新成功!', 'code'=>'200'), 'json');
		} else {
			$this->ajaxReturn(array('msg'=>'数据更新失败!', 'code'=>'201'), 'json');
		}
	}

	
}

?>