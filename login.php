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
            //read from database
            //checks if username given by user is the same as any username in the database with the limit of 1 result
            $query = "select * from users where user_name = '$user_name' limit 1";

            $result = mysqli_query($con, $query);
            //checks if result is successfull
            if($result)
            {
                if($result && mysqli_num_rows($result) > 0)
                {
                    $user_data = mysqli_fetch_assoc($result);
                    
                    //if password is true takes you to index page
                    if($user_data['password'] == $password)
                    {
                        $_SESSION['user_id'] = $user_data['user_id'];
                        header("Location: index.php");
                        die;
                    }
                }
            }
            echo "Wrong username or password!";
    }else
    {
        echo "Wrong username or password!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">    
</head>
<body> 
<div id="box">
    <form method="post">
        <div id="Login_top">Login</div>

        <input id="text" type="text" name="user_name"><br><br>
        <input id="text" type="password" name="password"><br><br>

        <input id="button" type="submit" value="Login"><br><br>

        <!--Brings you to signup.php when button is pressed-->
        Don't have an account yet? 
        <a href="signup.php">Signup</a><br><br>
    </form>
</div>
</body>
</html>