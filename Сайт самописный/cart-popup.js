let open = document.querySelector(".place-an-order");
let close = document.querySelector(".close-popup");
let cartPopup = document.querySelector(".cart-popup");

open.addEventListener('click', () => {
    cartPopup.classList.add("open-popup");
});

close.addEventListener('click', () => {
    cartPopup.classList.remove("open-popup");
});