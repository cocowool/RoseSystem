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
	'max_size' => '1000',
	'max_width' => '1024',
	'max_height' => '768',
);

$config['default_icon'] = '/templates/yueshi/images/male.jpg';