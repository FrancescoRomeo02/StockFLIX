<?php
include("header.php");

if (isset($_POST['query'])) {

    $query = "SELECT * FROM stock_name WHERE Symbol LIKE '{$_POST['query']}%' LIMIT 7";
    $result = mysqli_query($con, $query);
    $count = 1;
    if (mysqli_num_rows($result) > 0) {
        while ($stock = mysqli_fetch_array($result)) {
            $count += 1;
            echo "
            <li class='item'>
                <p class='symbol" . "p" . $count . ">" . $stock['Symbol'] . "</p>
                <p class='sec_name'>" . $stock['Security Name'] . "</p>
            </li>
            ";
        }
    } else {
        echo "<li class='item'><p class='not_in'>Azione inesistente</p></li>";
    }
}
