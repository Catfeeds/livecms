<?php  
namespace Admin\Controller;
use Think\Controller;

/**
 * 友情链接模块
 */

class LinkController extends CommonController 
{
	/**
	 * 列表
	 */
	public function index() {
		$res = D('Common')->datalist('Link', array(), '*', 'link_sort, link_id');			

		$this->assign('list', $res['list']);
		$this->assign('page', $res['page']);
		$this->assign('count', $res['count']);
		$this->display();
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

		$res = D('Common')->add('Link', $data);
		if($res) {
			$this->ajaxReturn(array('msg'=>'添加成功!', 'code'=>'200'), 'json');
		} else {
			$this->ajaxReturn(array('msg'=>'添加失败!', 'code'=>'201'), 'json');
		}
	}

	/**
	 * 排序
	 */
	public function sort() {
		$where 	= array('link_id' 	=> $_POST['link_id']);
		$data 	= array('link_sort' => $_POST['link_sort']);

		$res = D('Common')->edit('Link', $where, $data);
		if($res) {
			$this->ajaxReturn(array('msg'=>'排序更新成功!', 'code'=>'200'), 'json');
		} else {
			$this->ajaxReturn(array('msg'=>'排序更新失败!', 'code'=>'201'), 'json');
		}
	}

	/**
	 * 删除
	 */
	public function del() {
		$link_id 	= intval($_POST['data']);

		$where 		= array('link_id'=>$link_id);
		$res 		= D('Common')->del('Link', $where);

		if($res) {
			$this->ajaxReturn(array('msg'=>'删除成功!', 'code'=>'200'), 'json');
		} else {
			$this->ajaxReturn(array('msg'=>'删除失败!', 'code'=>'201'), 'json');
		}
	}

	/**
	 * 批量删除
	 */
	public function dels() {
		$link_ids 	= $_POST['data'];
		$where 		= array('link_id'=>array('in', $link_ids));
		$res 		= D('Common')->del('Link', $where);

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
		$link_id 	= intval($_GET['link_id']);
		$info       = D('Common')->info('Link', array('link_id'=>$link_id));

		$this->assign('info', $info);
		$this->display();
	}

	/**
	 * 编辑-数据
	 */
	public function editData() {
		$data 	= $_POST;
		$where 	= array('link_id'=>$data['link_id']);
		unset($data['link_id']);
		
		$res = D('Common')->edit('Link', $where, $data);
		if($res) {
			$this->ajaxReturn(array('msg'=>'数据更新成功!', 'code'=>'200'), 'json');
		} else {
			$this->ajaxReturn(array('msg'=>'数据更新失败!', 'code'=>'201'), 'json');
		}
	}

}


?>