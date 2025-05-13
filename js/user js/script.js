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
// Mot de passe du formaulaire de connexion
// ************************************************************************************

let eyeLogin = document.querySelectorAll('.fa-eye')[1];
let passwordLogin = document.querySelectorAll("[type='password']")[1];
eyeLogin.addEventListener('click', function () {
    if (passwordLogin.type === 'text') {
        passwordLogin.type = "password";
        eyeLogin.classList.replace('fa-eye-slash', 'fa-eye');
    } 
    else if (passwordLogin.type === 'password') {
        passwordLogin.type = "text";
        eyeLogin.classList.replace('fa-eye', 'fa-eye-slash');
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


// ************************************************************************************
// Gestion des input type radio
// ************************************************************************************

let radioButton_1 = document.querySelectorAll("[type='radio']")[0];
let radioButton_2 = document.querySelectorAll("[type='radio']")[1];

radioButton_1.onclick =  () => {
    radioButton_2.checked = false;
}

radioButton_2.onclick =  () => {
    radioButton_1.checked = false;
}

// ************************************************************************************
// Gestion des input type radio
// ************************************************************************************

let formSignUp = document.querySelectorAll("form")[0];

formSignUp.onsubmit = (e) => {
    if (radioButton_1.checked === false && radioButton_2.checked === false) {
        e.preventDefault();
        alert("Vueillez renseigner votre sexe");
    }
}