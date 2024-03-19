<?php
require_once "doorway.php";
//Get Class ID from classlist.php
$eventid=($_GET['recordID']);
//Connect to the Coding Events database
$connection=mysqli_connect("localhost","root","admin","PHPApplication");
if (!$connection){
    echo  "Cannot connect to MySQL. " . mysqli_connect_error($connection);
    exit();
}
//Get records from the events table
$query="SELECT * FROM events WHERE event_id=$eventid";
$result=mysqli_query($connection, $query);
if(!$result){
     echo "Select from events failed. " . mysqli_error($connection);
     exit();
}
//Get class (row)from database
$eventrow=mysqli_fetch_assoc($result);
include '../../../includes/title.php';
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
<body class='container'>
<?php require '../../../includes/menu.php'; ?><!--Imported nav from filepath-->
<div class="wizard-v2-content">
		<div class="wizard-form">
            <section>
            <div class="inner">
<?php require "../../../includes/header.php";?><!--Imported header from filepath-->
        <!--Delete Event Form-->   
        <form action="deleteHandler.php?recordID=<?php echo $eventrow['$event_id'];?>" id='form2' method="post" name="form1">
        <input type="hidden" name="event_id" value="<?php echo $eventid;?>">
        <table class='table table-striped'>
        <tr>
            <th width="18%">Event ID:</th>
            <td width='60%'>
                <?php echo $eventrow ['event_id']?>
            </td>
        </tr>
        <tr>
        <tr>
            <th>Event Name:</th>
            <td>
          <?php echo $eventrow ['event_name'];?>
          </td>
        </tr>
        <tr>
        <th>Event Date:</th>
        <td>
           <?php echo date('m/d/y', strtotime($eventrow ['event_date']));?>
        </td>
        </tr>
        <tr>
            <th>Event Description:</th>
            <td>
              <?php echo $eventrow ['event_descr'];?>
            </td>
        </tr>
        <tr>
            <th>Admission Cost:</th>
            <td>
               $<?php echo number_format($eventrow ['event_cost'], 0,'.',',');?>&nbsp</td>
        </tr>
        <tr>
            <th>Event Host:</th>
            <td>
                <?php echo $eventrow ['event_host'];?>
            </td>
        </tr>
        </table>
        <div class='container text-center'><input type="submit" value="Delete" class='btn btn-danger btn-boxed btn-lg btn-outline'>
    <p style='color:red;'>This record will be permanently deleted.</p>
    </div>

        </form>   
        </div>
       </section>
        </div>
    </div>
    <script src="../../static/js/deleteForm.js"></script>
</body>
</html>