<?php  
namespace Admin\Controller;
use Think\Controller;

/**
 * 文章模块
 */	

class ArticleController extends CommonController
{

	/**
	 * 文章列表
	 */
	public function index() {
		//搜索条件 ThinkPHP搜索分页必须用get方式
		$where = array();
		if($_REQUEST['start']) {
			$where['art_time'] = array('gt', strtotime($_REQUEST['start']));
			$this->assign('start', $_REQUEST['start']);
		}
		if($_REQUEST['end']) {
			$where['art_time'] = array('lt', strtotime($_REQUEST['end'])+86399);
			$this->assign('end', $_REQUEST['end']);
		}
		if($_REQUEST['keywords']) {
			$where['art_title'] = array('like', "%".$_REQUEST['keywords']."%");
			$this->assign('keywords', $_REQUEST['keywords']);
		}
		$res = D('Common')->datalist('Article', $where, 'art_id, art_title, art_editor, art_time, art_sort', 'art_sort, art_id desc');

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
		$data['art_time'] = time();

		$res = D('Common')->add('Article', $data);
		if($res) {
			$this->html($res);
			$this->ajaxReturn(array('msg'=>'添加成功!', 'code'=>'200'), 'json');
		} else {
			$this->ajaxReturn(array('msg'=>'添加失败!', 'code'=>'201'), 'json');
		}
	}

	/**
	 * 删除
	 */
	public function del() {
		$art_id 	= intval($_POST['data']);
		$res 		= D('Common')->del('Article', array('art_id'=>$art_id));

		if($res) {
			$this->delHtml($art_id);
			$this->ajaxReturn(array('msg'=>'删除成功!', 'code'=>'200'), 'json');
		} else {
			$this->ajaxReturn(array('msg'=>'删除失败!', 'code'=>'201'), 'json');
		}
	}

	/**
	 * 批量删除
	 */
	public function dels() {
		$art_ids 	= $_POST['data'];
		$where 		= array('art_id'=>array('in', $art_ids));
		$res 		= D('Common')->del('Article', $where);

		if($res) {
			$this->delHtml($art_ids);
			$this->ajaxReturn(array('msg'=>'删除成功!', 'code'=>'200'), 'json');
		} else {
			$this->ajaxReturn(array('msg'=>'删除失败!', 'code'=>'201'), 'json');
		}
	}

	/**
	 * 编辑-页面
	 */
	public function edit() {
		$art_id 	= intval($_GET['art_id']);
		$info 		= D('Common')->info('Article', array('art_id'=>$art_id));

		$this->assign('info', $info);
		$this->display();
	}

	/**
	 * 编辑-数据
	 */
	public function editData() {
		$data  	= $_POST;
		$where 	= array('art_id'=>$data['art_id']);
		$art_id = $data['art_id'];
		unset($data['art_id']);

		$res   = D('Common')->edit('Article', $where, $data);
		if($res) {
			$this->html($art_id);
			$this->ajaxReturn(array('msg'=>'数据更新成功!', 'code'=>'200'), 'json');
		} else {
			$this->ajaxReturn(array('msg'=>'数据更新失败!', 'code'=>'201'), 'json');
		}
	}

	/**
	 * 排序
	 */
	public function sort() {
		$where = array('art_id'=>$_POST['art_id']);
		$data  = array('art_sort'=>$_POST['art_sort']);

		$res   = D('Common')->edit('Article', $where, $data);
		if($res) {
			$this->ajaxReturn(array('msg'=>'排序更新成功!', 'code'=>'200'), 'json');
		} else {
			$this->ajaxReturn(array('msg'=>'排序更新失败!', 'code'=>'201'), 'json');
		}
	}

	/**
	 * 缩略图上传
	 */
	public function uploadImage() {
		$upload = D('UploadImage');
		$res    = $upload->uploadImage();
		if($res['code'] == '201') {
			$this->ajaxReturn(array('msg'=>'上传失败!'.$res['msg'], 'code'=>'201'), 'json');
		} else {
			$this->ajaxReturn(array('msg'=>'上传成功!', 'code'=>'200', 'file'=>$res['msg']), 'json');
		}
	}


	/**
	 * 新闻详情生成静态HTML
	 */
	public function html($art_id) {
		$html = new \Admin\Controller\HomeController();
		$html->detailHtml($art_id);
	}

	/**
	 * 删除文章时候同时删除静态HTML
	 */
	public function delHtml($art_id) {
		if(is_numeric($art_id)) {
			$file = C('HTML_PATH').'news/art-'.$art_id.'.html';
			unlink($file);
		} else {
			$art_id_arr = explode(',', $art_id);
			foreach($art_id_arr as $key => $value) {
				$file = C('HTML_PATH').'news/art-'.$value.'.html';
				unlink($file);
			}
		}
	}

}

?>