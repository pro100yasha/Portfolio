let $BackToTop = document.querySelector(".back-to-top");

window.onscroll = function (){
    if (window.pageYOffset > 300) {
        $BackToTop.classList.add('back-to-top-block');
    } else {
        $BackToTop.classList.remove('back-to-top-block');
    }
}

$BackToTop.onclick = function () {
    window.scrollTo(0, 0);
};