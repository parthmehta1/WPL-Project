<html>
   
   <head>
      <title>Paging Using PHP</title>
   </head>
   
   <body>
      <?php
      $price = '42';
      echo $price;
      
     echo (int)$price;
    /* $con=mysqli_connect("localhost","root","root","project");
// Check connection
      if (mysqli_connect_errno())
       { 
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
      $sql = "SELECT * FROM house";
      $result = mysqli_query($con, $sql);
      $rec_limit = 3;
     $rec_count = mysqli_num_rows($result);
         if( isset($_GET['page'] ) ) {
            $page = $_GET['page'] + 1;
            $offset = $rec_limit * $page;
         }else {
            $page = 0;
            $offset = 0;
         }
         
         $left_rec = $rec_count - ($page * $rec_limit);
         
         while($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td style = 'padding:5px'><img src = "
         .$row["image"]." width = '200' height = '200'></td><td style = 'padding:25px'>    Beds: "
         .$row["bed"]."bed</td><td style = 'padding:25px'>|       Baths : "
         .$row["bath"]."bath</td><td style = 'padding:25px'>|   Square Feet: "
         .$row["sqfeet"]." sq. feet</td><td style = 'padding:25px'>|     Price: $"
         .$row["price"]."</td><td><button type='button' class='cartBtn' id = ".$row['houseid']." value = 'AddtoCart'>Add to cart</button></td></tr><br>";
         }
         
         if( $page > 0 ) {
            $last = $page - 2;
            echo "<a href = \"$_PHP_SELF?page = $last\">Last 10 Records</a> |";
            echo "<a href = \"$_PHP_SELF?page = $page\">Next 10 Records</a>";
         }else if( $page == 0 ) {
            echo "<a href = \"$_PHP_SELF?page = $page\">Next 10 Records</a>";
         }else if( $left_rec < $rec_limit ) {
            $last = $page - 2;
            echo "<a href = \"$_PHP_SELF?page = $last\">Last 10 Records</a>";
         }
         
         mysqli_close($conn);

         */
      ?>

      
   </body>
</html>