<?php
return array(
	//'配置项'=>'配置值'
	'DB_TYPE' 		          => 'mysql',
    'DB_HOST' 		          => '127.0.0.1',
    'DB_USER' 		          => 'root',
    'DB_PWD' 		          => '',
    'DB_PORT' 		          => 3306,
    'DB_NAME' 		          => 'live',
    'DB_CHARSET' 	          => 'utf8',
    'DB_PREFIX' 	          => 'live_',
    'MD5_PREFIX'              => 'live99_',
    // 'ROOT_ADDR'               => 'http://live.com/live/',
    'LOAD_EXT_CONFIG'         =>'auth',

    'HTML_FILE_SUFFIX'        => '.html',   //静态化文件后缀  
    'HTML_PATH'               => './'       //静态文件存储路径 
);