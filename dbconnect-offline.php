<?PHP

session_start();
$db = mysqli_connect('localhost','root','root','homelessdiamonds');
if (!$db) { echo 'uhoh' ;};
if($db->connect_errno > 0){
	die('Unable to connect to database ['.$db->connect_error.']');
	};


?>