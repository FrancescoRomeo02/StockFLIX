<?php
include("header.php");

if (isset($_POST['query'])) {

    $query = "SELECT * FROM stock_name WHERE Symbol LIKE '{$_POST['query']}%' LIMIT 7";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($stock = mysqli_fetch_array($result)) {
            echo $stock['Symbol'] . '     ' . $stock['Security Name'] . "<br/>";
        }
    } else {
        echo "<p style='color:red'>stock not found...</p>";
    }
}
