  <?php
  session_start();
  $name = $_POST["username"]; 
  $password = $_POST["password"]; 

  $con=mysqli_connect("localhost","root","root","project");
  if (mysqli_connect_errno())
  { 
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $sql = "SELECT * FROM users where users.username = '".$name."'";
  $result = mysqli_query($con, $sql);
  if(mysqli_num_rows($result)>0){ 
    while($row = mysqli_fetch_assoc($result)){

      if(password_verify($password, $row["password"])){
        $_SESSION['username'] = $row["username"];
        $_SESSION['password'] = $password;
        $_SESSION['fname'] = $row["fname"];
        $_SESSION['lname'] = $row["lname"];
        $_SESSION['userid']= $row["userid"];
        $_SESSION['isLoggedIn'] = "TRUE" ;

        if($row["isAdmin"] == 0){
          $_SESSION['isAdmin'] = FALSE;
        }
        else       {
          $_SESSION['isAdmin'] = TRUE;  
        }
        
        header("Location: mainpage.html");

        exit;
      }
      else{
        $_SESSION['isLoggedIn'] = "FALSE" ;
        header("Location: login.html");
        exit;
      }
    }
  }
  else{
    echo "No User Found.";
    //header("Location: login.html");
    exit;
  }
  ?>