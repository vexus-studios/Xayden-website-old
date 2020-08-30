// MENU BAR

$(document).ready(function() {
    $(window).scroll(function() {
        if ($(document).scrollTop() > 100) {
            $('#nav').addClass('change');
        } else {
            $('#nav').removeClass('change');
        }
    });
});

$(document).ready(function() {
    $(window).scroll(function() {
        if ($(document).scrollTop() > 10) {
            $('#mobile-nav').addClass('change3');
        } else {
            $('#mobile-nav').removeClass('change3');
        }
    });
});



// SLIDER

function slideSwitch() {
    var $active = $('#slideshow div.active');

    if ($active.length == 0) $active = $('#slideshow div:last');

    var $next = $active.next().length ? $active.next() :
        $('#slideshow div:first');

    $active.addClass('last-active');

    $next.css({ opacity: 0.0 })
        .addClass('active')
        .animate({ opacity: 1.0 }, 1000, function() {
            $active.removeClass('active last-active');
        });
}

$(function() {
    setInterval("slideSwitch()", 11000);
});



// SMOOTH SCROLL

$(document).ready(function() {

    $("a").on('click', function(event) {

        if (this.hash !== "") {

            event.preventDefault();

            var hash = this.hash;

            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 800, function() {
                window.location.hash = hash;
            });
        }
    });
});

// POP-UP

function openModal() {
    document.getElementById('myModal').style.display = "block";
}

function closeModal() {
    document.getElementById('myModal').style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("demo");
    var captionText = document.getElementById("caption");
    if (n > slides.length) { slideIndex = 1 }
    if (n < 1) { slideIndex = slides.length }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
}

// NAV BAR

function myFunction(x) {
    x.classList.toggle("change2");
}

function mobilemenu() {

    if ($('#mobile-nav-content').is(':hidden')) {
        $('#mobile-nav-content').addClass('mobile-menu-change');
        $('#mobile-nav').addClass('mobile-menu-change-bar');
        $('#container').addClass('mobile-menu-change-hamburger');
    } else {
        $('#mobile-nav-content').removeClass('mobile-menu-change');
        $('#mobile-nav').removeClass('mobile-menu-change-bar');
        $('#container').removeClass('mobile-menu-change-hamburger');
    }
}




// popup