<?php
require_once "connection.php";

if (isset($_POST['query'])) {

    $query = "SELECT * FROM stock_name WHERE name LIKE '{$_POST['query']}%' LIMIT 7";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($user = mysqli_fetch_array($result)) {
            echo $user['name'] . '     ' . $user['COL 2'] . "<br/>";
        }
    } else {
        echo "<p style='color:red'>User not found...</p>";
    }
}
