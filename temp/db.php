<?php
$servername = 'localhost';
$username = 'romeofrancesco';
$password = '';
$dbname = "my_romeofrancesco";
$conn = mysqli_connect($servername, $username, $password, "$dbname");
if (!$conn) {
    die('Could not Connect MySql Server');
}
