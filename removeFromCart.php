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

$sql = "delete from cart where houseid=".$houseid." AND userid = ".$userid;

$result = mysqli_query($con, $sql);

$cart[] = "Hi".$houseid." ".$userid." deleted";

echo json_encode($cart);

?>