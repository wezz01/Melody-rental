<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: loginboredsumo.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome | Admin</title>
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
        <h1 alig="center" class="display-1"><b>Instrumental store</b><small class="text-muted">(ADMIN)</small></h1>
    </div>
    <p>
       <div class="topnav">
  <a href="#"><b>About Us</b></a>
  <a href="createa.php"><b>Add Items</b></a>
  <a href="loginboredsumo.php"><b>Sign out</b></a>
  <a href="buyerdetails.php"><b>Buyer Details</b></a>
  <br>
  <br>

</div>
        <?php
        require_once "delete.php";
        ?>
        <?php
        if(isset($_SESSION['message'])):
        ?>
      <div class="alert alert-<?=$_SESSION['msg_type']?>">
        
        <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
        ?>

      </div>
    <?php endif ?>

        <?php
        /* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "shop");
 
        $sql = "SELECT * FROM gadgets";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
           echo "<div class='col-md-4'>";

           echo "<a href='$row[photosource]'><img src='".$row['photosource']."'height = '300' width = '400'/>";
           echo "<br>";
           echo "<br>Item: ".$row['model'];
           echo "<br>Price: ".$row['price'];
           echo "<br>Description: " .$row['description'];
           echo "<br>Phone: " .$row['Phone'];
           echo "<br>Number of items left: " .$row['numb'];
           echo "<br>Brand: " .$row['brands'];
           echo "<br>";
           echo "<a href='update.php?i=$row[product_ID]&it=$row[model]&p=$row[price]&d=$row[description]&x=$row[photosource]&ph=$row[Phone]&c=$row[brands]' class='btn btn-primary' role='button'>EDIT</a>";
           echo "   ";
           echo "<a href='delete.php?delete=$row[product_ID]' class='btn btn-danger' role='button'>DELETE</a>";
           echo "<br><br><br>";  
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