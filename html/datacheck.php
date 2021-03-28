<?php
session_start();
include("./librerie.php")
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/event.css" />

    <title>Registrati</title>
</head>

<body>
    <!-- start header div -->

    <div id="wrap">
        <?php

        $con = mysqli_connect('localhost', $_SESSION['name_user'], '');
        $con_db = (mysqli_select_db($con, $_SESSION['db_name']));

        if (isset($_GET['email']) && !empty($_GET['email']) and isset($_GET['hash']) && !empty($_GET['hash'])) {
            // Verify data
            $email = $_GET['email'];
            $hash = $_GET['hash'];
            $search = mysqli_query($con, "SELECT email, hash, attivo FROM utenti_free WHERE email = '$email' AND hash = '$hash' AND attivo='0'");

            $match  = mysqli_num_rows($search);

            if ($match > 0) {
                $query =  "UPDATE utenti_free SET attivo = 1 WHERE email = '$email' AND hash = '$hash'";
                echo '<h3>Account verificato con successo, torna alla pagina pricipale e goditi il tuo account</h3>';
            } else {
                echo 'Dati errati, riprovare o contattare l\'assistenza';
            }
        }
        ?>
    </div>
</body>

</html>