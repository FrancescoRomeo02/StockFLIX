<?php
session_start();
$_SESSION['name_user'] = 'romeofrancesco';
$_SESSION['db_name'] =   'my_romeofrancesco';

$con = mysqli_connect('localhost', $_SESSION['name_user'], '');
$con_db = (mysqli_select_db($con, $_SESSION['db_name']));

$query_data = "SELECT hash FROM utenti_free WHERE email = '$email' AND password = '$password'";
error_log($query_data);
$temp = mysqli_query($con, $query_data);
$data = mysqli_fetch_array($temp);

if (isset($_SESSION['login']) && $_SESSION['login'] == $data['hash']) {
    $_SESSION['state'] = true;
} else {
    $_SESSION['state'] = false;
}
