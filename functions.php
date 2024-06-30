<?php
//checks if user is logged in
function check_login($con)
{
    //checks if user id is set
    if(isset($_SESSION['user_id']))
    {
        $id = $_SESSION['user_id'];
        $query = "select * from users where user_id = '$id' limit 1";

        $result = mysqli_query($con, $query);
        //checks if result is positive and result is higher then 0
        if($result && mysqli_num_rows($result)> 0)
        {
            //if true returns user data
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }
    //redirect to login
    header("Location: login.php");
    die;
}


function random_num($length)
{
    $text = "";
    if($length < 5)
    {
        //makes sure length is never less then 5
        $length = 5;
    }
    $len = rand(4,$length);
    for ($i=0; $i < $len; $i++) { 
        $text .= rand(0, 9);
    }
    return $text;
}