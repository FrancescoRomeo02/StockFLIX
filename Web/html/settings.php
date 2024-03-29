<?php
include('./obj/header.php');
include("./obj/libreria.php");
if (!isset($_SESSION['user_id'])) header('Location: ./obj/accesso_negato.html');
?>
<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- js per le icone -->
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../css/color_palette_<?php echo $_SESSION['theme'] ?>.css" />
    <link rel="stylesheet" href="../css/log_sing_in.css" />
    <link rel="stylesheet" href="../css/home_page.css" />
    <link rel="stylesheet" href="../css/settings.css" />
    <title> StockFLIX </title>
</head>
<script src="../js/libreria.js" type="text/javascript"></script>
<?php
$color = 'color1';

use function PHPSTORM_META\type;

//php dati utente 
$query_data = "SELECT * FROM user WHERE user_id = '$_SESSION[user_id]'";
$data = mysqli_fetch_array(mysqli_query($con, $query_data));
//assegno variabili
$nome = $data['nome'];
$cognome = $data['cognome'];
$email = $data['email'];
$password = $data['password'];
$hash = md5(rand(0, 1000));
$link = "https://romeofrancesco.altervista.org/Web/html/obj/datacheck.php?email=$email&hash=$hash";

//modifica dei dati
if (isset($_POST['mod_dati'])) {
    if (!empty($_POST['email'])) {
        $query_mod = " UPDATE `user` SET `email`= '$_POST[email]',`verificato`=0, 'hash' = $hash WHERE `user_id` = '$_SESSION[user_id]'";
        if (mysqli_query($con, $query_mod)) {
            mail_send('StockFLIX@info.com', $email, $link, 'Attiva il tuo account con la tua nuova mail', 'Schiaccia il bottone qui di seguito ed attiva il tuo account con la tua nuova mail');
        }
    };
    if (!empty($_POST['password']) && !empty($_POST['password2'])) {
        $query_mod = " UPDATE `user` SET `password`= '$_POST[password2]' WHERE `user_id` = '$_SESSION[user_id]'";
        if ($password == $_POST['password']) {
            if (mysqli_query($con, $query_mod)) {
            } else {
                $msr = 'La vecchia password non è corretta, vuoi <a href="./pswreset.php">ripristinarla</a>?';
            }
        }
    }
}

//cancellazione wallet
if (isset($_POST['dell_wallet'])) {
    $query_wallet_id = "SELECT `wallet_id` FROM `wallet` WHERE `user_id` = '$_SESSION[user_id]'";
    $temp = mysqli_query($con, $query_wallet_id);
    $data = mysqli_fetch_array($temp);
    $query_rem = "DELETE FROM `wallet_stock` WHERE `wallet_id` = '$data[wallet_id]'";
    if (mysqli_query($con, $query_rem)) {
    }
    header('Location: ./services/wallet.php');
}

//recesso pro user
if (isset($_POST['mod_abb'])) {
    $query_mod_abb = " UPDATE `user` SET `pro_user` = 0 WHERE `user_id` = '$_SESSION[user_id]'";
    mysqli_query($con, $query_mod_abb);
    header('Location: ' . $_SERVER['PHP_SELF']);
}
?>

<body>
    <!--BARRA DI NAVIGAZIONE-->
    <?php include('./obj/nav.php'); ?>
    <!--BARRA DI NAVIGAZIONE-->
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <!-------------------
                form registrazione  
                -------------------->
                <form action="#" class="sign-up-form" method="POST" id="registrazione" style="opacity: 1;" onsubmit="criptset()">
                    <h2 class="title">Ecco i tuoi <span class="<?php echo $color ?>;">Dati</span></h2>
                    <div class="input-field">
                        <i class="fas fa-user" style="color: #606c81"></i>
                        <input disabled type="text" placeholder="<?php echo $nome ?>" name="nome" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-signature" style="color: #606c81"></i>
                        <input disabled type="text" placeholder="<?php echo $cognome ?>" name="cognome" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-at"></i>
                        <input type="email" placeholder="<?php echo $email ?>" name="email" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-key" style=" transform: scale(-1, 1);"></i>
                        <input type="password" placeholder="Vecchia password" name="password" class="pass" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-key"></i>
                        <input type="password" placeholder="Nuova password" name="password2" class="pass" />
                    </div>
                    <div class="btn_action">
                        <input type="submit" class="btn" value="cancella wallet" name="dell_wallet" />
                        <input type="submit" class="btn" value="modifica campi" name="mod_dati" />
                        <?php if ($data['pro_user'] == 1) echo '<input type="submit" class="btn" value="disdici pro" name="mod_abb" />' ?>
                    </div>
                    <?php if (isset($msr2) && !isset($errore)) echo "<br><p>$msr</p>"; ?>
                </form>
            </div>
        </div>
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Bisogno di aiuto ?</h3>
                    <p>
                        Contatta il nostro servizio clienti, risponderemo il prima possibile.
                    </p>
                    <button class="btn transparent" id="sign-in-btn" onclick="location.href='mailto:StockFLIX_help@gmail.com?subject=Richiesta%20supporto%20dati%20account'">
                        contattaci
                    </button>
                </div>
                <img src="../img/log_sing_in/settings.svg" class="image" alt="" />
            </div>
        </div>
    </div>
    <script src="../js/app.js" type="text/javascript"></script>
    <script>
        navSlide()
        const nav = document.querySelector("nav");
        nav.classList.add("dark");
        const nav_link = document.querySelectorAll(".nav_links li a");
        nav_link.forEach((link) => {
            link.classList.add("white_text");
        });
    </script>
</body>

</html>