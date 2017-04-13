
<!DOCTYPE html>
<html>
<title>Realtor</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style.css">
<style>
html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}

</style>
<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-theme w3-top w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-right w3-hide-large w3-hover-white w3-large w3-theme-l1"></a>
    <a href="index.php" class="w3-bar-item w3-button w3-theme-l1">Realtor.com</a>
    <a href="buy.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Buy</a>
    <a href="sell.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Sell</a>
    <a href="rent.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Rent</a>
    <a href="news.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">News & Advice</a>
    <a href="mycart.php" class="w3-bar-item w3-button w3-hide-small w3-hide-medium w3-hover-white w3-right">Shopping Cart</a>
     <a href="logout.php" class="w3-bar-item w3-button w3-hide-small w3-hide-medium w3-hover-white w3-right">Logout</a>
  </div>
</div>

<header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
<div> 
  <img class="w3-image" src="background-main.jpg" alt="Architecture" width="1500" height="800">

  
  <div class = "text_center">
    <div class = "top-left">
 
    <h3> Welcome <?php session_start(); echo $_SESSION['fname']." ".$_SESSION['lname']; ?></h3>

  </div>
  <h1> Discover Your Perfect Home </h1>
  <h3> with the most complete source of homes for sale & real estate near you</h3>
  </div>
  <div class = "text_center_1 w3-xlarge">
  <a href="buy.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Buy</a>
  <a href="rent.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Rent</a>
  <a href = "justSold.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Just Sold</a>
  <a href = "estimate.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Home Estimate</a>
  </div>
</header>
</body>
</html>
