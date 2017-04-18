<?php
session_start();
$flag = 0;

$con=mysqli_connect("localhost","root","root","project");
// Check connection
if (mysqli_connect_errno())
	{ 
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql = "SELECT * FROM users";
$result = mysqli_query($con, $sql);
if(mysqli_num_rows($result)>0){	
	while($row = mysqli_fetch_assoc($result)){
		if($row["email"]==$_POST["email"] && $row["password"] == $_POST["password"]){
			$flag = 1;
		$_SESSION["userid"] = $row["userid"];
		$_SESSION["email"] = $_POST["email"];
		$_SESSION["fname"] = $row["firstname"];
		$_SESSION["password"] = $_POST["password"];
		$_SESSION["lname"] = $row["lastname"];
		}
}
}
else{
	echo "0 results";
}

if($flag == 1){
header("Location: index.php");
exit;
 }
else{
	header("Location: mainpage.html");
	exit;
}

?>