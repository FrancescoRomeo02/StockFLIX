<?php
include("header.php");
if (isset($_POST['query'])) {
    $char = strtoupper($_POST['query']);
    $query = "SELECT * FROM stock WHERE symbol LIKE '{$char}%' LIMIT 7";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        echo "<ul class='output'>";
        while ($stock = mysqli_fetch_array($result)) {
            echo "
            <li class=item onclick=follow()>
                <p class=symbol p" . $count . ">" . $stock['symbol'] . "</p>
                <p class=sec_name>" . $stock['security name'] . "</p>
            </li>
            ";
        };
        echo "</ul>";
    } else {
        echo "<ul class='output'><li class='item'><p class='not_in'>Azione inesistente</p></li></ul>";
    }
}
if (isset($_POST['action']) && $_POST['action'] == 'follow') {
    echo 'ci siamo, funziona ' . $_POST['action'];
}
