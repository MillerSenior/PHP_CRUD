<?php
session_start();
//get user id from create
$id=$_SESSION["id"];
//connect to the CodingEvents database
$connection=mysqli_connect("localhost","root","admin","PHPApplication");
if (!$connection){
    echo  "Cannot connect to MySQL. " . mysqli_connect_error();
    exit();
}
//Remove white space, check for blank entry, and remove special characters
//if entry is blank, go to tryagain handler (this handler can be any name you choose)
if (($name=trim($_POST['event_name']))==''){
    $_SESSION["errmsg"]=1;
    goto tryagain;
}else{
    $name=mysqli_real_escape_string($connection, $name);
}
if (($date=trim($_POST['event_date']))==''){
    $_SESSION['errmsg']=2;
    goto tryagain;
}else{
    $date=mysqli_real_escape_string($connection, $date);
}
if (($descr = trim($_POST['event_descr']))==''){
    $_SESSION['errmsg']=3;
    goto tryagain;
}else{
    $descr=mysqli_real_escape_string($connection, $descr);
}
if (($cost = trim($_POST['event_cost']))==''){
    $_SESSION['errmsg']=4;
    goto tryagain;
}else{
    $cost=mysqli_real_escape_string($connection, $cost);
}
if (($host = trim($_POST['event_host']))==''){
    $_SESSION['errmsg']=5;
    goto tryagain;
}else{
    $host=mysqli_real_escape_string($connection, $host);
}
//Try again: must be placed before any code that will handle a successful entry
tryagain:
//if the page sends you here, return to event create
header("Location: create.php");

//Add record to the events table
$query="INSERT INTO events(event_name, event_date, event_descr, event_cost, event_host, user_id) VALUES('$name','$date','$descr','$cost','$host','$id')";
$result=mysqli_query($connection, $query);

if (!$result){//if the insert fails, give me an error message
    echo "Insert into events failed. " . mysqli_error($connection);
    exit();
}else{
    goto success;
}
//Success
success:
$_SESSION['errmsg']=null;
header("Location: list.php");
?>