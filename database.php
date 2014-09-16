<?php

include "config.php";

class Database {
	private $_connection;
	private static $_instance;
	private $_host = DB_HOST;
	private $_username = DB_USER;
	private $_password = DB_PASS;
	private $_database = DB_NAME;
 
	public static function getInstance() {
		if(!self::$_instance) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	private function __construct() {
                mysqli_report(MYSQLI_REPORT_STRICT);
                try {
                    $this->_connection = new mysqli($this->_host, $this->_username, 
                            $this->_password, $this->_database);
                } catch ( mysqli_sql_exception $e ) {
                    throw new Exception($e->getMessage());
                }
                
                if(mysqli_connect_error()) {
                    trigger_error("Failed to conencto to MySQL: " . mysql_connect_error(),
				 E_USER_ERROR);
		}
	}
 
	private function __clone() { }
 
	public function getConnection() {
		return $this->_connection;
	}
}

?>