<?php
session_start();
    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //something was posted
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];

        //checks if username & password is not empty and checks if username is not numeric
        if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
        {
                //save to database
                $user_id = random_num(20);
                $query = "insert into users (user_id, user_name, password) values ('$user_id', '$user_name', '$password')";

                mysqli_query($con, $query);
                //redirects you to login.php to login
                header("Location: login.php");
                die;
        }else
        {
            echo "Please enter some valid information!";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="style.css">    
</head>
<body>
<div id="box">
    <form method="post">
        <div id="Login_top">Signup</div>

        <input id="text" type="text" name="user_name"><br><br>
        <input id="text" type="password" name="password"><br><br>

        <input id="button" type="submit" value="Signup"><br><br>

        <!--Brings you to login.php when button is pressed-->
        <a href="login.php">Click to login</a><br><br>
    </form>
</div>
</body>
</html>