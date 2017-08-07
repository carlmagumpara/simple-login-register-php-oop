<?php  

require_once('config.php');

class Database
{
	
	public $conn;

	function __construct()
	{
		$this->conn = new Mysqli($_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_DATABASE']);
	}

	public function connection() {
		if (!$this->conn) {
			echo $this->conn->error;
		}
		return $this->conn;
	}

}
?>