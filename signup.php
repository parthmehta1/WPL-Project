<?php
    session_start();
    $username = $_POST["username"]; 
    $password = $_POST["password1"]; 
    $fname = $_POST["firstname"];
    $lname = $_POST["lastname"];

    $con=mysqli_connect("localhost","root","root","project");
        if (mysqli_connect_errno())
        { 
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
    $sql = "SELECT * FROM users where users.username = '".$username."'";
 
    $result = mysqli_query($con, $sql);

      if(mysqli_num_rows($result)>0){ 
        echo "User already exists.";
        header("Location: login.html");
      }
      else{
       $options = [
       'cost' => 11,
       'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
       ];

       $phash = password_hash($password, PASSWORD_BCRYPT, $options);
       
       $sql = "Insert into users(username, password, fname, lname ) values('".$username."','".$phash."','".$fname."','".$lname."')";
      
       $result = mysqli_query($con, $sql);
        if($result){ 
              header("Location: login.html");
        }
        else{
            echo "<h3>An error has occur, please close this window and try again.</h3>";
        }
    }
?>