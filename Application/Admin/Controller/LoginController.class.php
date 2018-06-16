<?php 
namespace Admin\Controller;
use Think\Controller;

/**
 * 登录模块
 */

class LoginController extends Controller
{
	public function index() {
		$this->display();
	}

	/**
	 * 生成验证码
	 */
	public function verify() {
		$config = array('length' => 4, 'fontSize' => 50);
		$Verify = new \Think\Verify($config);
		$Verify->entry();
	}

	/**
	 * 登录验证
	 */
	public function check() {
		//数据验证
		$data = dataToArray($_POST);
		foreach($data as $k => $v) {
			if(!trim($v)) {
				$this->ajaxReturn(array('msg'=>'数据填写不完整!', 'code'=>'201'), 'json');
			}
		}
		if(!checkVerify($data['verifyCode'])) {
			$this->ajaxReturn(array('msg'=>'验证码错误!', 'code'=>'201'), 'json');
		}

		$where = array('admin_name'=>$data['admin_name'], 'admin_pass'=>C('MD5_PREFIX').md5($data['admin_pass']));
		$res = D('Common')->info('Admin', $where, 'admin_id, admin_name');
		if($res) {
			session('isLogin', 1);
			session('admin_id', $res['admin_id']);
			session('admin_name', $res['admin_name']);
			$this->ajaxReturn(array('msg'=>'登录成功!', 'code'=>'200'), 'json');
		} else {
			$this->ajaxReturn(array('msg'=>'用户名或密码错误!', 'code'=>'201'), 'json');
		}

	}

	/**
	 * 退出登录
	 */
	public function logout() {
		//清除所有session
		session(null);

		$this->ajaxReturn(array('msg'=>'退出成功!', 'code'=>'200'), 'json');
	}

	
}

?>