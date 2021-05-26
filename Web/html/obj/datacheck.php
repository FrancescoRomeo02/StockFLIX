<?php
include('./header.php');
if (isset($_GET['email']) && !empty($_GET['email']) and isset($_GET['hash']) && !empty($_GET['hash'])) {
    // Verify data
    $email = $_GET['email'];
    $hash = $_GET['hash'];
    $query = "SELECT user_id, email, hash, verificato FROM user WHERE email = '$email' AND hash = '$hash' AND verificato='0'";
    $search = mysqli_query($con, $query);
    $match  = mysqli_num_rows($search);
    $data = mysqli_fetch_array($search);
    if ($match > 0) {
        $query =  "UPDATE `user` SET `verificato`= 1 WHERE email = '$email' AND hash = '$hash'";
        mysqli_query($con, $query);
        $query =  "INSERT INTO `wallet`(`user_id`) VALUES ('$data[user_id]')";
        mysqli_query($con, $query);
        header("Location: " . '../log_sing_in.php');
    } else {
        header("Location: " . '../log_sing_in.php');
    }
}
