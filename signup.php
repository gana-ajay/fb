<?php
    session_start();

    include("db.php");
    if($_SERVER['REQUEST_METHOD'] == "POST");
    {
        $firstname = $_POST['fname'];
        $lastname = $_POST['lname'];
        $Gender = $_POST['gender'];
        $num = $_POST['cnum'];
        $address = $_POST['address'];
        $gmail = $_POST['email'];
        $password = $_POST['pass'];

        if(!empty($gmail) && !empty($password) && !is_numeric($gmail))
        {
            $query = "insert into fb (fname,lname,gender,cnum,address,email,pass) values ('$firstname','$lastname','$Gender','$num','$address','$gmail','$password')";

            mysqli_query($con, $query);

            echo"<script type='text/javascript'>alert('successfully register')</script>";
        }
        else
        {
            echo"<script type='text/javascript'>alert('successfully please enter some valid information')</script>";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="signup">
        <h1>Sign up</h1>
        <h4>its free and only takes a minute</h4>
        <form method="POST">
            <label>First Name</label>
            <input type="text" name="fname" required>
            <label>Last Name</label>
            <input type="text" name="lname" required>
            <label>Gender</label>
            <input type="text" name="gender" required>
            <label>contact number</label>
            <input type="tel" name="cnum" required>
            <label>Address</label>
            <input type="text" name="address" required>
            <label>email</label>
            <input type="email" name="email" required>
            <label>Password</label>
            <input type="password" name="pass" required>
            <input type="submit" name="" value="Submit">
        </form>
        <p>By clicking the Sign up button, you agree to our <br>
        <a href="#">Terms and condition</a>and <a href="#">Policy Privacy</a>
        </p>
        <p>Already have an account..? <a href="login.php">Login</a></p>
    </div>
</body>
</html>