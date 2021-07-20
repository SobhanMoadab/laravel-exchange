/* Theme Name: Wizous
  Author: Themesdesign
  Version: 1.0.0
  File Description: Main JS file of the template
*/

//  Window scroll sticky class add

function windowScroll() {
    const navbar = document.getElementById("navbar");
    const navlink = document.getElementById("nav-link");
    const navbtn = document.getElementById("nav-btn");
    const navIcon = document.getElementById("nav-phone-icon");
    if (
        document.body.scrollTop >= 50 ||
        document.documentElement.scrollTop >= 50
    ) {
        navbar.classList.add("nav-sticky");

        navlink.classList.add("txt-sticky");
        navbtn.classList.add("text-dark");
        navIcon.classList.add("text-dark");

    } else {
        navbar.classList.remove("nav-sticky");
        navlink.classList.remove("txt-sticky");
        navbtn.classList.remove("text-dark");
        navIcon.classList.remove("text-dark");
    }
}

window.addEventListener('scroll', (ev) => {
    ev.preventDefault();
    windowScroll();
})


// Smooth scroll 
var scroll = new SmoothScroll('#navbar-navlist a', {
    speed: 300,
    offset: 60
});

// Navbar Active Class

var spy = new Gumshoe('#navbar-navlist a', {
    // Active classes
    navClass: 'active', // applied to the nav list item
    contentClass: 'active', // applied to the content
    offset: 70
});

// Contact Form
function validateForm() {
    var name = document.forms["myForm"]["name"].value;
    var email = document.forms["myForm"]["email"].value;
    var subject = document.forms["myForm"]["subject"].value;
    var comments = document.forms["myForm"]["comments"].value;
    document.getElementById("error-msg").style.opacity = 0;
    document.getElementById('error-msg').innerHTML = "";
    if (name == "" || name == null) {
        document.getElementById('error-msg').innerHTML = "<div class='alert alert-warning'>*Please enter a Name*</div>";
        fadeIn();
        return false;
    }
    if (email == "" || email == null) {
        document.getElementById('error-msg').innerHTML = "<div class='alert alert-warning'>*Please enter a Email*</div>";
        fadeIn();
        return false;
    }
    if (subject == "" || subject == null) {
        document.getElementById('error-msg').innerHTML = "<div class='alert alert-warning'>*Please enter a Subject*</div>";
        fadeIn();
        return false;
    }
    if (comments == "" || comments == null) {
        document.getElementById('error-msg').innerHTML = "<div class='alert alert-warning'>*Please enter a Comments*</div>";
        fadeIn();
        return false;
    }

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("simple-msg").innerHTML = this.responseText;
            document.forms["myForm"]["name"].value = "";
            document.forms["myForm"]["email"].value = "";
            document.forms["myForm"]["subject"].value = "";
            document.forms["myForm"]["comments"].value = "";
        }
    };
    xhttp.open("POST", "php/contact.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("name=" + name + "&email=" + email + "&subject=" + subject + "&comments=" + comments);
    return false;
}

function fadeIn() {
    var fade = document.getElementById("error-msg");
    var opacity = 0;
    var intervalID = setInterval(function () {
        if (opacity < 1) {
            opacity = opacity + 0.5
            fade.style.opacity = opacity;
        } else {
            clearInterval(intervalID);
        }
    }, 200);
}


// client-slider

/*error
var slider = tns({
    container: '.client-slider',
    loop: true,
    autoplay: true,
    nav: false,
    controlsPosition: 'bottom',
    controls: true,
    autoplayButtonOutput: false,
    controlsText: ["<i class='mdi mdi-arrow-left'></i>", "<i class='mdi mdi-arrow-right'></i>"],
    responsive: {
        1024: {
            gutter: 20,
            items: 2
        },
        768: {
            gutter: 20,
            items: 2
        }
    }
});*/

// HOME TITLE ANIMATION
/*error
const SELECTOR = {
    DEMO: document.querySelector('.heading-title'),
}

const CLASSES = {
    ANIMATED: `is-animated`
}

window.onload = function () {
    SELECTOR.DEMO.classList.add(CLASSES.ANIMATED);
    const timer = setInterval(() => {
        SELECTOR.DEMO.classList.remove(CLASSES.ANIMATED);
        clearInterval(timer)
    }, 700)

};
*/
//Counter

