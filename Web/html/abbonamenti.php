<?php
include('./obj/header.php');
?>
<!DOCTYPE html>
<html lang="it">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="stylesheet" href="../css/color_palette_light.css" />
  <link rel="stylesheet" href="../css/abbonamenti.css" />
  <link rel="stylesheet" href="../css/home_page.css" />

  <!-- css animazioni -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
  <title>StockFLIX - Abbonamenti</title>
</head>

<body>
  <!--BARRA DI NAVIGAZIONE-->
  <?php include('./obj/nav.php'); ?>
  <!--BARRA DI NAVIGAZIONE-->
  <br /><br />
  <!-- MAIN -->
  <!-- CARDS DIV SERVIZI-->
  <section id="services">
    <div class="services container">
      <div data-aos="fade-down">
        <div class="service_top">
          <h1 class="section_title">Che utente vuoi <span>essere</span>?</h1>
          <p>
            Più sotto troverai i nostri <span>piani di abbonamento</span>, ma
            prima<br />
            un breve riepilogo di cosa offre il piano <span>PRO</span>.
          </p>
        </div>
      </div>
      <div class="cards-list">
        <div data-aos="flip-left">
          <div class="card 1">
            <div class="card_image">
              <img src="https://media.giphy.com/media/12Eo7WogCAoj84/giphy.gif" />
            </div>
            <div class="card_title title-white">
              <p>Portafoglio Demo</p>
            </div>
            <p>Non rischiare i tuoi soldi.</p>
          </div>
        </div>
        <div data-aos="flip-right">
          <div class="card 2">
            <div class="card_image">
              <img src="https://media.giphy.com/media/l46Cy1rHbQ92uuLXa/giphy.gif" />
            </div>
            <div class="card_title title-white">
              <p>Grafici</p>
            </div>
            <p>Un idea chiara a colpo d'occhio.</p>
          </div>
        </div>
        <div data-aos="flip-left">
          <div class="card 3">
            <div class="card_image">
              <img src="https://media.giphy.com/media/26BkMgeeCjES3B4FW/giphy.gif" />
            </div>
            <div class="card_title">
              <p>Mai Solo</p>
            </div>
            <p>Sarai sempre aggiornato.</p>
          </div>
        </div>
        <div data-aos="flip-right">
          <div class="card 4">
            <div class="card_image">
              <img src="https://media.giphy.com/media/8t8Yamlz9ctfc4Dhuu/giphy.gif" />
            </div>
            <div class="card_title title-black">
              <p>AI</p>
            </div>
            <p>Non fare tutto tu.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- CARDS DIV SERVIZI-->

  <!-- CARDS DIV PIANI -->
  <div id="services" class="container">
    <div data-aos="fade-down">
      <div class="top">
        <h1 class="section_title">Scegli il tuo <span>piano</span></h1>
        <div class="toggle-btn">
          <span style="margin: 0.8em">Società</span>
          <label class="switch">
            <input type="checkbox" id="checbox" onclick="check()" ; />
            <span class="slider round"></span>
          </label>
          <span style="margin: 0.8em">Privato</span>
        </div>
      </div>
    </div>

    <div class="package-container">
      <div data-aos="fade-right">
        <div class="packages">
          <h1>Basic</h1>
          <h2 class="text1">Gratis</h2>
          <h2 class="text2">Gratis</h2>
          <ul class="list">
            <li class="first">3 Azioni</li>
            <li>6 mail giornaliere</li>
            <li><s>A.I. dedicata</s></li>
            <li><s>Supporto 24/7</s></li>
          </ul>
          <a href="https://romeofrancesco.altervista.org/Web/html/log_sing_in.php" class="button button1">Iscriviti</a>
        </div>
      </div>
      <div data-aos="fade-left">
        <div class="packages">
          <h1 class="pro">PRO</h1>
          <h2 class="text1">119.99 &euro;</h2>
          <h2 class="text2">239.99 &euro;</h2>
          <ul class="list">
            <li class="first">5 Azioni</li>
            <li>20 mail giornaliere</li>
            <li>A.I. dedicata</li>
            <li>Supporto 24/7</li>
          </ul>
          <a href="https://romeofrancesco.altervista.org/Web/html/pay.php" class="button button2">Abbonati</a>
        </div>
      </div>
    </div>
  </div>
  <!-- CARDS DIV PIANI -->
  <!-- MAIN -->
  <!-- FOOTER -->
  <?php include('./obj/footer.php'); ?>
  <!-- FOOTER -->
  <!-- js animazioni e toggle -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

  <script src="../js/libreria.js" type="text/javascript"></script>
  <script src="../js/app.js" type="text/javascript"></script>

  <script>
    AOS.init();
    navSlide();

    /* stile scroll navbar */
    window.onscroll = () => {
      const nav = document.querySelector("nav");
      const nav_link = document.querySelectorAll(".nav_links li a");
      if (this.scrollY >= 10) {
        nav.classList.add("dark");
        nav_link.forEach((link) => {
          console.log(link);
          link.classList.add("white_text");
        });
      } else {
        nav.classList.remove("dark");
        nav_link.forEach((link) => {
          link.classList.remove("white_text");
        });
      }
    };
  </script>
</body>

</html>