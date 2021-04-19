
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



