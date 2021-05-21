<?php
include('../obj/header.php');
?>
<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../css/home_page.css" />
    <link rel="stylesheet" href="../../css/button.css" />
    <link rel="stylesheet" href="../../css/search.css" />
    <link rel="stylesheet" href="../../css/stocks_data.css" />
    <!-- css animazioni -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <!-- js icone  -->
    <script src="https://kit.fontawesome.com/64d58efce2.js"></script>
    <title> StockN - Impostazioni</title>
</head>

<body>
    <!--BARRA DI NAVIGAZIONE-->
    <?php include('../obj/nav.php'); ?>
    <!--BARRA DI NAVIGAZIONE-->
    <br /><br />

    <body>
        <h3>Impostazioni</h3>
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