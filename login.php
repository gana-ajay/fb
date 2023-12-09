<?php
    session_start();

    include("db.php");

    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        $gmail = $_POST['email'];
        $Password = $_POST['pass'];

        if(!empty($gmail) && !empty($Password) && !is_numeric($gmail))
        {
            $query = "select * from fb where email = '$gmail' limit 1";
            $result = mysqli_query($con, $query);

            if($result)
            {
                if($result && mysqli_num_rows($result) > 0)
                {
                    $user_data = mysqli_fetch_assoc($result);

                    if($user_data['pass'] == $Password)
                    {
                        header("location: index.php");
                    }
                }
            }
            echo"<script type='text/javascript'>alert('wrong user name or password')</script>";
        }
        else{
            echo"<script type='text/javascript'>alert('wrong username or password')</script>";
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
    <div class="login">
        <h1>Log in</h1>
        <form method="POST">
            <label>Email</label>
            <input type="email" name="email" required>
            <label>Password</label>
            <input type="password" name="pass" required>
            <input type="submit" name="" value="Submit">
        </form>
        <p>Not have an account? <a href="signup.php">Sign up here</a></p>
        </div>
    </body>
</html>
  