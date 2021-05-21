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
$comment = $_POST['comment'];

$sqlinsert = "INSERT INTO opinion(comments) VALUES('$comment')";
//write the SQL STATEMENT FOR SAVING - INSERT

if(mysqli_query($dbconnect,$sqlinsert)){
	
	echo "<script type='text/javascript'> alert('Data saved successfully');</script>";
	header('location: index.php');
}
else{
	
	echo "<script type='text/javascript'> alert('Your comment has not been posted, please try again later');</script>";
}

//close the connection

mysqli_close($dbconnect);

}
else{
	
	header('location: index.php');
}


?>











