// toggle class active
const navbarNav = document.querySelector('.navbar-nav');
document.querySelector('#hamburger-menu').onclick = () => {
    navbarNav.classList.toggle('active');
};


const hamburger = document.querySelector('#hamburger-menu');
document.addEventListener('click', function (e) {
    if (!hamburger.contains(e.target) && !navbarNav.contains(e.target)) {
        navbarNav.classList.remove('active');
    }
});


// button

const jmlInput = document.getElementById('jmlinput');
function stepper(btn) {
    let id = btn.getAttribute('id');
    let min = jmlInput.getAttribute('min');
    let max = jmlInput.getAttribute('max');
    let step = jmlInput.getAttribute('step');
    let val = jmlInput.getAttribute('value');
    let calcstep = (id == "inc") ? (step * 1) : (step * -1);
    let newValue = parseInt(val) + calcstep;

    if (newValue >= min && newValue <= max) {
        jmlInput.setAttribute("value", newValue);
    };
};


// tabs
function tab(evt, name) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(name).style.display = "flex";
    evt.currentTarget.className += " active";
}

//slider
var slides = document.querySelectorAll('.slide');
var btns = document.querySelectorAll('.btn');
let currentSlide = 1;

// Javascript for image slider manual navigation
var manualNav = function (manual) {
    slides.forEach((slide) => {
        slide.classList.remove('active');

        btns.forEach((btn) => {
            btn.classList.remove('active');
        });
    });

    slides[manual].classList.add('active');
    btns[manual].classList.add('active');
}

btns.forEach((btn, i) => {
    btn.addEventListener("click", () => {
        manualNav(i);
        currentSlide = i;
    });
});

// slider
var repeat = function (activeClass) {
    let active = document.getElementsByClassName('active');
    let i = 1;

    var repeater = () => {
        setTimeout(function () {
            [...active].forEach((activeSlide) => {
                activeSlide.classList.remove('active');
            });

            slides[i].classList.add('active');
            btns[i].classList.add('active');
            i++;

            if (slides.length == i) {
                i = 0;
            }
            if (i >= slides.length) {
                return;
            }
            repeater();
        }, 10000);
    }
    repeater();
}
repeat();

//scroll top


