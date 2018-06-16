<?php  
namespace Admin\Controller;
use Think\Controller;

/**
 * Banner模块
 */

class BannerController extends CommonController 
{
	/**
	 * 列表
	 */
	public function index() {
		$list = D('Common')->infosOrder('Banner', array(), '*', 'banner_sort, banner_id');			

		$this->assign('list', $list);
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

		$res  = D('Common')->add('Banner', $data);
		if($res) {
			$this->html();
			$this->ajaxReturn(array('msg'=>'添加成功!', 'code'=>'200'), 'json');
		} else {
			$this->ajaxReturn(array('msg'=>'添加失败!', 'code'=>'201'), 'json');
		}
	}

	/**
	 * 编辑-页面
	 */
	public function edit() {
		$banner_id 	= intval($_GET['banner_id']);
		$info       = D('Common')->info('Banner', array('banner_id'=>$banner_id));

		$this->assign('info', $info);
		$this->display();
	}

	/**
	 * 编辑-数据
	 */
	public function editData() {
		$data = $_POST;
		$where = array('banner_id'=>$data['banner_id']);
		unset($data['banner_id']);
		
		$res = D('Common')->edit('Banner', $where, $data);
		if($res) {
			$this->html();
			$this->ajaxReturn(array('msg'=>'数据更新成功!', 'code'=>'200'), 'json');
		} else {
			$this->ajaxReturn(array('msg'=>'数据更新失败!', 'code'=>'201'), 'json');
		}
	}

	/**
	 * 删除
	 */
	public function del() {
		$banner_id = intval($_POST['data']);

		$where 		= array('banner_id'=>$banner_id);
		$res 		= D('Common')->del('Banner', $where);

		if($res) {
			$this->html();
			$this->ajaxReturn(array('msg'=>'删除成功!', 'code'=>'200'), 'json');
		} else {
			$this->ajaxReturn(array('msg'=>'删除失败!', 'code'=>'201'), 'json');
		}
	}

	/**
	 * 批量删除
	 */
	public function dels() {
		$banner_ids = $_POST['data'];
		$where 		= array('banner_id'=>array('in', $banner_ids));
		$res 		= D('Common')->del('Banner', $where);

		if($res) {
			$this->html();
			$this->ajaxReturn(array('msg'=>'删除成功!', 'code'=>'200'), 'json');
		} else {
			$this->ajaxReturn(array('msg'=>'删除失败!', 'code'=>'201'), 'json');
		}
	}

	/**
	 * 排序
	 */
	public function sort() {
		$where 	= array('banner_id' 	=> $_POST['banner_id']);
		$data 	= array('banner_sort' 	=> $_POST['banner_sort']);

		$res = D('Common')->edit('Banner', $where, $data);
		if($res) {
			$this->html();
			$this->ajaxReturn(array('msg'=>'排序更新成功!', 'code'=>'200'), 'json');
		} else {
			$this->ajaxReturn(array('msg'=>'排序更新失败!', 'code'=>'201'), 'json');
		}
	}

	/**
	 * 更改状态
	 */
	public function status() {
		$where 	= array('banner_id' => $_POST['data']);
		$status = D('Common')->getField('Banner', $where, 'banner_status');
		
		if($status == 0) {
			$data = array('banner_status'=>1);
			$msg  = '更新成功!';
		} else {
			$data = array('banner_status'=>0);
			$msg  = '更新成功!';
		}

		$res = D('Common')->edit('Banner', $where, $data);
		if($res) {
			$this->html();
			$this->ajaxReturn(array('msg'=>$msg, 'code'=>'200'), 'json');
		} else {
			$this->ajaxReturn(array('msg'=>'操作失败!', 'code'=>'201'), 'json');
		}
	}

	/**
	 * 生成静态HTML
	 */
	public function html() {
		$html = new \Admin\Controller\HomeController();
		$html->indexHtml();
	}

}


?>