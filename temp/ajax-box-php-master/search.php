<?php
$key = $_GET['key'];
$array = array();
$con = mysqli_connect("localhost", "root", "", "my_romeofrancesco");
$query = mysqli_query($con, "select * from stock_name where 'COL 1' LIKE '%{$key}%'");
while ($row = mysqli_fetch_assoc($query)) {
  $array[] = $row['COL 1'];
}
echo json_encode($array);
mysqli_close($con);
