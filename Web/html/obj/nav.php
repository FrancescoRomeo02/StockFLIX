<?php
session_start();
if (!$_SESSION['login']) {
    $title = '<li><a href="https://romeofrancesco.altervista.org/Web/html/log_sing_in.php">Accedi</a></li>';
} else {
    $title = '<li><a href="https://romeofrancesco.altervista.org/Web/html/services/wallet.php">Wallet</a></li>';
    $logout = '<li><a href="https://romeofrancesco.altervista.org/Web/html/obj/logout.php">Logout</a></li>';
}
?>
<nav>
    <div class="logo">
        <h4>Stock<span>FLIX</span></h4>
    </div>
    <ul class="nav_links">
        <li><a href="https://romeofrancesco.altervista.org/Web/home_page.php">Home</a></li>
        <?php echo  $title ?>
        <li><a href="https://romeofrancesco.altervista.org/Web/html/services/stocks_data.php">Azioni</a></li>
        <li><a href="https://romeofrancesco.altervista.org/Web/html/settings.php">Impostazioni</a></li>
        <?php if (isset($logout)) echo $logout ?>
    </ul>
    <div id="burger">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
    </div>
</nav>