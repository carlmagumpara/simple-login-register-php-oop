<?php  
	/**
	* 
	*/
	class User
	{
		
		private $conn;

		function __construct($conn)
		{
			$this->conn = $conn;
		}

		public function all()
		{
			$stmt = $this->conn->prepare('SELECT * FROM users');
			$stmt->execute();
			$result = $stmt->get_result();
			$users = [];
			if ($result) {
				if ($result->num_rows > 0) {
					while ($row = mysqli_fetch_assoc($result)) {
						$users[] = array(
							'id' => $row['id'], 
							'name' => $row['name'], 
							'email' => $row['email'], 
						);					
					}
					return $users;
				}
			}
		}

	}
?>