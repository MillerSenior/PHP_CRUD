<?php
session_start();
include '../../../includes/title.php';
?>
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
<body onload="document.form1.user_name.focus();">
<nav  class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">PHP App</a>
    </div>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item"><a class="nav-link" href="login.php">Back To Login</a></li>  
    </ul>
  </div>
</nav>
<div class="page-content">
	<div class="wizard-v2-content">
		<div class="wizard-form">
            <section>
            <div class="inner">
<?php require "../../../includes/header.php";?><!--Imported header from filepath-->
            <!--From User Authentication-->
            <div class="table-responsive">
            <div class='container text-center'>
            <?php
              if ($_SESSION["errmsg"]<1){
           ?>
              <p id="mainpara">Please enter your name, user ID, and password, then click Register.</p>
            <?php
                }
               elseif($_SESSION["errmsg"]==1){
            ?>
                <p class="red">Your name is required.</p>
                <p class="red">Please RE-enter your name, user ID, and password, then click Register.</p>
            <?php
               }
               elseif ($_SESSION["errmsg"]==2){
            ?>        
                <p class="red">A User ID is required.</p>
                <p class="red">Please RE-enter your name, user ID, and password, then click Register.</p> 
            <?php
               }
               elseif($_SESSION["errmsg"]==3){
            ?>       
                <p class="red">A password is required.</p>
                <p class="red">Please RE-enter your name, user ID, and password, then click Register.</p> 
            <?php
               }
               else{
            ?>
                <p class="red">&nbsp</p>
                <p class="red">Please RE-enter your name, user ID, and password, then click Register.</p>
            <?php
               }
            ?>
            </div>
       
                <!--Go to enterName.php after clicking Register-->
                <form class='table table-striped' action="registerHandle.php" method="post" name="form1">
                    <table class='table table-striped'>
                        <tr class="space-row">
                            <th>Name:</th>
                            <td >
                                <input type="text" name="user_name" value="" class='form-control'>
                            </td>
                        </tr>
                        <tr class="space-row">
                            <th>User ID:</th>
                            <td>
                                <input type="text" name="user_id" value="" class='form-control'>
                            </td>
                        </tr>
                        <tr class="space-row">
                            <th>Password:</th>
                            <td>
                                <input type="password" name="user_password" value="" class='form-control'>
                            </td>
                        </tr>
                    </table>
                    <br>
                    <div class='container text-center'>
                        <input type="submit" name="submit" value="Register" class='btn btn-primary btn-boxed btn-lg btn-outline'><br>
                        
                    </div>
                   
                    
                </form>
            </div><!--id=form-->  
            <!--End User Authentication-->
            <!--Begin from template--> 
            <br>
            
       </div><!--main-->
       </section>
        </div>
    </div>    
</div>
       <script src="../static/js/jquery-3.3.1.min.js"></script>
	<script src="../static/js/jquery.steps.js"></script>
	<script src="../static/js/jquery-ui.min.js"></script>
	<script src="../static/js/main.js"></script>
</body>
</html>