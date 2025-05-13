window.addEventListener("wheel", function(event) {
    if(event.ctrlKey) {
        event.preventDefault();
    }
    event.preventDefault();
},
{passive: false}
);