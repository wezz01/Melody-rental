<?php
$item=$price=$description=$phone='';

$mysqli = new mysqli('localhost','root','','shop');

if (isset($_GET['delete'])) {
	$id = $_GET['delete'];

  session_start();
	$sql="DELETE FROM gadgets WHERE product_ID = $id";
	if ($result = mysqli_query($mysqli,$sql)) {
		$_SESSION['message']="Item has been deleted!";
		$_SESSION['msg_type']="success";
} else{
    $_SESSION['message']="Item is not deleted! Please try again.";
    $_SESSION['msg_type']="danger";
}
	header("location:boredsumo.php");
}



