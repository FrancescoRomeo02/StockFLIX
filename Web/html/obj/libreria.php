<?php
function mail_send($mail_mittente, $mail_destinatario, $mail_link, $messaggio)
{
    $to = $mail_destinatario;
    $subject = $messaggio;
    $headers = 'From:' . $mail_mittente . "\r\n" .
        'MIME-Version: 1.0' . "\r\n" .
        'Content-Type: text/html; charset=ISO-8859-1' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();


    $message = '<h1 style="color: white;padding: 2%;background-color: #123eff;text-align: center;font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Oxygen, Ubuntu, Cantarell, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif;">' . $messaggio . ' </h1>';
    $message .= '<p style="color: #333;font-family: &quot;Muli&quot;, sans-serif;margin-bottom: 15px;padding: 2%;">Gentile ' . $mail_destinatario . ', <br> La registrazione a StockN è avvenuta con successo, <br> per confermare il tuo account fai click sul link che segue: <br></p>';
    $message .= '<a href=" ' . $mail_link . '"class="button" style="display: block;width: 8rem;height: auto;background: #4e9caf;padding: 10px;text-align: center;border-radius: 5px;color: white;font-weight: bold;line-height: 25px;margin: 2%;text-decoration: none;">Clicca qui</a><br><br>';
    mail($to, $subject, $message, $headers);
}
