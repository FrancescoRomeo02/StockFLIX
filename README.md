# StockN

Progetto esame di maturita' 2020/2021
-fare il pdf
-fix recupero password
-pagina mercato demo
-controllo se utente loggato/verificato
-fix navbar
-bottono logout

-chiedere come risolvere questione banner
-fix testo aggiungi/rimuovi azione
-cambiare testo ricerca azioni
-css per utenti pro
-controllo sul file per evitare azioni doppie
-modifiche file per utenti pro
-fix grafico home azioni
-css fix browser diversi
-sistemare css pagina azioni
-controllo grammatica
-testo pagina home
-css pagina abbonamento
-css php pagina pay (invio mail conferma abbonamento e cambio css)
-cambiare numero di azioni possibili
-modifica testo pagina buy
-css azioni possedute
-fix css buy
-fix css banner azioni
-css wallet vuoto

-bloccare furto di sessione
-bloccare attacchi forza bruta
-bloccare sql injection

## -ottimizzare tempi py

1. ANALISI GENERALE DEL PROBLEMA
2. DESCRIZIONE DELL'ARCHITETTURA DEL PROGETTO
3. ANALISI PER LA PROGETTAZIONE DEL DATABASE
   3A) PROGETTAZIONE CONCETTUALE o MODELLO E/R
   3B) PROGETTAZIONE LOGICA
4. DESCRIZIONE DELL' APPLICAZIONE <progetto di una parte significativa in php>
   APPROFONDIMENTO DI SISTEMI E RETI

   iG9uvSgT4uaTS6F

    <!-- BANNER AZIONI -->
    <div class="banners-container">
        <div class="banners">
            <div class="banner <?php echo $_SESSION['type'] ?>">
                <div class="banner-icon">
                    <i class="fas <?php echo $_SESSION['icon'] ?>"></i>
                </div>
                <div class="banner-message"><?php echo $_SESSION['txt'] ?></div>
            </div>
        </div>
    </div>
    <!-- BANNER AZIONI -->
