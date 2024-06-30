<?php
session_start();

    include("connection.php");
    include("functions.php");
    //checks if the user is logged in
    $user_data = check_login($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ikea</title>
</head>
<body>
<style> 
    #text{
        font-family: Arial, Helvetica, sans-serif;
    }
</style>
    <!--button to logout-->
    <a href="logout.php">Logout</a>
    <h1 id="text">Ikea</h1>

    <br>
    <!--says hello to the logged in user-->
   <h3 id="text"> Hello, <?php echo $user_data['user_name']; ?> </h3>
</body>
</html>