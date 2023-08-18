
<?php
// Include config file
require_once "config.php";
$id = isset($_GET['m']) ? $_GET['m']: '';
$numb = isset($_GET['x']) ? $_GET['x']: '';
$name = $phone = $address = $esewa = "";
$name_err = $phone_err = $address_err = $esewa_err = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty(trim($_POST["name"]))){
        $name_err = "Please enter your name.";
    }
    if(empty(trim($_POST["phone"]))){
        $phone_err = "Please enter your phone number.";
    }
    if (empty(trim($_POST["address"]))) {
        $address_err = "Please enter your address.";
    }
    if (empty($_POST["bank"])) {
        $esewa_err = "Please enter your esewa number.";
    }
    if (empty($name_err)&&empty($phone_err)&&empty($address_err)&&empty($esewa_err)) {
       $name = $_POST["name"];
       $phone = $_POST["phone"];
       $address = $_POST["address"];
       $esewa = $_POST["esewa"];
       $numb = $_POST["numb"];
       $z=$numb-1;
       if(empty($name_err)&&empty($phone_err)&&empty($address_err)&&empty($esewa_err)&&empty($_err)){
       $sql = "INSERT INTO buyers(name, phone, address, esewa) VALUES ('$name','$phone','$address','$esewa')";
       if($result = mysqli_query($link,$sql)){
        echo "<div class='alert alert-success'>Item is purchased.</div>";
       }else{
        echo "<div class='alert alert-danger'>Item could not be purchased.</div>";
       }
       $mysql="UPDATE instruments SET numb = '$z'";
       if($res = mysqli_query($link,$mysql)){
        header("location:welcome.php");
       }
    }
} 

mysqli_close($link);
}

 
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Buyer's Details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css">
    .buyer-form {
        width: 540px;
        margin: 50px auto;
    }
    .buyer-form form {
        margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .buyer-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
</style>
</head>
<body>
    <div class="buyer-form">
        

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            
            <h2>ENTER THE DETAILS:</h2>

            <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" placeholder="Name...">
                <span class="help-block"><?php echo $name_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($phone_err)) ? 'has-error' : ''; ?>">
                <label>Phone</label>
                <input type="varchar" name="phone" class="form-control" value="<?php echo $phone; ?>" placeholder="Phone...">
                <br>
                <span class="help-block"><?php echo $phone_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                <label>Address</label>
                <input type="varchar" name="address" class="form-control" value="<?php echo $address; ?>" placeholder="Address...">
                <br>
                <span class="help-block"><?php echo $address_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($phone_err)) ? 'has-error' : ''; ?>">
                <label>Esewa</label>
                <input type="varchar" name="esewa" class="form-control" value="<?php echo $esewa; ?>" placeholder="Esewa...">
                <br>
                <span class="help-block"><?php echo $esewa_err; ?></span>
            </div>


                
            <div class="form-group">
                <input type="submit" href='num_left.php' class="btn btn-primary" name="submit" value="Submit">
                <input type='hidden' name="product_ID" value="<?php echo $id; ?>">
                <input type='hidden' name="numb" value="<?php echo $numb; ?>">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            </form>
    </div>    
</body>
</html>