<?php



//项目配置文件

return array(

	/**分组配置start**/
	'APP_GROUP_LIST'  => 'Kw,Admin,User', //分组列表
	'DEFAULT_GROUP'   => 'Kw',//默认分组
	'APP_GROUP_MODE'  => 1,//分组模式  0普通分组 1独立分组
	'APP_GROUP_PATH'  => 'Application',//分组项目路径
	/**分组配置end**/

	'LOAD_EXT_CONFIG' => 'language,db', // 加载扩展配置文件

	/**模板配置start**/
	'TMPL_L_DELIM'   => '<{', //左定界符
	'TMPL_R_DELIM'   => '}>', //右定界符
	'TMPL_STRIP_SPACE' => 1,
	/**模板配置end**/

	/**URL配置start**/
	'URL_MODEL'             => 2, // URL访问模式
	'URL_CASE_INSENSITIVE'  => TRUE, //URL区分大小写  true不区分大小写
	//'SHOW_PAGE_TRACE' 		=> 1, // 显示页面Trace信息
	//'DB_FIELD_CACHE'		=> FALSE,
	/**URL配置end**/

	/**路由配置start**/
	'URL_ROUTER_ON'   => ON, //开启路由
	'URL_ROUTE_RULES' => array( //定义路由规则
			//'/^\b(?!(User|user|Admin|admin))\b/' => 'Kw/Index/index',
	),
	/**路由配置end**/

	/**日志记录start**/
	'LOG_RECORD' => true, //开启
	'LOG_LEVEL'  =>'EMERG,ALERT', //记录EMERG ALERT
	/**日志记录end**/

	/**html页面静态缓存start**/
	'HTML_CACHE_ON'=>0,
    'HTML_CACHE_RULES'=> array(
    ),


	/**html页面静态缓存start**/
	//'TMPL_ACTION_ERROR'  => __ROOT__.'/App/Application/Jump/error.php',
	//'TMPL_EXCEPTION_FILE'  => __ROOT__.'Application/Mobile/View/Common/404.html',


	/**数据缓存start**/
	'DATA_CACHE_TYPE'=>'File',
	'DATA_CACHE_TIME'=>'604800',
	/**数据缓存start**/

	/**数据缓存start**/
	/*'DATA_CACHE_TYPE' => 'Memcache',
	'MEMCACHE_HOST' => '172.16.0.253',
	'MEMCACE_PORT' => '11211',
	'DATA_CACHE_TIME' => '604800',*/
	/**数据缓存start**/

	'PAGE_NUM' => 10,
	
	'UPLOAD_PATH' => 'App/Upload/bddata/',

	'SESSION_OPTIONS'         =>  array(
        'name'                =>  'BJYSESSION',                    //设置session名
        'expire'              =>  24*3600*15,                      //SESSION保存15天
        'use_trans_sid'       =>  1,                               //跨页传递
        'use_only_cookies'    =>  0,                               //是否只开启基于cookies的session的会话方式
    ),

);





