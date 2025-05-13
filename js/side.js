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
// Gestion du changement de thème
// *****************************************************************************


let theme = document.querySelector("#theme");
let linked = document.querySelectorAll(".style");
let background = document.querySelectorAll(".background");
let datte = "Fri, 31 Dec 9999 23:59:59 GMT";


theme.addEventListener("click", () => {
    theme.classList.toggle("light");
    
    if (theme.classList.contains("light")) {
        let themeIcon = document.querySelector(".fa-moon-o");
        themeIcon.classList.replace("fa-moon-o", "fa-sun-o");
        let mode = 'dark';
        let active_mode = 'light';
        let cookie_mode = document.cookie = "theme="+ active_mode +"; expires="+datte;

        for (let i = 0; i < linked.length; i++) {
            
            for (let j = 0; j < background.length; j++) {
                
                let linkChild = linked[i].getAttribute("href");
                let backgroundChild = background[j].getAttribute("href");
                let linkChildChecked = linkChild.indexOf(mode);
                let backgroundChildChecked = backgroundChild.indexOf(mode);
                
                
                if (linkChildChecked !== -1) {
                    
                    let chaine = linkChild.substr(linkChildChecked, mode.length);
                    let string = linkChild.replace(chaine, active_mode);
                    linked[i].setAttribute("href", string);
                }

                if (backgroundChildChecked !== -1) {
                    
                    let chaine = backgroundChild.substr(backgroundChildChecked, mode.length);
                    let string = backgroundChild.replace(chaine, active_mode);
                    
                    background[j].setAttribute("href", string);          
                }
            }
        }
    }
    else {
        let themeIcon = document.querySelector(".fa-sun-o");
        themeIcon.classList.replace("fa-sun-o", "fa-moon-o");

        let mode = 'light';
        let active_mode = 'dark';
        let cookie_mode = document.cookie = "theme="+ active_mode +"; expires="+datte;


        for (let i = 0; i < linked.length; i++) {
            
            for (let j = 0; j < background.length; j++) {
                
                let linkChild = linked[i].getAttribute("href");
                let backgroundChild = background[j].getAttribute("href");
                let linkChildChecked = linkChild.indexOf(mode);
                let backgroundChildChecked = backgroundChild.indexOf(mode);
                
                
                if (linkChildChecked !== -1) {
                    
                    let chaine = linkChild.substr(linkChildChecked, mode.length);
                    let string = linkChild.replace(chaine, active_mode);
                    linked[i].setAttribute("href", string);
                }

                if (backgroundChildChecked !== -1) {
                    
                    let chaine = backgroundChild.substr(backgroundChildChecked, mode.length);
                    let string = backgroundChild.replace(chaine, active_mode);
                    
                    background[j].setAttribute("href", string);            
                }
            }
        }
    }
}); 

window.addEventListener("load", function() {
    if (document.cookie.indexOf("theme") == -1) {
    }
    else {
        if (document.cookie.indexOf("dark") == -1) {
            theme.classList.add("light");
            let themeIcon = document.querySelector(".fa-moon-o");
            themeIcon.classList.replace("fa-moon-o", "fa-sun-o");
            let mode = "dark";
            let active_mode = "light";
        
            for (let i = 0; i < linked.length; i++) {
                
                for (let j = 0; j < background.length; j++) {
                    
                    let linkChild = linked[i].getAttribute("href");
                    let backgroundChild = background[j].getAttribute("href");
                    let linkChildChecked = linkChild.indexOf(mode);
                    let backgroundChildChecked = backgroundChild.indexOf(mode);
                    
                    
                    if (linkChildChecked !== -1) {
                        
                        let chaine = linkChild.substr(linkChildChecked, mode.length);
                        let string = linkChild.replace(chaine, active_mode);
                        linked[i].setAttribute("href", string);
                    }
        
                    if (backgroundChildChecked !== -1) {
                        
                        let chaine = backgroundChild.substr(backgroundChildChecked, mode.length);
                        let string = backgroundChild.replace(chaine, active_mode);
                        
                        background[j].setAttribute("href", string);          
                    }
                }
            }
        }
        else {
            let mode = "light";
            let active_mode = "dark";
        
            for (let i = 0; i < linked.length; i++) {
                
                for (let j = 0; j < background.length; j++) {
                    
                    let linkChild = linked[i].getAttribute("href");
                    let backgroundChild = background[j].getAttribute("href");
                    let linkChildChecked = linkChild.indexOf(mode);
                    let backgroundChildChecked = backgroundChild.indexOf(mode);
                    
                    
                    if (linkChildChecked !== -1) {
                        
                        let chaine = linkChild.substr(linkChildChecked, mode.length);
                        let string = linkChild.replace(chaine, active_mode);
                        linked[i].setAttribute("href", string);
                    }
        
                    if (backgroundChildChecked !== -1) {
                        
                        let chaine = backgroundChild.substr(backgroundChildChecked, mode.length);
                        let string = backgroundChild.replace(chaine, active_mode);
                        
                        background[j].setAttribute("href", string);          
                    }
                }
            }
        }
    }
    
});


// *****************************************************************************
// Gestion du lien contact de la side-bar
// *****************************************************************************

let items = document.querySelectorAll(".items")[5];

window.addEventListener("load", () => {
    items.classList.toggle('appear');
});


// *****************************************************************************
// Gestion du changement de la nav-bar au scroll
// *****************************************************************************
window.addEventListener("scrollend", () => {
    let nav = document.querySelector("#nav");
    
    nav.classList.toggle("nav-change");
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

let signUp = document.querySelector("#signUp");
let signOut = document.querySelector("#signOut");

signUp.addEventListener('click', function(e) {
    e.preventDefault();
    let c = confirm('Etes-vous sur de vouloir poursuivre cette action ?');
    
    if (c) {
        document.location.href = "../user/connexion.php";
    }
});

signOut.addEventListener('click', function(e) {
    e.preventDefault();
    let c = confirm('Etes-vous sur de vouloir vous deconnecter ?');

    if (c) {
        document.location.href = "../user/deconnexion.php";
    }
});