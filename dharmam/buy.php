<!DOCTYPE html>

<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/style.css">
<style>
html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}

</style>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<body>
<div class="w3-top">
  <div class="w3-bar w3-theme w3-top w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-right w3-hide-large w3-hover-white w3-large w3-theme-l1"></a>
    <a href="index.php" class="w3-bar-item w3-button w3-theme-l1">Realtor.com</a>
    <a href="buy.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Buy</a>
    <a href="sell.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Sell</a>
    <a href="rent.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Rent</a>
    <a href="news.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">News & Advice</a>
       <a href="logout.php" class="w3-bar-item w3-button w3-hide-small w3-hide-medium w3-hover-white w3-right">Logout</a>

    <a href="mycart.php" class="w3-bar-item w3-button w3-hide-small w3-hide-medium w3-hover-white w3-right">Shopping Cart</a>
      <?php session_start() ; 
     if($_SESSION['isAdmin']){
      echo "<a href='admin.php' class='w3-bar-item w3-button w3-hide-small w3-hide-medium w3-hover-white w3-right'>Admin Actions</a>";
     }?>
  </div>
</div>
<header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
  <img class="w3-image" src="image/background-buy.jpg" alt="Architecture" width="1500" height="800">
  <div class = "text_center_search">

  <form action = 'search.php' method = 'post'>
	<!--<input type="text" name="search" placeholder="Enter Zip..">!-->
	<br><br>
	<select name = "selectPrice">
		<option value = "defaultPrice">Any Price</option>
		<option value = "0">$0</option>
		<option value = "100k">$100k</option>
		<option value = "200k">$200k</option>
		<option value = "300k">$300k</option>
		<option value = "400k">$400k</option>
		<option value = "500k">$500k</option>
		<option value = "600k">$600k</option>
		<option value = "700k">$700k</option>
		<option value = "800k">$800k</option>
		<option value = "900k">$900k</option>
	</select>
	<select name = "selectBeds">
		<option value = "defaultBeds">Any Beds</option>
		<option value = "1">1</option>
		<option value = "2">2</option>
		<option value = "3">3</option>
		<option value = "4">4</option>
		<option value = "5">5</option>
		<option value = "6">6</option>
	</select>
	<select name = "selectBaths">
		<option value = "defaultBaths">Any Baths</option>
		<option value = "1">1</option>
		<option value = "2">2</option>
		<option value = "3">3</option>
		<option value = "4">4</option>
		<option value = "5">5</option>
		<option value = "6">6</option>
	</select>
	<button id = "searchButton" value = "Search House">Search House</button>
  </form>
  </div>
  <div class = "resultDiv"></div>
  <div class = "text_center_buy">
  <h1> Housing Selection Made Easy </h1>
  <h3> Just For You</h3>
  </div>
</header>

</body>
</html>