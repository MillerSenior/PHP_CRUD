<?php
session_start();
//check to see if session retry is "admit"
if (isset($_SESSION["retry"]) && $_SESSION["retry"]=="admit"){
//if so continue
$name=$_SESSION["name"];
$id=$_SESSION["id"];
}else{
    header("Location: ../user/login.php");
}
include '../../../includes/title.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP APP <?php if (isset($title)) {echo ": {$title}";}?></title>
    <link rel="stylesheet" href="../../static/css/bootstrap.min.css">
    <link href="../../static/css/full-width-pics.css" rel="stylesheet">
    <script language="JavaScript" type="text/javascript" src="../../static/js/bootstrap.js"></script>
</head>
<body>
<?php require '../../../includes/menu.php'; ?><!--Imported nav from filepath-->
<?php require "../../../includes/header.php";?><!--Imported header from filepath-->

    <div class='container text-center'>
  
    <h1 id="mainpara">Hello <?php echo ucfirst($name);?>!</h1>
    </div>

   
     <!-- Bootstrap core JavaScript -->
  <script src="../../static/js/jquery.min.js"></script>
  <script src="../../static/js/bootstrap.bundle.min.js"></script>
</body>
</html>