<?php
$_SESSION = [];
if (isset($_COOKIE[session_name()])) {
  setcookie(session_name(), "", time()-86400, '/');
} 
session_destroy();
include '../PHPApplication/includes/title.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP APP <?php if (isset($title)) {echo ": {$title}";}?></title>
    <link rel="stylesheet" type="text/css" href="../PHPCodingEventsApplication/resources/static/css/muli-font.css">
	<link rel="stylesheet" type="text/css" href="../PHPCodingEventsApplication/resources/static/css/material-design-iconic-font.min.css">
	<!-- datepicker -->
	<link rel="stylesheet" type="text/css" href="../PHPCodingEventsApplication/resources/static/css/jquery-ui.min.css">
	<!-- Main Style Css -->
	<link rel="stylesheet" href="../PHPCodingEventsApplication/resources/static/css/style.css"/>
    <link rel="stylesheet" href="../PHPCodingEventsApplication/resources/static/css/bootstrap.min.css">
    <link rel="stylesheet" href="../PHPCodingEventsApplication/resources/static/css/full-width-pics.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">PHP App</a>
    </div>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item"><a class="nav-link" href="../PHPCodingEventsApplication/resources/templates/user/login.php">Login</a></li>
      
    </ul>
  </div>
</nav>
    <h1 style='text-align:center;'>Coding Events</h1>
</body>
</html>
