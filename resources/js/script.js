import { Swiper, Navigation, Pagination } from "swiper";
import "swiper/swiper-bundle.css";
Swiper.use([Navigation, Pagination]);
const swiper = new Swiper(".swiper", {
    // Optional parameters
    // direction: 'vertical',
    loop: true,

    // If we need pagination
    // pagination: {
    //     el: '.swiper-pagination',
    // },

    // Navigation arrows
    navigation: {
        nextEl: ".header-carousel-next",
        prevEl: ".header-carousel-prev",
    },

    // And if we need scrollbar
    // scrollbar: {
    //     el: '.swiper-scrollbar',
    // },
});

//cursor custom
let cursor = document.querySelector(".cursor");
let cursorinner = document.querySelector(".cursor2");
let a = document.querySelectorAll("a");

document.addEventListener("mousemove", function (e) {
    let x = e.clientX;
    let y = e.clientY;
    cursor.style.transform = `translate(calc(${e.clientX}px - 50%), calc(${e.clientY}px - 50%) )`;
});

document.addEventListener("mousemove", function (e) {
    let x = e.clientX;
    let y = e.clientY;
    cursorinner.style.left = x + "px";
    cursorinner.style.top = y + "px";
});

a.forEach((item) => {
    item.addEventListener("mouseover", () => {
        cursor.classList.add("hover");
    });
    item.addEventListener("mouseleave", () => {
        cursor.classList.remove("hover");
    });
});

function inizializeSearchForm(){
const form = document.getElementById("form-search");
const searchInput = document.getElementById("searchInput");
const select = document.getElementById("SelectCategory");
const submitBtn = document.getElementById("submit-btn");

searchInput.addEventListener("input", () => {
    select.value = "";
});

select.addEventListener("click", () => {
    searchInput.value = "";
});

submitBtn.addEventListener("click", () => {
    const selectedValue = select.value;
    if (selectedValue != "") {
        window.location.href = `/categoria/${selectedValue}`;
    } else {
        form.submit();
    }
});

}

document.addEventListener('DOMContentLoaded',()=>{
    inizializeSearchForm();
});
