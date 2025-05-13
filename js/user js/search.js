let search = document.querySelector("[type='search']");
let containerElement = document.querySelectorAll(".container-items");

search.addEventListener("keyup", () => {
    let searchValue = search.value.toLowerCase();

    for (let i = 0; i < containerElement.length; i++) {
        if (containerElement[i].textContent.toLowerCase().indexOf(searchValue) === -1) {
            containerElement[i].classList.add('hide');
        }
        else {
            containerElement[i].classList.add('search-true');
        }
    }
    if (search.value === "") {
        for (let i = 0; i < containerElement.length; i++) {
            containerElement[i].classList.remove('hide');
        }
    }
});


if (search.value === "") {
    for (let i = 0; i < containerElement.length; i++) {
        containerElement[i].classList.remove('hide');
        containerElement[i].classList.remove('search-true');
    }
}

search.addEventListener("keydown", (e) => {
    let searchValue = search.value.toLowerCase();

    if (e.key === "Backspace") {
        for (let i = 0; i < containerElement.length; i++) {
            if (containerElement[i].textContent.toLocaleLowerCase().indexOf(searchValue) === -1) {
                containerElement[i].classList.remove('hide');
            }
        }
        if (search.value === "") {
            for (let i = 0; i < containerElement.length; i++) {
                containerElement[i].classList.remove('search-true');
            }
        }
    }
});

search.addEventListener("focusout", () => {
    let searchValue = search.value.toLowerCase();

    for (let i = 0; i < containerElement.length; i++) {
        containerElement[i].classList.remove('search-true');
        containerElement[i].classList.remove('hide');
    }

    for (let i = 0; i < containerElement.length; i++) {
        if (containerElement[i].textContent.indexOf(searchValue) === -1) {
            containerElement[i].classList.remove('hide');
        }
    }
});