<div class="slide-container">
  <div class="wrapper">
    <div class="stock-card stock">
      <div class="stock-card__level stock-card__level--stock">Stock<span>FLIX</span></div>
      <div class="stock-card__unit-name"><?php echo $card['symbol'] ?></div>
      <div class="stock-card__unit-stats stock-card__unit-stats--stock clearfix">
        <div class="one-third">
          <div class="stat"><?php echo $card['stock_owned'] ?></div>
          <div class="stat-value">possedute</div>
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
<!-- demo  -->
<form action="#" method="post">
  <ol class="gradient-list">
    <li>
      <div class="symbol"><?php echo $card['symbol'] ?></div>
      <div class="name"><?php echo $card['name'] ?></div>
      <div class="price"><?php echo $card['value'] ?> $</div>
      <form action="" method="post">
        <div class="qnt">
          <input type="number" name="azioni" id="" min="1" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
        </div>
        <button name="add" type="submit" value="<?php echo $card['symbol'] ?>">buy</button>
        <button name="sell" type="submit" value="<?php echo $card['symbol'] ?>">sell</button>
      </form>
    </li>
  </ol>
</form>
<!-- demo  -->
<!-- end container -->