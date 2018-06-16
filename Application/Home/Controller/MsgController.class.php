<?php
namespace Home\Controller;
use Think\Controller;

/**
 * 前台留言
 */

class MsgController extends Controller 
{
	/**
	 * 添加-数据
	 */
	public function addData() {
		$data = $_POST;
		$data['msg_time'] = time();

		$res  = D('Common')->add('Msg', $data);
		if($res) {
			$this->ajaxReturn(array('msg'=>'添加成功!', 'code'=>'200'), 'json');
		} else {
			$this->ajaxReturn(array('msg'=>'添加失败!', 'code'=>'201'), 'json');
		}
	}

}
