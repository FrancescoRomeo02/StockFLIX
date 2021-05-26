<?php
session_start();
$_SESSION['name_user'] = 'romeofrancesco';
$_SESSION['db_name'] =   'my_romeofrancesco';

$con = mysqli_connect('localhost', $_SESSION['name_user'], '');
$con_db = (mysqli_select_db($con, $_SESSION['db_name']));
if ($con->connect_errno) {
    echo "Failed to connect to MySQL: " . $db->connect_error;
    exit();
}
$count = 0;
if (($handle     =   fopen("stock.csv", "r")) !== FALSE) {
    while (($row =   fgetcsv($handle)) !== FALSE) {
        $con->query('INSERT INTO `stock`(`symbol`, `security_name`)  VALUES ("' . $row[0] . '","' . $row[1] . '")');
        if ($con) {
            echo $row[0] . ' okay <br>';
        } else {
            echo $row[0] . ' non okay <br>';
        }
    }
    fclose($handle);
}
