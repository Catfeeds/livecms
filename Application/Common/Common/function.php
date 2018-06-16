<?php 

/**
 * 公共函数
 */

function dataToArray($data) {
	$dataToArray = array();
	foreach($data as $k => $v) {
		$dataToArray[$k] = $v;
	}
	file_put_contents('./1.txt', print_r($dataToArray, true));
	return $data;
}

/**
 * 验证验证码
 */
function checkVerify($code, $id = '') {    
	$verify = new \Think\Verify();    
	return $verify->check($code, $id);
}

/**
 * 系统基本信息
 * @return array
 */
function basicInfo() {
	$basicInfo = array();
	$basicInfo['system'] 	= PHP_OS;
	$basicInfo['server'] 	= $_SERVER['SERVER_SOFTWARE'];
	$basicInfo['version'] 	= 'V1.0';
	$basicInfo['filesize'] 	= get_cfg_var("upload_max_filesize") ? get_cfg_var("upload_max_filesize") : "不允许上传附件";
	$basicInfo['time']		= date('Y/m/d H:i:s');
	$basicInfo['ip']		= $_SERVER['SERVER_ADDR'];
	return $basicInfo;
}

/**
 * 密码加密
 * @param string $pass 密码
 * @return string 加密后的密码
 */
function encrypt($pass) {
	return C('MD5_PREFIX').md5($pass);
}

?>