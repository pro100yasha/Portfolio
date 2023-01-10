let categories = document.getElementById("category");
let subcategories = document.getElementById("subcategory");
let fieldsetEditor = document.querySelector(".fieldset-editor");
let constructor = document.querySelectorAll(".constructors");
let accessory = document.querySelectorAll(".accessories");



fieldsetEditor.onclick = function(){
    if(categories.value == "Аксессуары"){
        for(let cons of constructor){
        cons.classList.add("a");
        }
        for(let acc of accessory){
        acc.classList.remove("a");
        }
    } else if(categories.value == "Конструкторы"){
        for(let acc of accessory){
            acc.classList.add("a");
        }
        for(let cons of constructor){
            cons.classList.remove("a");
        }
    } else {
        for(let acc of accessory){
            acc.classList.add("a");
        }
        for(let cons of constructor){
            cons.classList.add("a");
        }
    }
}