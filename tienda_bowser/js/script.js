function modoOscuro() {
    const lastNavItem = document.querySelector('.navbar-nav li:last-child');
    lastNavItem.classList.toggle('dark-mode');
}

function scrollSmooth() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();

            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
}

function mensajeBienvenida() {
    alert('Bienvenido to Tienda Bowser!');
}



function clickImagen() {
    const images = document.querySelectorAll('.juego-item img');

    images.forEach(image => {
        image.addEventListener('click', function () {
            alert('Esto es una imagen del sitio.');
        });
    });
}

function toggleTheme() {
    const themeButton = document.getElementById('themeChangeBtn');
    const themeIcon = document.getElementById('themeIcon');

    if (document.body.classList.contains('dark-mode')) {
        document.body.classList.remove('dark-mode');
        themeButton.classList.remove('btn-dark');
        themeButton.classList.add('btn-light');
        themeIcon.classList.remove('fa-sun');
        themeIcon.classList.add('fa-moon');
    } else {
        document.body.classList.add('dark-mode');
        themeButton.classList.remove('btn-light');
        themeButton.classList.add('btn-dark');
        themeIcon.classList.remove('fa-moon');
        themeIcon.classList.add('fa-sun');
    }
}

function logoHover() {
    const logo = document.querySelector('.logo');

    let hoverTimeout;

    logo.addEventListener('mouseenter', () => {
        hoverTimeout = setTimeout(() => {
            alert('Easter egg.');
        }, 5000); //5 Segundos
    });

    logo.addEventListener('mouseleave', () => {
        clearTimeout(hoverTimeout);
    });
}

function loginValidar() {

    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;


    if (username.trim() === '' || password.trim() === '') {
        alert('Please fill in both username and password.');
        return false;
    } else {

        alert('Login successful!');
        return true;
    }
}

function validarRegistro() {
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    const nombre = document.getElementById('nombre').value;
    const apellidos = document.getElementById('apellidos').value;

    if (username.trim() === '' || password.trim() === '' || nombre.trim() === '' || apellidos.trim() === '') {
        alert('Please fill in all required fields.');
        return false;
    }

    return true;
}

// Updated toggleCreatorsVisibility function
function creadoresVisibilidad() {
    const accordionButtons = document.querySelectorAll('.accordion-button');

    accordionButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Toggle visibility of the description using Bootstrap 4 collapse class
            const description = button.nextElementSibling;
            const isHidden = description.classList.contains('collapse');

            if (isHidden) {
                description.classList.remove('collapse');
            } else {
                description.classList.add('collapse');
            }
        });
    });
}

document.addEventListener('DOMContentLoaded', function () {
    creadoresVisibilidad();
});
