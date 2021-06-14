<?php
include("./obj/header.php")
?>
<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/color_palette_light.css">
    <link rel="stylesheet" href="../css/log_sing_in.css">
    <title>StockFLIX - Recupera dati</title>
</head>
<script src="../js/libreria.js"></script>

<?php
if (isset($_POST['invia']) && $_POST['email'] != '') {
    //controllo i dati inviati tramite form
    $email = $_POST['email'];
    if ($email == $_POST['email']) {
        $code = $_POST['pass_new_hash'];
        $temp = $_POST['pass_new'];
        //invoco la funzione per l'invio della mail per il reset della password
        $testo = 'Ecco la tua nuova passowrd, usala per accedere al tuo account';
        mail_send('StockFLIX@assistenza.com', $email, 'https://romeofrancesco.altervista.org', $temp, $testo);
        $regen_psw = "UPDATE `user` SET password = '$code' WHERE `email` = '$email'";
        mysqli_query($con, $regen_psw);
    } else {
        echo '<br> <h3>La mail non e\' presente nel database</h3>';
    }
}
// Una volta che l'utente premerà sul link della mail riceverà una nuova password
// con una passowrd generata dal sito che potrà essere cambiata dalle impostazioni
?>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <!-------------------------
                    form recupero password  
                -------------------------->
                <form action="#" class="sign-in-form" method="POST" onsubmit="new_psw()">
                    <h2 class="title">Recupera le credenziali di <span>StockFLIX</span> </h2>
                    <div class="input-field">
                        <i class="fas fa-at"></i>
                        <input required type="email" placeholder="Email" name="email" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-key"></i>
                        <input required type="password" placeholder="Ultima password utilizzata" name="password" class="pass" />
                    </div>
                    <input type="password" name="pass_new" style="display: none;" id="pass_new">
                    <input type="password" name="pass_new_hash" style="display: none;" id="pass_new_hash">
                    <input required type="submit" value="invia" name="invia" class="btn solid" />
                    <?php
                    if (isset($errore)) echo '<br><div class="alert"><span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> <strong>ATTENZIONE!</strong> ' . $errore .  '</div>';
                    if (isset($msr2) && !isset($errore)) echo "<br><p>$msr2</p>";
                    ?>
                </form>
            </div>
        </div>
    </div>
    <div class="panels-container">
        <div class="panel left-panel">
            <div class="content">
                <h3>Sono cose che succedono</h3>
                <p>
                    Ripristina la tua password e torna con noi.
                </p>
            </div>
            <img src="../img/log_sing_in/pass.svg" class=" image" alt="" />
        </div>
    </div>
</body>

</html>