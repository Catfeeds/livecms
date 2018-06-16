<?php  
namespace Admin\Controller;
use Think\Controller;

/**
 * 前台模块
 */

class HomeController extends CommonController
{
	/**
	 * 首页
	 */
	public function index($type = '') {
		//公共部分
		$res = D('Common')->common();
		foreach($res as $key=>$value) {
			$this->assign($key, $value);
		}

		//轮播
		$banner = D('Common')->infosOrder('Banner', array('banner_status'=>0), 'banner_img, banner_href', 'banner_sort, banner_id');
		$this->assign('banner', $banner);

		//客户案例
		$case = D('Common')->infosOrderLimit('Case', array(), 'case_title, case_img', 'case_sort, case_id', 8);
		$this->assign('case', $case);

		//动态
		$article = D('Common')->infosOrderLimit('Article', array(), 'art_id, art_title, art_time', 'art_sort, art_id', 5);
		$this->assign('article', $article);

		if($type == 'buildHtml') {
			$this->buildHtml('index', C('HTML_PATH'), 'Home/index');
		} else {
			$this->display(); 
		}
    }

    /**
     * 客户案例
     */
    public function client($type = '') {
    	//公共部分

		$res = D('Common')->common();
		foreach($res as $key=>$value) {
			$this->assign($key, $value);
		}

    	$case = D('Common')->infosOrder('Case', array(), 'case_title, case_img', 'case_sort, case_id');
    	$this->assign('case', $case);

    	if($type == 'buildHtml') {
    		$this->buildHtml('client', C('HTML_PATH'), 'Home/client');
    	} else {
    		$this->display();
    	}
    }

    /**
     * 新闻详情
     */
    public function detail($type = '', $art_id = 0) {
    	//公共部分
		$res = D('Common')->common();
		foreach($res as $key=>$value) {
			$this->assign($key, $value);
		}

		if(!$art_id) {
			$art_id = intval($_REQUEST['id']);
		}
    	
    	$info = D('Common')->info('Article', array('art_id'=>$art_id), '*');

    	$this->assign('info', $info);

    	if($type == 'buildHtml') {
    		$this->buildHtml('art-'.$art_id, C('HTML_PATH').'/news/', 'Home/detail');
    	} else {
    		$this->display();
    	}
    }

    /**
     * 在线留言
     */
    public function msg($type = '') {
    	//公共部分
		$res = D('Common')->common();
		foreach($res as $key=>$value) {
			$this->assign($key, $value);
		}
		if($type == 'buildHtml') {
			$this->buildHtml('msg', C('HTML_PATH'), 'Home/msg');
		} else {
			$this->display();
		}
    }

    /**
     * 公司简介
     */
    public function us($type = '') {
    	//公共部分
		$res = D('Common')->common();
		foreach($res as $key=>$value) {
			$this->assign($key, $value);
		}

		if($type == 'buildHtml') {
			$this->buildHtml('us', C('HTML_PATH'), 'Home/us');
		} else {
			$this->display();
		}
    }

    /**
     * 联系我们
     */
    public function contact($type = '') {
    	//公共部分
		$res = D('Common')->common();
		foreach($res as $key=>$value) {
			$this->assign($key, $value);
		}
		
		if($type == 'buildHtml') {
			$this->buildHtml('contact', C('HTML_PATH'), 'Home/contact');
		} else {
			$this->display();
		}
    }

    /**
     * 人才招聘
     */
    public function job($type = '') {
    	//公共部分
		$res = D('Common')->common();
		foreach($res as $key=>$value) {
			$this->assign($key, $value);
		}
		
		//职位
		$list = D('Common')->infosOrder('Job', array('job_status'=>0), '*', 'job_sort, job_id');
		$this->assign('list', $list);

		//邮箱
		$mail = D('Common')->getField('Config', array(), 'config_firm_mail');
		$mail = str_replace('@', '#', $mail);

		$this->assign('mail', $mail);

		if($type == 'buildHtml') {
			$this->buildHtml('job', C('HTML_PATH'), 'Home/job');
		} else {
			$this->display();
		}
    }


    /**
     * 首页生成静态HTML
     */
    public function indexHtml() {
    	$this->index('buildHtml');
    }

    /**
     * 在线留言生成静态HTML
     */
    public function msgHtml() {
    	$this->msg('buildHtml');
    }

    /**
     * 公司简介生成静态HTML
     */
    public function usHtml() {
    	$this->us('buildHtml');
    }

    /**
     * 联系我们生成静态HTML
     */
    public function contactHtml() {
    	$this->contact('buildHtml');
    }

    /**
     * 人才招聘生成静态HTML
     */
    public function jobHtml() {
    	$this->job('buildHtml');
    }

    /**
     * 客户案例生成静态HTML
     */
    public function clientHtml() {
    	$this->client('buildHtml');
    }

    /**
     * 新闻详情生成静态HTML
     */
    public function detailHtml($art_id) {
    	$this->detail('buildHtml', $art_id);
    }
}

?>