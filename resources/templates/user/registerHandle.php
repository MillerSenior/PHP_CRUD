<?php
session_start();
//connect to the Coding Events database
$connection=mysqli_connect("localhost","root","admin","PHPApplication");
if (!$connection){
    echo  "Cannot connect to MySQL. " . mysqli_connect_error();
    exit();
}
//Remove white space, check for blank, and remove special characters
if (($name=trim($_POST['user_name']))==''){
    $_SESSION["errmsg"]=1;
    goto tryagain;
}else{
    $name=mysqli_real_escape_string($connection, $name);
}
if (($userid=trim($_POST['user_id']))==''){
    $_SESSION['errmsg']=2;
    goto tryagain;
}else{
    $userid=mysqli_real_escape_string($connection, $userid);
}
if (($userPasswd = trim($_POST['user_password']))==''){
    $_SESSION['errmsg']=3;
    goto tryagain;
}else{
    $userPasswd=mysqli_real_escape_string($connection, $userPasswd);
}
$id=$_POST['id'];
//Set cookie, expires in 6 months
$date = time();
$expire = time() + (60*60*24*180);
setcookie("Admin[name]", $name, $expire, "/");
setcookie("Admin[date]", $date, $expire, "/");
//Encrypt the password
$encryptpasswd = sha1($userPasswd);
//See if match in the user table
$query= "SELECT id, user_id,user_password, user_name FROM user WHERE user_id='$userid' AND user_password='$encryptpasswd'";
$result=mysqli_query($connection, $query);
if (!$result){
    echo "Select from user failed. " . mysqli_error($connection);
    exit();
}
//Determine if the user ID and password are on file
$row=mysqli_fetch_object($result);
$db_id=$row->id;
$db_userid=$row->user_id;
$db_password=$row->user_password;
$db_name=$row->user_name;

if($db_userid != $userid || $db_password != $encryptpasswd){
    //add record to the user table
    $query="INSERT INTO user(user_id, user_password, user_name) VALUES('$userid','$encryptpasswd','$name')";
    $result=mysqli_query($connection,$query);
    if(!$result){
        echo ("Insert to user failed. " . mysqli_error($connection));
        exit();
    }
    
}    else{
    //if on file, get name, reset the session, and enter site
    $_SESSION["name"]=$db_name;
    $_SESSION['id'] = $db_id;
    $_SESSION["retry"]="admit";
    $_SESSION["time"]=time();
    header("Location: ../site/welcome.php");
}
tryagain:
header("Location: userAuthentication.php");
?>