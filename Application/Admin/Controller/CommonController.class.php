<?php 
namespace Admin\Controller;
use Think\Controller;

/**
 * 公共模块
 */

class CommonController extends Controller
{
	public function __construct() {
		parent::__construct();
		$this->init();

		
		$res = D('Common')->auth();
		if(!$res) {
			if(IS_AJAX) {
				$this->ajaxReturn(array('msg'=>'没有操作权限!', 'code'=>'201'), 'json');
			} else {
				$this->error('没有操作权限! <br><span style="color:gray;">正在跳转...</span>');
			}
		}
		
	}

	/**
	 * 如果没有登录返回登录界面
	 */
	public function init() {
		$isLogin = $this->isLogin();
		if(!$isLogin) {
			$this->error('请先登录! <br><span style="color:gray;">正在跳转...</span>', U('Login/index'));
		}
	}

	/**
	 * 判断是否登录
	 */
	public function isLogin() {
		$isLogin = session('isLogin');
		if($isLogin) {
			return true;
		}
		return false;
	}

}

?>