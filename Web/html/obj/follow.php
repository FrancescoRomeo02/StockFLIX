<?php
include('header.php');
$query_wallet_id = "SELECT `wallet_id` FROM `wallet` WHERE `user_id` = '$_POST[user_id]'";
$temp = mysqli_query($con, $query_wallet_id);
$data = mysqli_fetch_array($temp);
$query_stock_id = "SELECT `stock_id` FROM `stock` WHERE `symbol` = '$_POST[name]'";
$temp = mysqli_query($con, $query_stock_id);
$data2 = mysqli_fetch_array($temp);
$query_add = "INSERT INTO `wallet_stock`(`wallet_id`, `stock_id`) VALUES ( '$data[wallet_id]', '$data2[stock_id]')";
mysqli_query($con, $query_add);
