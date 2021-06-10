<?php
include("header.php");
if (isset($_POST['query'])) {
    $char = strtoupper($_POST['query']);
    $query = "SELECT * FROM stock WHERE symbol LIKE '{$char}%' LIMIT 4";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {

        echo "<ul class='output'>";
        while ($stock = mysqli_fetch_array($result)) {

            //ID wallet dell'utente
            $query_wallet_id = "SELECT `wallet_id` FROM `wallet` WHERE `user_id` = '$_SESSION[user_id]'";
            $temp = mysqli_query($con, $query_wallet_id);
            $data = mysqli_fetch_array($temp);

            //ID azione 
            $query_stock_id = "SELECT `stock_id` FROM `stock` WHERE `symbol` = '$stock[symbol]'";
            $temp = mysqli_query($con, $query_stock_id);
            $data2 = mysqli_fetch_array($temp);

            //controllo presenza dell'azione nella tabella 
            $query_wallet = "SELECT * FROM `wallet_stock` WHERE `wallet_id` = '$data[wallet_id]' AND `stock_id` = '$data2[stock_id]'";
            $data3 = mysqli_query($con, $query_wallet);
            if (mysqli_num_rows($data3) > 0) {
                echo "
                <li class=item>
                    <p class=symbol p" . $count . ">" . $stock['symbol'] . "</p>
                    <p class=sec_name>" . $stock['security_name'] . "</p>
                    <i class='fas fa-trash-alt' id='unfollow' style='z-index:11' value='" . $stock['symbol'] . "' onClick='unfollow(this)'></i>
                </li>
                ";
            } else {
                echo "
                <li class=item>
                    <p class=symbol p" . $count . ">" . $stock['symbol'] . "</p>
                    <p class=sec_name>" . $stock['security_name'] . "</p>
                    <i class='fas fa-wallet' id='follow' style='z-index:11' value='" . $stock['symbol'] . "' onClick='follow(this)'></i>
                </li>
                ";
            }
        };
        echo "</ul>";
    } else {
        echo "<ul class='output'><li class='item'><p class='not_in'>Azione inesistente</p></li></ul>";
    }
}
