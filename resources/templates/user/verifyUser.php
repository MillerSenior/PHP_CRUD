<?php
session_start();
//Connect to the Coding Events database
$connection=mysqli_connect("localhost","root","admin","PHPApplication");
if (!$connection){
    echo "Cannot connect to MySQL. " . mysqli_connect_error();
    exit();
}
echo "connection made";
//Remove white space, check for blank, and remove special characters
if (($userid=trim($_POST['userid']))==''){
    $_SESSION["errmsg"]=1;
    goto tryagain;
}else{
    $userid=mysqli_real_escape_string($connection, $userid);
}
if (($userPasswd=trim($_POST['passwd']))==''){
    $_SESSION["errmsg"]=2;
    goto tryagain;
}else{
    $userPasswd=mysqli_real_escape_string($connection, $userPasswd);
}
//Encrypt the password
$encryptpasswd=sha1($userPasswd);
//see if match in the user table
$query="SELECT id, user_id, user_password, user_name FROM user WHERE user_id='$userid' AND user_password='$encryptpasswd'";
$result=mysqli_query($connection, $query);
if (!$result){
    echo "Select from user failed. " . mysqli_error($connection);
    exit();
}
//Determine if the user ID and password are on file
$row = mysqli_fetch_object($result);
$db_userid=$row->user_id;
$db_password=$row->user_password;
$db_name=$row->user_name;
$db_id=$row->id;
if($db_userid != $userid || $db_password != $encryptpasswd){
tryagain:
    //if not, add to Session Retry and test>3
    $retry=$_SESSION["retry"];
    $retry++;
    if ($retry>3){
        //if greater than 3 go to register
        header("Location: register.php");
    }else{
        //if less than 3, reset Session retry and go to sign in
        $_SESSION["retry"]=$retry;
        header('Location: login.php');
    }
}
else{
    //if on file, get name, reset the session, and enter site.
    $_SESSION["name"]=$db_name;
    $_SESSION["id"]=$db_id;
    $_SESSION["retry"]="admit";
    $_SESSION["time"]=time();
    header("Location: ../site/welcome.php");
}
?>