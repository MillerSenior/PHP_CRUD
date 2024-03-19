<?php
require_once "doorway.php";
include '../../../includes/title.php';
//get user id from create
$id=$_SESSION["id"];
//Connect to CodingEvents database
$connection=mysqli_connect("localhost","root","admin","PHPApplication");
if (!$connection){
    echo  "Cannot connect to MySQL. " . mysqli_connect_error($connection);
    exit();
}
//Get records from the events table
$query="SELECT * FROM events WHERE user_id = $id ORDER BY event_date";
$result =mysqli_query($connection, $query);
if(!$result){
    echo "Select from events failed. " . mysqli_error();
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>PHP APP <?php if (isset($title)) {echo ": {$title}";}?></title>
    <link rel="stylesheet" type="text/css" href="../../static/css/muli-font.css">
	<link rel="stylesheet" type="text/css" href="../../static/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
	<!-- datepicker -->
	<link rel="stylesheet" type="text/css" href="../../static/css/jquery-ui.min.css">
	<!-- Main Style Css -->
	<link rel="stylesheet" href="../../static/css/style.css"/>
    <link rel="stylesheet" href="../../static/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../static/css/full-width-pics.css">
</head>
<body class='container text-center'>
<?php require '../../../includes/menu.php'; ?><!--Imported nav from filepath-->

<div class="wizard-v2-content">
		<div class="wizard-form">
            <section>
            <div class="inner">
<?php require "../../../includes/header.php";?><!--Imported header from filepath-->
<?php if ($result->num_rows < 1){?>
    <!--if the length of the result array is less than 1 (empty)-->
    <br>
    <h1>No events currently listed.</h1>
    <?php } else{?>
           <table class='table table-striped table-bordered '>
           <!--Display the column headings-->    
            <tr>
                <th>ID:</th>
                <th>Name:</th>
                <th>Date:</th>
                <th>Description:</th>
                <th>Admisssion Cost:</th>
                <th>Host:</th>
                <th>&nbsp</th>
                <th>&nbsp</th>
            </tr>
            <!--Loop through and display the events-->
            <?php while ($eventrow=mysqli_fetch_assoc($result)){?>
                <tr>
                    <td style='text-align:center;'><?php echo $eventrow ['event_id'];?></td>

                    <td><?php echo $eventrow ['event_name'];?></td>

                    <td style='text-align:center;'><?php echo date('m/d/y', strtotime($eventrow ['event_date']));?></td>

                    <td><?php echo $eventrow ['event_descr'];?>&nbsp</td>
                    <td>$<?php echo number_format($eventrow ['event_cost'],0,'.',',');?></td>
                    <td><?php echo $eventrow ['event_host'];?></td>
                    <td><a href="editEvent.php?recordID=<?php echo $eventrow ['event_id'];?>">Edit</a></td>
                    <td><a style='color:red;' href="deleteEvent.php?recordID=<?php echo $eventrow ['event_id'];?>">Delete</a></td>
                </tr>
                <?php }?>
           </table>
           <?php }?>
           </div>
       </section>
        </div>
    </div>  
       <script src="../../static/js/jquery-3.3.1.min.js"></script>
	<script src="../../static/js/jquery.steps.js"></script>
	<script src="../../static/js/jquery-ui.min.js"></script>
    <script src="../../static/js/main.js"></script>
    <script src="../../static/js/deleteForm.js"></script>
</body>
</html>