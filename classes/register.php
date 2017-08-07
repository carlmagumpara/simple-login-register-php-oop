<?php  
	/**
	* 
	*/
	class Register
	{
		
		private $conn;

		function __construct($conn)
		{
			$this->conn = $conn;
		}

		public function execute($data)
		{
			$stmt = $this->conn->prepare('INSERT INTO users (name, email, password) VALUES (?,?,?)');
			$stmt->bind_param('sss', $data['name'], $data['email'], $data['password']);
			if ($stmt->execute()) {
				return true;
			} else {
				return false;
			}

		}

		public function checkEmailIfExist($email)
		{
			$stmt = $this->conn->prepare('SELECT * FROM users WHERE email = ?');
			$stmt->bind_param('s', $email);
			$stmt->execute();
			$result = $stmt->get_result();
			if ($result) {
				if ($result->num_rows > 0) {
					return true;
				} else {
					return false;
				}
			}
		}


	}
?>