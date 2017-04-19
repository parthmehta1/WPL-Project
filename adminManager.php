<?php
session_start();

$action = $_POST['action'];
$price = $_POST['selectPrice'];
$bed = $_POST['selectBeds'];
$bath = $_POST['selectBaths'];
$sqfeet = $_POST['sqfeet'];
$zip = $_POST['zip'];
$id =$_POST['id'];

 $con=mysqli_connect("localhost","root","root","project");
 if (mysqli_connect_errno())
    { 
     echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }



if($action == "add"){
		$sql = "INSERT into house(bed, bath, price, zip , sqfeet) VALUES('".$bed."','".$bath."','".$price."','".$zip."','".$sqfeet."' )";
 		$result = mysqli_query($con, $sql);
        if($result){ 
        	
        	        echo '<script type="text/javascript">alert("Property successfully added."); </script>';

        	        header("Location: admin.php");
        }
        else{
            echo "An error has occur, please try again.";
        }
}
else if($action == "delete"){
		$sql = "UPDATE house SET isdeleted = true WHERE houseid ='".$id."'";
		 		$result = mysqli_query($con, $sql);
		  if($result){ 
        	echo "Property successfully deleted.";
        }
        else{
            echo "An error has occur, please try again.";
        }
}
else if($action == "update"){
			$sql = "UPDATE house SET bed = '".$bed."', bath = '".$bath."', price = '".$price."', zip = '".$zip."' , sqfeet = '".$sqfeet."' WHERE houseid ='".$id."'";
$result = mysqli_query($con, $sql);
		  if($result){ 
        	        echo '<script type="text/javascript">alert("Property successfully updated."); </script>';
        	        header("Location: admin.php");        }
        else{
            echo "An error has occur, please try again.";
        }
}

else if($action == "get"){
	$sql = "SELECT * FROM house WHERE houseid ='".$id."'";
 		$result = mysqli_query($con, $sql);
 		$rows = array();
        if(mysqli_num_rows($result)>0){ 
    while($r = mysqli_fetch_assoc($result)){
    $rows[] = $r;
    }
    echo json_encode($rows);
        }
        else{
            echo "An error has occur, please try again.";
        }
}

else if($action == "recover"){
		$sql = "UPDATE house SET isdeleted = false WHERE houseid ='".$id."'";
		 		$result = mysqli_query($con, $sql);
		  if($result){ 
        	echo "Property is now available..";
        }
        else{
            echo "An error has occur, please try again.";
        }
}

?>