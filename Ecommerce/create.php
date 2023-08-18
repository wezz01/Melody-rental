
<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?><html lang="en">
<head>
  <title>Add your item</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
.w3-sidebar a {font-family: "Roboto", sans-serif}
body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}
</style>
<body class="w3-content" style="max-width:1200px">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:200px" id="mySidebar">
  <div class="w3-container w3-display-container w3-padding-16">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
    <h3 class="w3-wide"><b>LOGO</b></h3>
  </div>
  <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
      <a href="welcome.php" class="w3-bar-item w3-button">Home</a>
      <a href="logout.php" class="w3-bar-item w3-button">Sign Out</a>
  </div>
</nav>

<!-- Top menu on small screens -->
<header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
  <div class="w3-bar-item w3-padding-24 w3-wide">LOGO</div>
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></a>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:200px">

  <!-- Push down content on small screens -->
  <div class="w3-hide-large" style="margin-top:83px"></div>
  
</head>
<body>
<?php
include_once 'config.php';
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "shop");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
//instantiate database and product objects


if($_POST)
{
// select product property values
	// Escape user inputs for security
$price = mysqli_real_escape_string($link, $_REQUEST['price']);
$phone = mysqli_real_escape_string($link, $_REQUEST['Phone']);
$description = mysqli_real_escape_string($link,$_REQUEST['description']);
$numb = mysqli_real_escape_string($link,$_REQUEST['numb']);
$filepath = "uploads/" . $_FILES["file"]["name"];

move_uploaded_file($_FILES["file"]["tmp_name"], $filepath);
 
// Attempt insert query execution
$sql = "INSERT INTO instruments (price,Phone,description,photosource,numb,) VALUES ('$price','$phone','$description','$filepath','$numb')";
if(mysqli_query($link, $sql)){
    echo "<div class='alert alert-success'>Item is listed.</div>";
} else{
    echo "<div class='alert alert-danger'>Item is not listed. Please try again.</div>";
}
}
?>
 <!-- Top header -->
  <header class="w3-container w3-xxxlarge">
    <p class="w3-center">Instrumental Store | Rent Your Product</p>
  </header><br><br><br><br>

<div class="container">

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method ="post"  enctype="multipart/form-data">
	<table class='table table-hover table-responsive table-bordered'>
		
			
		

		<tr>
			<td>Price</td>
			<td><input type="int" name="price" class="form-control"></td>	
		</tr>

		<tr>
			<td>Phone</td>
			<td><input type="bigint" name="Phone" class="form-control"></td>	
		</tr>

		<tr>
			<td>Description</td>
			<td><input type="textarea" rows="3" name="description" class="form-control"></td>	
		</tr>
		 <tr>
		 	<td>Select image :</td>
		 	<td><input type="file" name="file">
			</td>
		</tr>



		<tr>
			<td>Number of items</td>
			<td><input type="int" name="numb" class="form-control"></td>	
		</tr>

		

		<tr>
			<td></td>
			<td>		<input  type="submit" class="btn btn-success" value="Rent"></td>
		</tr>


		</table>
	</form>
</div>


		
</body>
</html>