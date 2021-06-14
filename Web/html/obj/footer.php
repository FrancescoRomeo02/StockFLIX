<?php
$dataUrl = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$text = 'More Boring ?';
$teme = 'light';
?>
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
    <a href="<?php echo $dataUrl . '?' . $theme ?>"><?php echo $text ?></a>
  </span>
</footer>