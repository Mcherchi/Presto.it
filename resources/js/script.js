
//Logica per gestire il logout utente;
const btnLogout = document.querySelector('#btn-logout');
const formLogout = document.querySelector('#form-logout');

btnLogout.addEventListener('click', e =>{
    e.preventDefault();
    formLogout.submit();
});

