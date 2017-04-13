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
body  {
    background-image: url("mycart.jpg");
    color: black;
    background-size: 100%;
    background-repeat: no-repeat;
    margin-top: 100px
}
.cartBtn{
	border:none;
	display:inline-block;
	outline:0;
	padding:8px 16px;
	vertical-align:middle;
	overflow:hidden;
	text-decoration:none;
	color:inherit;
	background-color:#0e65f2;
	text-align:center;
	cursor:pointer;
	white-space:nowrap
	text-align:center;
	color: white
}
</style>
<header class="w3-display-container w3-content w3-wide" style="max-width:1500px;font-size:20px;" id="home">


<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

  <script type="text/javascript">

$(document).ready(function(){
    $(".cartBtn").click(function(e){
 		e.preventDefault();
 		var houseid = $(this).attr('id');
		$.ajax({
			
		url:"addtocart.php",
		type: "POST",
		cache: false,
		dataType: 'json',
		data : {'houseid':houseid},
		success: function(data){
			$(".target").append(data);
		}
		
		});	
	});
	});

	</script>   
	<body >
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

<?php
	//sql connection credentials
session_start();
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname="project";
//	$zip=$_POST['inputZip'];
	$price = $_POST['selectPrice'];
	$bed = $_POST['selectBeds'];
	$bath = $_POST['selectBaths'];
	$con=mysqli_connect($servername, $username,$password,$dbname);
	if (!$con) 
	{
		die("Connection failed: " . mysqli_connect_error());
	}


	$sql = "Select * from house";

	if($price == 'defaultPrice' && $bed == 'defaultBeds' && $bath == 'defaultBaths'){
		$result = mysqli_query($con, $sql);
		if (mysqli_num_rows($result) > 0) 
	{
		// output data of each row
		while($row = mysqli_fetch_assoc($result)) 
		{	
			
			echo "<tr><td style = 'padding:5px'><img src = "
			.$row["image"]." width = '200' height = '200'></td><td style = 'padding:25px'> 	 Beds: "
			.$row["bed"]."bed</td><td style = 'padding:25px'>| 		Baths : "
			.$row["bath"]."bath</td><td style = 'padding:25px'>| 	 Square Feet: "
			.$row["sqfeet"]." sq. feet</td><td style = 'padding:25px'>| 	 Price: $"
			.$row["price"]."</td><td><button type='button' class='cartBtn' id = ".$row['houseid']." value = 'AddtoCart'>Add to cart</button></td></tr><br>";
			//echo "For Year $year1 and Gender $gender1, Top Name is: ".$row["name"];
		}

	}
	 else {

		echo "0 results";
	}


	}


	mysqli_close($con);

?> 
<div class = "target"></div>   
</body>
</html>