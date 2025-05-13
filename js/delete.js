let deletes = document.querySelectorAll(".fa-trash-o");

for(let i = 0; i < deletes.length; i++) {
    deletes[i].addEventListener("click", function(e) {
        e.preventDefault();
        if (confirm('Etes-vous sur de vouloir effectuer cette suppréssion ?')) {
            document.location.href = this.getAttribute("href");
        }
    });
}