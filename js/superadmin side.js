// *****************************************************************************
// Gestion du menu
// *****************************************************************************

let menu = document.querySelector("#menu");

menu.addEventListener("click", () => {
    let sideBar = document.querySelector("#side-bar");
    
    sideBar.classList.toggle("side-bar-hidden");
    menu.classList.toggle("menu-change");
    if (menu.classList.contains("menu-change")) {
        let body = document.querySelector("body");

        body.style.backdropFilter = "blur(100px) !important";
    }
});



// *****************************************************************************
// Gestion de l'interface de changement de photo de profile
// *****************************************************************************


let camera = document.querySelector(".fa-camera");
let reset = document.querySelector("#reset");
let close = document.querySelector(".fa-close");
let mouse = new MouseEvent("click", {
    bubbles: true,
    cancelable: true,
    view: window
});

camera.addEventListener("click", () => {
    let containerChangeProfile = document.querySelector('#change-profile');
    
    containerChangeProfile.classList.add('show');
});

reset.addEventListener("click", () => {
    let supprimer = document.querySelector("#supprimer");
    supprimer.dispatchEvent(mouse);
});

close.addEventListener("click", () => {
    let containerChangeProfile = document.querySelector('#change-profile');
    
    containerChangeProfile.classList.remove('show');
});

let containerChangeProfile = document.querySelector('#change-profile');

if (containerChangeProfile.classList.contains('show')) {
    let body = document.querySelector('body');
    body.addEventListener("scroll", (e) => {
        e.preventDefault();
    });
}


// *****************************************************************************
// Gestion du chargement de la photo de profile
// *****************************************************************************

let input = document.querySelector("[type='file']");
let save_picture = document.querySelector("#envoyer");
let mouseClick = new MouseEvent("click", {
    bubbles: true, 
    cancelable: true,
    view: window
});

input.addEventListener("change", function() {
    let image = this.files[0];
    
    if (image) {
        let type_valided = ["image/jpeg", "image/png", "image/jpg", "image/gif"];
        if (type_valided.includes(image.type)) {
            let picture = new FileReader();
            
            picture.addEventListener('load', function() {
                let img = document.querySelectorAll(".img");
                for(let i=0; i < img.length; i++) {
                    img[i].setAttribute("src", picture.result);
                }
            });
            
            let div = document.querySelector('#change-profile');
            let span = document.createElement('span');
            div.appendChild(span);    
            span.style.position = "absolute";
            span.style.transform = "translateY(50px)";
            span.style.color = "whitesmoke";
            span.innerText = "Importation du profile";
            setTimeout(function() {
                picture.readAsDataURL(image);
                span.innerText = "Profile importé";
                setTimeout(function() {
                    span.innerText = "";
                }, 5000);
            }, 3000);
            setTimeout(function() {
                save_picture.dispatchEvent(mouseClick);
            }, 3000);
        }
        else {
            alert('Fichier inavlide');
        }
    }
});




// *****************************************************************************
// Gestion du clique sur les liens 'connexion' et 'deconnexion'
// *****************************************************************************

let signOut = document.querySelector("#signOut");


signOut.addEventListener('click', function(e) {
    e.preventDefault();
    let c = confirm('Etes-vous sur de vouloir vous deconnecter ?');

    if (c) {
        document.location.href = "../user/deconnexion.php";
    }
});