<?php
session_start();
//Check if user has a cookie.
if (isset ($_COOKIE["Admin"])){
    //If so, set session and go to sign in.
    $_SESSION["name"]=$_COOKIE["Admin"][name];
    $_SESSION["retry"]=0;
    $_SESSION["time"]=time();
    header("Location: login.php");
}else{
    //If not, go to registration
    header("Location: register.php");
}
?>