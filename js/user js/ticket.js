var bouton_1 = document.querySelector("#button_1");
var bouton_2 = document.querySelector("#button_2");
let div = document.querySelector("#ticket");


// ******************************************************************************
// Enregistrrement en png
// ******************************************************************************

bouton_2.addEventListener("click", function() {
    div.classList.add('download');
    setTimeout(function() {
        div.classList.remove('download');
    }, 4000);
    setTimeout(function() {
        html2canvas(document.querySelector("#ticket")).then(function(image) {
            var lien = document.createElement('a');
            lien.href = image.toDataURL("image/png");
            lien.download = "Ticket de voyage.png";
            lien.click();
        })
    }, 1000);
});


document.addEventListener("keydown", function(touche) {
    if(touche.ctrlKey && touche.key =="e") {
        touche.preventDefault();
        div.classList.add('download');
        setTimeout(function() {
            div.classList.remove('download');
        }, 4000);
        setTimeout(function() {
            html2canvas(document.querySelector("#ticket")).then(function(image) {
                var lien = document.createElement('a');
                lien.href = image.toDataURL("image/png");
                lien.download = "Ticket de voyage.png";
                lien.click();
            })
        }, 1000);
    }
});


// ******************************************************************************
// Enregistrrement en pdf
// ******************************************************************************

bouton_1.addEventListener("click", function() {
    div.classList.add('download');
    setTimeout(function() {
        div.classList.remove('download');
    }, 3000);

    setTimeout(function() {
        html2canvas(document.querySelector("#ticket")).then(function(img) {
            var docDefinition = {
                content: {
                    image: img.toDataURL("image/png"),
                    width: 500,
                    height: 200
                }
            };
            
            pdfMake.createPdf(docDefinition).download("ticket de voyage.pdf");
        
        });
    }, 1000);
});

document.addEventListener("keydown", function(touche) {
    if(touche.ctrlKey && touche.key =="p") {
        touche.preventDefault();

        div.classList.add('download');
        setTimeout(function() {
            div.classList.remove('download');
        }, 3000);

        setTimeout(function() {
            html2canvas(document.querySelector("#ticket")).then(function(img) {
        
                var dimension = {
                    content: {
            
                    image: img.toDataURL("image/png"),
                    width: 500,
                    height: 200
                    }
                };
        
                pdfMake.createPdf(dimension).download("Ticket de voyage.pdf");
        
            });
        }, 1000);
    }
});