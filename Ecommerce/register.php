<?php
session_start();
require_once "config.php";
$username = $password = $confirm_password = $email = $phone ="";
$username_err = $password_err = $confirm_password_err = $email_err = $phone_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter your username.";
    } else{
        $username = trim($_POST["username"]);
    }

    if(empty(trim($_POST["phone"]))){
        $phone_err = "Please enter your phone no.";
    } else{
        $phone = trim($_POST["phone"]);
    }

    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter your email.";
    } else{
        $email = trim($_POST["email"]);
    }
    
     // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
if (empty($username_err)&&empty($password_err)&&empty($email_err)&&empty($phone_err)) {
	$username=$_POST['username'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$temp =  $_POST['password'];
	$password = password_hash($temp, PASSWORD_DEFAULT);
	$sql="INSERT INTO users(username, password, email, phone) VALUES ('$username','$password','$email','$phone')";
	if ($result = mysqli_query($link,$sql) ) {
		echo "record added";
	}
	header("location:login.php");
}
mysqli_close($link);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; background-color: white ;align-content: center;}
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>" placeholder="Username...">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>

             <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Email</label>
                <input type="varchar" name="email" class="form-control" value="<?php echo $email; ?>" placeholder="Email ID...">
                <span class="help-block"><?php echo $email_err; ?></span>
            </div>

             <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Phone</label>
                <input type="bigint" name="phone" class="form-control" value="<?php echo $phone; ?>" placeholder="Phone...">
                <span class="help-block"><?php echo $phone_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>" placeholder="Password...">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>" placeholder="Password...">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>    
</body>
</html>