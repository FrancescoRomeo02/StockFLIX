<?php
include('../obj/header.php');
$glob_url = 'https://romeofrancesco.altervista.org/Data/csv/';
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

    $count = 0;
    if (($handle = fopen('../../../Data/csv/' . $data3['symbol'] . '_y.csv', "r")) !== FALSE) {
        while (($row =   fgetcsv($handle)) !== FALSE && $count < 3) {
            if ($count == 0) {
                $count++;
                continue;
            }
            if ($count == 1) {
                $count++;
                $new = $row[1];
                continue;
            }
            if ($count == 2) {
                $count++;
                $old = $row[1];
                continue;
            }
        }
        fclose($handle);
        $query_rem = "DELETE FROM `stock_info` WHERE `stock_id` = '$value[stock_id]'";
        mysqli_query($con, $query_rem);

        $var = round(((($new) / ($old)) * 100) - 100, 2);
        $query = "INSERT INTO `stock_info`(`stock_id`, `prezzo`, `old_prezzo`, `variazione`) VALUES ('$value[stock_id]', '$new', '$old', '$var')";
        mysqli_query($con, $query);
    }
}


// DEMO
if (isset($_POST['add'])) {
    $verifica = "select user.patrimonio, stock_info.prezzo 
                    FROM user, stock_info WHERE user.user_id = '$_SESSION[user_id]'
                    and stock_info.stock_id = 
                        ( SELECT `stock_id` from stock where symbol = '$_POST[add]')";
    $temp = mysqli_query($con, $verifica);
    $data = mysqli_fetch_array($temp);
    $value = $_POST['azioni'] * $data['prezzo'];
    if ($data['patrimonio'] > $value) {
        $query = "UPDATE user SET patrimonio = (patrimonio - '$value') WHERE user_id = '$_SESSION[user_id]'";
        $query2 = "UPDATE wallet_stock SET stock_owned = (stock_owned + $_POST[azioni]) 
                    where wallet_id = $_SESSION[wallet_id] 
                    and stock_id = ( SELECT `stock_id` from stock where symbol = '$_POST[add]')";
        mysqli_query($con, $query);
        mysqli_query($con, $query2);
    }
}

if (isset($_POST['sell'])) {
    $query = "select stock_owned, stock_info.prezzo FROM wallet_stock, stock_info 
    			 WHERE wallet_stock.stock_id = stock_info.stock_id and wallet_stock.stock_id = ( SELECT `stock_id` from stock where symbol = '$_POST[sell]' ) and wallet_id = $_SESSION[wallet_id]";
    $temp = mysqli_query($con, $query);
    $data = mysqli_fetch_array($temp);
    $value = $data['stock_owned'] - $_POST['azioni'];
    $guadagno = $_POST['azioni'] * $data['prezzo'];
    if ($value >= 0) {
        $query = "update user SET patrimonio = patrimonio + $guadagno where user_id = $_SESSION[user_id]";
        $query2 = "update wallet_stock SET stock_owned = $value where wallet_id = $_SESSION[wallet_id] 
        and stock_id = ( SELECT `stock_id` from stock where symbol = '$_POST[sell]')";
        mysqli_query($con, $query);
        mysqli_query($con, $query2);
    }
}
/* STOCKS NAME FROM DB  */
?>
<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../css/color_palette_<?php echo $_SESSION['theme'] ?>.css" />
    <link rel="stylesheet" href="../../css/home_page.css" />
    <link rel="stylesheet" href="../../css/button.css" />
    <link rel="stylesheet" href="../../css/wallet.css" />
    <link rel="stylesheet" href="../../css/list_buy_sell.css" />
    <!-- css animazioni -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <!-- js icone  -->
    <script src="https://kit.fontawesome.com/64d58efce2.js"></script>
    <!-- js query  -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <title> StockFLIX - Wallet</title>
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
                    Ecco il tuo wallet<span>!</span>
                </h2>
                <h3>Aggiornamenti <span>istantamei</span> ogni giorno</h3>
                <p>Aggiornamenti live solo per versione pro</p>
            </div>
        </div>
        <!-- SEZIONE IMMAGINE E TESTO -->
        <!-- CHART STOCKS -->
        <div class="container_stock">
            <!--    CHART DINAMICO    -->
            <?php
            $count_div = 0;
            foreach ($chart_div_array as $chart_div) {
                echo $chart_div;
                $count_div++;
            }
            if ($count_div == 0) {
                echo "<h4>qui non c'è ancora nulla, se non l'hai ancora fatto accedi al tuo profilo oppure aggiungi alcune azioni al tuo wallet</h4>";
            }
            ?>
            <!--    CHART DINAMICO    -->
        </div>

        <!-- CHART STOCKS-->
        <!-- DEMO SHOP -->
        <?php
        $query  = "SELECT * FROM stock, stock_info, wallet_stock, wallet, user 
                    WHERE stock_info.stock_id = wallet_stock.stock_id 
                    AND wallet_stock.wallet_id = wallet.wallet_id 
                    AND stock.stock_id = stock_info.stock_id 
                    AND wallet.user_id = '$_SESSION[user_id]' 
                    AND user.user_id = '$_SESSION[user_id]' 
                    AND user.pro_user = 1 ";
        $temp = mysqli_query($con, $query);
        $info = array();
        if (mysqli_num_rows($temp)) {
            while ($row = mysqli_fetch_array($temp, MYSQLI_ASSOC)) {
                $info[] = $row;
            }
        }

        echo '<div class="cards_info">';
        for ($i = 0; $i < sizeof($info); $i++) {
            $card['symbol'] = $info[$i]['symbol'];
            $card['stock_owned'] = $info[$i]['stock_owned'];
            $card['value'] = $info[$i]['prezzo'];
            $card['name'] = $info[$i]['security_name'];
            substr(strval($card['value']), 0, 1) == "-" ? $card['style_value'] = 'down_stock' : $card['style_value'] = 'up_stock';
            $card['variazione'] = $info[$i]['variazione'];
            include('../obj/data_card.php');
        }
        echo '</div>'
        ?>
        <!-- DEMO SHOP -->
        <!-- SEZIONE IMMAGINE E TESTO -->
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