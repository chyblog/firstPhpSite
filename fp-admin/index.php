<?php
define( 'ABSPATH', dirname(dirname(__FILE__)) . '/' );
define('APP_PATH',ABSPATH . 'fp-admin/');
require ABSPATH . 'config.php';
define('APP_DEBUG', 'TRUE');
define('APP_NAME','fp-admin');

require ABSPATH . 'ThinkPHP/ThinkPHP.php';
