<?php
include('./obj/header.php');
include("./obj/libreria.php");
?>
<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- js per le icone -->
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../css/log_sing_in.css" />
    <link rel="stylesheet" href="../css/home_page.css" />
    <title> StockN </title>
</head>
<script src="../js/libreria.js" type="text/javascript"></script>
<?php
$color =  '#4481eb';

use function PHPSTORM_META\type;

//php dati utente 
$query_data = "SELECT * FROM user WHERE user_id = '$_SESSION[user_id]'";
$data = mysqli_fetch_array(mysqli_query($con, $query_data));
//assegno variabili
$nome = $data['nome'];
$cognome = $data['cognome'];
$email = $data['email'];
$password = $data['password'];
?>

<body>
    <!--BARRA DI NAVIGAZIONE-->
    <?php include('./html/obj/nav.php'); ?>
    <!--BARRA DI NAVIGAZIONE-->
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <!-------------------
                form registarzione  
                -------------------->
                <form action="#" class="sign-up-form" method="POST" id="registarzione" style="opacity: 1;" onsubmit="criptreg()">
                    <h2 class="title">Ecco i tuoi <span style="color: <?php echo $color ?>;">Dati</span></h2>
                    <div class="input-field">
                        <i class="fas fa-user" style="color: #606c81"></i>
                        <input disabled type="text" placeholder="<?php echo $nome ?>" name="nome" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-signature" style="color: #606c81"></i>
                        <input disabled type="text" placeholder="<?php echo $cognome ?>" name="cognome" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-at" style="color: #4481eb"></i>
                        <input type="email" placeholder="<?php echo $email ?>" name="email" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-key" style="color: #4481eb"></i>
                        <input type="password" placeholder="Vecchia password" name="password" class="pass" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-key" style="color: #4481eb"></i>
                        <input type="password" placeholder="Nuova password" name="password2" class="pass" />
                    </div>
                    <input type="submit" class="btn" value="modifica campi" name="modifica_campi" />
                    <input type="submit" class="btn" value="cancella wallet" name="cancella_wallet" />
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
                    <button class="btn transparent">Contattaci</button>
                </div>
                <img src="../img/log_sing_in/settings.svg" class="image" alt="" />
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>Sei gia uno di noi ?</h3>
                    <p>Accedi al tuo account e goditi tutte le nostre offerte.</p>
                    <button class="btn transparent" id="sign-in-btn">Accedi</button>
                </div>
                <img src="../img/log_sing_in/register.svg" class="image" alt="" />
            </div>
        </div>
    </div>
</body>

</html>