<?php  

// 接收表单数据
$db_host = $_POST['host'];
$db_name = $_POST['dbname'];
$db_user = $_POST['user'];
$db_password = $_POST['password'];

// 生成 config.php
$file_template = "config.sample.php";
$file_conf = "config.php";
$content = file_get_contents($file_template);

$content = str_replace("#db_name#", $db_name, $content);
$content = str_replace("#db_user#", $db_user, $content);
$content = str_replace("#db_password#", $db_password, $content);
$content = str_replace("#db_host#", $db_host, $content);

@file_put_contents($file_conf, $content) or die("无法写入配置文件");

// 跳转到 install.php
header("Location: install.php");

?>