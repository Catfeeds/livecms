<?php 
namespace Admin\Controller;
use Think\Controller;

/**
 * 后台首页
 */

class IndexController extends CommonController
{
	public function index() {
		//根据不同的用户权限,显示不同的左侧菜单
		$auth = D('Index')->auth();	
		$admin_name = session('admin_name');

		$this->assign('admin_name', $admin_name);	//管理员名称
		$this->assign('authA', $auth['authA']);		//一级权限
		$this->assign('authB', $auth['authB']);		//二级权限
		$this->display();
	}

	/**
	 * 修改密码
	 */
	public function pass() {
		$this->display();
	}

	/**
	 * 基本信息
	 */
	public function info() {
		$basicInfo = basicInfo();
		$this->assign('basicInfo', $basicInfo);
		$this->display();
	}

	/**
	 * 修改密码
	 */
	public function edit() {
		//数据验证
		$data = $_POST;
		if($data['admin_new_pass'] != $data['admin_new_repass']) {
			$this->ajaxReturn(array('msg'=>'两次密码输入不一致!', 'code'=>'201'), 'json');
		}

		//检查密码
		$admin_id 	= session('admin_id');
		$admin_pass = D('Common')->getField('Admin', array('admin_id'=>$admin_id), 'admin_pass');
		if($admin_pass != C('MD5_PREFIX').md5($data['admin_pass'])) {
			$this->ajaxReturn(array('msg'=>'原密码输入错误!', 'code'=>'201'), 'json');
		}

		//数据更新
		$admin_new_pass = C('MD5_PREFIX').md5($data['admin_new_pass']);
		$res = D('Common')->edit('Admin', array('admin_id'=>$admin_id), array('admin_pass'=>$admin_new_pass));
		if(!$res) {
			$this->ajaxReturn(array('msg'=>'修改密码失败!', 'code'=>'201'), 'json');
		} 
		$this->ajaxReturn(array('msg'=>'修改密码成功!', 'code'=>'200'), 'json');
	}


}

?>