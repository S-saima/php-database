<!DOCTYPE html>
<html>
<head>
	<title>Data Insert</title>
</head>
<body>

	<h1>Data Insert</h1>

	<?php 

	$hostname = "localhost";
	$username = "saima";
	$password = "123";
	$dbname = "task";

	
	$conn1 = mysqli_connect($hostname, $username, $password, $dbname);
	if(mysqli_connect_error()) {
		echo "2. Database Connection Failed!...";
		echo "<br>";
		echo mysqli_connect_error();
	}
	else {
		echo "1. Database Connection Successful!";


		$stmt1 = mysqli_prepare($conn1, "insert into user (FirstName,LastName,BirthDate,Gender,Address,Email,UserName,Password) values (?, ?, ?, ?, ?, ?, ?, ?)");
		mysqli_stmt_bind_param ($stmt1, "ssssssss", $a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8);
		$a1 = $_POST['fname'];
		$a2 = $_POST['lname'];
        $a3 = $_POST['dob'];
        $a4 = $_POST['Gender'];
        $a5 = $_POST['add'];
        $a6 = $_POST['email'];
        $a7 = $_POST['username'];
        $a8 = $_POST['password'];

		$res = mysqli_stmt_execute($stmt1);

		if($res) {
			echo "Data Insert Successful!";
		}
		else {
			echo "Failed to Insert Data.";
			echo "<br>";
			echo $conn1->error;
		}
	}

	mysqli_close($conn1);

	?>

</body>
</html>