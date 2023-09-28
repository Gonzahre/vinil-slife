'use strict';
addEventListener("DOMContentLoaded", () => {
    const navBtn = document.querySelector(".actnav");
    navBtn.addEventListener('click', () => {
        const links = document.querySelectorAll(".navLinks");
        links.forEach(element => {
            if (!element.classList.contains("mostrar")) {
                element.classList.add("mostrar");
            }
            else {
                element.classList.remove("mostrar");
            }
        });

    })
})