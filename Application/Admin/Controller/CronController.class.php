<?php 
namespace Admin\Controller;
use Think\Controller;

/**
 * crontab定时任务模块
 */
 
class CronController extends Controller
{
	//数据库备份
	public function dump() {
		$shell = "/opt/lampp/bin/mysqldump -u ".C("DB_USER")." " .C("DB_NAME")." > /tmp/live_".time().".sql";
    	exec($shell);
	}
	
}

?>



