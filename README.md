:)include(./gearman)
:)include(./rabbitmq)
#--------------------------------------------
这是一个包含长连接推送、异步任务和http服务的简易框架
并集成了gearman和rabbitmq
#--------------------------------------------
目录结构
bootstrap     //普通http服务入口文件，配合nginx使用
backServer    //异步http服务器
longConnect   //长连接推送服务
console       //脚本任务
/assets       //img、js、css资源目录
/base/app     //基本的类，如控制器类、DB实例类
/base/params  //项目的一些配置参数
/base/gearman //后台任务函数库
/controller   //具体的控制器
/console      //可以跑的脚本
/component    //一个功能模块化后可复用的函数集合
/models       //每个数据表的模型，关于一个表的CRUD
/view         //以控制器为文件夹名来组织的视图文件
#--------------------------------------------
