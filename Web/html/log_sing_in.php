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
  <title> StockN </title>
</head>
<script src="../js/libreria.js" type="text/javascript"></script>

<?php

use function PHPSTORM_META\type;

$nome = $cognome = $password = $mail = '';
$pro = 0;
$color = '#4481eb';
$errore_account = false;

//php accesso
if (isset($_POST['accedi']) && $_POST['email'] != '' && $_POST['password'] != '') {
  //assegno le variabili 
  $email = $_POST['email'];
  $password = $_POST['password'];
  //quey di verifica account
  $query_data = "SELECT email,password FROM utenti_free WHERE email = '$email' AND password = '$password'";
  error_log($query_data);
  $temp = mysqli_query($con, $query_data);
  $data = mysqli_fetch_array($temp);
  //controllo coincidenza campi
  if ($data != null && $_POST['email'] == $data['email'] && $_POST['password'] == $data['password']) {
    if (isset($_POST['cookie'])) {
      setcookie('login', 'True', time() + 86400);
    }
    header("Location: ../home_page.php');
  } else {
    $errore =  'Dati errati, riprovare';
    $color = 'rgb(129, 3, 3)';
  }
  unset($_POST);
}

//php regisatrzione
if (isset($_POST['registrati'])) {
  //assegno variabili
  $nome = $_POST['nome'];
  $cognome = $_POST['cognome'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $password2 = $_POST['password2'];
  $hash = md5(rand(0, 1000));

  //query per pre esistenza mail
  $query_check = "SELECT * FROM utenti_free WHERE email = '$email'";
  $result = mysqli_num_rows(mysqli_query($con, $query_check));

  //controllo coincidenza password
  if ($_POST['password2'] == $_POST['password']) {

    //controllo pre esistenza mail nel db
    if ($result == 0) {

      //query di aggiunta account in db
      $query_add = "INSERT INTO utenti_free (attivo, nome, cognome, email, password, pro, azione_1, azione_2, azione_3, hash) VALUES
      (0,'$nome', '$cognome', '$email', '$password', '$pro', 'a', 'a', 'a', '$hash')";

      if (mysqli_query($con, $query_add)) {
        $link = "https://romeofrancesco.altervista.org/Web/html/obj/datacheck.php?email=$email&hash=$hash";
        mail_send('stockN@info.com', $email, $link, 'Attiva il tuo account');
        $_SESSION['link'] = $link;
        $msr2 = 'Controlla la mail ed attiva il tuo account ';
      } else {
        $errore_account = True;
        $errore =  'Errore del DB';
        $color = 'rgb(159, 3, 3)';
        $msr2 = '<a href="./html/pswreset.php">Recupera la password</a>';
      }
    } else {
      $errore =  'Email già in uso';
      $color = 'rgb(159, 3, 3)';
    }
  } else {
  }
  unset($_POST);
}
?>

<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <!-------------------
          form accesso  
        -------------------->
        <form action="#" class="sign-in-form" method="POST" onsubmit="criptacc()">
          <h2 class="title">Accedi a <span style="color: <?php echo $color ?>;">StockN</span> </h2>
          <div class="input-field">
            <i class="fas fa-at" style="color: #4481eb"></i>
            <input required type="email" placeholder="Email" name="email" />
          </div>
          <div class="input-field">
            <i class="fas fa-key" style="color: #4481eb"></i>
            <input required type="password" placeholder="Password" name="password" class="pass" />
          </div>
          <input required type="submit" value="accedi" name="accedi" class="btn solid" />
          <a href="./pswreset.php">Password dimenticata</a>
          <?php
          if (isset($errore)) echo '<br><div class="alert"><span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> <strong>ATTENZIONE!</strong> ' . $errore .  '</div>';
          if (isset($msr2) && !isset($errore)) echo "<br><p>$msr2</p>";
          ?>
        </form>
        <!-------------------
          form registarzione  
        -------------------->
        <form action="#" class="sign-up-form" method="POST" onsubmit="criptreg()" id="registarzione">
          <h2 class="title">Registrati a <span style="color: <?php echo $color ?>;">StockN</span></h2>
          <div class="input-field">
            <i class="fas fa-user" style="color: #4481eb"></i>
            <input required type="text" placeholder="Nome" name="nome" />
          </div>
          <div class="input-field">
            <i class="fas fa-signature" style="color: #4481eb"></i>
            <input required type="text" placeholder="Cognome" name="cognome" />
          </div>
          <div class="input-field">
            <i class="fas fa-at" style="color: #4481eb"></i>
            <input required type="email" placeholder="Email" name="email" />
          </div>
          <div class="input-field">
            <i class="fas fa-key" style="color: #4481eb"></i>
            <input required type="password" placeholder="Password" name="password" class="pass" />
          </div>
          <div class="input-field">
            <i class="fas fa-key" style="color: #4481eb"></i>
            <input required type="password" placeholder="Password" name="password2" class="pass" />
          </div>
          <input type="submit" class="btn" value="Regisatrti" name="registrati" />
          <?php
          if ($errore_account) {
            echo $msr2;
            echo '<br><div class="alert"><span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> <strong>ATTENZIONE!</strong> ' . $errore .  '</div>';
          }  ?>
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>Sei nuovo qui ?</h3>
          <p>
            Entra anche tu in StockN per poter usufruire dei nostri fantastici
            servizi, non lasciarti sfuggire l'occasione.
          </p>
          <button class="btn transparent" id="sign-up-btn">Registrati</button>
        </div>
        <img src="../img/log_sing_in/log.svg" class="image" alt="" />
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

  <script src="../js/app.js"></script>
  <script>
    //cambio di scheda sui bottoni
    mode()
  </script>
</body>

</html>