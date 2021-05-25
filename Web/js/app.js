const mode = () => {
  const sign_in_btn = document.querySelector("#sign-in-btn");
  const sign_up_btn = document.querySelector("#sign-up-btn");
  const container = document.querySelector(".container");

  sign_up_btn.addEventListener("click", () => {
    container.classList.add("sign-up-mode");
  });

  sign_in_btn.addEventListener("click", () => {
    container.classList.remove("sign-up-mode");
  });
}

const navSlide = () => {
  const burger = document.querySelector('#burger');
  const nav = document.querySelector('.nav_links');
  const nav_links = document.querySelectorAll('.nav_links li');

  burger.addEventListener('click', () => {
    /* toggle nav */
    nav.classList.toggle('nav_active');

    /* Burger animation */
    burger.classList.toggle('toggle');
    
    /* link animation */
    nav_links.forEach((link, index) => {
      if (link.style.animation) {
        link.style.animation = '';
      }
      else {
        link.style.animation = `nav_links_animation 0.5s ease forwards ${index / 7 + 0.5}s`;
      }
    });
  });
}

const form = document.querySelector('.form');
const name = document.getElementById('name');
const number = document.getElementById('number');
const date = document.getElementById('date');
const cvv = document.getElementById('cvv');

const visa = document.querySelector('.card');

/*  MOSTRA ERRORI  */
function showError(element, error) {
    if(error === true) {
        element.style.opacity = '1';
    } else {
        element.style.opacity = '0';
    }
};

/*  NOME  */
name.addEventListener('input', function() {
    let alert1 = document.getElementById('alert-1');
    let error = this.value === '';
    showError(alert1, error);
    document.getElementById('card-name').textContent = this.value;
});

/*  NUMERO DI CARTA */
number.addEventListener('input', function(e) {
    this.value = numberAutoFormat();

    // != DA 16 E SENZA SPAZZI
    let error = this.value.length !== 19;
    let alert2 = document.getElementById('alert-2');
    showError(alert2, error);

    document.querySelector('.card__number').textContent = this.value;
});

function numberAutoFormat() {
    let valueNumber = number.value;
    let v = valueNumber.replace(/\s+/g, '').replace(/[^0-9]/gi, '');

    // controllo del valore
    let matches = v.match(/\d{4,16}/g);
    let match = matches && matches[0] || '';
    let parts = [];

    for (i = 0; i < match.length; i += 4) {
        // nuovo array dopo 4 caratteri
        parts.push(match.substring(i, i + 4));
    }

    if (parts.length) {
        // spazio dopo 4 caratteri
        return parts.join(' ');
    } else {
        return valueNumber;
    }
};

/*  DATA  */
date.addEventListener('input', function(e) {
    this.value = dateAutoFormat();
    
    // errore sul controllo data
    let alert3 = document.getElementById('alert-3');
    showError(alert3, isNotDate(this));

    let dateNumber = date.value.match(/\d{2,4}/g);
    document.getElementById('month').textContent = dateNumber[0];
    document.getElementById('year').textContent = dateNumber[1];
});

function isNotDate(element) {
    let actualDate = new Date();
    let month = actualDate.getMonth() + 1; //gennaio parte da 0 ma è il mese 1 
    let year = Number(actualDate.getFullYear().toString().substr(-2)); // 2022 -> 22
    let dateNumber = element.value.match(/\d{2,4}/g);
    let monthNumber = Number(dateNumber[0]);
    let yearNumber = Number(dateNumber[1]);
    
    if(element.value === '' || monthNumber < 1 || monthNumber > 12 || yearNumber < year || (monthNumber <= month && yearNumber === year)) {
        return true;
    } else {
        return false;
    }
}

function dateAutoFormat() {
    let dateValue = date.value;
    // sostituisco i numeri tra 0-9 con '' o gli spazi
    let v = dateValue.replace(/\s+/g, '').replace(/[^0-9]/gi, '');

    // accetto minimo 2 valori e massimo 4
    let matches = v.match(/\d{2,4}/g);
    let match = matches && matches[0] || '';
    let parts = [];

    for (i = 0; i < match.length; i += 2) {
        // dopo 4 caratteri creap array
        parts.push(match.substring(i, i + 2));
    }

    if (parts.length) {
        // spazio bianco dopo 4 caratteri
        return parts.join('/');
    } else {
        return dateValue;
    }
};

/*  FORMATTO IL CVV  */
cvv.addEventListener('input', function(e) {
    let alert4 = document.getElementById('alert-4');
    let error = this.value.length < 3;
    showError(alert4, error)
});

/* CONTROLLO CHE IL NUMERO DI CARTA E IL CVV SIANO NUMERI */
function isNumeric(event) {
    if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode > 31)) {
        return false;
    }
};

/*  CONTROLLO I DATI ALLA PRESSIONE DEL BOTTONE   */
form.addEventListener('submit', function (e) {

    if(name.value === '' || number.value.length !== 19 || date.value.length !== 5 || isNotDate(date) === true || cvv.value.length < 3) {
        e.preventDefault();
    };

    let input = document.querySelectorAll('input');
    for( i = 0; i < input.length; i++) {
        if(input[i].value === '') {
            input[i].nextElementSibling.style.opacity = '1';
        }
    }
});

