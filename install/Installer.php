<?php  

/**
* 安装器
*/
class Installer {

	/** 常量 */
	const KEY_DB_HOST = "host";
	const KEY_DB_NAME = "dbname";
	const KEY_DB_USER = "user";
	const KEY_DB_PASSWORD = "password";

	const KEY_RESULT_SUCCESS = "success";
	const KEY_RESULT_MESSAGE = "message";

	/** sql文件路径  */
	private $sqlfile;

	/** 数据库的配置信息 Type:Map
	 *  key 包括: host, dbname, user, password
	 */
	private $dbConfig;
	
	function __construct($file, $dbConfig) {
		$this->sqlfile = $file;
		$this->dbConfig = $dbConfig;
	}

	function install() {
		try {
			$this->_install();
			$res = array(
				self::KEY_RESULT_SUCCESS => true, 
				self::KEY_RESULT_MESSAGE => "安装成功."
			);
		} catch (Exception $e) {
			$res = array(
				self::KEY_RESULT_SUCCESS => false, 
				self::KEY_RESULT_MESSAGE => $e->getMessage()
			);
		}
		return $res;
	}

	/**
	 * 安装脚本. 执行成功返回true. 执行失败抛异常.
	 * @return [type] [description]
	 */
	private function _install() {
		$this->_connectDB();
		$this->_executeSQL();
		return true;
	}

	/**
	 * 连接到数据库
	 * @return [type] [description]
	 */
	private function _connectDB() {
		$conn = @mysql_connect(
			$this->dbConfig[self::KEY_DB_HOST], 
			$this->dbConfig[self::KEY_DB_USER], 
			$this->dbConfig[self::KEY_DB_PASSWORD]
		);
		if(!$conn) 
			throw new Exception("连接数据库失败,请检查你的主机地址,用户名,密码是否正确." . mysql_error());
		$selectdb = @mysql_select_db($this->dbConfig[self::KEY_DB_NAME], $conn);
		if(!$selectdb) 
			throw new Exception("选择数据库失败,请检查您提供的数据库: " 
				. $this->dbConfig[self::KEY_DB_NAME] . " 是否存在." 
				. mysql_error());
		return $conn;
	}

	/**
	 * 执行SQL语句
	 * @return [type] [description]
	 */
	private function _executeSQL() {
		$iter = SQLIterator::iterator($this->sqlfile);
		while ($iter->hasNext()) {
			$sql = trim($iter->next());
			if($sql != "") {
				$query = @mysql_query($sql);
				if(!$query) {
					throw new Exception("执行sql语句( $sql )出错. " . mysql_error());
				}
			}
		}
		return true;
	}
}

?>