<?php session_start(); ?>

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

    $_SESSION['name_user'] = 'root';
    $_SESSION['db_name'] =   'stockn';


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
                                <h2>Benvenuto in StockN</h2>
                                <p>Non hai un account?</p>
                                <a href="./regist.php" class="btn btn-white btn-outline-white">Registrati</a>
                            </div>
                        </div>
                        <div class="login-wrap p-4 p-lg-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Accedi</h3>
                                </div>
                            </div>
                            <form action="#" class="signin-form" method="POST" onsubmit="cript()">
                                <div class="form-group mb-3">
                                    <label class="label" for="name">Email</label>
                                    <input type="text" class="form-control" placeholder="esempio@esempio.com" value="<?php ?>" type="mail" name="email" required />
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Password</label>
                                    <input type="password" class="form-control" placeholder="Password" name="password" id="pass" required />
                                </div>
                                <div class="form-group">
                                    <button type="submit" value="accedi" name="accedi" class="form-control btn btn-primary submit px-3">
                                        Accedi
                                    </button>
                                </div>
                                <div class="form-group d-md-flex">
                                    <div class="w-50 text-left">
                                        <label class="checkbox-wrap checkbox-primary mb-0">Ricordati di me
                                            <input type="checkbox" checked name="cookie" value="setcookie" />
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="w-50 text-md-right">
                                        <a href="#" onclick="linkpage('html/pswreset.php')">Password dimenticata</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    if (isset($_POST['accedi']) && $_POST['email'] != '' && $_POST['password'] != '') {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $query_data = "SELECT email,password FROM utenti_free WHERE email = '$email' AND password = '$password'";
        $temp = mysqli_query($con, $query_data);
        $data = mysqli_fetch_array($temp);
        if ($data != null && $_POST['email'] == $data['email'] && $_POST['password'] == $data['password']) {
            if (isset($_POST['cookie'])) {
                setcookie('login', 'True', time() + 86400);
            }
            header("Location: " . 'sub_page.php');
        } else {
            echo '<br> <h3>Dati errati, riprovare</h3>';
        }
    }

    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>