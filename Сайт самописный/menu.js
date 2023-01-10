let check1 = document.querySelector(".constructor");
let check2 = document.querySelector(".accessories");
let body = document.querySelector("body");

check1.addEventListener('click', () => {
    if(check1.classList.contains('c1')){
        check1.classList.remove('c1');
        check1.classList.remove('color-button');
        body.classList.remove('overflow');
    }else{
        check2.classList.remove('c2');
        check2.classList.remove('color-button');
        check1.classList.add('c1');
        check1.classList.add('color-button');
        body.classList.add('overflow');
    }
});

check2.addEventListener('click', () => {
    if(check2.classList.contains('c2')){
        check2.classList.remove('c2');
        check2.classList.remove('color-button');
        body.classList.remove('overflow');
    } else {
        check1.classList.remove('c1');
        check1.classList.remove('color-button');
        check2.classList.add('c2');
        check2.classList.add('color-button');
        body.classList.add('overflow');
    }
});