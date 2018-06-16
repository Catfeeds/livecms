<?php  
namespace Admin\Controller;
use Think\Controller;

/**
 * 更新缓存
 */

class RuntimeController extends CommonController
{
	public function index() {
		$this->display();
	}


	public function update() {
		$html = new \Admin\Controller\HomeController();
		$html->indexHtml();
		$html->msgHtml();
		$html->usHtml();
		$html->contactHtml();
		$html->jobHtml();
		$html->clientHtml();
		$art_ids = D('Common')->infos('Article', array(), 'art_id');
		foreach($art_ids as $key => $value) {
			$html->detailHtml($value['art_id']);
		}
		$this->ajaxReturn(array('msg'=>'缓存更新成功!', 'code'=>'200'), 'json');
	}
}

?>