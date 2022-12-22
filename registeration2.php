<!DOCTYPE html>
<html>
<head>
	<title>Publicgram - redirecting </title>
</head>
<body bgcolor="skyblue">

</body>
</html>
<?php
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
if ($password == $password2) {
	# code...

if (!empty($name) || !empty($password) || !empty($email)){
	$host = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbname = "ed_project";

//create connection
	$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

	if (mysqli_connect_error()) {
		
	} else {
		$SELECT = "SELECT email From user Where email= ? Limit 1";
		$INSERT = "INSERT INTO user(name,email,password) values('$name', '$email', '$password')";

//Prepare statement
		$stmt = $conn->prepare($SELECT);
		$stmt->bind_param("s", $email);
		$stmt->execute();
		$stmt->bind_result($email);
		$stmt->store_result();
		$rnum = $stmt->num_rows;

		if ($rnum==0) {
			$stmt->close();

			$stmt = $conn->prepare($INSERT);
		
			$stmt->execute();
			echo "<script>alert('Inserted!!You would be redirrected to login page !!')</script>";
			header('refresh: 3; login.php');
				} else {
	echo "<script>alert('Already Exists!!You would be redirrected to registeration page !!')</script>";
			header('refresh: 3; register.php');	
	}
	$stmt->close();
	$conn->close();
}
} else {
	echo "<script>alert('All field are required !! You would be redirrected to registeration page !!')</script>";
			header('refresh: 1; register.php');
	
	die();
}
} else{
	echo "<script>alert('The two passwords do not match !!You would be redirrected to registeration page !!')</script>";
	header('refresh: 3; register.php');
}
;
?>