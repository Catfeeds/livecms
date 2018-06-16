<?php 
namespace Admin\Controller;
use Think\Controller;

/**
 * 导航模块
 */

class NavController extends CommonController
{
	/**
	 * 列表
	 */
	public function index() {
		$listA = D('Common')->infosOrder('Nav', array('nav_pid'=>0), '*', 'nav_sort, nav_id');					//一级导航
		$listB = D('Common')->infosOrder('Nav', array('nav_pid'=>array('neq', 0)), '*', 'nav_sort, nav_id');	//二级导航

		$this->assign('listA', $listA);
		$this->assign('listB', $listB);
		$this->display();
	}

	/**
	 * 添加-页面
	 */
	public function add() {
		$list = D('Common')->infos('Nav', array('nav_pid'=>0), 'nav_id, nav_name');

		$this->assign('list', $list);
		$this->display();
	}

	/**
	 * 添加-数据
	 */
	public function addData() {
		$data = $_POST;
		
		$res = D('Common')->add('Nav', $data);
		if($res) {
			$this->ajaxReturn(array('msg'=>'添加成功!', 'code'=>'200'), 'json');
		} else {
			$this->ajaxReturn(array('msg'=>'添加失败!', 'code'=>'201'), 'json');
		}
	}

	/**
	 * 删除
	 */
	public function del() {
		$nav_id = intval($_POST['data']);

		//如果是一级导航,并且下面有二级导航,则删除失败
		$info = D('Common')->info('Nav', array('nav_id'=>$nav_id), 'nav_pid');
		if($info['nav_pid'] == 0) {
			$res = D('Common')->info('Nav', array('nav_pid'=>$nav_id), 'nav_id');
			if($res) {
				$this->ajaxReturn(array('msg'=>'请先删除二级导航!', 'code'=>'201'), 'json');
			}
		}

		$where 		= array('nav_id'=>$nav_id);
		$res 		= D('Common')->del('Nav', $where);

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
		$nav_id 	= intval($_GET['nav_id']);
		$list 		= D('Common')->infos('Nav', array('nav_pid'=>0), 'nav_id, nav_name');
		$info       = D('Common')->info('Nav', array('nav_id'=>$nav_id));

		$this->assign('list', $list);
		$this->assign('info', $info);
		$this->display();
	}

	/**
	 * 编辑-数据
	 */
	public function editData() {
		$data = $_POST;
		$where = array('nav_id'=>$data['nav_id']);
		unset($data['nav_id']);
		
		$res = D('Common')->edit('Nav', $where, $data);
		if($res) {
			$this->ajaxReturn(array('msg'=>'数据更新成功!', 'code'=>'200'), 'json');
		} else {
			$this->ajaxReturn(array('msg'=>'数据更新失败!', 'code'=>'201'), 'json');
		}
	}

	/**
	 * 排序
	 */
	public function sort() {
		$where 	= array('nav_id' 	=> $_POST['nav_id']);
		$data 	= array('nav_sort' 	=> $_POST['nav_sort']);

		$res = D('Common')->edit('Nav', $where, $data);
		if($res) {
			$this->ajaxReturn(array('msg'=>'排序更新成功!', 'code'=>'200'), 'json');
		} else {
			$this->ajaxReturn(array('msg'=>'排序更新失败!', 'code'=>'201'), 'json');
		}
	}
}

?>