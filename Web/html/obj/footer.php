<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<footer>
  <span>StockFLIX</span>
  <span>Based in Milan</span>
  <span><a href="mailto:StockFLIX@info.com" target="_blank">StockFLIX@info.com</a></span>
  <span>+39 373-326-0202</span>
  <span><a href="./attribution.html" target="_blank">attribution</a></span>
  <span>
    <a href="https://www.iubenda.com/privacy-policy/13904014" rel="noreferrer nofollow" target="_blank">Privacy Policy</a>
  </span>
  <span>
    <button type="submit" name="theme_l" class="button" value="light">More Color ?</button>
  </span>
  <span>
    <button type="submit" name="theme_d" class="button" value="dark">More Boring ?</button>
  </span>
</footer>
<!-- js query  -->
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script>
  $(".button").click(function(e) {
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