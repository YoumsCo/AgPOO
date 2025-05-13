console.log("Développeur : Youmbi Le-duc. \nEmail : youmsc.co@gmail.com \nTéléphone : 690552385");

window.addEventListener("resize", function() {
    if (window.matchMedia("(orientation:landscape)").matches && window.matchMedia("(max-width: 500px)").matches) {
        screen.orientation.lock('portrait');
    }
});

window.addEventListener("wheel", function(event) {
    if(event.ctrlKey) {
        event.preventDefault();
    }
},
{passive: false}
);