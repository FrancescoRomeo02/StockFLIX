<?php
include('../obj/header.php');
$glob_url = 'http://romeofrancesco.altervista.org/Data/csv/';
$chart_div_array = array();
/* STOCKS NAME FROM DB */
$query_wallet_id = "SELECT `wallet_id` FROM `wallet` WHERE `user_id` = '$_SESSION[user_id]'";
$temp = mysqli_query($con, $query_wallet_id);
$data = mysqli_fetch_array($temp);
$query_stock  = "SELECT `stock_id` FROM `wallet_stock` WHERE wallet_id=  '$data[wallet_id]'";
$temp = mysqli_query($con, $query_stock);
$data2 = mysqli_fetch_all($temp, MYSQLI_ASSOC);

foreach ($data2 as $key => $value) {
    $query_stock_id = "SELECT `symbol` FROM `stock` WHERE `stock_id` = '$value[stock_id]'";
    $temp = mysqli_query($con, $query_stock_id);
    $data3 = mysqli_fetch_array($temp, MYSQLI_ASSOC);
    $_SESSION['url_file'] = $glob_url . $data3['symbol'] . '_y.csv';
    $_SESSION['div_id'] = "chartdiv" . $data3['symbol'];
    $chart_name = $data3['symbol'];
    $div = "<div class='one_stock'>";
    $div .= "<div data-aos='fade-right'>";
    $div .= "<h2>" . $chart_name . "</h2>";
    $div .= "<div id='$_SESSION[div_id]'></div>";
    $div .= include('../obj/chart_page.php');
    $div .= " </div></div>";
    array_push($chart_div_array, $div);
}

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
            <?php
            foreach ($chart_div_array as $chart_div) {
                echo $chart_div;
            }
            ?>
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