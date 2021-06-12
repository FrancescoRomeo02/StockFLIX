<div class="slide-container">
  <div class="wrapper">
    <div class="stock-card barbarian">
      <div class="stock-card__level stock-card__level--barbarian">Stock<span>FLIX</span></div>
      <div class="stock-card__unit-name"><?php echo $card['symbol'] ?></div>
      <div class="stock-card__unit-stats stock-card__unit-stats--barbarian clearfix">
        <div class="one-third">
          <div class="stat"><?php echo $card['stock_owned'] ?><sup>Azioni</sup></div>
          <div class="stat-value">Quantità</div>
        </div>
        <div class="one-third">
          <div class="stat"><?php echo $card['value'] ?></div>
          <div class="stat-value">Prezzo</div>
        </div>
        <div class="one-third no-border">
          <div class="stat <?php echo $card['style_value']; ?>"><?php echo ($card['variazione']) . '%' ?></div>
          <div class="stat-value">Variazione</div>
        </div>
      </div>
    </div>
    <!-- end card -->
  </div>
</div>

<!-- end container -->