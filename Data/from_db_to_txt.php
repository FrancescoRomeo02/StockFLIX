<?php
session_start();
$_SESSION['name_user'] = 'romeofrancesco';
$_SESSION['db_name'] =   'my_romeofrancesco';

$con = mysqli_connect('localhost', $_SESSION['name_user'], '');
$con_db = (mysqli_select_db($con, $_SESSION['db_name']));

$count = 0;
if (($file = fopen("stock.csv", "r")) !== FALSE) {
    while (($row =   fgetcsv($file)) !== FALSE) {
        mysqli_query($con, 'INSERT INTO `stock`(`symbol`, `security_name`)  VALUES ("' . $row[0] . '","' . $row[1] . '")');
        if ($con) {
            echo $row[0] . ' okay <br>';
        } else {
            echo $row[0] . ' non okay <br>';
        }
    }
    fclose($file);
}
