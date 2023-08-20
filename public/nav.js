'use strict';
addEventListener("DOMContentLoaded", ()=>{
    const navBtn=document.querySelector(".actnav");
    navBtn.addEventListener('click', ()=>{
        const links=document.querySelector(".navLinks");
        if(!links.classList.contains("mostrar")){
            links.classList.add("mostrar");
        }
        else{
            links.classList.remove("mostrar");
        }
    })
})