const counter = document.querySelectorAll('.counter_value');
const speed = 250; // The lower the slower
counter.forEach(counter_value => {
    const updateCount = () => {
        const target = +counter_value.getAttribute('data-target');
        const count = +counter_value.innerText;
        const inc = target / speed;
        // Check if target is reached
        if (count < target) {
            // Add inc to count and output in counter_value
            counter_value.innerText = (count + inc).toFixed(0);
            // Call function every ms
            setTimeout(updateCount, 1);
        } else {
            counter_value.innerText = target;
        }
    };
    updateCount();
});


// typed

var TxtType = function (el, toRotate, period) {
    this.toRotate = toRotate;
    this.el = el;
    this.loopNum = 0;
    this.period = parseInt(period, 10) || 2000;
    this.txt = '';
    this.tick();
    this.isDeleting = false;
};

TxtType.prototype.tick = function () {
    var i = this.loopNum % this.toRotate.length;
    var fullTxt = this.toRotate[i];
    if (this.isDeleting) {
        this.txt = fullTxt.substring(0, this.txt.length - 1);
    } else {
        this.txt = fullTxt.substring(0, this.txt.length + 1);
    }
    this.el.innerHTML = '<span class="wrap">' + this.txt + '</span>';
    var that = this;
    var delta = 200 - Math.random() * 100;
    if (this.isDeleting) { delta /= 2; }
    if (!this.isDeleting && this.txt === fullTxt) {
        delta = this.period;
        this.isDeleting = true;
    } else if (this.isDeleting && this.txt === '') {
        this.isDeleting = false;
        this.loopNum++;
        delta = 500;
    }
    setTimeout(function () {
        that.tick();
    }, delta);
};

function typewrite() {
    if (toRotate === 'undefined') {
        changeText()
    }
    else
        var elements = document.getElementsByClassName('typewrite');
    for (var i = 0; i < elements.length; i++) {
        var toRotate = elements[i].getAttribute('data-type');
        var period = elements[i].getAttribute('data-period');
        if (toRotate) {
            new TxtType(elements[i], JSON.parse(toRotate), period);
        }
    }
    // INJECT CSS
    var css = document.createElement("style");
    css.type = "text/css";
    css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #ffffff}";
    document.body.appendChild(css);
};
/*error
window.onload(typewrite());

// js active tab
function tabs(e) {
    var tab_btn = document.getElementsByClassName('tab-btn');
    var i;

    for (i = 0; i < tab_btn.length; i++) {
        tab_btn[i].classList.remove('active-menu');
    }

    e.currentTarget.classList.add('active-menu');

}*/
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function (event) {
    if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}

function navPhoneOpen() {
    document.getElementById('nav-phone').classList.add('menu-mobile-open');
}
function navPhoneclose() {
    document.getElementById('nav-phone').classList.remove('menu-mobile-open');
}
//form profile
var firstName = $('.profile-permit input[name=f_name]');
var lastName = $('.profile-permit input[name=l_name]');
var address = $('.profile-permit input[name=address]');
var email = $('.profile-permit input[name=email-profile]');
var password = $('.profile-permit input[name=Password-profile]');
var file = $('.profile-permit input[name=file-name]');

function validform() {

    if (firstName.val() == "" || email.val() == "" || lastName.val() == "" || address.val() == "" || file.val() == "" || password.val() == "") {

        $('.alert').css('display', 'block');
        return false;
    }

    var reg_email = /[a-z0-9]+\@+[a-z]+\.+[a-z]/;

    if (!reg_email.test(email.val())) {
        $('.alert').html('<strong>Error! </strong> Please Enter a Valid Email');
        return false;
    }

}
<<<<<<< HEAD
//base64 upload image ticket
function imageUploadedTicket() {
    var fileInput = document.getElementById('ticketImage');

    var reader = new FileReader();
    reader.readAsDataURL(fileInput.files[0]);

    reader.onload = function () {
        // console.log(reader.result);//base64encoded string
        document.getElementById('upload_base_ticket').value = reader.result.replace("data:", "")
            .replace(/^.+,/, "");
    };
}

// Ticket Js
=======
>>>>>>> ac2bbe2844e6f3e675e70ea7f8dba655fc4716f1
