/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50547
Source Host           : localhost:3306
Source Database       : live

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2017-10-11 16:40:12
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for live_admin
-- ----------------------------
DROP TABLE IF EXISTS `live_admin`;
CREATE TABLE `live_admin` (
  `admin_id` tinyint(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `admin_name` varchar(32) NOT NULL DEFAULT '' COMMENT '用户名',
  `admin_pass` varchar(48) NOT NULL DEFAULT '' COMMENT '密码',
  `admin_role_id` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '角色ID',
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of live_admin
-- ----------------------------
INSERT INTO `live_admin` VALUES ('1', 'admin', 'live99_e10adc3949ba59abbe56e057f20f883e', '0');
INSERT INTO `live_admin` VALUES ('2', 'bianji', 'live99_e10adc3949ba59abbe56e057f20f883e', '9');

-- ----------------------------
-- Table structure for live_article
-- ----------------------------
DROP TABLE IF EXISTS `live_article`;
CREATE TABLE `live_article` (
  `art_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '文章id',
  `art_title` varchar(100) NOT NULL DEFAULT '' COMMENT '文章标题',
  `art_desc` varchar(255) NOT NULL DEFAULT '' COMMENT '文章简介',
  `art_editor` varchar(50) NOT NULL DEFAULT '' COMMENT '编辑',
  `art_time` int(11) unsigned NOT NULL COMMENT '添加时间',
  `art_thumb` varchar(100) NOT NULL DEFAULT '' COMMENT '缩略图',
  `art_content` text NOT NULL COMMENT '内容',
  `art_sort` int(11) unsigned NOT NULL DEFAULT '100' COMMENT '排序',
  PRIMARY KEY (`art_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of live_article
-- ----------------------------
INSERT INTO `live_article` VALUES ('4', '腾讯40位CEO门徒：100天融了60亿，总估值翻番超600亿', '腾讯40位CEO门徒：100天融了60亿，总估值翻番超600亿', 'live编辑1', '1491374312', 'upload/2017/04/17/58f4c23111daa.png', '<p>微票儿：腾讯众创空间首个市值过10亿美金独角兽</p><p>11月17日，腾讯众创空间“双百计划”项目、移动票务平台“微票儿”确认完成C轮融资，融资金额15亿人民币。融资后，微票儿的市场估值已近100亿人民币。微影时代也成为腾讯众创空间第一家市值破10亿美元的企业。</p><p>每日优鲜：B轮融资2亿，半年获腾讯两轮投资</p><p>11月12日，腾讯众创空间“双百计划”项目、生鲜电商每日优鲜宣布完成由腾讯领投的2亿人民币B轮融资。此前，2015年5月，每日优鲜获得腾讯领投的千万美元A轮融资。每日优鲜上线于2015年4月，之后的100天内便做了100多万单。</p><p>美家帮：家装行业的京东，上线半年迎B轮融资</p><p>2015年8月下旬，腾讯众创空间“双百计划”项目、家装O2O平台“美家帮”完成由天图资本领投的B轮融资。美家帮成立于2014年9月，2014年12月获千万元天使投资；2015年4月完成800万美金A轮融资。时隔不到半年，美家帮又完成了B轮融资。</p><p><img src=\"/upload/ueditor/php/upload/image/20170417/1492435520319080.png\" title=\"1492435520319080.png\" alt=\"1.png\"/></p>', '1');
INSERT INTO `live_article` VALUES ('10', '腾讯40位CEO门徒：100天融了60亿，总估值翻番超600亿', '腾讯40位CEO门徒：100天融了60亿，总估值翻番超600亿', 'live编辑1', '1491375737', ' ', '<p>微票儿：腾讯众创空间首个市值过10亿美金独角兽</p><p>11月17日，腾讯众创空间“双百计划”项目、移动票务平台“微票儿”确认完成C轮融资，融资金额15亿人民币。融资后，微票儿的市场估值已近100亿人民币。微影时代也成为腾讯众创空间第一家市值破10亿美元的企业。</p><p>每日优鲜：B轮融资2亿，半年获腾讯两轮投资</p><p>11月12日，腾讯众创空间“双百计划”项目、生鲜电商每日优鲜宣布完成由腾讯领投的2亿人民币B轮融资。此前，2015年5月，每日优鲜获得腾讯领投的千万美元A轮融资。每日优鲜上线于2015年4月，之后的100天内便做了100多万单。</p><p>美家帮：家装行业的京东，上线半年迎B轮融资</p><p>2015年8月下旬，腾讯众创空间“双百计划”项目、家装O2O平台“美家帮”完成由天图资本领投的B轮融资。美家帮成立于2014年9月，2014年12月获千万元天使投资；2015年4月完成800万美金A轮融资。时隔不到半年，美家帮又完成了B轮融资。</p><p><br/></p>', '1');
INSERT INTO `live_article` VALUES ('5', '腾讯40位CEO门徒：100天融了60亿，总估值翻番超600亿', '腾讯40位CEO门徒：100天融了60亿，总估值翻番超600亿', 'live编辑', '1491374364', ' ', '<p>微票儿：腾讯众创空间首个市值过10亿美金独角兽</p><p>11月17日，腾讯众创空间“双百计划”项目、移动票务平台“微票儿”确认完成C轮融资，融资金额15亿人民币。融资后，微票儿的市场估值已近100亿人民币。微影时代也成为腾讯众创空间第一家市值破10亿美元的企业。</p><p>每日优鲜：B轮融资2亿，半年获腾讯两轮投资</p><p>11月12日，腾讯众创空间“双百计划”项目、生鲜电商每日优鲜宣布完成由腾讯领投的2亿人民币B轮融资。此前，2015年5月，每日优鲜获得腾讯领投的千万美元A轮融资。每日优鲜上线于2015年4月，之后的100天内便做了100多万单。</p><p>美家帮：家装行业的京东，上线半年迎B轮融资</p><p>2015年8月下旬，腾讯众创空间“双百计划”项目、家装O2O平台“美家帮”完成由天图资本领投的B轮融资。美家帮成立于2014年9月，2014年12月获千万元天使投资；2015年4月完成800万美金A轮融资。时隔不到半年，美家帮又完成了B轮融资。</p><p><br/></p>', '3');
INSERT INTO `live_article` VALUES ('7', '腾讯40位CEO门徒：100天融了60亿，总估值翻番超600亿', '腾讯40位CEO门徒：100天融了60亿，总估值翻番超600亿', 'live编辑', '1491374446', ' ', '<p>微票儿：腾讯众创空间首个市值过10亿美金独角兽</p><p>11月17日，腾讯众创空间“双百计划”项目、移动票务平台“微票儿”确认完成C轮融资，融资金额15亿人民币。融资后，微票儿的市场估值已近100亿人民币。微影时代也成为腾讯众创空间第一家市值破10亿美元的企业。</p><p>每日优鲜：B轮融资2亿，半年获腾讯两轮投资</p><p>11月12日，腾讯众创空间“双百计划”项目、生鲜电商每日优鲜宣布完成由腾讯领投的2亿人民币B轮融资。此前，2015年5月，每日优鲜获得腾讯领投的千万美元A轮融资。每日优鲜上线于2015年4月，之后的100天内便做了100多万单。</p><p>美家帮：家装行业的京东，上线半年迎B轮融资</p><p>2015年8月下旬，腾讯众创空间“双百计划”项目、家装O2O平台“美家帮”完成由天图资本领投的B轮融资。美家帮成立于2014年9月，2014年12月获千万元天使投资；2015年4月完成800万美金A轮融资。时隔不到半年，美家帮又完成了B轮融资。</p><p><br/></p>', '4');
INSERT INTO `live_article` VALUES ('8', '腾讯40位CEO门徒：100天融了60亿，总估值翻番超600亿', '腾讯40位CEO门徒：100天融了60亿，总估值翻番超600亿', 'live编辑', '1491374487', ' ', '<p>微票儿：腾讯众创空间首个市值过10亿美金独角兽</p><p>11月17日，腾讯众创空间“双百计划”项目、移动票务平台“微票儿”确认完成C轮融资，融资金额15亿人民币。融资后，微票儿的市场估值已近100亿人民币。微影时代也成为腾讯众创空间第一家市值破10亿美元的企业。</p><p>每日优鲜：B轮融资2亿，半年获腾讯两轮投资</p><p>11月12日，腾讯众创空间“双百计划”项目、生鲜电商每日优鲜宣布完成由腾讯领投的2亿人民币B轮融资。此前，2015年5月，每日优鲜获得腾讯领投的千万美元A轮融资。每日优鲜上线于2015年4月，之后的100天内便做了100多万单。</p><p>美家帮：家装行业的京东，上线半年迎B轮融资</p><p>2015年8月下旬，腾讯众创空间“双百计划”项目、家装O2O平台“美家帮”完成由天图资本领投的B轮融资。美家帮成立于2014年9月，2014年12月获千万元天使投资；2015年4月完成800万美金A轮融资。时隔不到半年，美家帮又完成了B轮融资。</p><p><br/></p>', '5');
INSERT INTO `live_article` VALUES ('11', '腾讯40位CEO门徒：100天融了60亿，总估值翻番超600亿', '腾讯40位CEO门徒：100天融了60亿，总估值翻番超600亿', 'live编辑', '1491376401', ' ', '<p>微票儿：腾讯众创空间首个市值过10亿美金独角兽</p><p>11月17日，腾讯众创空间“双百计划”项目、移动票务平台“微票儿”确认完成C轮融资，融资金额15亿人民币。融资后，微票儿的市场估值已近100亿人民币。微影时代也成为腾讯众创空间第一家市值破10亿美元的企业。</p><p>每日优鲜：B轮融资2亿，半年获腾讯两轮投资</p><p>11月12日，腾讯众创空间“双百计划”项目、生鲜电商每日优鲜宣布完成由腾讯领投的2亿人民币B轮融资。此前，2015年5月，每日优鲜获得腾讯领投的千万美元A轮融资。每日优鲜上线于2015年4月，之后的100天内便做了100多万单。</p><p>美家帮：家装行业的京东，上线半年迎B轮融资</p><p>2015年8月下旬，腾讯众创空间“双百计划”项目、家装O2O平台“美家帮”完成由天图资本领投的B轮融资。美家帮成立于2014年9月，2014年12月获千万元天使投资；2015年4月完成800万美金A轮融资。时隔不到半年，美家帮又完成了B轮融资。</p><p><br/></p>', '1');
INSERT INTO `live_article` VALUES ('18', '腾讯40位CEO门徒：100天融了60亿，总估值翻番超600亿', '腾讯40位CEO门徒：100天融了60亿，总估值翻番超600亿', 'live编辑', '1491384271', ' ', '<p>微票儿：腾讯众创空间首个市值过10亿美金独角兽</p><p>11月17日，腾讯众创空间“双百计划”项目、移动票务平台“微票儿”确认完成C轮融资，融资金额15亿人民币。融资后，微票儿的市场估值已近100亿人民币。微影时代也成为腾讯众创空间第一家市值破10亿美元的企业。</p><p>每日优鲜：B轮融资2亿，半年获腾讯两轮投资</p><p>11月12日，腾讯众创空间“双百计划”项目、生鲜电商每日优鲜宣布完成由腾讯领投的2亿人民币B轮融资。此前，2015年5月，每日优鲜获得腾讯领投的千万美元A轮融资。每日优鲜上线于2015年4月，之后的100天内便做了100多万单。</p><p>美家帮：家装行业的京东，上线半年迎B轮融资</p><p>2015年8月下旬，腾讯众创空间“双百计划”项目、家装O2O平台“美家帮”完成由天图资本领投的B轮融资。美家帮成立于2014年9月，2014年12月获千万元天使投资；2015年4月完成800万美金A轮融资。时隔不到半年，美家帮又完成了B轮融资。</p><p><br/></p>', '3');
INSERT INTO `live_article` VALUES ('19', '腾讯40位CEO门徒：100天融了60亿，总估值翻番超600亿', '腾讯40位CEO门徒：100天融了60亿，总估值翻番超600亿', 'live编辑', '1491384301', ' ', '<p>微票儿：腾讯众创空间首个市值过10亿美金独角兽</p><p>11月17日，腾讯众创空间“双百计划”项目、移动票务平台“微票儿”确认完成C轮融资，融资金额15亿人民币。融资后，微票儿的市场估值已近100亿人民币。微影时代也成为腾讯众创空间第一家市值破10亿美元的企业。</p><p>每日优鲜：B轮融资2亿，半年获腾讯两轮投资</p><p>11月12日，腾讯众创空间“双百计划”项目、生鲜电商每日优鲜宣布完成由腾讯领投的2亿人民币B轮融资。此前，2015年5月，每日优鲜获得腾讯领投的千万美元A轮融资。每日优鲜上线于2015年4月，之后的100天内便做了100多万单。</p><p>美家帮：家装行业的京东，上线半年迎B轮融资</p><p>2015年8月下旬，腾讯众创空间“双百计划”项目、家装O2O平台“美家帮”完成由天图资本领投的B轮融资。美家帮成立于2014年9月，2014年12月获千万元天使投资；2015年4月完成800万美金A轮融资。时隔不到半年，美家帮又完成了B轮融资。</p><p><br/></p>', '4');
INSERT INTO `live_article` VALUES ('20', '腾讯40位CEO门徒：100天融了60亿，总估值翻番超600亿', '腾讯40位CEO门徒：100天融了60亿，总估值翻番超600亿', 'live编辑', '1491384332', ' ', '<p>微票儿：腾讯众创空间首个市值过10亿美金独角兽</p><p>11月17日，腾讯众创空间“双百计划”项目、移动票务平台“微票儿”确认完成C轮融资，融资金额15亿人民币。融资后，微票儿的市场估值已近100亿人民币。微影时代也成为腾讯众创空间第一家市值破10亿美元的企业。</p><p>每日优鲜：B轮融资2亿，半年获腾讯两轮投资</p><p>11月12日，腾讯众创空间“双百计划”项目、生鲜电商每日优鲜宣布完成由腾讯领投的2亿人民币B轮融资。此前，2015年5月，每日优鲜获得腾讯领投的千万美元A轮融资。每日优鲜上线于2015年4月，之后的100天内便做了100多万单。</p><p>美家帮：家装行业的京东，上线半年迎B轮融资</p><p>2015年8月下旬，腾讯众创空间“双百计划”项目、家装O2O平台“美家帮”完成由天图资本领投的B轮融资。美家帮成立于2014年9月，2014年12月获千万元天使投资；2015年4月完成800万美金A轮融资。时隔不到半年，美家帮又完成了B轮融资。</p><p><br/></p>', '4');

-- ----------------------------
-- Table structure for live_auth
-- ----------------------------
DROP TABLE IF EXISTS `live_auth`;
CREATE TABLE `live_auth` (
  `auth_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `auth_name` varchar(32) NOT NULL DEFAULT '' COMMENT '名称',
  `auth_pid` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '父级ID',
  `auth_c` varchar(32) NOT NULL DEFAULT '' COMMENT '控制器',
  `auth_a` varchar(32) NOT NULL DEFAULT '' COMMENT '方法',
  `auth_level` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '级别 0是一级权限 1是二级权限 2是三级权限',
  `auth_status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否在左侧菜单显示 0不是 1是',
  `auth_sort` int(11) unsigned NOT NULL DEFAULT '10' COMMENT '排序',
  PRIMARY KEY (`auth_id`)
) ENGINE=MyISAM AUTO_INCREMENT=107 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of live_auth
-- ----------------------------
INSERT INTO `live_auth` VALUES ('1', '设置', '0', '', '', '0', '1', '1');
INSERT INTO `live_auth` VALUES ('2', '修改密码', '1', 'Index', 'pass', '1', '1', '10');
INSERT INTO `live_auth` VALUES ('3', '网站配置', '1', 'Config', 'index', '1', '1', '10');
INSERT INTO `live_auth` VALUES ('30', '案例管理', '21', 'Case', 'index', '1', '1', '10');
INSERT INTO `live_auth` VALUES ('7', '权限管理', '0', '', '', '0', '1', '10');
INSERT INTO `live_auth` VALUES ('8', '管理员管理', '7', 'Manager', 'index', '1', '1', '10');
INSERT INTO `live_auth` VALUES ('9', '角色管理', '7', 'Role', 'index', '1', '1', '10');
INSERT INTO `live_auth` VALUES ('10', '权限管理', '7', 'Auth', 'index', '1', '1', '10');
INSERT INTO `live_auth` VALUES ('31', '友情链接', '1', 'Link', 'index', '1', '1', '10');
INSERT INTO `live_auth` VALUES ('34', '更新缓存', '1', 'Runtime', 'index', '1', '1', '10');
INSERT INTO `live_auth` VALUES ('21', '内容管理', '0', '', '', '0', '1', '2');
INSERT INTO `live_auth` VALUES ('22', '文章管理', '21', 'Article', 'index', '1', '1', '10');
INSERT INTO `live_auth` VALUES ('27', '幻灯管理', '1', 'Banner', 'index', '1', '1', '10');
INSERT INTO `live_auth` VALUES ('26', '导航管理', '21', 'Nav', 'index', '1', '1', '10');
INSERT INTO `live_auth` VALUES ('28', '招聘管理', '21', 'Job', 'index', '1', '1', '10');
INSERT INTO `live_auth` VALUES ('29', '留言管理', '21', 'Msg', 'index', '1', '1', '10');
INSERT INTO `live_auth` VALUES ('35', '添加', '27', 'Banner', 'add', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('36', '提交添加', '27', 'Banner', 'addData', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('37', '删除', '27', 'Banner', 'del', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('38', '批量删除', '27', 'Banner', 'dels', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('39', '编辑', '27', 'Banner', 'edit', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('40', '提交编辑', '27', 'Banner', 'editData', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('41', '排序', '27', 'Banner', 'sort', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('42', '更改状态', '27', 'Banner', 'status', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('43', '添加', '31', 'Link', 'add', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('44', '提交添加', '31', 'Link', 'addData', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('45', '删除', '31', 'Link', 'del', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('46', '批量删除', '31', 'Link', 'dels', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('47', '编辑', '31', 'Link', 'edit', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('48', '提交编辑', '31', 'Link', 'editData', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('49', '排序', '31', 'Link', 'sort', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('50', '更新', '34', 'Runtime', 'update', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('51', '添加', '22', 'Article', 'add', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('52', '提交添加', '22', 'Article', 'addData', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('53', '删除', '22', 'Article', 'del', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('54', '批量删除', '22', 'Article', 'dels', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('55', '编辑', '22', 'Article', 'edit', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('56', '提交编辑', '22', 'Article', 'editData', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('57', '排序', '22', 'Article', 'sort', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('58', '添加', '26', 'Nav', 'add', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('59', '提交添加', '26', 'Nav', 'addData', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('60', '删除', '26', 'Nav', 'del', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('61', '编辑', '26', 'Nav', 'edit', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('62', '提交编辑', '26', 'Nav', 'editData', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('63', '排序', '26', 'Nav', 'sort', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('64', '添加', '28', 'Job', 'add', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('65', '提交添加', '28', 'Job', 'addData', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('66', '删除', '28', 'Job', 'del', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('67', '批量删除', '28', 'Job', 'dels', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('68', '编辑', '28', 'Job', 'edit', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('69', '提交编辑', '28', 'Job', 'editData', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('70', '排序', '28', 'Job', 'sort', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('71', '更改状态', '28', 'Job', 'status', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('72', '删除', '29', 'Msg', 'del', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('73', '批量删除', '29', 'Msg', 'dels', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('74', '更改状态', '29', 'Msg', 'status', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('75', '添加', '30', 'Case', 'add', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('76', '提交添加', '30', 'Case', 'addData', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('77', '删除', '30', 'Case', 'del', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('78', '批量删除', '30', 'Case', 'dels', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('79', '编辑', '30', 'Case', 'edit', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('80', '提交编辑', '30', 'Case', 'editData', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('81', '排序', '30', 'Case', 'sort', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('82', '添加', '8', 'Manager', 'add', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('83', '提交添加', '8', 'Manager', 'addData', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('84', '删除', '8', 'Manager', 'del', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('85', '编辑', '8', 'Manager', 'edit', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('86', '提交编辑', '8', 'Manager', 'editData', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('87', '添加', '9', 'Role', 'add', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('88', '提交添加', '9', 'Role', 'addData', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('89', '删除', '9', 'Role', 'del', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('90', '批量删除', '9', 'Role', 'dels', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('91', '编辑', '9', 'Role', 'edit', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('92', '提交编辑', '9', 'Role', 'editData', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('93', '分配权限', '9', 'Role', 'info', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('94', '提交分配权限', '9', 'Role', 'authEdit', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('95', '添加', '10', 'Auth', 'add', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('96', '提交添加', '10', 'Auth', 'addData', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('97', '删除', '10', 'Auth', 'del', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('98', '编辑', '10', 'Auth', 'edit', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('99', '提交编辑', '10', 'Auth', 'editData', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('100', '排序', '10', 'Auth', 'sort', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('101', '更改状态', '10', 'Auth', 'status', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('102', '网站信息', '3', 'Config', 'index', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('103', 'SEO设置', '3', 'Config', 'seo', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('104', '企业信息', '3', 'Config', 'firm', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('105', '客服设置', '3', 'Config', 'service', '2', '0', '10');
INSERT INTO `live_auth` VALUES ('106', '提交更新', '3', 'Config', 'editData', '2', '0', '10');

-- ----------------------------
-- Table structure for live_banner
-- ----------------------------
DROP TABLE IF EXISTS `live_banner`;
CREATE TABLE `live_banner` (
  `banner_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'bannerID',
  `banner_img` varchar(100) NOT NULL DEFAULT '' COMMENT 'banner图片地址',
  `banner_href` varchar(100) NOT NULL DEFAULT '' COMMENT 'banner链接地址',
  `banner_sort` int(11) unsigned NOT NULL COMMENT 'banner排序',
  `banner_status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '状态 0开启 1关闭',
  PRIMARY KEY (`banner_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of live_banner
-- ----------------------------
INSERT INTO `live_banner` VALUES ('5', 'upload/2017/04/12/58edbed61bb63.jpg', '', '10', '0');
INSERT INTO `live_banner` VALUES ('6', 'upload/2017/10/08/59d99266446e9.jpg', '', '1', '0');
INSERT INTO `live_banner` VALUES ('7', 'upload/2017/10/08/59d9938e83e52.jpg', '', '2', '0');

-- ----------------------------
-- Table structure for live_case
-- ----------------------------
DROP TABLE IF EXISTS `live_case`;
CREATE TABLE `live_case` (
  `case_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '案例ID',
  `case_title` varchar(50) NOT NULL DEFAULT '' COMMENT '案例标题',
  `case_img` varchar(100) NOT NULL DEFAULT '' COMMENT '图片',
  `case_sort` int(11) unsigned NOT NULL DEFAULT '10' COMMENT '排序',
  PRIMARY KEY (`case_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of live_case
-- ----------------------------
INSERT INTO `live_case` VALUES ('8', '晴空恋雨', 'upload/2017/04/12/58edc0c098b9a.jpg', '10');
INSERT INTO `live_case` VALUES ('6', '玩墨天下', 'upload/2017/04/12/58edc0828e566.jpg', '10');
INSERT INTO `live_case` VALUES ('7', '中国银行', 'upload/2017/04/12/58edc0a0240f9.jpg', '10');
INSERT INTO `live_case` VALUES ('9', '域星球', 'upload/2017/04/12/58edc0d4411be.jpg', '10');
INSERT INTO `live_case` VALUES ('10', '药易购', 'upload/2017/04/12/58edc0e40f865.jpg', '10');
INSERT INTO `live_case` VALUES ('11', '中医药教育网', 'upload/2017/04/12/58edc107f390d.jpg', '10');
INSERT INTO `live_case` VALUES ('12', '云兼职', 'upload/2017/04/12/58edc12322b75.jpg', '10');
INSERT INTO `live_case` VALUES ('13', '喜月', 'upload/2017/04/12/58edc134de76e.jpg', '10');

-- ----------------------------
-- Table structure for live_config
-- ----------------------------
DROP TABLE IF EXISTS `live_config`;
CREATE TABLE `live_config` (
  `config_web_name` varchar(100) NOT NULL DEFAULT '' COMMENT '网站信息-网站名称',
  `config_web_stat` varchar(255) NOT NULL DEFAULT '' COMMENT '网站信息-统计代码',
  `config_web_copyright` varchar(100) NOT NULL DEFAULT '' COMMENT '网站信息-版权信息',
  `config_web_record` varchar(100) NOT NULL DEFAULT '' COMMENT '网站信息-备案信息',
  `config_seo_title` varchar(100) NOT NULL DEFAULT '' COMMENT 'SEO-SEO标题',
  `config_seo_keywords` varchar(255) NOT NULL DEFAULT '' COMMENT 'SEO-SEO关键字',
  `config_seo_desc` varchar(255) NOT NULL DEFAULT '' COMMENT 'SEO-SEO描述',
  `config_firm_name` varchar(100) NOT NULL DEFAULT '' COMMENT '公司-名称',
  `config_firm_location` varchar(100) NOT NULL DEFAULT '' COMMENT '公司-地址',
  `config_firm_phone` varchar(30) NOT NULL DEFAULT '' COMMENT '公司-电话',
  `config_firm_fax` varchar(30) NOT NULL DEFAULT '' COMMENT '公司-传真',
  `config_firm_mail` varchar(30) NOT NULL DEFAULT '' COMMENT '公司-邮箱',
  `config_service_qq` varchar(15) NOT NULL DEFAULT '' COMMENT '客服-QQ',
  `config_service_phone` varchar(30) NOT NULL DEFAULT '' COMMENT '客服-电话'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of live_config
-- ----------------------------
INSERT INTO `live_config` VALUES ('Live 专业企业网站内容管理系统', '', 'Copyright ©2013-2017 Qcloud.com 腾讯云版权所有', '京公网安备 11010802020287 京ICP备11018762号', 'Live内容管理框架,做最简约的PHP开源软件', 'Live,内容管理系统,Live后台管理系统,企业建站系统,live,php开源软件,内容管理框架,cmf,php thinkphp cms,cms,简约风, simplewind,framework', 'Live是一款基于ThinkPHP+MYSQL开发的中文内容管理框架(CMF),我们一直秉承ThinkPHP大道至简的理念，坚持做最简约的ThinkPHP开源软件,多应用化开发方式,让您更快地完成自己的创业项目！', '北京live科技有限公司', '北京望京sohu商业街101', '010-24323424', '010-54354325', 'live@live.net', '1103513226', '15687943898493');

-- ----------------------------
-- Table structure for live_job
-- ----------------------------
DROP TABLE IF EXISTS `live_job`;
CREATE TABLE `live_job` (
  `job_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '职位ID',
  `job_name` varchar(50) NOT NULL DEFAULT '' COMMENT '职位名称',
  `job_where` varchar(50) NOT NULL DEFAULT '' COMMENT '工作地点',
  `job_num` varchar(30) NOT NULL DEFAULT '' COMMENT '人数',
  `job_desc` text NOT NULL COMMENT '职位描述',
  `job_ask` text NOT NULL COMMENT '职位要求',
  `job_sort` tinyint(5) unsigned NOT NULL DEFAULT '10' COMMENT '排序',
  `job_status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '职位状态 0正常 1停止',
  PRIMARY KEY (`job_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of live_job
-- ----------------------------
INSERT INTO `live_job` VALUES ('1', '编辑1', '北京', '10', '<p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 26px; font-size: 14px; color: gray; font-family: 微软雅黑; white-space: normal; background-color: rgb(255, 255, 255);\">1. 热爱销售，适应高强度工作，喜欢挑战自我，善于客户公关，主动销售，不畏挫折</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 26px; font-size: 14px; color: gray; font-family: 微软雅黑; white-space: normal; background-color: rgb(255, 255, 255);\">2. 具有互联网软件市场推广经验，熟悉主要线上线下媒体传播渠道</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 26px; font-size: 14px; color: gray; font-family: 微软雅黑; white-space: normal; background-color: rgb(255, 255, 255);\">3. 熟悉软件和互联网行业，掌握 office 软件，网络沟通和应用办公软件</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 26px; font-size: 14px; color: gray; font-family: 微软雅黑; white-space: normal; background-color: rgb(255, 255, 255);\">4. 具有较强的执行能力，能独立运作线上线下推广的各个环节</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 26px; font-size: 14px; color: gray; font-family: 微软雅黑; white-space: normal; background-color: rgb(255, 255, 255);\">5. 良好的人际关系，出色的沟通技巧； 吃苦耐劳，拥有强烈的上进心和学习意识</p><p><br/></p>', '<p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 26px; font-size: 14px; color: gray; font-family: 微软雅黑; white-space: normal; background-color: rgb(255, 255, 255);\">1. 热爱销售，适应高强度工作，喜欢挑战自我，善于客户公关，主动销售，不畏挫折</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 26px; font-size: 14px; color: gray; font-family: 微软雅黑; white-space: normal; background-color: rgb(255, 255, 255);\">2. 具有互联网软件市场推广经验，熟悉主要线上线下媒体传播渠道</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 26px; font-size: 14px; color: gray; font-family: 微软雅黑; white-space: normal; background-color: rgb(255, 255, 255);\">3. 熟悉软件和互联网行业，掌握 office 软件，网络沟通和应用办公软件</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 26px; font-size: 14px; color: gray; font-family: 微软雅黑; white-space: normal; background-color: rgb(255, 255, 255);\">4. 具有较强的执行能力，能独立运作线上线下推广的各个环节</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 26px; font-size: 14px; color: gray; font-family: 微软雅黑; white-space: normal; background-color: rgb(255, 255, 255);\">5. 良好的人际关系，出色的沟通技巧； 吃苦耐劳，拥有强烈的上进心和学习意识</p><p><br/></p>', '100', '0');
INSERT INTO `live_job` VALUES ('3', '客户经理1', '北京', '3', '<p>1. 热爱销售，适应高强度工作，喜欢挑战自我，善于客户公关，主动销售，不畏挫折</p><p>2. 具有互联网软件市场推广经验，熟悉主要线上线下媒体传播渠道</p><p>3. 熟悉软件和互联网行业，掌握 office 软件，网络沟通和应用办公软件</p><p>4. 具有较强的执行能力，能独立运作线上线下推广的各个环节</p><p>5. 良好的人际关系，出色的沟通技巧； 吃苦耐劳，拥有强烈的上进心和学习意识</p><p><br/></p>', '<p>1. 热爱销售，适应高强度工作，喜欢挑战自我，善于客户公关，主动销售，不畏挫折</p><p>2. 具有互联网软件市场推广经验，熟悉主要线上线下媒体传播渠道</p><p>3. 熟悉软件和互联网行业，掌握 office 软件，网络沟通和应用办公软件</p><p>4. 具有较强的执行能力，能独立运作线上线下推广的各个环节</p><p>5. 良好的人际关系，出色的沟通技巧； 吃苦耐劳，拥有强烈的上进心和学习意识</p><p><br/></p>', '3', '0');
INSERT INTO `live_job` VALUES ('4', '客户经理2', '北京', '3', '<p>1. 热爱销售，适应高强度工作，喜欢挑战自我，善于客户公关，主动销售，不畏挫折</p><p>2. 具有互联网软件市场推广经验，熟悉主要线上线下媒体传播渠道</p><p>3. 熟悉软件和互联网行业，掌握 office 软件，网络沟通和应用办公软件</p><p>4. 具有较强的执行能力，能独立运作线上线下推广的各个环节</p><p>5. 良好的人际关系，出色的沟通技巧； 吃苦耐劳，拥有强烈的上进心和学习意识</p><p><br/></p>', '<p>1. 热爱销售，适应高强度工作，喜欢挑战自我，善于客户公关，主动销售，不畏挫折</p><p>2. 具有互联网软件市场推广经验，熟悉主要线上线下媒体传播渠道</p><p>3. 熟悉软件和互联网行业，掌握 office 软件，网络沟通和应用办公软件</p><p>4. 具有较强的执行能力，能独立运作线上线下推广的各个环节</p><p>5. 良好的人际关系，出色的沟通技巧； 吃苦耐劳，拥有强烈的上进心和学习意识</p><p><br/></p>', '33', '0');

-- ----------------------------
-- Table structure for live_link
-- ----------------------------
DROP TABLE IF EXISTS `live_link`;
CREATE TABLE `live_link` (
  `link_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '链接ID',
  `link_name` varchar(50) NOT NULL DEFAULT '' COMMENT '链接名称',
  `link_href` varchar(100) NOT NULL DEFAULT '' COMMENT '链接地址',
  `link_type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '跳转方式 0是_blank 1是_self',
  `link_sort` int(11) unsigned NOT NULL DEFAULT '10' COMMENT '排序 默认10',
  PRIMARY KEY (`link_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of live_link
-- ----------------------------
INSERT INTO `live_link` VALUES ('1', '百度一下', 'http://www.baidu.com', '1', '10');
INSERT INTO `live_link` VALUES ('2', '新浪', 'http://sina.cn', '1', '10');
INSERT INTO `live_link` VALUES ('3', '知乎', 'http://www.zhihu.cn', '1', '10');
INSERT INTO `live_link` VALUES ('4', '腾讯11', 'http://www.qq.com', '0', '1');

-- ----------------------------
-- Table structure for live_msg
-- ----------------------------
DROP TABLE IF EXISTS `live_msg`;
CREATE TABLE `live_msg` (
  `msg_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '留言ID',
  `msg_name` varchar(50) NOT NULL DEFAULT '' COMMENT '姓名',
  `msg_phone` varchar(30) NOT NULL DEFAULT '' COMMENT '手机',
  `msg_qq` varchar(20) NOT NULL DEFAULT '' COMMENT 'QQ',
  `msg_content` varchar(255) NOT NULL DEFAULT '' COMMENT '内容',
  `msg_time` int(11) unsigned NOT NULL COMMENT '留言时间',
  `msg_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '留言装填 0未处理 1已处理',
  PRIMARY KEY (`msg_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of live_msg
-- ----------------------------
INSERT INTO `live_msg` VALUES ('4', '牛总', '1110', '73294723', '好爽', '1491487024', '1');
INSERT INTO `live_msg` VALUES ('5', '郭总', '172138917', '72349', '你懂拆笔记本吗', '1491487024', '1');
INSERT INTO `live_msg` VALUES ('6', '王总', '237548932', '78324758', '爽', '1491487024', '0');
INSERT INTO `live_msg` VALUES ('7', '王冰涛', '7548357', '75843758', '好爽,好刺激', '1491487024', '0');
INSERT INTO `live_msg` VALUES ('8', '康迪', '473282', '5734875', '刺激了', '1491487024', '0');

-- ----------------------------
-- Table structure for live_nav
-- ----------------------------
DROP TABLE IF EXISTS `live_nav`;
CREATE TABLE `live_nav` (
  `nav_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '导航ID',
  `nav_name` varchar(50) NOT NULL DEFAULT '' COMMENT '导航名称',
  `nav_link` varchar(50) NOT NULL DEFAULT '' COMMENT '导航链接',
  `nav_pid` int(11) NOT NULL COMMENT '父级ID 0是一级 非0是二级',
  `nav_sort` smallint(5) NOT NULL DEFAULT '10' COMMENT '排序',
  PRIMARY KEY (`nav_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of live_nav
-- ----------------------------
INSERT INTO `live_nav` VALUES ('1', '首页', 'index.html', '0', '1');
INSERT INTO `live_nav` VALUES ('2', '新闻动态', 'index.php?v=news', '0', '2');
INSERT INTO `live_nav` VALUES ('3', '客户案例', 'client.html', '0', '3');
INSERT INTO `live_nav` VALUES ('4', '关于我们', 'us.html', '0', '4');
INSERT INTO `live_nav` VALUES ('5', '联系我们', 'contact.html', '4', '2');
INSERT INTO `live_nav` VALUES ('6', '公司简介', 'us.html', '4', '1');
INSERT INTO `live_nav` VALUES ('9', '人才招聘', 'job.html', '4', '3');
INSERT INTO `live_nav` VALUES ('10', '在线留言', 'msg.html', '4', '4');

-- ----------------------------
-- Table structure for live_role
-- ----------------------------
DROP TABLE IF EXISTS `live_role`;
CREATE TABLE `live_role` (
  `role_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT COMMENT '角色ID',
  `role_name` varchar(32) NOT NULL DEFAULT '' COMMENT '名称',
  `role_auth_ids` varchar(128) NOT NULL DEFAULT '' COMMENT '权限ids',
  PRIMARY KEY (`role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of live_role
-- ----------------------------
INSERT INTO `live_role` VALUES ('9', '编辑', '21,22,51,52,53,54,55,56,57');
