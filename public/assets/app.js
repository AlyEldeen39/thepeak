"use strict";

// VARIABLE DEFINITIONS

const overlay = document.querySelector(".overlay");
const btnMenu = document.querySelector(".side-btn.menu");
const menu = document.querySelector(".side-menu");

if (btnMenu) {
  overlay.addEventListener("click", () => {
    btnMenu.classList.remove("active");
    menu.classList.add("hidden");
  });

  btnMenu.addEventListener("click", (e) => {
    e.preventDefault();
    e.target.classList.toggle("active");
    menu.classList.toggle("hidden");
  });
}

console.log(window.location.pathname);

if (window.location.pathname === "/register") {
  document.querySelector("body").classList.add("blur");
}
