<?php
require_once "doorway.php";
//Get event ID from list.php
$eventid=($_GET['recordID']);


//get user id from list
$id=$_SESSION["id"];
//Connect to the Coding Events database
$connection=mysqli_connect("localhost","root","admin","PHPApplication");
if (!$connection){
    echo "Cannot connect to MySQL. ", mysqli_connect_error($connection);
    exit();
}
//Get records from the events table
$query="SELECT * FROM events WHERE event_id=$eventid";
$result=mysqli_query($connection, $query);
if(!$result){
     echo "Select from events failed. ", mysqli_error($connection);
     exit();
}
//Get event (row)from database
$eventrow = mysqli_fetch_assoc($result);
include '../../../includes/title.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP APP <?php if (isset($title)) {echo ": {$title}";}?></title>
    <link rel="stylesheet" type="text/css" href="../../static/css/muli-font.css">
	<link rel="stylesheet" type="text/css" href="../../static/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
	<!-- datepicker -->
	<link rel="stylesheet" type="text/css" href="../../static/css/jquery-ui.min.css">
	<!-- Main Style Css -->
	<link rel="stylesheet" href="../../static/css/style.css"/>
    <link rel="stylesheet" href="../../static/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../static/css/full-width-pics.css">
    <style>
    .red{
        color:red;
    }
    </style>
</head>
<body onload="document.form1.event_name.focus();">
<?php require '../../../includes/menu.php'; ?><!--Imported nav from filepath--><div class="page-content">
	<div class="wizard-v2-content">
		<div class="wizard-form">
            <section>
            <div class="inner">
<?php require "../../../includes/header.php";?><!--Imported header from filepath-->
            <!--From User Authentication-->
            <div class="table-responsive">
            <div class='container text-center'>
            <?php
                if($_SESSION["errmsg"]<1){
            ?>
                <p id='mainpara'>Please enter event information and click Edit.</p>
            <?php } ?>
            
            </div>
       
                <!--Go to enterName.php after clicking Register-->
                <!--Class Entry Form-->   
        <form id='eventForm' action="editHandler.php?recordID=<?php echo $eventrow['$event_id'];?>" method="post" name="form1">
        <input type="hidden" name="event_id" value="<?php echo $eventid;?>">
        <table class='table table-striped'>
        <tr>
            <th width="18%">Event ID:</th>
            <td width='60%'>
                <?php echo $eventrow['event_id']?>
            </td>
        </tr>
        <tr>
            <th>Event Name:</th>
            <td>
                <input type="text" name='event_name' value="<?php echo 
            $eventrow['event_name'];?>" class='form-control'>
              <?php if($_SESSION["errmsg"]==1){?>
            <p class="red">Event Name is required.</p><?php }?>
            </td>
        </tr>
        <tr>
        <th>Event Date: <span class='red'>*</span></th>
        <td>
            <input type="date" name='event_date' value="<?php echo 
            $eventrow['event_date'];?>" class='form-control'>
              <?php if($_SESSION["errmsg"]==2){?>
            <p class="red">Event Date is required.</p><?php }?>
        </td>
        </tr>
        <tr>
            <th>Event Description:</th>
            <td>
                <textarea name="event_descr" cols="60" rows="4" class='form-control'>
                <?php echo 
            $eventrow['event_descr'];?>
                </textarea>
                <?php if($_SESSION["errmsg"]==3){?>
            <p class="red">Event Description is required.</p><?php }?>
            </td>
        </tr>
        <tr>
            <th>Admission Cost:</th>
            <td>
                <input placeholder='Enter Dollar Amount (Example: 75/If Free Enter: 0)' type="number" name="event_cost" value="<?php echo 
            $eventrow['event_cost'];?>" class='form-control'>
              <?php if($_SESSION["errmsg"]==4){?>
            <p class="red">Event Cost is required.</p><?php }?>
            </td>
        </tr>
        <tr>
            <th>Event Host:</th>
            <td>
                <input id='host' type="text" name="event_host" value="<?php echo 
            $eventrow['event_host'];?>" class='form-control'>
            <p style='color:red' id='hostErr'></p>
            </td>
        </tr>
        </table>
        <br>
                    <div class='container text-center'>
                        <input id='submit' type="submit" name="submit" value="Edit" class='btn btn-primary btn-boxed btn-lg btn-outline'><br>
                        <p class="red">All fields required.</p>
                    </div>
        </form>   
       
            </div> 
            <br>
            
       </div>
       </section>
        </div>
    </div>    
</div>
       <script src="../../static/js/jquery-3.3.1.min.js"></script>
	<script src="../../static/js/jquery.steps.js"></script>
	<script src="../../static/js/jquery-ui.min.js"></script>
    <script src="../../static/js/main.js"></script>
    <script src="../../static/js/checkEdit.js"></script>
</body>
</html>