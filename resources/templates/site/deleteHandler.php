<?php
//Get Class id from eventList.php
$eventid=($_GET['recordID']);
$testID = ($_POST['event_id']);
//Connect to the Coding Events database
$connection=mysqli_connect("localhost","root","admin","PHPApplication");
if (!$connection){
    echo  "Cannot connect to MySQL. " . mysqli_connect_error($connection);
    exit();
}
//Delete a record from the events table
$query="DELETE FROM events WHERE event_id='$testID' ";
$result=mysqli_query($connection, $query);
if (!$result){
    echo "Insert into events failed. ",mysqli_error($connection);
    exit();
}
//return to event list
header("Location: list.php");
?>