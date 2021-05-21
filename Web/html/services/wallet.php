<?php
include('../obj/header.php');
$glob_url = 'http://romeofrancesco.altervista.org/Data/csv/';
/* STOCKS NAME FROM DB */
$query_stocks = "SELECT azione_1, azione_2, azione_3 FROM utenti_free WHERE email = '$_SESSION[email]' AND password = '$_SESSION[code]'";
$temp = mysqli_query($con, $query_stocks);
$row = mysqli_fetch_array($temp, MYSQLI_ASSOC);
$data_file = fopen("../../../Data/stockname.txt", "w") or die("Errore nella comunicazione con il server!");
fwrite($data_file, $row['azione_1']  . "\n");
fwrite($data_file, $row['azione_2']  . "\n");
fwrite($data_file, $row['azione_3']  . "\n");
fclose($data_file);
/* STOCKS NAME FROM DB  */
?>
<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../css/home_page.css" />
    <link rel="stylesheet" href="../../css/button.css" />
    <link rel="stylesheet" href="../../css/wallet.css" />
    <!-- css animazioni -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <!-- js icone  -->
    <script src="https://kit.fontawesome.com/64d58efce2.js"></script>
    <!-- js query  -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <title> StockN - Wallet</title>
</head>

<body>
    <!--BARRA DI NAVIGAZIONE-->
    <?php include('../obj/nav.php'); ?>
    <!--BARRA DI NAVIGAZIONE-->
    <br /><br />
    <!-- MAIN -->
    <div class="container">
        <!-- SEZIONE IMMAGINE E TESTO -->
        <div data-aos="fade-left" class="row">
            <div class="col_1">
                <h2>
                    Ecco il tuo wallet<span style="color: #59b4ff;">!</span>
                </h2>
                <h3>Aggiornamenti <span style="color: #59b4ff;">istantamei</span> ogni giorno</h3>
                <p style="color: blueviolet;">Aggiornamenti live solo per versione pro</p>
            </div>
        </div>
        <!-- SEZIONE IMMAGINE E TESTO -->
        <!-- CHART STOCKS -->
        <div class="container_stock">
            <!--    CHART DINAMICO    -->
            <div class="one_stock">
                <?php
                $_SESSION['url_file'] = $glob_url . $row['azione_1'] . '_y.csv';
                $_SESSION['div_id'] = "chartdiv1";
                ?>
                <div data-aos="fade-right">
                    <h2> <?php echo $row['azione_1'] ?> </h2>
                    <div id="chartdiv1"></div>
                    <?php include('../obj/chart_page.php') ?>
                </div>
            </div>
            <!--    CHART DINAMICO    -->
            <!--    CHART DINAMICO    -->
            <div class="one_stock">
                <?php
                $_SESSION['url_file'] = $glob_url . $row['azione_2'] . '_y.csv';
                $_SESSION['div_id'] = "chartdiv2";
                ?>
                <div data-aos="fade-left">
                    <h2> <?php echo $row['azione_2'] ?> </h2>
                    <?php include('../obj/data_card.php'); ?>
                    <div id="chartdiv2"></div>
                    <?php include('../obj/chart_page.php') ?>
                </div>
            </div>
            <!--    CHART DINAMICO    -->
            <!--    CHART DINAMICO    -->
            <div class="one_stock">
                <?php
                $_SESSION['url_file'] = $glob_url . $row['azione_3'] . '_y.csv';
                $_SESSION['div_id'] = "chartdiv3";
                ?>
                <div data-aos="fade-right">
                    <h2> <?php echo $row['azione_3'] ?> </h2>
                    <div id="chartdiv3"></div>
                    <?php include('../obj/chart_page.php') ?>
                </div>
            </div>
            <!--    CHART DINAMICO    -->
        </div>
        <!-- CHART STOCKS-->
    </div>
    <!-- MAIN -->
    <!-- FOOTER -->
    <?php include('../obj/footer.php'); ?>
    <!-- FOOTER -->
    <!-- js animazioni -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="../../js/app.js" type="text/javascript"></script>
    <script>
        AOS.init();
        navSlide();
        /* stile scroll navbar */
        window.onscroll = () => {
            const nav = document.querySelector("nav");
            const nav_link = document.querySelectorAll(".nav_links li a");
            if (this.scrollY >= 10) {
                nav.classList.add("dark");
                nav_link.forEach((link) => {
                    console.log(link);
                    link.classList.add("white_text");
                });
            } else {
                nav.classList.remove("dark");
                nav_link.forEach((link) => {
                    link.classList.remove("white_text");
                });
            }
        };
    </script>
</body>

</html>