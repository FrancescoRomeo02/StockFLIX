<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<footer class="footer">
  <div class="footer__addr">
    <h1 class="footer__logo">STOCKFLEX</h1>

    <h2>Contatti</h2>

    <address>
      Based in Milan<br />

      <a class="footer__btn" href="StockFLIX@info.com">Contattaci</a>
    </address>
  </div>

  <ul class="footer__nav">
    <li class="nav__item">
      <h2 class="nav__title">Pagine</h2>

      <ul class="nav__ul">
        <li>
          <a href="https://romeofrancesco.altervista.org/">Home</a>
        </li>
        <li>
          <?php
          isset($_SESSION['login']) ? $text = '<a href="https://romeofrancesco.altervista.org/Web/html/services/wallet.php">Wallet</a>' : $text =  '<a href="https://romeofrancesco.altervista.org/Web/html/obj/logout.php">Logout</a>';
          echo $text;
          ?>
        </li>
        <li>
          <a href="https://romeofrancesco.altervista.org/Web/html/settings.php">Impostazioni</a>
        </li>
        <li>
          <?php
          isset($_SESSION['login']) ? $text2 = '<a href="https://romeofrancesco.altervista.org/Web/html/log_sing_in.php">Accedi</a>' : $text2 = '';
          echo $text2;
          ?>
      </ul>
    </li>

    <li class="nav__item">
      <h2 class="nav__title">Legal</h2>

      <ul class="nav__ul">
        <li>
          <a href="https://www.iubenda.com/privacy-policy/13904014" target="_blank">Privacy Policy</a>
        </li>

        <li>
          <a href="https://romeofrancesco.altervista.org/Web/html/attribution.html" target="_blank">Attribution</a>
        </li>

        <li>
          <a href="#" target="_blank">Sitemap</a>
        </li>
      </ul>
    </li>
    <li>
    <li>
      <button type="submit" name="theme_l" class="button_theme" value="light">More Color ?</button>
    </li>
    <li>
      <button type="submit" name="theme_d" class="button_theme" value="dark">More Boring ?</button>
    </li>
    </li>
  </ul>

  <div class="legal">
    <p>&copy; 2020 STOCKFLEX. All rights reserved.</p>
  </div>
</footer>
<!-- js query  -->
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script>
  $(".button_theme").click(function(e) {
    e.preventDefault();
    $.ajax({
      crossDomain: true,
      url: "https://romeofrancesco.altervista.org/Web/html/obj/theme.php",
      method: "POST",
      data: {
        id: $(this).val()
      },
      success: function(data) {
        alert('Il tema verrà aggiornato');
        location.reload();
      },
      error: function(data) {
        alert('Errore');
        location.reload();
      }
    });
  });
</script>