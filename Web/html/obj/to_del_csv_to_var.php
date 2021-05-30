<html>

<head>
    <title>private</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
</body>

</html>
<script>
    function data_csv() {
        var obj_stack = [];
        $.ajax({
            url: "stock.csv",
            dataType: "text",
            success: function(data) {
                var stock_data = data.split(/\r?\n|\r/);
                var symbol = [];
                var sec_name = [];
                stock_data.forEach(element => {
                    data = element.split(',');
                    obj_stack.push({
                        'symbol': data[0],
                        'name': data[1]
                    });
                });
            },
        });
    };
    var temp = data_csv()
</script>