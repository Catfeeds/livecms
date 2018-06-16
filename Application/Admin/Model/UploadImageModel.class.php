<?php 
namespace Admin\Model;
use Think\Model;

/**
 * 图片上传
 */

class UploadImageModel extends Model
{
	private $_uploadObj = '';

	const UPLOAD = 'upload';

	public function __construct() {
		$this->_uploadObj = new \Think\Upload();
		$this->_uploadObj->rootPath = './'.self::UPLOAD.'/';
		$this->_uploadObj->subName = date(Y).'/'.date(m).'/'.date(d);
	}

	public function uploadImage() {
		$res = $this->_uploadObj->upload();

		if($res) {
			$res['code'] = '200';
			$res['msg'] = self::UPLOAD.'/'.$res['file']['savepath'].$res['file']['savename'];
			return $res;
		} else {
			$res['code'] = '201';
			$res['msg'] = $this->_uploadObj->getError();
			return $res;
		}
	}

	public function uploadKindeditor() {
		$res = $this->_uploadObj->upload();

		if($res) {
			return self::UPLOAD.'/'.$res['imgFile']['savepath'].$res['imgFile']['savename'];
		} else {
			return false;
		}
	}
}

?>