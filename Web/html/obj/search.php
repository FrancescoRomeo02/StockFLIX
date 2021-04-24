<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="frmSearch">
        <input type="text" id="search-box" placeholder="Country Name" />
        <div id="suggesstion-box"></div>
    </div>
</body>
<script>
    $(document).ready(function() {
        $("#search-box").keyup(function() {
            $.ajax({
                type: "POST",
                url: "readCountry.php",
                data: 'keyword=' + $(this).val(),
                beforeSend: function() {
                    $("#search-box").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
                },
                success: function(data) {
                    $("#suggesstion-box").show();
                    $("#suggesstion-box").html(data);
                    $("#search-box").css("background", "#FFF");
                }
            });
        });
    });
    //To select country name
    function selectCountry(val) {
        $("#search-box").val(val);
        $("#suggesstion-box").hide();
    }
</script>

</html>