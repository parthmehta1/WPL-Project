
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
<body style = "background-color: grey;">

  <!-- Navbar -->
  <div class="w3-top">
    <div class="w3-bar w3-theme w3-top w3-left-align w3-large">
      <a class="w3-bar-item w3-button w3-right w3-hide-large w3-hover-white w3-large w3-theme-l1"></a>
      <div id = "adminActions">
        <a id ="btnAdd" href="#add" class="w3-bar-item w3-button w3-theme-l1" disable>Add Listing</a>
        <a id ="btnDelete" href="#delete" class="w3-bar-item w3-button w3-hide-small w3-hover-white" disable>Delete Listing</a>
        <a id ="btnUpdate" href="#update" class="w3-bar-item w3-button w3-hide-small w3-hover-white" disable>Update Listing</a>
        <a id ="btnRecover" href="#recover" class="w3-bar-item w3-button w3-hide-small w3-hover-white" disable>Recover Listing</a>
      </div>
      <a href="logout.php" class="w3-bar-item w3-button w3-hide-small w3-hide-medium w3-hover-white w3-right">Logout</a>
      <a href="buy.php" class="w3-bar-item w3-button w3-hide-small w3-hide-medium w3-hover-white w3-right">Back</a>

    </div>
  </div>

  <header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
    <div> 
      <img class="w3-image" src="image/background-main.jpg" alt="Architecture" width="1500" height="800">


      <div class = "text_center">
        <div class = "top-left">

          <h3> Welcome <?php session_start(); echo $_SESSION['fname']." ".$_SESSION['lname']; ?></h3>
          <h3 id = "request">Please, select a action item from menu-bar to continue.</h3>

        </div>
      </div>
      <div  id= "addDiv" class = "text_center_1 w3-xlarge">
       <form id = "addForm" action = 'adminManager.php' method = 'post'>
        <input type="hidden" name="action" value="add" />
        <label for="Price">Price:</label>
        <input type="text" name="selectPrice" id="selectPrice" required pattern="[0-9]{3,}"
        oninvalid="this.setCustomValidity('Price should between numbers starting $100. Ex - 100 , 2500 etc.')"
        oninput="setCustomValidity('')">
        <label for="sqfeet">Sq feet:</label>
        <input type="text" name="sqfeet" id="sqfeet" required pattern="[0-9]{3,}"
        oninvalid="this.setCustomValidity('Area should number starting 100 sq feet. Ex - 100, 1250 etc.')"
        oninput="setCustomValidity('')">
        <label for="zip">Zip:</label>
        <input type="text" name="zip" id="zip" required pattern="[0-9]{5,5}"
        oninvalid="this.setCustomValidity('Zip should be a five digit number.')"
        oninput="setCustomValidity('')">
        <label for="selectBeds">Select Beds:</label>
        <select id = "selectBeds" name = "selectBeds" required>
          <option value = "">None</option>
          <option value = "1">1</option>
          <option value = "2">2</option>
          <option value = "3">3</option>
          <option value = "4">4</option>
          <option value = "5">5</option>
          <option value = "6">6</option> 
        </select>
        <label for="selectBaths">Select Baths:</label>
        <select id = "selectBaths" name = "selectBaths" required>
          <option value = "">None</option>
          <option value = "1">1</option>
          <option value = "2">2</option>
          <option value = "3">3</option>
          <option value = "4">4</option>
          <option value = "5">5</option>
          <option value = "6">6</option>
        </select>
        <button id = "addBtn" value = "Add Property">Add Property</button>
      </form>
    </div>
    <div  id= "delete" class = "text_center_1 w3-xlarge">
     <?php
        //sql connection credentials
     session_start();
     $servername = "localhost";
     $username = "root";
     $password = "root";
     $dbname="project";

     $con=mysqli_connect($servername, $username,$password,$dbname);
     if (!$con) 
     {
      die("Connection failed: " . mysqli_connect_error());
    }

    $currentsql = "Select * from house where isdeleted = false";

    $result = mysqli_query($con,$currentsql);

    if (mysqli_num_rows($result) > 0) 
    {
      while($row = mysqli_fetch_assoc($result)) 
      { 

        echo "<tr><td style = 'padding:5px'><img src = image/"
        .$row["image"]." width = '200' height = '200'></td><td style = 'padding:25px'>   Beds: "
        .$row["bed"]."bed</td><td style = 'padding:25px'>|    Baths : "
        .$row["bath"]."bath</td><td style = 'padding:25px'>|   Square Feet: "
        .$row["sqfeet"]." sq. feet</td><td style = 'padding:25px'>|    Price: $"
        .$row["price"]."</td><td><button type='button' class='deleteBtn' id = ".$row['houseid']."  
        value = 'deleteCart'>Delete Property</button></td></tr><br>";
      }

    }
    else {
      echo "0 results";
    }

    mysqli_close($con);

    ?> 
  </div>
  <div  id= "update" class = "text_center_1 w3-xlarge">
 <?php
        //sql connection credentials
     session_start();
     $servername = "localhost";
     $username = "root";
     $password = "root";
     $dbname="project";

     $con=mysqli_connect($servername, $username,$password,$dbname);
     if (!$con) 
     {
      die("Connection failed: " . mysqli_connect_error());
    }

    $currentsql = "Select * from house where isdeleted = false";

    $result = mysqli_query($con,$currentsql);

    if (mysqli_num_rows($result) > 0) 
    {
      while($row = mysqli_fetch_assoc($result)) 
      { 

        echo "<tr id = ".$row['houseid']."row ><td style = 'padding:5px'><img src = image/"
        .$row["image"]." width = '200' height = '200'></td><td style = 'padding:25px'>   Beds: "
        .$row["bed"]."bed</td><td style = 'padding:25px'>|    Baths : "
        .$row["bath"]."bath</td><td style = 'padding:25px'>|   Square Feet: "
        .$row["sqfeet"]." sq. feet</td><td style = 'padding:25px'>|    Price: $"
        .$row["price"]."</td><td><button type='button' class='updateCart' id = ".$row['houseid']."  
        value = 'updateCart'>Update Property</button></td></tr><br>";
      }

    }
    else {
      echo "0 results";
    }

    mysqli_close($con);

    ?> 
  </div>

   <div  id= "updateSingle" class = "text_center_1 w3-xlarge">
       <form id="updateSingleForm" action = 'adminManager.php' method = 'post'>
        <input type="hidden" name="action" value="update" />
        <input type="hidden" name="id" id = "idSingle" />
        <label for="Price">Price:</label>
        <input type="text" name="selectPrice" id="selectPriceSingle" required pattern="[0-9]{3,}"
        oninvalid="this.setCustomValidity('Price should between numbers starting $100. Ex - 100 , 2500 etc.')"
        oninput="setCustomValidity('')">
        <label for="sqfeet">Sq feet:</label>
        <input type="text" name="sqfeet" id="sqfeetSingle" required pattern="[0-9]{3,}"
        oninvalid="this.setCustomValidity('Area should number starting 100 sq feet. Ex - 100, 1250 etc.')"
        oninput="setCustomValidity('')">
        <label for="zip">Zip:</label>
        <input type="text" name="zip" id="zipSingle" required pattern="[0-9]{5,5}"
        oninvalid="this.setCustomValidity('Zip should be a five digit number.')"
        oninput="setCustomValidity('')">
        <label for="selectBeds">Select Beds:</label>
        <select id = "selectBedsSingle" name = "selectBeds" required>
          <option value = "">None</option>
          <option value = "1">1</option>
          <option value = "2">2</option>
          <option value = "3">3</option>
          <option value = "4">4</option>
          <option value = "5">5</option>
          <option value = "6">6</option> 
        </select>
        <label for="selectBaths">Select Baths:</label>
        <select id = "selectBathsSingle" name = "selectBaths" required>
          <option value = "">None</option>
          <option value = "1">1</option>
          <option value = "2">2</option>
          <option value = "3">3</option>
          <option value = "4">4</option>
          <option value = "5">5</option>
          <option value = "6">6</option>
        </select>
        <button id = "updateSingleBtn" value = "Update Property">Update Property</button>
      </form>
    </div>

