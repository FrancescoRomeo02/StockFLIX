<?php
session_start();
$_SESSION['name_user'] = 'romeofrancesco';
$_SESSION['db_name'] =   'my_romeofrancesco';


$con = mysqli_connect('localhost', $_SESSION['name_user'], '');
$con_db = (mysqli_select_db($con, $_SESSION['db_name']));

include("./libreria.php");
