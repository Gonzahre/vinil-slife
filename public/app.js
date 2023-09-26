'use strict';
addEventListener("DOMContentLoaded", ()=>{
    let boton=document.getElementById('vinilos');
    boton.addEventListener("click", (e)=>{
        location.href ='vinilos';
    })

    function verVinilo(id){
        location.href=id;
    }

    let contenedor=document.getElementsByClassName('contenedor');
    let caracteristicas=document.getElementsByClassName('hov');
    contenedor.addEventListener('mouseover', (e)=>{
       caracteristicas.addClass(); 
    })
})