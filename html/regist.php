<?php
session_start();
if (!isset($_SESSION['name_user'])  || !isset($_SESSION['db_name'])) {
    $_SESSION['name_user'] = 'root';
    $_SESSION['db_name'] =   'stockn';
}
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

<script src="../js/libreria.js" type="text/javascript"></script>

<?php

use function PHPSTORM_META\type;

$nome = $cognome = $password = $mail = '';
$pro = 0;
$msr = 'Benvenuto in StockN ';
$alert = 'text-wrap';
$btn_accedi = '';
$glass = '';
$con = mysqli_connect('localhost', $_SESSION['name_user'], '');
$con_db = (mysqli_select_db($con, $_SESSION['db_name']));

if (isset($_POST['registrati'])) {
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hash = md5(rand(0, 1000));
    $query_check = "SELECT * FROM utenti_free WHERE email = '$email'";
    $result = mysqli_num_rows(mysqli_query($con, $query_check));

    if ($result == 0) {

        $query_add = "INSERT INTO utenti_free (attivo, nome, cognome, email, password, pro, azione_1, azione_2, azione_3, hash) VALUES
        (0,'$nome', '$cognome', '$email', '$password', '$pro', 'a', 'a', 'a', '$hash')";

        if (mysqli_query($con, $query_add)) {
            $link = "http://romeofrancesco.altervista.org/html/datacheck.php?email=$email&hash=$hash";
            mail_send('stockN@assistenza.com', $email, 'Verifica la registrazione', $link, 'Attiva il tuo account');
            $_SESSION['link'] = $link;
            echo  $_SESSION['link'];
            $btn_accedi = '<button onclick="linkpage(\'html/home.php\')" class="btn btn-white btn-outline-white">ACCEDI</button>';
            $msr2 = 'Controlla la mail ed attiva il tuo account ';
        }
    } else {
        $msr =  'Utente già registrato';
        $alert = 'regist_problem';
        $btn_accedi = '<button onclick="linkpage(\'html/home.php\')" class="btn btn-white btn-outline-white">ACCEDI</button>';
        $glass = 'glass';
    }
}

if (isset($_POST['mandamail'])) {
    mail_send('stockN@assistenza.com', $email, 'Verifica la registrazione', $link, 'Attiva il tuo account');
}
?>

<body style="overflow:hidden;">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last <?php echo $alert ?>">
                            <div class="text w-100">
                                <h2><?php echo $msr ?></h2> <br>
                                <?php if (isset($msr2)) echo '<h3>' . $msr2 . '</h3> <br>' ?>
                                <?php if (isset($btn_accedi)) echo $btn_accedi ?> <br> <br>
                                <?php if ($glass != '') {
                                    echo '<a href="#" onclick="linkpage(\'html/pswreset.php\')">Password dimenticata</a><br> <br> ';
                                    echo '<div style="z-index: 999;" onclick="linkpage(\'html/regist.php\')"><img onclick="linkpage(\'html/regist.php\')" id="rotate" src="../image/arrow.png" alt="" srcset=""></div>';
                                };
                                if (isset($msr2)) {  ?>
                                    <form method="POST" action="#">
                                        <button type="submit" value="mandamail" class="btn btn-white btn-outline-white" <?php if ($glass != '') echo 'disabled' ?>>
                                            reinvia mail
                                        </button>
                                    </form>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="login-wrap p-4 p-lg-5 <?php echo $glass ?>">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Registrati</h3>
                                </div>
                            </div>
                            <form action="#" class="signin-form" method="POST" onsubmit="cript()">
                                <div class="form-group mb-3">
                                    <label class="label" for="name">Nome</label>
                                    <input type="text" class="form-control" placeholder="Name" name="nome" required <?php if ($glass != '') echo 'disabled' ?> />
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="name">Cognome</label>
                                    <input type="text" class="form-control" placeholder="Cognome" name="cognome" required <?php if ($glass != '') echo 'disabled' ?> />
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="name">Email</label>
                                    <input type="email" class="form-control" placeholder="esempio@esempio.com" name="email" required <?php if ($glass != '') echo 'disabled' ?> />
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Password</label>
                                    <input type="password" class="form-control" placeholder="Password" name="password" id="pass" required <?php if ($glass != '') echo 'disabled' ?> />
                                </div>
                                <div class="form-group">
                                    <button type="submit" value="registrati" name="registrati" class="<?php echo $alert ?> form-control btn btn-primary submit px-3 " <?php if ($glass != '') echo 'disabled' ?>>
                                        Registrati
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>