<?php
include("header.php");

if (isset($_POST['query'])) {

    $query = "SELECT * FROM stock_name WHERE Symbol LIKE '{$_POST['query']}%' LIMIT 7";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        echo "<ul class='output'>";
        while ($stock = mysqli_fetch_array($result)) {
            echo "
            <li class='item'>
                <p class=symbol p" . $count . ">" . $stock['Symbol'] . "</p>
                <p class=sec_name>" . $stock['Security Name'] . "</p>
            </li>
            ";
        };
        echo "</ul>";
    } else {
        echo "<ul class='output'><li class='item'><p class='not_in'>Azione inesistente</p></li></ul>";
    }
}
