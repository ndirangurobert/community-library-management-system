<?php
session_start(); date_default_timezone_set('Africa/Nairobi');
$pdo=new PDO('mysql:host=localhost;dbname=community_library;charset=utf8mb4','root','',[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]);
function e($v){return htmlspecialchars((string)$v,ENT_QUOTES,'UTF-8');}
function csrf(){if(empty($_SESSION['csrf']))$_SESSION['csrf']=bin2hex(random_bytes(32));return $_SESSION['csrf'];}
function notice($message){$_SESSION['notice']=$message;}
function check_csrf(){if($_SERVER['REQUEST_METHOD']==='POST'&&!hash_equals($_SESSION['csrf']??'',$_POST['csrf']??'')){http_response_code(419);exit('Form expired. Go back and try again.');}}
function login_required(){if(empty($_SESSION['uid'])){header('Location: login.php');exit;}}
function admin_required(){login_required();if($_SESSION['role']!=='admin'){http_response_code(403);exit('Administrator access only.');}}
function notice($m){$_SESSION['notice']=$m;}
function layout_start($title){?><!doctype html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title><?=e($title)?> | Community Library</title><link rel="stylesheet" href="style.css"></head><body><header><a class="brand" href="index.php">▤ Community <b>Library</b></a><?php if(!empty($_SESSION['uid'])):?><nav><a href="index.php">Dashboard</a><a href="books.php">Books</a><?php if($_SESSION['role']==='admin'):?><a href="members.php">Members</a><a href="reports.php">Reports</a><?php endif;?><a href="logout.php">Sign out</a></nav><?php endif;?></header><main><div class="heading"><div><small>COMMUNITY LIBRARY</small><h1><?=e($title)?></h1></div><?php if(!empty($_SESSION['uid'])):?><span class="chip"><?=e($_SESSION['name'])?> · <?=e($_SESSION['role'])?></span><?php endif;?></div><?php if(!empty($_SESSION['notice'])):?><p class="notice"><?=e($_SESSION['notice'])?></p><?php unset($_SESSION['notice']);endif;}
function layout_end(){?></main><footer>Read · Learn · Grow together</footer></body></html><?php}
