'use strict';

//работа input в виде звездочек на странице книги в отзыве
let rating = document.querySelectorAll(".rating_radio");
let stars = document.querySelectorAll(".stars a");

for(let star of stars){
    star.onclick = function(evt){
        evt.preventDefault();
        for(let i = 0; i < rating.length; i++){
            rating[i].removeAttribute("checked");
        }
        removeAllStars(stars,"filled_star");
        rating[star.textContent-1].setAttribute("checked", "checked");
        fillStars(star, stars,"filled_star");
    }
    star.onmouseover = function(evt){

        fillStars(evt.target, stars, "hovered");
    }
    star.onmouseout = function(evt){
        removeAllStars(stars, "hovered");
    }
}

function removeAllStars(stars, type){
    for(let star of stars){
        if(star.classList.contains(type)){
            star.classList.remove(type);
        }
    }
    
}

function fillStars(selected, stars, type){
    for(let i = 0; i < selected.textContent; i++){
        stars[i].classList.add(type);
    }
}