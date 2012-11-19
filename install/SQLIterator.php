<?php  

/**
* SQL文件读取器 <br>
* 以分号为分隔符读出一个个SQL语句
*/
class SQLIterator {

	/** 两个SQL语句之间的分隔符 */
	const SEPARATER = ";";

	/** 正则表达式 */
	private $REG_PATTERN;

	/** sql文件路径  */
	private $sqlfile;

	/** sql文件的句柄 */
	private $fh;
	
	private function __construct($file) {
		$this->_init($file);
	}

	private function _init($file) {
		$this->REG_PATTERN = "/". self::SEPARATER. "(\s)*$/";
		$this->sqlfile = $file;
		$this->fh = fopen($this->sqlfile, "r");
	}

	static function iterator($file) {
		return new self($file);
	}

	function next() {
		$ret = ""; 
		while (!feof($this->fh)) {
			$s = fgets($this->fh);
			$ret = $ret . $s;
			if (preg_match($this->REG_PATTERN, $s)) {
				break;
			}
		}
		return $ret;
	}

	function hasNext() {
		return !feof($this->fh);
	}

}

?>
