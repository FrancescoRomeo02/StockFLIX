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
    <link rel="stylesheet" href="../../css/search.css" />
    <link rel="stylesheet" href="../../css/stocks_data.css" />
    <title> StockN </title>
</head>
<script src="../js/libreria.js" type="text/javascript"></script>

<body>
    <!--BARRA DI NAVIGAZIONE-->
    <?php include('./html/obj/nav.php'); ?>
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
    <!-- MAIN -->
    <!-- FOOTER -->
    <?php include('./html/obj/footer.php'); ?>
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