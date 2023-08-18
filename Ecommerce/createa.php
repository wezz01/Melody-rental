<html lang="en">
<head>
  <title>Add your item</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style type="text/css">/* Style the top navigation bar */
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
$model = mysqli_real_escape_string($link, $_REQUEST['model']);
$price = mysqli_real_escape_string($link, $_REQUEST['price']);
$phone = mysqli_real_escape_string($link, $_REQUEST['Phone']);
$description = mysqli_real_escape_string($link,$_REQUEST['description']);
$numb = mysqli_real_escape_string($link,$_REQUEST['numb']);
$filepath = "uploads/" . $_FILES["file"]["name"];
 
move_uploaded_file($_FILES["file"]["tmp_name"], $filepath);
$brand = $_POST['brand'];
 
// Attempt insert query execution
$sql = "INSERT INTO gadgets (model,price,Phone,description,photosource,brands,numb) VALUES ('$model','$price','$phone','$description','$filepath','$brand','$numb')";
if(mysqli_query($link, $sql)){
    echo "<div class='alert alert-success'>Item is added.</div>";
} else{
    echo "<div class='alert alert-danger'>Item is not added. Please try again.</div>";
}
}

?>
<div class="page-header">
        <h1 align="center"><b>Clothing Store | Add Products</b></h1>
    </div>
<div class="topnav">
  <a href="boredsumo.php"><b>Home</b></a>
  <a href="logouta.php">Sign Out</a>
  <br>
  <br>

</div>
<br>
<br>

<div class="container">

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method ="post"  enctype="multipart/form-data">
	<table class='table table-hover table-responsive table-bordered'>
		
			
		<tr>
			<td>Model</td>
			<td><input type="varchar" name="model" class="form-control"></td>	
		</tr>

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
			<td><input type="textarea" name="description" class="form-control"></td>	
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
			<td>Brand</td>
			<td>
				<select name="brand">
					<option>Select Brand.....</option>
					<option value="Dell">Dell</option>
					<option value="Acer">Acer</option>
					<option value="Apple">MacBook</option>
					<option value="HP">HP</option>
					<option value="Lenovo">Lenovo</option>
					<option value="Asus">Asus</option>
					<option value="Microsoft">Microsoft</option>
					<option value="MSI">MSI</option>
				</select>
			</td>
		</tr>

		<tr>
			<td></td>
			<td>		<input  type="submit" class="btn btn-success" value="Add">       </td>
		</tr>


		</table>
	</form>
</div>


		
</body>
</html>