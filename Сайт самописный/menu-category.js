let subcategory = document.querySelector(".dd1");
let subcategory2 = document.querySelector(".dd2");
let category = document.querySelector(".checkbox-menu1");
let category2 = document.querySelector(".checkbox-menu2");


category.addEventListener('click', () => {

    if(category.checked){
        subcategory.classList.remove("displaynone");
        subcategory.classList.add("displayblock");
    } else {
        subcategory.classList.remove("displayblock");
        subcategory.classList.add ("displaynone");
    }
});

category2.addEventListener('click', () => {

    if(category2.checked){
        subcategory2.classList.remove("displaynone");
        subcategory2.classList.add("displayblock");
    } else {
        subcategory2.classList.remove("displayblock");
        subcategory2.classList.add("displaynone");
    }
});