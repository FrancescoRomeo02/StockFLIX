!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Autocomplete Script</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <script>
        $(function() {
            $("#country").keyup(function() {
                var countryName = $(this).val();
                $.ajax({
                        method: "POST",
                        url: "getCountry.php",
                        data: {
                            country: countryName
                        }
                    })
                    .done(function(data) {
                        $("#suggestions").show();
                        $("#suggestions").html(data);
                    });
            });
        });
    </script>
</head>

<body>

    <div class="countrySearch">
        <input type="text" id="country" placeholder="Country">
        <div id="suggestions"></div>
    </div>

</body>

</html>