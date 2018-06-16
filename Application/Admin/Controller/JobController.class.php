<?php 
namespace Admin\Controller;
use Think\Controller;

/**
 * 招聘模块
 */

class JobController extends CommonController
{
	/**
	 * 列表
	 */
	public function index() {
		$field = 'job_id, job_name, job_where, job_num, job_sort, job_status';
		$list  = D('Common')->infosOrder('Job', array('nav_pid'=>0), $field, 'job_sort, job_id');

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

		$res = D('Common')->add('Job', $data);
		if($res) {
			$this->html();
			$this->ajaxReturn(array('msg'=>'添加成功!', 'code'=>'200'), 'json');
		} else {
			$this->ajaxReturn(array('msg'=>'添加失败!', 'code'=>'201'), 'json');
		}
	}

	/**
	 * 删除
	 */
	public function del() {
		$job_id 	= intval($_POST['data']);

		$where 		= array('job_id'=>$job_id);
		$res 		= D('Common')->del('Job', $where);

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
		$job_ids 	= $_POST['data'];
		$where 		= array('job_id'=>array('in', $job_ids));
		$res 		= D('Common')->del('Job', $where);

		if($res) {
			$this->html();
			$this->ajaxReturn(array('msg'=>'删除成功!', 'code'=>'200'), 'json');
		} else {
			$this->ajaxReturn(array('msg'=>'删除失败!', 'code'=>'201'), 'json');
		}
	}

	/**
	 * 编辑-页面
	 */
	public function edit() {
		$job_id 	= intval($_GET['job_id']);
		$info       = D('Common')->info('Job', array('job_id'=>$job_id));

		$this->assign('info', $info);
		$this->display();
	}

	/**
	 * 编辑-数据
	 */
	public function editData() {
		$data = $_POST;
		$where = array('job_id'=>$data['job_id']);
		unset($data['job_id']);
		
		$res = D('Common')->edit('Job', $where, $data);
		if($res) {
			$this->html();
			$this->ajaxReturn(array('msg'=>'数据更新成功!', 'code'=>'200'), 'json');
		} else {
			$this->ajaxReturn(array('msg'=>'数据更新失败!', 'code'=>'201'), 'json');
		}
	}

	/**
	 * 排序
	 */
	public function sort() {
		$where 	= array('job_id' 	=> $_POST['job_id']);
		$data 	= array('job_sort' 	=> $_POST['job_sort']);

		$res = D('Common')->edit('Job', $where, $data);
		if($res) {
			$this->ajaxReturn(array('msg'=>'排序更新成功!', 'code'=>'200'), 'json');
		} else {
			$this->ajaxReturn(array('msg'=>'排序更新失败!', 'code'=>'201'), 'json');
		}
	}

	/**
	 * 更改状态
	 */
	public function status() {
		$where 	= array('job_id' 	=> $_POST['data']);
		$status = D('Common')->getField('Job', $where, 'job_status');
		
		if($status == 0) {
			$data = array('job_status'=>1);
			$msg = '已停止该职位的招聘!';
		} else {
			$data = array('job_status'=>0);
			$msg = '已开启该职位的招聘!';
		}

		$res = D('Common')->edit('Job', $where, $data);
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
		$html->jobHtml();
	}


}


?>