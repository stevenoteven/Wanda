<?php

$hostname = "localhost";
$username = "root";
$password = "";
$db = "project";

//connect to the database using procedural method

$dbconnect = mysqli_connect($hostname,$username,$password,$db);

if(!$dbconnect){
	
	echo "an error occured while connecting to the database";
	
}

if(isset($_POST['save'])){
//get values from the form
$username = $_POST['uname'];
$password = $_POST['password'];
$dbchoice = $_POST['dbchoice'];

    switch ($dbchoice) {
        case 'admin':
            $sql = 'insert into `administrator` (`username`, `password`) values (?,?)';
        break;
        case 'expert':
            $sql = 'insert into `experts` (`username`, `password`) values( ?,? )';
        break;
        default:
            $sql = false;
        break;
    }
 
    if ($sql) {
        $stmt = $dbconnect->prepare($sql);
        $stmt->bind_param('ss', $username, $password);
        $stmt->execute();
        
        header('Location: index.php');
        exit;
    }
}


?>











