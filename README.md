# livecms
基于ThinkPHP3.2框架完成的企业网站CMS系统,快速搭建可商用的企业网站,接私活利器
### 功能特性
* 页面静态化
* crontab定时任务实现数据库备份
* RBAC权限控制
* 大量使用Ajax提升用户体验
* Layer弹层的封装
* Uploadify异步上传图片
* 百度UEditor编辑器的使用
### 说明
* 除了首页轮播模块采用了swiper插件,其它所有部分均采用HTML+CSS+JS进行页面布局,前端代码相当整洁
* 后台涉及到整站的页面更新,比如更新友情链接,网站配置等操作,需要进行手动更新缓存操作
* 后台涉及到单个页面的更新,比如新增文章,幻灯管理等操作,无需进行手动更新缓存操作,已经做了自动更新静态页面的操作
### 如何进行数据库备份
```
* 执行crontab命令
	crontab -e
* 每隔10分钟备份数据库(php命令所在的地址要用全路径)
	*/10 * * * * /usr/sbin/php /opt/lampp/htdocs/livecms/cron.php Admin Cron dump > /dev/null
```
### 访问地址
``` 
前台访问  
	localhost/livecms  
后台访问  
	localhost/livecms/index.php/Admin/Login/index  
超级管理员  
	账号 admin  
	密码 123456  
测试  
	账号 ceshi  
	密码 123456
```
### 部分页面展示(点击查看大图)
![后台](https://raw.githubusercontent.com/duiying/livecms/master/readmeimg/admin.png)
![前台](https://raw.githubusercontent.com/duiying/livecms/master/readmeimg/index.png)
![前台](https://raw.githubusercontent.com/duiying/livecms/master/readmeimg/case.png)
![前台](https://raw.githubusercontent.com/duiying/livecms/master/readmeimg/about.png)
