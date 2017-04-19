<?php
session_start();

$action = $_GET['a'] ;
$password = $_GET['password'];


if($action == "logOut"){
	session_destroy();
	header('Location: mainpage.html');
	exit;
}
else if($action == "verifyAdmin"){

$success = FALSE;
	if($_SESSION['isLoggedIn'] == "TRUE"){
		if( $_SESSION['isAdmin']  ){
			$con=mysqli_connect("localhost","root","root","project");
			  if (mysqli_connect_errno())
			  { 
			      echo "Failed to connect to MySQL: " . mysqli_connect_error();
			  }
			  else
			  {
				  $sql = "SELECT * FROM users where users.username = '".$_SESSION['username']."'";
				  $result = mysqli_query($con, $sql);
				  if(mysqli_num_rows($result)>0){ 
				    while($row = mysqli_fetch_assoc($result)){
				      if(password_verify($password, $row["password"])){
				      echo "success";
				      $success = TRUE;
				      break;
				      }
				      else{
				      	continue;
				      }
					}
					if(!$success)
					echo "Sorry, password doesnt match.";
			      }
			  }
		}	else{
			echo "Sorry, you are no longer an admin for this module.";
		}
	} else{
		echo "Please, login before you can continue.";
	}
}
else{
	if($_SESSION['isLoggedIn'] == "TRUE")
		echo ("index.php");
	else echo "no";
	
}
?>