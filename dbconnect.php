<?PHP

session_start();
$db = mysqli_connect('localhost','cl50-admin-sys','homelessadmin','cl50-admin-sys');
if (!$db) { echo 'uhoh' ;};
if($db->connect_errno > 0){
	die('Unable to connect to database ['.$db->connect_error.']');
	};


?>