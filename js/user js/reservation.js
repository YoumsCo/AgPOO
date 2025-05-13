// ***************************************************************
// Gestion des animations 
// ***************************************************************

let contain_1 = document.querySelectorAll(".contain")[0];
let contain_2 = document.querySelectorAll(".contain")[1];
let contain_3 = document.querySelectorAll(".contain")[2];
let contain_4 = document.querySelectorAll(".contain")[3];
let contain_5 = document.querySelectorAll(".contain")[4];

let button_contain_1 = document.querySelectorAll(".contain-button")[0];
let button_contain_2 = document.querySelectorAll(".contain-button")[1];
let button_contain_3 = document.querySelectorAll(".contain-button")[2];
let button_contain_4 = document.querySelectorAll(".contain-button")[3];

let button_cancel_1 = document.querySelectorAll(".contain-button-cancel")[0];
let button_cancel_2 = document.querySelectorAll(".contain-button-cancel")[1];
let button_cancel_3 = document.querySelectorAll(".contain-button-cancel")[2];
let button_cancel_4 = document.querySelectorAll(".contain-button-cancel")[3];

let mouse_click = new MouseEvent("click", {
    bubbles: true,
    cancelable: true,
    view: window
});



button_contain_1.addEventListener("click", function() {
    let lastname = document.querySelectorAll("[type='text']")[0];
    let firstname = document.querySelectorAll("[type='text']")[1];
    
    
    if (lastname.value.trim() === "" || firstname.value.trim() === "") {
        alert("Veuillez remplir les champs");
    }
    else {
        contain_1.classList.add('translateX-left');
        contain_2.classList.remove('translateX');
    }
}); 

button_contain_2.addEventListener("click", function() {

    function check (tab, val) {
        var result = false;
        for(let i=0; i < tab.length; i++) {
            if (val === tab[i].value) {
                result = true;
                break;
            }
        }
        return result;
    }

    let list = document.querySelector("#list");
    var found = check(options, list.value);

    if (list.value.trim() === "") {
        alert("Sélectionnez votre destination s'il vous plait");
    }
    else if(found == false) {
        alert("Sélectionnez votre destination dans la liste s'il vous plait");
    }
    else {
        contain_2.classList.add('translateX-left');
        contain_3.classList.remove('translateX');
    }
});

button_contain_3.addEventListener("click", function() {
    contain_3.classList.add('translateX-left');
    contain_4.classList.remove('translateX');
});

button_contain_4.addEventListener("click", function() {
    contain_4.classList.add('translateX-left');
    contain_5.classList.remove('translateX');
});

window.addEventListener("keydown", function(e) {
    if (contain_5.classList.contains('translateX')) {
        if (e.key === "Enter") {
            e.preventDefault();
            let lastname = document.querySelectorAll("[type='text']")[0];
            let firstname = document.querySelectorAll("[type='text']")[1];
            
            
            if (lastname.value.trim() === "" || firstname.value.trim() === "") {
                alert("Veuillez remplir les champs");
            }
            else {
                contain_1.classList.add('translateX-left');
                contain_2.classList.remove('translateX');
            }
        }
    }
});


button_cancel_1.addEventListener("click", function() {
    contain_1.classList.remove('translateX-left');
    contain_2.classList.add('translateX');
});

button_cancel_2.addEventListener("click", function() {
    contain_2.classList.remove('translateX-left');
    contain_3.classList.add('translateX');
});

button_cancel_3.addEventListener("click", function() {
    contain_3.classList.remove('translateX-left');
    contain_4.classList.add('translateX');
});

button_cancel_4.addEventListener("click", function() {
    contain_4.classList.remove('translateX-left');
    contain_5.classList.add('translateX');
});


// ***************************************************************
// Génération automatique des places 
// ***************************************************************

let place = document.querySelectorAll(".event-none")[0];
window.addEventListener("load", function() {
    let min = 1;
    let max = 70;
    
    place.value = Math.floor(Math.random() * (max-min+1)) + min;
});


// ***************************************************************
// Gestion du montant 
// ***************************************************************

let montant = document.querySelectorAll(".event-none")[2];
let list = document.querySelector("#list");
let townList = document.querySelector("#town-list");
let selectType = document.querySelector("#select-type");
let options = document.querySelectorAll(".list-option");

list.addEventListener("change", function() {
    
    for(let i=0; i < options.length; i++) {
        if (options[i].value === list.value) {
            montant.value = options[i].textContent;
        }
    }
    if (selectType.selectedIndex !== 0) {
        montant.value *= 2;
    }
});

selectType.addEventListener("change", function() {
    let spanInfo = document.querySelector("#type-info");
    let info = document.querySelector("#info");
    if (selectType.selectedIndex !== 0) {
        spanInfo.innerHTML = "( " + montant.value + " FCFA * 2 )";
        info.innerHTML = " car";
        montant.value *= 2;
    }
    else {
        spanInfo.innerHTML = "";
        info.innerHTML = " si";
        montant.value /= 2;
    }
});


// ***************************************************************
// Affichage par defaut de la date du serveur
// ***************************************************************

let date = document.querySelector("[type='date']");

window.addEventListener("load", function() {
    let dates = new Date();
    let day = dates.getDate().toString().padStart(2, "0");
    let month = (dates.getMonth() + 1).toString().padStart(2, "0");
    let year = dates.getFullYear();
    
    date.value = year + '-' + month + '-' + day;
});

date.addEventListener("change", function() {
    let dates = new Date();
    let day = dates.getDate().toString().padStart(2, "0");
    let month = (dates.getMonth() + 1).toString().padStart(2, "0");
    let year = dates.getFullYear();
    var [y, m, d] = date.value.split("-");
    if (y < year) {
        alert("Date invalide");
        date.value = year + '-' + month + '-' + day;
    }
});

// ***************************************************************
// Affichage par defaut de la date du serveur
// ***************************************************************

document.querySelector('#valider').addEventListener('click', function(e) {
    Notification.requestPermission().then(permission => {
        if (permission === 'granted') {
            const notification = new Notification('Détails de réservation', {
                icon: "../../icones/058-ticket.ico",
                body: document.querySelectorAll('[type="text"]')[0].value + "\rVotre réservation a été effectuée avec succès\rConsultez votre historique"
            });

            notification.addEventListener('click', function() {
                document.location.href = document.location.href;
            });
        }
    });
});