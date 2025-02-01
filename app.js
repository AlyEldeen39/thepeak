"use strict";

// VARIABLE DEFINITIONS

const overlay = document.querySelector(".overlay");
const signIn = document.querySelector("#sign-in");
const btnMenu = document.querySelector(".side-btn.menu");
const menu = document.querySelector(".side-menu");

overlay.addEventListener("click", () => {
  btnMenu.classList.remove("active");
  menu.classList.add("hidden");
});

signIn.addEventListener("click", () => {
  alert("YOU CLICKED A BUTTONNNNNNN!");
});

btnMenu.addEventListener("click", (e) => {
  e.preventDefault();
  e.target.classList.toggle("active");
  menu.classList.toggle("hidden");
});