</header>

<p id="demo"></p>
<div id = "recover" class = "text_center_1 w3-xlarge">
  <?php
        //sql connection credentials
     session_start();
     $servername = "localhost";
     $username = "root";
     $password = "root";
     $dbname="project";

     $con=mysqli_connect($servername, $username,$password,$dbname);
     if (!$con) 
     {
      die("Connection failed: " . mysqli_connect_error());
    }

    $currentsql = "Select * from house where isdeleted = true";

    $result = mysqli_query($con,$currentsql);

    if (mysqli_num_rows($result) > 0) 
    {
      while($row = mysqli_fetch_assoc($result)) 
      { 

        echo "<tr id = ".$row['houseid']."row ><td style = 'padding:5px'><img src = image/"
        .$row["image"]." width = '200' height = '200'></td><td style = 'padding:25px'>   Beds: "
        .$row["bed"]."bed</td><td style = 'padding:25px'>|    Baths : "
        .$row["bath"]."bath</td><td style = 'padding:25px'>|   Square Feet: "
        .$row["sqfeet"]." sq. feet</td><td style = 'padding:25px'>|    Price: $"
        .$row["price"]."</td><td><button type='button' class='recoverBtn' id = ".$row['houseid']."  
        value = 'recoverBtn'>Property Available</button></td></tr><br>";
      }

    }
    else {
      echo "0 results";
    }

    mysqli_close($con);

    ?> 
