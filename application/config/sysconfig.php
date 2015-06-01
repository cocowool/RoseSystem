<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//系统配置文件

//后台配置参数
$config['adm_segment']	=	'manage';			//管理后台文件夹
$config['adm_segment_auth'] = 'auth';			//管理后台登录地址
$config['adm_tag_username']	=	'adm_username';
$config['adm_username']	=	'admin';
$config['adm_password']	=	'admin';
$config['adm_sess_username'] = 'admUsername';
$config['adm_sess_status']	=	'admStatus';
$config['adm_sess_level'] = 'admLevel';

$config['project_name'] = '悦食中国';

$config['image_upload_config'] = array(
	'upload_path' => 'temp',
	'allowed_types' => 'gif|jpg|png',
	'max_size' => '10000',
	'max_width' => '10240',
	'max_height' => '7680',
);

$config['default_icon'] = '/templates/yueshi/images/male.jpg';

$config['city'] = array(
	''	=>	'请选择',
	'北京'	=>	'北京',
	'上海'	=>	'上海',
	'天津'	=>	'天津',
	'重庆'	=>	'重庆',
	'河北'	=>	'河北',
	'山西'	=>	'山西',
	'河南'	=>	'河南',
	'辽宁'	=>	'辽宁',
	'吉林'	=>	'吉林',
	'黑龙江'	=>	'黑龙江',
	'内蒙古'	=>	'内蒙古',
	'江苏'	=>	'江苏',
	'山东'	=>	'山东',
	'安徽'	=>	'安徽',
	'浙江'	=>	'浙江',
	'福建'	=>	'福建',
	'湖北'	=>	'湖北',
	'湖南'	=>	'湖南',
	'广东'	=>	'广东',
	'广西'	=>	'广西',
	'江西'	=>	'江西',
	'四川'	=>	'四川',
	'海南'	=>	'海南',
	'贵州'	=>	'贵州',
	'云南'	=>	'云南',
	'西藏'	=>	'西藏',
	'陕西'	=>	'陕西',
	'甘肃'	=>	'甘肃',
	'青海'	=>	'青海',
	'宁夏'	=>	'宁夏',
	'新疆'	=>	'新疆',
	'台湾'	=>	'台湾',
	'香港'	=>	'香港',
	'澳门'	=>	'澳门',
	'海外'	=>	'海外',
);