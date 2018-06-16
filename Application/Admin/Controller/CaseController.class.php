<?php  
namespace Admin\Controller;
use Think\Controller;

/**
 * 客户案例模块
 */

class CaseController extends CommonController
{
	/**
	 * 列表
	 */
	public function index() {
		$res = D('Common')->datalist('Case', array(), '*', 'case_sort, case_id');			

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

		$res  = D('Common')->add('Case', $data);
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
		$case_id 	= intval($_GET['case_id']);
		$info       = D('Common')->info('Case', array('case_id'=>$case_id));

		$this->assign('info', $info);
		$this->display();
	}

	/**
	 * 编辑-数据
	 */
	public function editData() {
		$data 	= $_POST;
		$where 	= array('case_id'=>$data['case_id']);
		unset($data['case_id']);
		
		$res = D('Common')->edit('Case', $where, $data);
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
		$where 	= array('case_id' 	=> $_POST['case_id']);
		$data 	= array('case_sort' => $_POST['case_sort']);

		$res = D('Common')->edit('Case', $where, $data);
		if($res) {
			$this->html();
			$this->ajaxReturn(array('msg'=>'排序更新成功!', 'code'=>'200'), 'json');
		} else {
			$this->ajaxReturn(array('msg'=>'排序更新失败!', 'code'=>'201'), 'json');
		}
	}

	/**
	 * 删除
	 */
	public function del() {
		$case_id 	= intval($_POST['data']);

		$where 		= array('case_id'=>$case_id);
		$res 		= D('Common')->del('Case', $where);

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
		$case_ids 	= $_POST['data'];
		$where 		= array('case_id'=>array('in', $case_ids));
		$res 		= D('Common')->del('Case', $where);

		if($res) {
			$this->html();
			$this->ajaxReturn(array('msg'=>'删除成功!', 'code'=>'200'), 'json');
		} else {
			$this->ajaxReturn(array('msg'=>'删除失败!', 'code'=>'201'), 'json');
		}
	}

	/**
	 * 生成静态HTML
	 */
	public function html() {
		$html = new \Admin\Controller\HomeController();
		$html->indexHtml();
		$html->clientHtml();
	}

}

?>