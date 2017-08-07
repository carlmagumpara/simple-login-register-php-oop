<?php  
/**
* 
*/
class Login
{
	
	private $conn;

	function __construct($conn)
	{
		$this->conn = $conn;
	}

	public function execute($data){
		$stmt = $this->conn->prepare('SELECT * FROM users WHERE email = ? AND password = ?');
		$stmt->bind_param('ss', $data['email'], $data['password']);
		$stmt->execute();
		$result = $stmt->get_result();
		if ($result) {
			if ($result->num_rows > 0) {
			    while($row = mysqli_fetch_assoc($result)) {
			        $data = array(
			        	'id' => $row['id'],
			        	'name' => $row['name'],
			        	'email' => $row['email'], 
		        	);
			    }
			    return $data;
			} else {
				return false;
			}
		} else {
			return json_encode(array(
				'result' => 'error', 
				'message' => 'error', 
			));
		}
	}
}
?>