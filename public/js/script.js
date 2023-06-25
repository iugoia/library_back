'use strict';

//Скрипт для работы слайдера на главной странице

let offset = 0;
let prev_btn = document.querySelector(".aux_prev_btn"),
    next_btn = document.querySelector(".aux_next_btn"),
    crslList = document.querySelectorAll(".aux_carousel_item");

if (prev_btn){
    let step = 0;
    let positions = new Array(crslList.length);
    for(let i = 0; i < crslList.length; i++, step+=815){
        positions[i] = step;
        crslList[i].style.cssText += "left:" + step + "px";
    }

    prev_btn.addEventListener("click", (e)=>{
        e.preventDefault();
        offset -= 815;
        if(offset < 0){
            offset = 3260;
        }
        for(let i = 0; i < crslList.length; i++){
            crslList[i].style.cssText += "left:" + (positions[i] + -offset) + "px";
        }

    })

    next_btn.addEventListener("click", (e)=>{
        e.preventDefault();
        offset += 815;
        if(offset > 3260){
            offset = 0;
        }
        for(let i = 0; i < crslList.length; i++){
            crslList[i].style.cssText += "left:" + (positions[i] + -offset) + "px";
        }
    })
}


