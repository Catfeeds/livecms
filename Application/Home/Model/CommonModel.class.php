<?php  
namespace Home\Model;
use Think\Model;

class CommonModel extends Model
{
	private $_db1 = '';
	private $_db2 = '';
	private $_db3 = '';

	public function __construct() {
		$this->_db1 = M('Nav');
		$this->_db2 = M('Config');
		$this->_db3 = M('Link');
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
		$Page = new \Think\Page($count, 5);					//实例化分页类
		
		
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
	 * 公共部分
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