<?php  

	include('config.php');

	function __autoload($className) {
		require_once($className . ".php");
	}

	function show($content) {
		echo "<div class='result'>".$content."</div>";
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>安装程序</title>
		<style type="text/css">
			.result {
				width: 500px;
				border: 1px solid #888;
				background: #ccc;
			}
		</style>
		<script type="text/javascript"></script>
	</head>
	<body>
		<div class="main">

			<?php  

				if(!defined('DB_HOST')) {
					show( "config.php 不存在,请查看." );
				} 
				else {
					$file = "sql/test.sql";
					$dbConfig = array(
						Installer::KEY_DB_HOST => DB_HOST, 
						Installer::KEY_DB_NAME => DB_NAME, 
						Installer::KEY_DB_USER => DB_USER, 
						Installer::KEY_DB_PASSWORD => DB_PASSWORD
					);

					$installer = new Installer($file, $dbConfig);
					$ret = $installer->install();
					if($ret[Installer::KEY_RESULT_SUCCESS] == true) {
						show( "恭喜妳,安装成功!!" );
					} else {
						show( "sorry,安装失败了. " . $ret[Installer::KEY_RESULT_MESSAGE] );
					}
				}

			?>


		</div>
	</body>
</html>