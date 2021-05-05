<?php
include('./header.php');
if (isset($_GET['email']) && !empty($_GET['email']) and isset($_GET['hash']) && !empty($_GET['hash'])) {
    // Verify data
    $email = $_GET['email'];
    $hash = $_GET['hash'];
    $search = mysqli_query($con, "SELECT email, hash, attivo FROM utenti_free WHERE email = '$email' AND hash = '$hash' AND attivo='0'");
    $match  = mysqli_num_rows($search);
    if ($match > 0) {
        $query =  "UPDATE `utenti_free` SET `attivo`= 1 WHERE email = '$email' AND hash = '$hash'";
        mysqli_query($con, $query);
        $_SESSION['stato_account'] = 1;
        header("Location: " . '../log_sing_in.php');
    } else {
        $_SESSION['stato_account'] = 0;
        header("Location: " . '../log_sing_in.php');
    }
}
