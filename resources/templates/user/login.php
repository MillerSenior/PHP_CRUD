<?php include '../../../includes/title.php';?>
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
</head>
<body onload="document.form1.userid.focus();">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">PHP App</a>
    </div>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item"><a class="nav-link" href="../../../index.php">Back To Index</a></li>  
    </ul>
  </div>
</nav>
<!--Header-->

<div class='container text-center'>
      
        <br>
       
        <div class="page-content">
	<div class="wizard-v2-content">
		<div class="wizard-form">
         <!--Form-->
		<section>
        <?php require "../../../includes/header.php";?><!--Imported header from filepath-->
        <?php
            $retry=$_SESSION["retry"];
            if($retry<1){
        ?>
            <p id="mainpara">Please enter your user ID and password, and click Sign In.</p>
        <?php
            }
            elseif($_SESSION["errmsg"]==1){
        ?>
            <p class='red'>A user ID is required.</p>
            <p class='red'>Please RE-enter your user ID and password, and click Sign In.</p>
        <?php
            $_SESSION["errmsg"]=NULL;
            }
            elseif($_SESSION["errmsg"]==2){
        ?>        
            <p class='red'>A Password is required.</p>
            <p class='red'>Please RE-enter your user ID and password, and click Sign In.</p>
        <?php
            $_SESSION["errmsg"]=NULL;
            }
            else{
        ?>
            <p class='red'>&nbsp</p>
            <p class='red'>Please RE-enter your user ID and password, and click Sign In</p> 
        <?php
            }
        ?>      
            <div class="inner">
                <div class="table-responsive">
                    <form class='form-register' action="verifyUser.php" method="post" name="form1">
                        <table class="table table-striped">
                            <tbody>
                            <tr class="space-row">
                                    <th>User ID:</th>
                                        <td id="fullname-val"><input class='form-control' type="text" name="userid" value=""></td>
                                </tr>
                                <tr class="space-row">
                                    <th>Password:</th>
                                        <td id="email-val"> <input type="password" name="passwd" value="" class='form-control'></td>
                                </tr>
                               
                                </tbody>
                            </table>
                                <br>
                            <input type="submit" value='Login' class='btn btn-primary btn-boxed btn-lg btn-outline'>          
                    </form>
                </div>
            </div>
            <p>Don't have an account? <a href="register.php">Click here to register.</a></p>
          
        </section>
        </div>
    </div>    
</div>
            <br>
           
    </div><!--end main-->
    <script src="../static/js/jquery-3.3.1.min.js"></script>
	<script src="../static/js/jquery.steps.js"></script>
	<script src="../static/js/jquery-ui.min.js"></script>
	<script src="../static/js/main.js"></script>
</body>
</html>
<!-- 
    
   -->