</div>
</body>

<script>
$( document ).ready(function() {
 // $("#btnAdd").bind('click', false)
  //$("#btnUpdate").bind('click', false)
  //$("#btnDelete").bind('click', false)

  $("#addDiv").hide()
  $("#update").hide()
  $("#delete").hide()
  $("#updateSingle").hide()
  $("#recover").hide()

  $("#btnAdd").click(function(){
    $("#request").hide()
    $("#addDiv").show()
    $("#update").hide()
    $("#delete").hide()
    $("#updateSingle").hide()
      $("#recover").hide()

  });
  $("#btnUpdate").click(function(){
    $("#request").hide()
    $("#update").show()
    $("#delete").hide()
    $("#addDiv").hide()
    $("#updateSingle").hide()
      $("#recover").hide()


  });

  $("#btnDelete").click(function(){
    $("#request").hide()
    $("#delete").show()
    $("#update").hide()
    $("#addDiv").hide()
    $("#updateSingle").hide()
      $("#recover").hide()


  });

  $("#btnRecover").click(function(){
    $("#recover").show()
    $("#request").hide()
    $("#update").hide()
    $("#addDiv").hide()
    $("#updateSingle").hide()
    $("#delete").hide()

  });
    /*var person = prompt("Please re-enter your password", "Password");
    if (person != null) {
        $.ajax({ 
         url: 'sessionManager.php',
         data: {
          a: "verifyAdmin", 
          password: person.valueOf()
         },
         type: 'get',
         success: function(output) {
        //  debugger;
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
}*/



$(".deleteBtn").click(function(e){
 var r = confirm("Are you sure you want to delete this property ?"); 

if (r == true) {
   var formData = {
    'action'              : 'delete',
    'id'             : e.target.id
  };

  $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'adminManager.php', // the url where we want to POST
            data        : formData
          })
            // using the done promise callback
            .success(function(data) {
             confirm(data); 
             window.location.href = "admin.php";
           });
    }
  });

$(".recoverBtn").click(function(e){
  
  var formData = {
    'action'              : 'recover',
    'id'             : e.target.id
  };

  $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'adminManager.php', // the url where we want to POST
            data        : formData
          })
            // using the done promise callback
            .success(function(data) {
             confirm(data); 
             window.location.href = "admin.php";
           });
  });


$(".updateCart").click(function(e){
  debugger;
  var formData = {
    'action'              : 'get',
    'id'             : e.target.id
  };

  $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'adminManager.php', // the url where we want to POST
            data        : formData,
            dataType    : 'json'
          })
            // using the done promise callback
            .success(function(data) {
              $("#updateSingle").show()
              $("#update").hide()
              $("#idSingle").val(data[0].houseid) 
              $("#sqfeetSingle").val(data[0].sqfeet) 
              $("#zipSingle").val(data[0].zip) ;
              $("#selectPriceSingle").val(data[0].price); 
           });
  });


});

</script>

</html>
