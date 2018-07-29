<?php  
namespace Admin\Controller;
use Think\Controller;

/**
 * 留言模块
 */

class MsgController extends Controller
{
	/**
	 * 列表
	 */
	public function index() {
		//搜索条件 ThinkPHP搜索分页必须用get方式
		$where = array();

		//日期
		if($_REQUEST['start'] && $_REQUEST['end']) {
			$where['msg_time'] = array('between', strval(strtotime($_REQUEST['start'])).','.strval(strtotime($_REQUEST['end'])+86399));
			$this->assign('start', $_REQUEST['start']);
			$this->assign('end', $_REQUEST['end']);
		} else if($_REQUEST['start']) {
			$where['msg_time'] = array('gt', strtotime($_REQUEST['start']));
			$this->assign('start', $_REQUEST['start']);
		} else if($_REQUEST['end']) {
			$where['msg_time'] = array('lt', strtotime($_REQUEST['end'])+86399);
			$this->assign('end', $_REQUEST['end']);
		}
		
		//状态
		if(isset($_REQUEST['msg_status']) && $_REQUEST['msg_status'] === '0') {
			$where['msg_status'] = 0;
			$this->assign('msg_status', 0);	
		}
		if(isset($_REQUEST['msg_status']) && $_REQUEST['msg_status'] === '1') {
			$where['msg_status'] = 1;
			$this->assign('msg_status', 1);	
		}
		
		$res = D('Common')->datalist('Msg', $where, '*', 'msg_id desc');

		$this->assign('list', $res['list']);
		$this->assign('page', $res['page']);
		$this->assign('count', $res['count']);
		$this->display();
	}

	/**
	 * 删除
	 */
	public function del() {
		$msg_id = intval($_POST['data']);

		$where 		= array('msg_id'=>$msg_id);
		$res 		= D('Common')->del('Msg', $where);

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
		$msg_ids 	= $_POST['data'];
		$where 		= array('msg_id'=>array('in', $msg_ids));
		$res 		= D('Common')->del('Msg', $where);

		if($res) {
			$this->ajaxReturn(array('msg'=>'删除成功!', 'code'=>'200'), 'json');
		} else {
			$this->ajaxReturn(array('msg'=>'删除失败!', 'code'=>'201'), 'json');
		}
	}

	/**
	 * 更改状态
	 */
	public function status() {
		$where 	= array('msg_id' 	=> $_POST['data']);
		$status = D('Common')->getField('Msg', $where, 'msg_status');
		
		if($status == 0) {
			$data = array('msg_status'=>1);
			$msg = '已处理该留言!';
		} else {
			$data = array('msg_status'=>0);
			$msg = '未处理该留言!';
		}

		$res = D('Common')->edit('Msg', $where, $data);
		if($res) {
			$this->ajaxReturn(array('msg'=>$msg, 'code'=>'200'), 'json');
		} else {
			$this->ajaxReturn(array('msg'=>'操作失败!', 'code'=>'201'), 'json');
		}
	}

}

?>