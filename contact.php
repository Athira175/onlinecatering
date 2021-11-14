<html>
    <head>
        <title>Contact Form Design</title>
        <link rel="stylesheet" href="style.css"/>
</head>
<body>

>
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


    <div class="contact-title">
        <h1>Say Hello</h1>
<h2>We are ready to serve you!</h2>
</div>
<div class="contact-form">
    <form id="contact-form" method="post">
        <input name="name" type="text" class="form-control" placeholder="Your name" required>
<br>
<input name="email" type="email" class="form-control" placeholder="Your Email" required><br>
<textarea name="message" class="form-control" placeholder="Message" row="4" required></textarea><br>
<input type="submit" class="form-control submit" value="SEND MESSAGE">
<?php

require('db.php');
    session_start();

    
$name = $_POST['name'];
$visitor_email=$_POST['email'];
$message=$_POST['message'];
$email_from='easyTutorial@avinashkr.com';
$email_subject="New from Submission";
$email_body="User Name:$name.\n"."user Email:$visitor_email.\n"."User Message:$message.\n";
$to="avinash6252@gmail.com";
$headers="From: $email_from \r\n";
$headers="Reply-To:$visitor_email \r\n";
mail($to,$email_subject,$email_body,$headers);
?>
</body>
</html>