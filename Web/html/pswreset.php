<?php
session_start();
include("./obj/libreria.php")
?>
<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/log_sing_in.css">
    <title>StockFLIX - Recupera dati</title>
</head>
<?php
if (isset($_POST['invia']) && $_POST['email'] != '') {
    //controllo i dati inviati tramite form 
    $email = $_POST['email'];
    $query_data = "SELECT email, hash FROM user WHERE email = '$email' ";
    $temp = mysqli_query($con, $query_data);
    $data = mysqli_fetch_array($temp);
    if ($data != null && $_POST['email'] == $data['email']) {
        $body = $data['hash'];
        //invoco la funzione per l'invio della mail per il reset della password
        mail_send('StockFLIX@assistenza.com', $email, 'Modifica della password', $body);
    } else {
        echo '<br> <h3>La mail non e\' presente nel database</h3>';
    }
}
// Una volta che l'utente premerà sul link della mail riceverà una nuova mail 
// con una passowrd generata dal sito chje potrà essere cambiata dalle impostazioni 
?>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <!-------------------
                    form accesso  
                -------------------->
                <form action="#" class="sign-in-form" method="POST">
                    <h2 class="title">Recupera le credenziali di <span style="color: <?php echo $color ?>;">StockFLIX</span> </h2>
                    <div class="input-field">
                        <i class="fas fa-at" style="color: #4481eb"></i>
                        <input required type="email" placeholder="Email" name="email" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-key" style="color: #4481eb"></i>
                        <input required type="password" placeholder="Ultima password utilizzata" name="password" class="pass" />
                    </div>
                    <input required type="submit" value="invia" name="accedi" class="btn solid" />
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