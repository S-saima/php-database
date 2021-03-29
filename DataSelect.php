<!DOCTYPE html>
<html>
<head>
    <title>Data Select</title>
</head>
<body>

    <h1>Data Select</h1>
    <?php 
    $hostname = "localhost";
    $username = "saima";
    $password = "123";
    $dbname = "task";

    
    $conn1 = new mysqli($hostname, $username, $password, $dbname);

 
    if($conn1->connect_errno) {
        echo "1. Database Connection Failed!...";
        echo "<br>";
        echo $conn1->connect_error;
    }
    else {
        echo "1. Database Connection Successful!";

        echo "<br>";

        $stmt1 = $conn1->prepare("select Id, FirstName,LastName,Email,UserName, Password from user where UserName = ? && Password = ?");
        $stmt1->bind_param("ss", $a1 , $a2);
        $a1 = $_POST['username1'];
        $a2 = $_POST['password1'];

        $stmt1->execute();
        $res2 = $stmt1->get_result();
        $user = $res2->fetch_assoc();

 

        echo "<br>";
        echo "<br>";
        echo "Id: " .$user['Id'];
                echo "<br>";
                echo "Name: " .$user['FirstName']." " .$user['LastName'];
                echo "<br>";
                echo "Email: " .$user['Email'];
                 echo "<br>";
                echo "Username: " .$user['UserName'];
                echo "<br>";
                echo "Password: " .$user['Password'];
                echo "<br>";
                echo "<br>";

 

    }

 

    $conn1->close();
    ?>

 

</body>
</html>