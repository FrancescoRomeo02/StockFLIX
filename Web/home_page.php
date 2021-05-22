<?php
include('./html/obj/header.php');
?>
<!DOCTYPE html>
<html lang="it">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="stylesheet" href="./css/home_page.css" />
  <link rel="stylesheet" href="./css/button.css" />

  <!-- css animazioni -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />

  <!-- js icone  -->
  <script src="https://kit.fontawesome.com/64d58efce2.js"></script>

  <title> StockN </title>
</head>

<body>
  <!--BARRA DI NAVIGAZIONE-->
  <?php include('./html/obj/nav.php'); ?>
  <!--BARRA DI NAVIGAZIONE-->
  <br /><br />
  <!-- MAIN -->
  <div class="container">
    <!-- SEZIONE IMMAGINE E TESTO -->
    <div data-aos="fade-up" class="row">
      <div class="col_1">
        <h2>
          Ottieni di più <br />
          dal tuo denaro
        </h2>
        <h3>Non lasciare che il tempo sgretoli i tuoi risparmi</h3>
        <p>Iniziare non è mai facile</p>
        <h4>Lascia che qualcuno ti aiuti</h4>
        <a href="#services"><button type="button" class="offset">iniziamo</button></a>
      </div>

      <div class="col_2">
        <img src="./img/home/Blue.png" alt="" class="device" />
        <div class="color_box"></div>
      </div>
    </div>
    <!-- SEZIONE IMMAGINE E TESTO -->

    <!-- CARDS DIV SERVIZI -->
    <section id="services">
      <div class="services container">
        <div class="service_top">
          <h1 class="section_title">
            <span>noi</span> siamo Stock<span>N</span>
          </h1>
          <p>
            Ecco cosa ti offriamo, leggi, informati e <span>capisci</span> se
            fa per te.
            <br />
            Non lasciarti sfuggire questa <span>occasione</span>.
          </p>
        </div>
        <div class="service_bottom">
          <!-- CARD -->
          <div class="service_item graph" data-aos="fade-up-left">
            <div class="icon"><i class="fas fa-chart-area fa-3x" style="color: rgb(146, 64, 253);"></i></i></div>
            <h2>Grafici</h2>
            <p>
              Avrai la possibilità di visionare in tutta comodità gli andamnti
              di <span>ogni azione</span><br />
              Teniamo particolarmente alle TUE azioni, loro avranno un
              trattamento <span>speciale</span>.
            </p>
          </div>
          <!-- CARD -->

          <!-- CARD -->
          <div class="service_item ai" data-aos="fade-up-right">
            <div class="icon"><i class="fas fa-rocket fa-3x" style="color: rgb(75, 195, 121);"></i></div>
            <h2>AI</h2>
            <p>
              Sarai aiutato da un <span>AI</span> nel prendere le tue decisio,sappaimo che
              sai cammianre con le tue gambe, ma noi ti stiamo dando un <span>jetpack</span>.
            </p>
          </div>
          <!-- CARD -->

          <!-- CARD -->
          <div class="service_item demo" data-aos="fade-down-left">
            <div class="icon"><i class="fas fa-piggy-bank fa-3x" style="color: rgb(255, 184, 92);"></i></div>
            <h2>Conto Demo</h2>
            <p>
              A tutti piace rischiare, ma non farlo con i tuoi soldi.
              Usa il nostro conto <span>DEMO</span> e quando sarai a tuo agio dai inzio alla <span>festa</span>.
            </p>
          </div>
          <!-- CARD -->

          <!-- CARD -->
          <div class="service_item mail" data-aos="fade-down-right">
            <div class="icon"><i class="fas fa-envelope fa-3x" style="color: rgb(221, 128, 230);"></i></div>
            <h2>Mai solo</h2>
            <p>
              Non ti lasceremo <span>mai solo</span>. il mercato si muove rapido, noi lo siamo di più <br> riceverai <span>costanti mail</span> sull'andamento delle tue azioni.
            </p>
          </div>
          <!-- CARD -->
        </div>
      </div>
    </section>
    <!-- CARDS DIV SERVIZI-->

    <!-- SEZIONE IMMAGINE E TESTO -->
    <div data-aos="fade-up" class="row">
      <div class="col_1">
        <h2>Prendi le redini della situazione.
        </h2>
        <h3>Decidi tu come investire il tuo denaro.</h3>
        <p>Non tutto è gratis, questo vale anche per noi.</p>
        <h4>Prendi la tua decisione</h4>
        <a href="../Web/html/abbonamenti.php"><button type="button" class="pulse">ABBONATI</button></a>
      </div>

      <div class="col_2">
        <img src="./img/home/Black.png" alt="" class="device" />
        <div class="color_box"></div>
      </div>
    </div>
    <!-- SEZIONE IMMAGINE E TESTO -->
  </div>

  <!-- CARDS DIV PIANI -->
  <section id="services">
    <div class="services container">
      <div class="service_top">
        <h1 class="section_title">Scegli il tuo <span>piano</span></h1>
        <p>
          <span>Nessuna sorpresa</span>, scegli ciò che ti serve. <br />
          Paga per ciò di cui hai <span>bisogno</span>.
        </p>
      </div>
      <div class="service_bottom">
        <!-- CARD -->
        <div class="service_item pay" data-aos="fade-up-left">
          <div class="icon"><i class="fas fa-wind fa-3x" style="color: rgb(255, 255, 255);"></i></div>
          <h2>Standard</h2>
          <p>
            Ottieni più di quanto ti aspetti dal tuo denaro grazie al nostro conto Standard. <br>
            Certo, è gratis, ma cosa c'è di meglio delle cose gratuite.
          </p>
        </div>
        <!-- CARD -->

        <!-- CARD -->
        <div class="service_item free" data-aos="fade-up-right">
          <div class="icon"><i class=" fas fa-money-bill-wave fa-3x" style="color: rgb(255, 255, 255);"></i></div>
          <h2>Plus</h2>
          <p>
            Non lasciare che un periodo di incertezza ti impedisca di vivere al meglio. <br>
            Passa a Plus per mettere una marcia in più al tuo portafoglio.
          </p>
        </div>
        <!-- CARD -->
      </div>
    </div>
  </section>
  <!-- CARDS DIV PIANI -->
  <!-- MAIN -->
  <!-- FOOTER -->
  <?php include('./html/obj/footer.php'); ?>
  <!-- FOOTER -->
  <!-- js animazioni -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

  <script src="./js/app.js" type="text/javascript"></script>
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