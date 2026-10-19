// Elements du DOM
// burger
const burger = document.querySelector(".burger");
// close
const closed = document.querySelector(".close");
// fixed-navbar
const fixedNavbar = document.querySelector(".fixed-navbar");

// Events
burger.addEventListener("click",(e)=>{
    e.preventDefault();
    fixedNavbar.classList.add("show")
})

closed.addEventListener("click",(e)=>{
    e.preventDefault();
    fixedNavbar.classList.remove("show")
})
