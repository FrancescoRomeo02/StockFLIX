<?php
include('./html/obj/header.php');
?>
<!DOCTYPE html>
<html lang="it">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="stylesheet" href="../css/home_page.css">
  <link rel="stylesheet" href="../css/pay.css" />
  <title> StockFLIX - Pagameneto </title>
</head>
<?php
if (isset($_POST['paga'])) {
  $query = "UPDATE `user` SET `pro_user`=1,`patrimonio`=10000 WHERE `user_id` = $_SESSION[user_id]";
  mysqli_query($con, $query);
  header('Location: ../home_page.php');
}
?>

<body>
  <!--BARRA DI NAVIGAZIONE-->
  <?php include('./html/obj/nav.php'); ?>
  <!--BARRA DI NAVIGAZIONE-->
  <br /><br />
  <!-- MAIN -->
  <div class="container">
    <div class="payment">
      <form class="form" method="POST">
        <h2>Dettagli di pagamento</h2>

        <div class="form__name form__detail">
          <label for="name">Nome Proprietario</label>
          <ion-icon name="person-outline"></ion-icon>
          <input type="text" placeholder="Nome Cognome" id="name" maxlength="24" />
          <div class="alert" id="alert-1">
            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M11.3163 9.00362C11.8593 10.0175 11.1335 11.25 9.99343 11.25H2.00657C0.866539 11.25 0.140732 10.0175 0.683711 9.00362L4.67714 1.54691C5.24618 0.484362 6.75381 0.484362 7.32286 1.54691L11.3163 9.00362ZM5.06238 4.49805C5.02858 3.95721 5.4581 3.5 6 3.5C6.5419 3.5 6.97142 3.95721 6.93762 4.49805L6.79678 6.75146C6.77049 7.17221 6.42157 7.5 6 7.5C5.57843 7.5 5.22951 7.17221 5.20322 6.75146L5.06238 4.49805ZM6 8C5.44772 8 5 8.44772 5 9C5 9.55229 5.44772 10 6 10C6.55228 10 7 9.55229 7 9C7 8.44772 6.55228 8 6 8Z" fill="#FF6A96" />
            </svg>
            Nome completo richiesto
          </div>
        </div>

        <div class="form__number form__detail">
          <label for="number">Numero di carta</label>
          <ion-icon name="card-outline"></ion-icon>
          <input type="text" placeholder="0000 0000 0000 0000" id="number" onkeypress="return isNumeric(event)" />
          <div class="alert" id="alert-2">
            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M11.3163 9.00362C11.8593 10.0175 11.1335 11.25 9.99343 11.25H2.00657C0.866539 11.25 0.140732 10.0175 0.683711 9.00362L4.67714 1.54691C5.24618 0.484362 6.75381 0.484362 7.32286 1.54691L11.3163 9.00362ZM5.06238 4.49805C5.02858 3.95721 5.4581 3.5 6 3.5C6.5419 3.5 6.97142 3.95721 6.93762 4.49805L6.79678 6.75146C6.77049 7.17221 6.42157 7.5 6 7.5C5.57843 7.5 5.22951 7.17221 5.20322 6.75146L5.06238 4.49805ZM6 8C5.44772 8 5 8.44772 5 9C5 9.55229 5.44772 10 6 10C6.55228 10 7 9.55229 7 9C7 8.44772 6.55228 8 6 8Z" fill="#FF6A96" />
            </svg>
            Numero di carta non valido
          </div>
        </div>

        <div class="form__expiry form__detail">
          <label for="date">Data si scadenza</label>
          <ion-icon name="calendar-outline"></ion-icon>
          <input type="text" placeholder="MM/YY" id="date" onkeypress="return isNumeric(event)" />
          <div class="alert" id="alert-3">
            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M11.3163 9.00362C11.8593 10.0175 11.1335 11.25 9.99343 11.25H2.00657C0.866539 11.25 0.140732 10.0175 0.683711 9.00362L4.67714 1.54691C5.24618 0.484362 6.75381 0.484362 7.32286 1.54691L11.3163 9.00362ZM5.06238 4.49805C5.02858 3.95721 5.4581 3.5 6 3.5C6.5419 3.5 6.97142 3.95721 6.93762 4.49805L6.79678 6.75146C6.77049 7.17221 6.42157 7.5 6 7.5C5.57843 7.5 5.22951 7.17221 5.20322 6.75146L5.06238 4.49805ZM6 8C5.44772 8 5 8.44772 5 9C5 9.55229 5.44772 10 6 10C6.55228 10 7 9.55229 7 9C7 8.44772 6.55228 8 6 8Z" fill="#FF6A96" />
            </svg>
            Data non valida
          </div>
        </div>

        <div class="form__cvv form__detail">
          <label for="cvv">CVV
            <ion-icon name="information-circle" class="info"></ion-icon>
          </label>
          <ion-icon name="lock-closed-outline"></ion-icon>
          <input type="password" placeholder="0000" id="cvv" maxlength="4" onkeypress="return isNumeric(event)" />
          <div class="alert" id="alert-4">
            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M11.3163 9.00362C11.8593 10.0175 11.1335 11.25 9.99343 11.25H2.00657C0.866539 11.25 0.140732 10.0175 0.683711 9.00362L4.67714 1.54691C5.24618 0.484362 6.75381 0.484362 7.32286 1.54691L11.3163 9.00362ZM5.06238 4.49805C5.02858 3.95721 5.4581 3.5 6 3.5C6.5419 3.5 6.97142 3.95721 6.93762 4.49805L6.79678 6.75146C6.77049 7.17221 6.42157 7.5 6 7.5C5.57843 7.5 5.22951 7.17221 5.20322 6.75146L5.06238 4.49805ZM6 8C5.44772 8 5 8.44772 5 9C5 9.55229 5.44772 10 6 10C6.55228 10 7 9.55229 7 9C7 8.44772 6.55228 8 6 8Z" fill="#FF6A96" />
            </svg>
            CVV non valido
          </div>
        </div>

        <button type="submit" class="form__btn" name="paga">Conferma</button>
      </form>
    </div>
  </div>
  <!-- MAIN -->
  <!-- FOOTER -->
  <?php include('./html/obj/footer.php'); ?>
  <!-- FOOTER -->
  <!-- js controllo campi -->
  <script src="../js/app.js"></script>
</body>

</html>