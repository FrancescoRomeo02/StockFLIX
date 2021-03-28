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

    <title>Home page</title>
</head>

<body>
    <script src="../js/libreria.js"></script>
    <?php

    $utente = $nome = $cognome = $password = $attivo = $mail = '';

    $con = mysqli_connect('localhost', $_SESSION['name_user'], '');
    $con_db = (mysqli_select_db($con, $_SESSION['db_name']));

    ?>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
                            <div class="text w-100">
                                <h2>Resetta la tua password</h2>
                                <p>Segui le istruzioni che riceverai via mail per resettare la tua password</p>
                            </div>
                        </div>
                        <div class="login-wrap p-4 p-lg-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Reset password</h3>
                                </div>
                            </div>
                            <form action="#" class="signin-form" method="POST" onsubmit="cript()">
                                <div class="form-group mb-3">
                                    <label class="label" for="name">Email</label>
                                    <input type="text" class="form-control" placeholder="esempio@esempio.com" value="<?php ?>" type="mail" name="email" required />
                                </div>
                                <div class="form-group">
                                    <button type="submit" value="invia" name="invia" class="form-control btn btn-primary submit px-3">
                                        Inviami la mail
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    if (isset($_POST['invia']) && $_POST['email'] != '') {
        $email = $_POST['email'];
        $query_data = "SELECT email FROM utenti_free WHERE email = '$email' ";
        $temp = mysqli_query($con, $query_data);
        $data = mysqli_fetch_array($temp);
        if ($data != null && $_POST['email'] == $data['email']) {
            $link = md5(rand(0, 100));
            $body = $link;
            mail_send('stockN@assistenza.com', $email, 'Modifica della password', $body);
        } else {
            echo '<br> <h3>La mail non e\' presente nel database</h3>';
        }
    }

    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>