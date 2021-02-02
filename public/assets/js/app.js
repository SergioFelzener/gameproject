// console.log("Deu certo");

// criando função auto-envocada para nao compartilhar o cod de forma global 

(function() {
    const menuToggle = document.querySelector('.menu-toggle');

    menuToggle.onclick = function(e) {
        const body = document.querySelector('body');
        body.classList.toggle('hide-sidebar');
    }
})();

// sem a função compartilhando o cod em escopo global 
// consegue pegar a const menuToggle no console

// const menuToggle = document.querySelector('.menu-toggle');

// menuToggle.onclick = function(e) {
//     const body = document.querySelector('body');
//     body.classList.toggle('hide-sidebar');
// }