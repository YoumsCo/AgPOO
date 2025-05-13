// *************************** Script des formulaires ***************************

let container = document.querySelector('#container')
let button = document.querySelectorAll('.button')

for (let i = 0; i < button.length; i++) {
    button[i].addEventListener('click', function () {
      container.classList.toggle('active-container');
    })
}

// ************************************************************************************
// Mot de passe du formaulaire d'inscription
// ************************************************************************************
let eyeSignUp = document.querySelectorAll('.fa-eye')[0];
let passwordSignUp = document.querySelectorAll("[type='password']")[0];
eyeSignUp.addEventListener('click', function () {
    if (passwordSignUp.type === 'text') {
        passwordSignUp.type = "password";
        eyeSignUp.classList.replace('fa-eye-slash', 'fa-eye');
    } 
    else if (passwordSignUp.type === 'password') {
        passwordSignUp.type = "text";
        eyeSignUp.classList.replace('fa-eye', 'fa-eye-slash');
    }
});


// ************************************************************************************
// Mot de passe des formaulaires en vue androide
// ************************************************************************************

let links = document.querySelectorAll(".link-form");

links.forEach(link =>{
    link.addEventListener("click", function() {
        container.classList.toggle('active-container');
    });
});

