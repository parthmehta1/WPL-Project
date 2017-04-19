
<!DOCTYPE html>
<html>
<title>Realtor</title>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/style.css">
<script src="js/jquery-1.9.1.min.js"></script>

</head>
<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-theme w3-top w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-right w3-hide-large w3-hover-white w3-large w3-theme-l1"></a>
    <div id = "adminActions">
    <a id ="btnAdd" href="#add" class="w3-bar-item w3-button w3-theme-l1" disable>Add Listing</a>
    <a id ="btnDelete" href="#delete" class="w3-bar-item w3-button w3-hide-small w3-hover-white" disable>Delete Listing</a>
    <a id ="btnUpdate" href="#update" class="w3-bar-item w3-button w3-hide-small w3-hover-white" disable>Update Listing</a>
    </div>
     <a href="logout.php" class="w3-bar-item w3-button w3-hide-small w3-hide-medium w3-hover-white w3-right">Logout</a>
          <a href="search.php" class="w3-bar-item w3-button w3-hide-small w3-hide-medium w3-hover-white w3-right">Back</a>

  </div>
</div>

<header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
<div> 
  <img class="w3-image" src="image/background-main.jpg" alt="Architecture" width="1500" height="800">

  
  <div class = "text_center">
    <div class = "top-left">
 
    <h3> Welcome <?php session_start(); echo $_SESSION['fname']." ".$_SESSION['lname']; ?></h3>

  </div>
  </div>
  <div  id= "add" class = "text_center_1 w3-xlarge">
 
  </div>
  <div  id= "update" class = "text_center_1 w3-xlarge">
 
  </div>
  <div  id= "delete" class = "text_center_1 w3-xlarge">
 
  </div>
</header>

<p id="demo"></p>

</body>

<script>
$( document ).ready(function() {
  $("#btnAdd").bind('click', false)
  $("#btnUpdate").bind('click', false)
  $("#btnDelete").bind('click', false)


    var person = prompt("Please re-enter your password", "Password");
    if (person != null) {
        $.ajax({ 
         url: 'sessionManager.php',
         data: {
          a: "verifyAdmin", 
          password: person.valueOf()
         },
         type: 'get',
         success: function(output) {
          debugger;
                  if(output == "success"){
                       $("#btnAdd").unbind('click', false)
                       $("#btnUpdate").unbind('click', false)
                       $("#btnDelete").unbind('click', false)
                  }
                  else{
                    var r = confirm( output.valueOf() + "Press ok to go back on listing page or close to re-try.");
                    if (r == true) {
                            window.location.href = "buy.php";
                    }
                    else{
                            window.location.href = "admin.php";
                    }
                  }
          }
        });
    }
});
</script>

</html>
