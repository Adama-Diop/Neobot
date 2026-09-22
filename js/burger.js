// Elements du DOM
// burger
const burger = document.querySelector(".burger");
console.log("burgerDOm",burger)
// close
const closed = document.querySelector(".close");
console.log("close",closed)
// fixed-navbar
const fixedNavbar = document.querySelector(".fixed-navbar");
console.log("navbar",fixedNavbar)

// Events
burger.addEventListener("click",(e)=>{
    e.preventDefault();
    fixedNavbar.classList.add("show")
})

closed.addEventListener("click",(e)=>{
    e.preventDefault();
    fixedNavbar.classList.remove("show")
})