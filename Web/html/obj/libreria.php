<?php

function mail_send($mail_mittente, $mail_destinatario, $mail_link, $messaggio, $testo)
{
    $to = $mail_destinatario;
    $subject = $messaggio;
    $headers = 'From:' . $mail_mittente . "\r\n" .
        'MIME-Version: 1.0' . "\r\n" .
        'Content-Type: text/html; charset=ISO-8859-1' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    $message = '<h1 style="color: white;padding: 2%;background-color: #333;text-align: center;font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Oxygen, Ubuntu, Cantarell, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif;">' . $messaggio . ' </h1>';
    $message .= '<p style="color: #333;font-family: &quot;Muli&quot;, sans-serif;margin-bottom: 15px;padding: 2%;">Gentile ' . $mail_destinatario . ', <br> ' . $testo . '<br></p>';
    $message .= '<a href=" ' . $mail_link . '"class="button" style="display: block;width: 8rem;height: auto;background: #333;padding: 10px;text-align: center;border-radius: 5px;color: white;font-weight: bold;line-height: 25px;margin: 2%;text-decoration: none;">Clicca qui</a><br><br>';
    mail($to, $subject, $message, $headers);
}

function updatefile($filepath)
{

    $con = mysqli_connect('localhost', 'romeofrancesco', '');
    $con_db = (mysqli_select_db($con, 'my_romeofrancesco'));
    $data_file = fopen($filepath, "w") or die('Errore =(');
    $query = 'SELECT distinct symbol FROM wallet_stock, stock WHERE wallet_stock.stock_id = stock.stock_id';
    $temp = mysqli_query($con, $query);
    $data = mysqli_fetch_all($temp, MYSQLI_ASSOC);
    foreach ($data as $array) {
        fwrite($data_file, $array['symbol']  . "\n");
    }
    fclose($data_file);
}
