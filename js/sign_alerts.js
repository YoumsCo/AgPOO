
function load(string, link) {
    var body = document.querySelector('#message');
    var div = document.createElement('div');
    var span = document.createElement('span');
    var button = document.createElement('button');

    body.appendChild(div);
    div.appendChild(span);
    div.appendChild(button);

    body.style.position = 'fixed';
    body.style.top = '0';
    body.style.left = '0';
    body.style.overflow = 'hidden';
    body.style.background = 'black';
    body.style.display = 'flex';
    body.style.justifyContent = 'center';
    body.style.alignItems = 'center';
    body.style.gap = '20px';
    body.style.width = '100vw';
    body.style.height = '100vh';

    div.style.transition = 'all .5s ease-in-out';
    div.style.width = '30%';
    div.style.height = '150px';
    setTimeout(function() {
        div.style.width = '50%';
        div.style.height = '280px';
    }, 200);
    div.style.border = '2px solid whitesmoke';
    div.style.borderRadius = '20px';
    div.style.backgroundColor = 'transparent';
    div.style.boxShadow = '0 10px 15px whitesmoke';
    div.style.display = 'flex';
    div.style.justifyContent = 'center';
    div.style.alignItems = 'center';
    div.style.flexDirection = 'column';
    div.style.gap = '20px';

    span.style.transition = 'all .5s ease-in-out';
    span.style.display = "flex";
    span.style.flexWrap = "wrap";
    span.style.flexWrap = "95%";
    span.style.color = 'whitesmoke';
    span.style.fontSize = '20pt';
    if (window.matchMedia("(max-width: 600px)").matches) {
        span.style.fontSize = '30pt !important';
    }
    span.innerText = 'Bienvenue' + ' ' + string + " 😉";
    
    button.style.transition = 'all .5s ease-in-out';
    button.type = 'button';
    button.style.background = 'whitesmoke';
    button.style.color = 'rgba(6, 6, 52, 0.68)';
    button.style.fontWeight = 'bolder';
    button.style.width = '20%';
    button.style.height = '35px';
    button.style.fontSize = '14pt';
    button.style.cursor = 'pointer';
    button.style.border = '2px solid whitesmoke';
    button.innerText= 'OK';

    button.addEventListener('focus', function() {
    setTimeout(function() {
        button.style.transform = 'scale(.5)';
        setTimeout(function() {
            button.style.transform = 'scale(1.0)';
        }, 200);
        });
    });

    button.addEventListener('mouseover', function() {
        button.style.background = 'transparent';
        button.style.color = 'whitesmoke';    
    });

    button.addEventListener('mouseleave', function() {
        button.style.background = 'whitesmoke';
        button.style.color = 'rgba(6, 6, 52, 0.68)';    
    });

    button.addEventListener('click', function() {
        document.location.href = link;
    });
    
    window.addEventListener("keydown", function(e) {
        if (e.key === "Enter") {
            document.location.href = link;
        }
    });

    setTimeout(function() {
        document.location.href = link;
    }, 3000);
}