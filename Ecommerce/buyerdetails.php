<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Details | Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <style type="text/css">
        body{ font: 14px sans-serif; }
* {
  box-sizing: border-box;
}

body {
  margin: 0;
}

/* Style the header */
.header {
  background-color: #f1f1f1;
  padding: 20px;
  text-align: center;
}

/* Style the top navigation bar */
.topnav {
  overflow: hidden;
  background-color: #333;
}

/* Style the topnav links */
.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

/* Change color on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}
    </style>
</head>
<body>
    <div class="jumbotron">
        <h1 align ="center" class="display-1"><b>InstrumentalStore</b><small class="text-muted">(ADMIN)</small></h1>
    </div>
    <header align = "center">BUYER DETAILS</header>
    <p>
       <div class="topnav">
  <a href="#"><b>About Us</b></a>
  <a href="createa.php"><b>Add Items</b></a>
  <a href="boredsumo.php"><b>Home</b></a>
  <a href="loginboredsumo.php"><b>Sign out</b></a>
  <br>
  <br>

</div>
        <?php
        /* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "shop");
 
        $sql = "SELECT * FROM buyers";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
           echo "<div class='col-md-4'>";
           
echo "<b>Customer Info</b>";
           echo "<br>Buyer Id: ".$row['buyer_id'];
           echo "<br>Buyer Name: ".$row['name'];
           echo "<br>Contact Number: " .$row['phone'];
           echo "<br>Address of Delivery: " .$row['address'];
           echo "<br>Bank of the buyer: " .$row['bank'];
           echo "<br>Card Information: " .$row['credit'];
           $mid = $row['product_ID'];
echo "<br><b>Item Info</b><br>";
          $sql2="SELECT * FROM instruments WHERE product_ID = '$mid'";
          if ($res = mysqli_query($link,$sql2)) {
            if (mysqli_num_rows($res)>0) {
            while ($col = mysqli_fetch_array($res)) {
          echo "<a href='$col[photosource]'><img src='".$col['photosource']."'height = '100' width = '150'/></a>";
           echo "<br>Model: ".$col['model'];
           echo "<br>Brand: ".$col['brands'];
           echo "<br>Price: ".$col['price'];
           echo "<br>Description: ".$col['description'];
           echo "<br>Phone: ".$col['Phone'];
           echo "<br>No of items left: ".$col['numb'];
           echo "<br><br><br><br>"; 
            }
          }
        } 
           echo "</div>";
        }
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute." . mysqli_error($link);
}
?>