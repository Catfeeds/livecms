<?php 
namespace Admin\Controller;
use Think\Controller;

/**
 * 权限模块
 */
class AuthController extends CommonController
{
	/**
	 * 列表
	 */
	public function index() {
		$sort  = 'auth_sort, auth_id';
		$listA = D('Common')->infosOrder('Auth', array('auth_level'=>0), '*', $sort);	//一级权限
		$listB = D('Common')->infosOrder('Auth', array('auth_level'=>1), '*', $sort);	//二级权限
		$listC = D('Common')->infosOrder('Auth', array('auth_level'=>2), '*', $sort);	//三级权限
		
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
		$this->display();
	}

	/**
	 * 添加-页面
	 */
	public function add() {
		$listA = D('Common')->infosOrder('Auth', array('auth_level'=>0), '*', 'auth_sort, auth_id');	//一级权限
		$listB = D('Common')->infosOrder('Auth', array('auth_level'=>1), '*', 'auth_sort, auth_id');	//二级权限

		$this->assign('listA', $listA);
		$this->assign('listB', $listB);
		$this->display();
	}

	/**
	 * 添加-数据
	 */
	public function addData() {
		$data = $_POST;

		if($data['auth_pid'] == 0) {
			$data['auth_level'] = 0;
		} else {
			$info = D('Common')->getField('Auth', array('auth_id'=>$data['auth_pid']), 'auth_level');
			if($info == 0) {
				$data['auth_level'] = 1;
			} else {
				$data['auth_level'] = 2;
			}
		}
		

		$res = D('Common')->add('Auth', $data);
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
		$auth_id 	= intval($_POST['data']);

		//如果是一级权限,并且下面有子级权限,则删除失败
		$info = D('Common')->info('Auth', array('auth_id'=>$auth_id), 'auth_level');
		if($info['auth_level'] == 0) {
			$res = D('Common')->info('Auth', array('auth_pid'=>$auth_id), 'auth_id');
			if($res) {
				$this->ajaxReturn(array('msg'=>'请先删除子级权限!', 'code'=>'201'), 'json');
			}
		}

		$where 		= array('auth_id'=>$auth_id);
		$res 		= D('Common')->del('Auth', $where);

		if($res) {
			//同时删除所有角色下的该权限
			$infos = D('Common')->infos('Role', array(), 'role_id, role_auth_ids');
			foreach($infos as $key => $value) {
				if($auth_id == $value['role_auth_ids']) {
					$res = D('Common')->edit('Role', array('role_id'=>$value['role_id']), array('role_auth_ids'=>''));
				} else {
					$role_auth_ids = explode(',', $value['role_auth_ids']);
					if($findkey = array_search($auth_id, $role_auth_ids)) {
						unset($role_auth_ids[$findkey]);
						$role_auth_ids = implode(',', $role_auth_ids);
						$res = D('Common')->edit('Role', array('role_id'=>$value['role_id']), array('role_auth_ids'=>$role_auth_ids));
					}
				}
			}
			
			$this->ajaxReturn(array('msg'=>'删除成功!', 'code'=>'200'), 'json');
		} else {
			$this->ajaxReturn(array('msg'=>'删除失败!', 'code'=>'201'), 'json');
		}
	}

	/**
	 * 编辑-页面
	 */
	public function edit() {
		$auth_id 	= intval($_GET['auth_id']);
		$info 		= D('Common')->info('Auth', array('auth_id'=>$auth_id))	;
		$listA 		= D('Common')->infosOrder('Auth', array('auth_level'=>0), '*', 'auth_sort, auth_id');	//一级权限
		$listB 		= D('Common')->infosOrder('Auth', array('auth_level'=>1), '*', 'auth_sort, auth_id');	//二级权限

		$this->assign('listA', $listA);
		$this->assign('listB', $listB);
		$this->assign('info', $info);
		$this->display();
	}

	/**
	 * 编辑-数据
	 */
	public function editData() {
		$data = $_POST;
		$where = array('auth_id'=>$data['auth_id']);
		unset($data['auth_id']);
		
		$res = D('Common')->edit('Auth', $where, $data);
		if($res) {
			$this->ajaxReturn(array('msg'=>'数据更新成功!', 'code'=>'200'), 'json');
		} else {
			$this->ajaxReturn(array('msg'=>'数据更新失败!', 'code'=>'201'), 'json');
		}
	}

	/**
	 * 更改状态
	 */
	public function status() {
		$where 	= array('auth_id' => $_POST['data']);
		
		// 三级权限不允许显示
		$level = D('Common')->getField('Auth', $where, 'auth_level');
		if ($level == 2) {
			$this->ajaxReturn(array('msg'=>'三级权限不允许显示!', 'code'=>'201'), 'json');
		}
		
		$status = D('Common')->getField('Auth', $where, 'auth_status');
		if($status == 0) {
			$data = array('auth_status'=>1);
		} else {
			$data = array('auth_status'=>0);
		}

		$res = D('Common')->edit('Auth', $where, $data);
		if($res) {
			$this->ajaxReturn(array('msg'=>'更新成功!', 'code'=>'200'), 'json');
		} else {
			$this->ajaxReturn(array('msg'=>'操作失败!', 'code'=>'201'), 'json');
		}
	}

	/**
	 * 排序
	 */
	public function sort() {
		$where 	= array('auth_id' 	=> $_POST['auth_id']);
		$data 	= array('auth_sort' => $_POST['auth_sort']);

		$res = D('Common')->edit('Auth', $where, $data);
		if($res) {
			$this->ajaxReturn(array('msg'=>'排序更新成功!', 'code'=>'200'), 'json');
		} else {
			$this->ajaxReturn(array('msg'=>'排序更新失败!', 'code'=>'201'), 'json');
		}
	}

}

?>