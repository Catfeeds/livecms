<?php 
namespace Admin\Model;
use Think\Model;

class CommonModel extends Model
{
	private $_db1 = '';

	public function __construct() {
		$this->_db1 = M('Admin');
	}

	/**
	 * 封装db基本操作(删除)
	 * @param string $table 数据表名
	 * @param mixed $where 条件
	 * @return mixed $res 返回结果
	 */
	public function del($table, $where) {
		$this->_db = M($table);
		$res = $this->_db->where($where)->delete();
		return $res;
	}

	/**
	 * 封装db基本操作(添加)
	 * @param string $table 数据表名
	 * @param mixed $where 条件
	 * @return mixed $res 返回结果
	 */
	public function add($table, $data) {
		$this->_db = M($table);
		$res = $this->_db->data($data)->add();
		return $res;
	}

	/**
	 * 封装db基本操作(编辑)
	 * @param string $table 数据表名
	 * @param mixed $where 条件
	 * @return mixed $res 返回结果
	 */
	public function edit($table, $where, $data) {
		$this->_db = M($table);
		$res = $this->_db->where($where)->save($data);
		return $res;
	}

	/**
	 * 封装db基本操作(单条信息)
	 * @param string $table 数据表名
	 * @param array $where 条件
	 * @param string $field 字段
	 * @return array $res 返回结果
	 */
	public function info($table, $where = array(), $field = '*') {
		$this->_db = M($table);
		$res = $this->_db->where($where)->field($field)->find();
		return $res;
	}

	/**
	 * 封装db基本操作(指定字段)
	 * @param string $table 数据表名
	 * @param array $where 条件
	 * @param string $field 字段
	 * @return array $res 返回结果
	 */
	public function getField($table, $where = array(), $field = '') {
		$this->_db = M($table);
		$res = $this->_db->where($where)->getField($field);
		return $res;
	}

	/**
	 * 封装db基本操作(指定sql)
	 * @param string $table 数据表名
	 * @param string $sql sql语句
	 * @return array $res 返回结果
	 */
	public function query($table, $sql='') {
		$this->_db = M($table);
		$res = $this->_db->query($sql);
		return $res;
	}

	/**
	 * 封装db基本操作(多条信息)
	 * @param string $table 数据表名
	 * @param array $where 条件
	 * @param string $field 字段
	 * @return array $res 返回结果
	 */
	public function infos($table, $where = array(), $field = '*') {
		$this->_db = M($table);
		$res = $this->_db->where($where)->field($field)->select();
		return $res;
	}

	/**
	 * 封装db基本操作(多条信息带排序)
	 * @param string $table 数据表名
	 * @param array $where 条件
	 * @param string $field 字段
	 * @param string $sort 排序条件
	 * @return array $res 返回结果
	 */
	public function infosOrder($table, $where = array(), $field = '*', $sort = '') {
		$this->_db = M($table);
		$res = $this->_db->where($where)->field($field)->order($sort)->select();
		return $res;
	}

	/**
	 * 封装db基本操作(多条信息带排序带条数)
	 * @param string $table 数据表名
	 * @param array $where 条件
	 * @param string $field 字段
	 * @param string $sort 排序条件
	 * @param integer $limit 数据条数
	 * @return array $res 返回结果
	 */
	public function infosOrderLimit($table, $where = array(), $field = '*', $sort = '', $limit = 5) {
		$this->_db = M($table);
		$res = $this->_db->where($where)->field($field)->order($sort)->limit($limit)->select();
		return $res;
	}

	/**
	 * 封装db基本操作(列表)
	 * @param string $table 数据表名
	 * @param array $where 条件
	 * @param mixed $field 字段
	 * @param string $sort 排序
	 * @return array $res 返回结果
	 */
	public function datalist($table, $where = array(), $field = '*', $sort = '') {
		$this->_db = M($table);

		$count = $this->_db->where($where)->count();			//总记录数
		$Page = new \Think\Page($count, 10);						//实例化分页类
		
		
        $Page->setConfig('prev', '上一页');
        $Page->setConfig('next', '下一页');
        $Page->setConfig('last', '末页');
        $Page->setConfig('first', '首页');
		foreach($where as $key=>$val) {							//分页跳转的时候保证查询条件
		    $Page->parameter[$key]   =   urlencode($val);
		}
	
		$show = $Page->show();					//分页显示输出

		$list = $this->_db->where($where)->field($field)->order($sort)->limit($Page->firstRow.','.$Page->listRows)->select();
		return array('list'=>$list, 'page'=>$show, 'count'=>$count);
	}

	/**
	 * 权限控制
	 */
	public function auth() {
		//当前控制器和操作方法
		$auth_ac = CONTROLLER_NAME.'/'.ACTION_NAME;	
		$admin_name = session('admin_name');
		$auth = array();

		//非超级管理员控制权限
		if($admin_name != 'admin') {
			$admin_id 		= session('admin_id');
			$admin_role_id 	= $this->getField('Admin', array('admin_id'=>$admin_id), 'admin_role_id');
			$role_auth_ids 	= $this->getField('Role', array('role_id'=>$admin_role_id), 'role_auth_ids');

			$infos =  $this->infos('Auth', array('auth_id'=>array('in', $role_auth_ids), 'auth_level'=>array('neq', 0)), 'auth_c, auth_a');
			foreach($infos as $k => $v) {
				$auth[] = $v['auth_c'].'/'.$v['auth_a']; 
			}
			$res = array_merge($auth, C('AUTH'));
			
			if(in_array($auth_ac, $res)) {
				return true;
			} else {
				return false;
			}
		} else {
			return true;
		}

	}

	/**
	 * 前台公共部分
	 */
	public function common() {
		//导航
		$navA = $this->infosOrder('Nav', array('nav_pid'=>0), '*', 'nav_sort, nav_id');					//一级导航
		foreach($navA as $key=>$value) {																//判断有没有下级
			$isA = 0;
			$res = $this->info('Nav', array('nav_pid'=>$value['nav_id']), 'nav_id');
			if($res) {
				$isA = 1;
			}
			$navA[$key]['isA'] = $isA;
		}
		$navB = $this->infosOrder('Nav', array('nav_pid'=>array('neq', 0)), '*', 'nav_sort, nav_id');	//二级导航

		//网站配置
		$config = $this->info('Config', array(), '*');

		//友情链接
		$link = $this->infosOrder('Link', array(), 'link_name, link_href, link_type', 'link_sort, link_id');
		foreach($link as $key=>$value) {
			if($value['link_type'] == 0) {
				$link[$key]['link_type'] = '_blank';
			} else {
				$link[$key]['link_type'] = '_self';
			}
		}

		return array('navA'=>$navA, 'navB'=>$navB, 'config'=>$config, 'link'=>$link);
	}


}

?>