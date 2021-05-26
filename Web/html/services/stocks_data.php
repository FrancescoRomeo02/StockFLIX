<?php
include('../obj/header.php');
if (!isset($_SESSION['url_file']))   $_SESSION['url_file'] = 'query';
if (!isset($_SESSION['user_id'])) $_SESSION['user_id'] = 0;
if (!isset($_SESSION['type'])) $_SESSION['type'] = 'error';
if (!isset($_SESSION['txt'])) $_SESSION['txt'] = 'Qualcosa è andato storto';
if (!isset($_SESSION['icon'])) $_SESSION['icon'] = 'fa-bug';
?>
<!DOCTYPE html>
<html lang="it">
<style>

</style>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../css/home_page.css" />
    <link rel="stylesheet" href="../../css/button.css" />
    <link rel="stylesheet" href="../../css/search.css" />
    <!-- css animazioni -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <!-- js icone  -->
    <script src="https://kit.fontawesome.com/64d58efce2.js"></script>
    <!-- js query  -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <title> StockN - Azioni</title>
</head>

<body>
    <!--BARRA DI NAVIGAZIONE-->
    <?php include('../obj/nav.php'); ?>
    <!--BARRA DI NAVIGAZIONE-->
    <br /><br />
    <!-- MAIN -->
    <!-- BANNER AZIONI -->
    <div class="banners-container">
        <div class="banners">
            <div class="banner <?php echo $_SESSION['type'] ?>">
                <div class="banner-icon">
                    <i class="fas <?php echo $_SESSION['icon'] ?>"></i>
                </div>
                <div class="banner-message"><?php echo $_SESSION['txt'] ?></div>
            </div>
        </div>
    </div>
    <!-- BANNER AZIONI -->
    <!-- RICERCA AZIONI -->
    <input type="checkbox" name="" id="check" />
    <div class="box">
        <input type="text" placeholder="Ricerca azioni, premi sulla meteora per aggiungerla al wallet" id="search" autocomplete="off" />
        <label for="check"><i class="fas fa-search"></i></label>
    </div>
    <div id="output">
        <ul class="output"></ul>
    </div>
    <!-- RICERCA AZIONI -->
    <div class="container">
        <!-- SEZIONE IMMAGINE E TESTO -->
        <div data-aos="fade-up" class="row">
            <div class="col_1">
                <h2>
                    Le azioni Americane, <br />
                    Il mercato più importante <br /> mondo
                </h2>
                <h3>Scopri ogni giorno <span style="color: #59b4ff;">nuove</span> possibilità</h3>
                <p style="color: blueviolet;">Presto disponibili nuove azioni</p>
                <h4>Dai un occhio alle tue azioni</h4>
                <a href="./wallet.php"> <button type="button" class="slide">WALLET</button></a>
            </div>
        </div>
        <!-- SEZIONE IMMAGINE E TESTO -->
        <!-- CHART RANDOM -->
        <div data-aos="fade-right">
            <?php include('../obj/example_chart.php'); ?>
        </div>
        <!-- CHART RANDOM -->
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
        // Query azioni
        $(document).ready(function() {
            $("#search").keyup(function() {
                var query = $(this).val();
                if (query != "") {
                    $.ajax({
                        url: "http://romeofrancesco.altervista.org/Web/html/obj/ajax_db_search.php",
                        method: "POST",
                        data: {
                            query: query
                        },
                        success: function(data) {
                            $("#output").html(data);
                            $("#output").css("display", "block");
                            $("#search").focusin(function() {
                                $("#output").css("display", "block");
                            });
                        },
                    });
                } else {
                    $("#output").css("display", "none");
                }
            });
        });

        //  Follow unFollow
        function follow(val) {
            console.log(val.getAttribute('value'));

            $.ajax({
                method: "POST",
                url: 'http://romeofrancesco.altervista.org/Web/html/obj/follow.php',
                data: {
                    name: val.getAttribute('value'),
                    user_id: <?php echo $_SESSION['user_id'] ?>,
                },
            });

            showBanner('.banner.<?php echo $_SESSION['type'] ?>');
            setTimeout(hideBanners, 3000);
        }

        function unfollow(val) {
            console.log(val.getAttribute('value'));

            $.ajax({
                method: "POST",
                url: 'http://romeofrancesco.altervista.org/Web/html/obj/unfollow.php',
                data: {
                    name: val.getAttribute('value'),
                    user_id: <?php echo $_SESSION['user_id'] ?>,
                },
            });

            showBanner('.banner.<?php echo $_SESSION['type'] ?>');
            setTimeout(hideBanners, 3000);
        }

        // animazioni banner
        const showBanner = (selector) => {
            hideBanners();
            requestAnimationFrame(() => {
                const banner = document.querySelector(selector);
                banner.classList.add("visible");
            });
        };

        const hideBanners = (e) => {
            document
                .querySelectorAll(".banner.visible")
                .forEach((b) => b.classList.remove("visible"));
        };
    </script>
</body>

</html>