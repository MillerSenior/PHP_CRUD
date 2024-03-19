<?php
session_start();
//check to see if the session retry is 'admit'
if (isset($_SESSION["retry"]) && $_SESSION["retry"]=="admit"){
    //if so continue
    //echo 'Hello ', $_SESSION['name'], "<!br/>";
}else{
    //if not, return to the site index page.
    header('Location: ../../../index.php');
}
?>