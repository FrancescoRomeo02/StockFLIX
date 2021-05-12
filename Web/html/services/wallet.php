<?php
include('../obj/header.php');
$_SESSION['url'] = 'http://romeofrancesco.altervista.org/Data/csv/NIO_y.csv';
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
    <title> StockN </title>
</head>

<body>
    <!--BARRA DI NAVIGAZIONE-->
    <?php include('../obj/nav.php'); ?>
    <!--BARRA DI NAVIGAZIONE-->
    <br /><br />
    <!-- MAIN -->
    <div class="container">
        <!-- SEZIONE IMMAGINE E TESTO -->
        <div data-aos="fade-up" class="row">
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
            <div class="pos1">
                <div class="wrapper">
                    <div class="news">
                        <figure class="article">
                            <div class="stock">
                                <?php
                                include('../obj/chart_page.php')
                                ?>
                            </div>
                            <figcaption>
                                <h3>New Item</h3>
                                <p>
                                    In today’s update, two heads are better than one, and three heads are better than that,
                                    as the all-new Flockheart’s Gamble Arcana item for Ogre Magi makes its grand debut.
                                </p>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>
            <div class="pos3">
                <div class="wrapper">
                    <div class="news">
                        <figure class="article">
                            <img src="https://mrreiha.keybase.pub/codepen/hover-fx/news1.jpg" />
                            <figcaption>
                                <h3>New Item</h3>
                                <p>
                                    In today’s update, two heads are better than one, and three heads are better than that,
                                    as the all-new Flockheart’s Gamble Arcana item for Ogre Magi makes its grand debut.
                                </p>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>
            <div class="pos2">
                <div class="wrapper">
                    <div class="news">
                        <figure class="article">
                            <img src="https://mrreiha.keybase.pub/codepen/hover-fx/news1.jpg" />
                            <figcaption>
                                <h3>New Item</h3>
                                <p>
                                    In today’s update, two heads are better than one, and three heads are better than that,
                                    as the all-new Flockheart’s Gamble Arcana item for Ogre Magi makes its grand debut.
                                </p>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
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