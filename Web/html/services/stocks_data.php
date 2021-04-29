<?php
include('./obj/header.php');
include("./obj/libreria.php");
?>
<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <!-- js per le icone -->
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/home_page.css">
    <link rel="stylesheet" href="../../css/search.css" />
    <link rel="stylesheet" href="../../css/stocks_data.css" />
    <title> StockN </title>
</head>
<script src="../js/libreria.js" type="text/javascript"></script>

<body>
    <!--BARRA DI NAVIGAZIONE-->
    <?php include('../obj/nav.php'); ?>
    <!--BARRA DI NAVIGAZIONE-->
    <br /><br />
    <!-- MAIN -->
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
    <!-- CARDS DIV SERVIZI -->
    <section id="services">
        <div class="services container">
            <div class="service_top">
                <h1 class="section_title">
                    <span>noi</span> siamo Stock<span>N</span>
                </h1>
                <p>
                    Ecco cosa ti offriamo, leggi, informati e <span>capisci</span> se
                    fa per te.
                    <br />
                    Non lasciarti sfuggire questa <span>occasione</span>.
                </p>
            </div>
            <div class="service_bottom">
                <!-- CARD -->
                <div class="service_item graph" data-aos="fade-up-left">
                    <div class="icon"><i class="fas fa-chart-area fa-3x" style="color: rgb(146, 64, 253);"></i></i></div>
                    <h2>Grafici</h2>
                    <p>
                        Avrai la possibilità di visionare in tutta comodità gli andamnti
                        di <span>ogni azione</span><br />
                        Teniamo particolarmente alle TUE azioni, loro avranno un
                        trattamento <span>speciale</span>.
                    </p>
                </div>
                <!-- CARD -->
                <!-- MAIN -->
                <!-- FOOTER -->
                <?php include('../obj/footer.php'); ?>
                <!-- FOOTER -->
                <!-- js animazioni -->
                <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
                <!-- js ricerca -->
                <script type="text/javascript">
                    $(document).ready(function() {
                        $("#search").keyup(function() {
                            var query = $(this).val();
                            if (query != "") {
                                $.ajax({
                                    url: "ajax_db_search.php",
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