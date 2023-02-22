import { Swiper, Navigation, Pagination } from 'swiper';
import 'swiper/swiper-bundle.css';

Swiper.use([Navigation, Pagination]);
//Logica per gestire il logout utente;
const btnLogout = document.querySelector('#btn-logout');
const formLogout = document.querySelector('#form-logout');

btnLogout.addEventListener('click', e =>{
    e.preventDefault();
    formLogout.submit();
});

const swiper = new Swiper('.swiper', {
    // Optional parameters
    // direction: 'vertical',
    loop: true,

    // If we need pagination
    // pagination: {
    //     el: '.swiper-pagination',
    // },

    // Navigation arrows
    navigation: {
        nextEl: '.header-carousel-next',
        prevEl: '.header-carousel-prev',
    },

    // And if we need scrollbar
    // scrollbar: {
    //     el: '.swiper-scrollbar',
    // },
});


// Logic for selection category from searchbar
const select = document.getElementById("SelectCategory");
const submitBtn = document.getElementById("submit-btn");

submitBtn.addEventListener("click",()=>{
    const selectedValue = select.value;
    if (selectedValue) {
        window.location.href =  `/categoria/${selectedValue}`;
    }
})
