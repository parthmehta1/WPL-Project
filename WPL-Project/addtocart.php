<?php
session_start();
$houseid = $_POST['houseid'];
$userid = $_SESSION['userid'];
$cart[] = array();

$con=mysqli_connect("localhost","root","root","project");
if (mysqli_connect_errno())
{ 
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = "insert into cart (userid,houseid) values ($userid,$houseid)";

$result = mysqli_query($con, $sql);

$cart[] = "Hi".$houseid." ".$userid." added";

echo json_encode($cart);

?>