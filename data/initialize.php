<?php
ob_start(); //start output buffering
session_start();

// define("WWW_ROOT", '');

define("WWW_ROOT", '/drugs');


require_once('functions.php');
require_once('database.php');
$errors ='';
$copyright = date("Y") . " " . "© All rights reserved | Designed by Ali Hussein Osman"
 ?>
