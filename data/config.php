<?php
defined('IN_IA') or exit('Access Denied');

$config = array();

//$config['db']['master']['host'] = '59.56.69.152';
//$config['db']['master']['username'] = 'root';
//$config['db']['master']['password'] = 'jieqiang520';
//$config['db']['master']['port'] = '3306';

/*$config['db']['master']['host'] = '39.106.104.26';
$config['db']['master']['username'] = 'root';
$config['db']['master']['password'] = 'Rhl20180101';
$config['db']['master']['port'] = '3506';*/
$config['db']['master']['host'] = '127.0.0.1';
$config['db']['master']['username'] = 'root';
$config['db']['master']['password'] = 'root';
$config['db']['master']['port'] = '3306';


$config['db']['master']['database'] = 'wc2';
$config['db']['master']['charset'] = 'utf8';
$config['db']['master']['pconnect'] = 0;
$config['db']['master']['tablepre'] = 'ims_';

$config['db']['slave_status'] = false;
$config['db']['slave']['1']['host'] = '';
$config['db']['slave']['1']['username'] = '';
$config['db']['slave']['1']['password'] = '';
$config['db']['slave']['1']['port'] = '3307';
$config['db']['slave']['1']['database'] = '';
$config['db']['slave']['1']['charset'] = 'utf8';
$config['db']['slave']['1']['pconnect'] = 0;
$config['db']['slave']['1']['tablepre'] = 'ims_';
$config['db']['slave']['1']['weight'] = 0;

$config['db']['common']['slave_except_table'] = array('core_sessions');

// --------------------------  CONFIG COOKIE  --------------------------- //
$config['cookie']['pre'] = 'e44e_';
$config['cookie']['domain'] = '';
$config['cookie']['path'] = '/';

// --------------------------  CONFIG SETTING  --------------------------- //
$config['setting']['charset'] = 'utf-8';
$config['setting']['cache'] = 'mysql';
$config['setting']['timezone'] = 'Asia/Shanghai';
$config['setting']['memory_limit'] = '256M';
$config['setting']['filemode'] = 0644;
$config['setting']['authkey'] = 'dd8459e7';
$config['setting']['founder'] = '1';
$config['setting']['development'] = 0;
$config['setting']['referrer'] = 0;
$config['setting']['https'] = 0;

// --------------------------  CONFIG UPLOAD  --------------------------- //
$config['upload']['image']['extentions'] = array('gif', 'jpg', 'jpeg', 'png');
$config['upload']['image']['limit'] = 5000;
$config['upload']['attachdir'] = 'attachment';
$config['upload']['audio']['extentions'] = array('mp3');
$config['upload']['audio']['limit'] = 5000;

// --------------------------  CONFIG MEMCACHE  --------------------------- //
$config['setting']['memcache']['server'] = '';
$config['setting']['memcache']['port'] = 11211;
$config['setting']['memcache']['pconnect'] = 1;
$config['setting']['memcache']['timeout'] = 30;
$config['setting']['memcache']['session'] = 1;

// --------------------------  CONFIG PROXY  --------------------------- //
$config['setting']['proxy']['host'] = '';
$config['setting']['proxy']['auth'] = '';

$config['setting']['redis']['server'] = '127.0.0.1'; 
$config['setting']['redis']['port'] = 6379; 
$config['setting']['redis']['pconnect'] = 0; 
$config['setting']['redis']['requirepass'] = ''; 
$config['setting']['redis']['timeout'] = 1;
