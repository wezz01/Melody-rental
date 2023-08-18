<?php
// Initialize the session
require 'config.php';
?>

<html lang="en">
<head>
  <title>Update Products</title>
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
$link = new  mysqli('localhost', 'root', '', 'shop');
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
//instantiate database and product objects


$id = isset($_GET['i'])? $_GET['i']: '';


if(isset($_POST['Update']))
{
$item = $_POST['model'];
$price = $_POST['price'];
$phone = $_POST['Phone'];
$description = $_POST['description'];
$brand = $_POST['brand'];
$filepath = "uploads/" . $_FILES["file"]["name"];
 
move_uploaded_file($_FILES["file"]["tmp_name"], $filepath);
$id = $_POST['product_ID'];
$sql = "UPDATE instruments SET model ='$item',price = '$price',Phone = '$phone',description = '$description',photosource = '$filepath', brands = '$brand' WHERE product_ID = '$id' ";

$result = mysqli_query($link, $sql);
if($result){
header("location:boredsumo.php");
}
mysqli_close($link);
}


?>
<div class="page-header">
        <h1 align="center"><b> Musical Instrument Rental  | Update Products</b></h1>
    </div>
<div class="topnav">
  <a href="boredsumo.php"><b>Home</b></a>
  <a href="createa.php">Rent My Instrument</a>
  <a href="logouta.php">Sign Out</a>
  <br>
  <br>

</div>
<br>
<br>

<div class="container">

<form action="update.php" method ="POST"  enctype="multipart/form-data">
	<table class='table table-hover table-responsive table-bordered'>
		
			
		<tr>
			<td>Name</td>
			<td><input type="varchar" name="model" class="form-control" value="<?php echo $_GET['it']; ?>"></td>	
		</tr>

		<tr>
			<td>Price</td>
			<td><input type="int" name="price" class="form-control"value="<?php  echo $_GET['p']; ?>"></td>	
		</tr>
		<tr>
			<td>Phone</td>
			<td><input type="bigint" name="Phone" class="form-control"value="<?php echo $_GET['ph']; ?>"></td>	
		</tr>
		<tr>
			<td>Description</td>
			<td><input type="textarea" name="description" class="form-control" value="<?php echo $_GET['d']; ?>"></td>	
		</tr>
		 <tr>
		 	<td>Select image :</td>
		 	<td><input type="file" name="file"value="<?php echo $_GET['x']; ?>">
			</td>
		</tr>
		<tr>
			<td>Brand</td>
			<td>
				<select name="brand" value= "<?php $_GET['c'];?>">
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
		<input  type="hidden"  name="product_ID" value="<?php echo $_GET['i']; ?>">
		<tr>
			<td></td>
			<td>		<input  type="submit" class="btn btn-success" name="Update" value="Update">       </td>
		</tr>
			



		</table>
	</form>
</div>


		
</body>
</html>