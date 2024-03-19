<?php
$title = basename($_SERVER['SCRIPT_FILENAME'], '.php');//check the filename and strip php from it
$title = str_replace('_', ' ', $title);//if underscores are present remove them and replace them with blankspace
if (strtolower($title) == 'index') {//check the value of the filename and make it lowercase, if index change it to home
    $title = 'home';
}
$title = ucwords($title);//set the title to be equal to the name of the file