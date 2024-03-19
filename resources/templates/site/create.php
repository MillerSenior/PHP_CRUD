<?php
require_once "doorway.php";

include '../../../includes/title.php';
$id=$_SESSION["id"];
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
            <!--Data validation-->
            <div class="table-responsive">
            <div class='container text-center'>
            <?php
            //if the error message is less than one when this form is submitted,
            //this means no data was posted, return the form with the appropriate error message
                if($_SESSION["errmsg"]<1){
            ?>
                <p id='mainpara'>Please enter event information and click Create.</p><?php }?>
            </div>
                <!--Event Entry Form-->   
        <form id='eventForm' action="createHandler.php" method="post" name="form1">
        <table class='table table-striped'>
        <tr>
            <th>Event Name:</th>
            <td>
                <input type="text" name='event_name' value="" class='form-control'>
                <?php if($_SESSION["errmsg"]==1){?>
            <p class="red">Event Name is required.</p><?php }?> 
            </td>
        </tr>
        <tr>
        <th>Event Date: <span class='red'>*</span></th>
        <td>
            <input type="date" name='event_date' value="" class='form-control'>
            <?php if($_SESSION["errmsg"]==2){?>
            <p class="red">Event Date is required.</p><?php }?>
        </td>
        </tr>
        <tr>
            <th>Event Description:</th>
            <td>
                <textarea name="event_descr" cols="60" rows="4" class='form-control'></textarea>
                <?php if($_SESSION["errmsg"]==3){?>
            <p class="red">Event Description is required.</p><?php }?>
            </td>
        </tr>
        <tr>
            <th>Admission Cost:</th>
            <td>
                <input placeholder='Enter Dollar Amount (Example: 75/If Free Enter: 0)'  type="number" name="event_cost" value="" class='form-control'>
                <?php if($_SESSION["errmsg"]==4){?>
            <p class="red">Event Cost is required.</p><?php }?>
            </td>
        </tr>
        <tr>
            <th>Event Host:</th>
            <td>
                <input id='host' type="text" name="event_host" value="" class='form-control'>
                <p class="red" id='hostErr'></p>
            </td>
        </tr>
        </table>
        <br>
                    <div class='container text-center'>
                        <input type="submit" name="submit" value="Create" class='btn btn-primary btn-boxed btn-lg btn-outline'><br>
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