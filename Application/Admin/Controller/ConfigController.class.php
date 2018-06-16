<?php 
namespace Admin\Controller;
use Think\Controller;

/**
 * 配置模块
 */

class ConfigController extends CommonController
{
	/**
	 * 网站信息
	 */
	public function index() {
		$field = 'config_web_name, config_web_stat, config_web_copyright, config_web_record';
		$info = D('Common')->info('Config', array(), $field);

		$this->assign('info', $info);
		$this->display();
	}

	/**
	 * SEO设置
	 */
	public function seo() {
		$field = 'config_seo_title, config_seo_keywords, config_seo_desc';
		$info = D('Common')->info('Config', array(), $field);

		$this->assign('info', $info);
		$this->display();
	}

	/**
	 * 企业信息
	 */
	public function firm() {
		$field = 'config_firm_name, config_firm_location, config_firm_phone, config_firm_fax, config_firm_mail';
		$info = D('Common')->info('Config', array(), $field);

		$this->assign('info', $info);
		$this->display();
	}

	/**
	 * 客服设置
	 */
	public function service() {
		$field = 'config_service_phone, config_service_qq';
		$info = D('Common')->info('Config', array(), $field);

		$this->assign('info', $info);
		$this->display();
	}

	/**
	 * 编辑-数据
	 */
	public function editData() {
		$data = $_POST;
		$res = D('Common')->edit('Config', array(), $data);
		if($res) {
			$this->ajaxReturn(array('msg'=>'数据更新成功!', 'code'=>'200'), 'json');
		} else {
			$this->ajaxReturn(array('msg'=>'数据更新失败!', 'code'=>'201'), 'json');
		}
	}
}


?>