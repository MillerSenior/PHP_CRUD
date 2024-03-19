<?php
session_start();
//Connect to the ClassRegistration database
$connection=mysqli_connect("localhost","root","admin","PHPApplication");
if (!$connection){
    echo  "Cannot connect to MySQL. " . mysqli_connect_error();
    exit();
}
//Get Class ID from edit.php
$eventid=($_GET['recordID']);
//get event id from the form
$testID = trim($_POST['event_id']);
//get user id from edit.php
$id=$_SESSION["id"];
//remove white space, check for blank, and remove special characters
if(($name = trim($_POST['event_name']))==''){
    $_SESSION['errmsg']=1;
    goto tryagain;
}else{
    $name=mysqli_real_escape_string($connection, $name);
}
if(($date = trim($_POST['event_date']))==''){
    $_SESSION['errmsg']=2;
    goto tryagain;
}else{
    $date=mysqli_real_escape_string($connection, $date);
}
if(($descr = trim($_POST['event_descr']))==''){
    $_SESSION['errmsg']=3;
    goto tryagain;
}else{
    $descr=mysqli_real_escape_string($connection, $descr);
}
if(($cost = trim($_POST['event_cost']))==''){
    $_SESSION['errmsg']=4;
    goto tryagain;
}else{
    /*adding a zero forces this to be number and not a string */
    $cost=mysqli_real_escape_string($connection, $cost+0);
}
if(($host = trim($_POST['event_host']))==''){
    $_SESSION['errmsg']=5;
    goto tryagain;
}else{
    $host=mysqli_real_escape_string($connection, $host);
}
//Try again
tryagain:
//enter edit page with the id of the event as a path variable
header("Location: editEvent.php?recordID=$testID");

//Update a record on the class table
$query="UPDATE events SET event_name='$name', event_date='$date', event_descr='$descr', event_cost='$cost', event_host='$host' WHERE event_id='$testID' ";

$result=mysqli_query($connection,$query);
if (!$result){
    echo "Insert into events failed. ",mysqli_error($connection);
    exit();
}else{
    goto success;
}
//Return to list.php if sucessful
success:
$_SESSION['errmsg']=null;
header("Location: list.php");
?>