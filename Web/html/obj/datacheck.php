<?php
include('./header.php');
if (isset($_GET['email']) && !empty($_GET['email']) and isset($_GET['hash']) && !empty($_GET['hash'])) {
    // Verify data
    $email = $_GET['email'];
    $hash = $_GET['hash'];
    $search = mysqli_query($con, "SELECT id, email, hash, attivo FROM user WHERE email = '$email' AND hash = '$hash' AND verificato='0'");
    $match  = mysqli_num_rows($search);
    $data = mysqli_fetch_array($search);
    if ($match > 0) {
        $query =  "UPDATE `user` SET `verificato`= 1 WHERE email = '$email' AND hash = '$hash'";
        mysqli_query($con, $query);
        $query =  "INSERT INTO `wallet`(`user_id`) VALUES ('$data[user_id]')";
        mysqli_query($con, $query);
        $_SESSION['stato_account'] = 1;
        header("Location: " . '../log_sing_in.php');
    } else {
        $_SESSION['stato_account'] = 0;
        header("Location: " . '../log_sing_in.php');
    }
}
