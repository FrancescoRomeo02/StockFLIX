<?php
include('../obj/header.php');
//print_r($_SESSION)
?>
<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../css/search.css" />
    <link rel="stylesheet" href="../../css/home_page.css" />
    <link rel="stylesheet" href="../../css/button.css" />
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
        <!-- RICERCA AZIONI -->
        <input type="checkbox" name="" id="check" />
        <div class="box">
            <input type="text" placeholder="Cerca azioni" id="search" autocomplete="off" />
            <label for="check"><i class="fas fa-search"></i></label>
        </div>
        <div id="output">
            <ul class="output"></ul>
        </div>
        <!-- RICERCA AZIONI -->
        <!-- SEZIONE IMMAGINE E TESTO -->
        <div data-aos="fade-up" class="row">
            <div class="col_1">
                <h2>
                    Tutte le azioni Americane <br />
                    Il mercato più importante del mondo
                </h2>
                <h3>Non lasciare che il tempo sgretoli i tuoi risparmi</h3>
                <p style="color: blueviolet;">Presto saranno disponibili nuove azioni</p>
                <h4>Dai un occhio alle tue azioni</h4>
                <button type="button" class="slide">WALLET</button>
            </div>
        </div>
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

        /* Query azioni */
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

                            $("#search").focusout(function() {
                                $("#output").css("display", "none");
                            });
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
    </script>
</body>

</html>