<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Register</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require('db.php');
    
    
    if (isset($_POST['username'])) {
        $fna    = stripslashes($_REQUEST['fna']);
        $fna   = mysqli_real_escape_string($con, $fna);

        $lna   = stripslashes($_REQUEST['lna']);
        $lna   = mysqli_real_escape_string($con, $lna);

        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);

        $phone    = stripslashes($_REQUEST['phone']);
        $phone   = mysqli_real_escape_string($con, $phone);
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($con, $username);
        
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $cpassword    = stripslashes($_REQUEST['cpassword']);
        $cpassword    = mysqli_real_escape_string($con, $cpassword);
        $query    = "INSERT into `users` (fna,lna,email,phone,username,password,cpassword)
        VALUES ('$fna','$lna','$email','$phone','$username', '" . md5($password) . "', '" . md5($cpassword) . "')";
        $result = mysqli_query($con, $query);
        
        if ($result) {
            echo "<div class='newform'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
<div class="regbox">
                <img src="user.png" class ="avatar">
                <h1>Registration</h1>

    <form  method="post" name="login">
        <div class="form_input">
    <p>First Name</p>
        <input type="text" class="login-input" name="fna" placeholder="First Name" required />
    </div>
        <p>Last Name</p>
        <input type="text" class="login-input" name="lna" placeholder="Last Name">
        <p>Email</p>
        <input type="text" class="login-input" name="email" placeholder="Email">
        <p>Phone</p>
        <input type="text" class="login-input" name="phone" placeholder="Phone">
        <p>Username</p>
        <input type="text" class="login-input" name="username" placeholder="Username">
        
        <p>Password</p>
        <input type="password" class="login-input" name="password" placeholder="Password">
        <p>Confirm Password</p>
        <input type="password" class="login-input" name="cpassword" placeholder="Confirm Password">
        <input type="Submit" name="submit" value="Register">
        <p>Already Have an Account? <a href="login.php">Login</a></p>
  </form>
    </div>
<?php
    }
?>
</body>
</html>
