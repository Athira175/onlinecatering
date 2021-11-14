<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
</head>


    <body>
        <div class="menu-bar">
        <ul>
            <li class="active"><a href="home.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="package.php">Package</a></li>
            <li><a href="reservation.php">Reservation</a></li>
            <li><a href="gallery.php">Gallery</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </div>
    
<?php
    require('db.php');
    session_start();
    
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);   
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            
            header("Location: dashboard.php");
        } else {
            echo "<div class='newform'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
<div class="loginbox">
                <img src="user.png" class ="avatar">
                <h1>Login Here</h1>
    <form  method="post" name="login" >
    <p>Username</p>
                    <input type="text" name="username" placeholder="enter Username">
                <p>Password</p>
<input type="password" name="password" placeholder="Enter Password">
<input type="Submit" name="submit" value="Login">
        <p>Don't have an account? <a href="newregister.php">Registration Now</a></p>
  </form>

<?php
    }
?>
</body>
</html>
