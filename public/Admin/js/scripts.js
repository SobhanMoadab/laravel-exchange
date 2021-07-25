/* Dore Theme Select & Initializer Script 

Table of Contents

01. Css Loading Util
02. Theme Selector And Initializer
*/

/* 01. Css Loading Util */


// system prefrence js 
function loadStyle(href, callback) {
    for (var i = 0; i < document.styleSheets.length; i++) {
        if (document.styleSheets[i].href == href) {
            return;
        }
    }
    var head = document.getElementsByTagName("head")[0];
    var link = document.createElement("link");
    link.rel = "stylesheet";
    link.type = "text/css";
    link.href = '/Admin/' + href;
    if (callback) {
        link.onload = function () {
            callback();
        };
    }
    var mainCss = $(head).find('[href$="main.css"]');
    if (mainCss.length !== 0) {
        mainCss[0].before(link);
    } else {
        head.appendChild(link);
    }
}

/* 02. Theme Selector, Layout Direction And Initializer */
(function ($) {
    if ($().dropzone) {
        Dropzone.autoDiscover = false;
    }

    var themeColorsDom = /*html*/`
    <div class="theme-colors">
      <div class="p-4">
      <p class="text-muted mb-2">Light Theme</p>
      <div class="d-flex flex-row justify-content-between mb-3">
        <a href="#" data-theme="dore.light.bluenavy.min.css" class="theme-color theme-color-bluenavy  "></a>
        <a href="#" data-theme="dore.light.blueyale.min.css" class="theme-color theme-color-blueyale"></a>
        <a href="#" data-theme="dore.light.blueolympic.min.css" class="theme-color theme-color-blueolympic"></a>
        <a href="#" data-theme="dore.light.greenmoss.min.css" class="theme-color theme-color-greenmoss"></a>
        <a href="#" data-theme="dore.light.greenlime.min.css" class="theme-color theme-color-greenlime"></a>
      </div>
      <div class="d-flex flex-row justify-content-between mb-4">
        <a href="#" data-theme="dore.light.purplemonster.min.css" class="theme-color theme-color-purplemonster"></a>
        <a href="#" data-theme="dore.light.orangecarrot.min.css" class="theme-color theme-color-orangecarrot"></a>
        <a href="#" data-theme="dore.light.redruby.min.css" class="theme-color theme-color-redruby"></a>
        <a href="#" data-theme="dore.light.yellowgranola.min.css" class="theme-color theme-color-yellowgranola"></a>
        <a href="#" data-theme="dore.light.greysteel.min.css" class="theme-color theme-color-greysteel"></a>
      </div>
      <p class="text-muted mb-2">Dark Theme</p>
      <div class="d-flex flex-row justify-content-between mb-3">
        <a href="#" data-theme="dore.dark.bluenavy.min.css" class="theme-color theme-color-bluenavy"></a>
        <a href="#" data-theme="dore.dark.blueyale.min.css" class="theme-color theme-color-blueyale"></a>
        <a href="#" data-theme="dore.dark.blueolympic.min.css" class="theme-color theme-color-blueolympic"></a>
        <a href="#" data-theme="dore.dark.greenmoss.min.css" class="theme-color theme-color-greenmoss"></a>
        <a href="#" data-theme="dore.dark.greenlime.min.css" class="theme-color theme-color-greenlime"></a>
      </div>
      <div class="d-flex flex-row justify-content-between">
      <a href="#" data-theme="dore.dark.purplemonster.min.css" class="theme-color theme-color-purplemonster"></a>
      <a href="#" data-theme="dore.dark.orangecarrot.min.css" class="theme-color theme-color-orangecarrot"></a>
      <a href="#" data-theme="dore.dark.redruby.min.css" class="theme-color theme-color-redruby"></a>
      <a href="#" data-theme="dore.dark.yellowgranola.min.css" class="theme-color theme-color-yellowgranola"></a>
      <a href="#" data-theme="dore.dark.greysteel.min.css" class="theme-color theme-color-greysteel"></a>
    </div>
    </div>
    <div class="p-4">
      <p class="text-muted mb-2">Border Radius</p>
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="roundedRadio" name="radiusRadio" class="custom-control-input radius-radio" data-radius="rounded">
        <label class="custom-control-label" for="roundedRadio">Rounded</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="flatRadio" name="radiusRadio" class="custom-control-input radius-radio" data-radius="flat">
        <label class="custom-control-label" for="flatRadio">Flat</label>
      </div>
    </div>
    <div class="p-4">
      <p class="text-muted mb-2">Direction</p>
      <div class="custom-control custom-radio custom-control-inline">
      <input type="radio" id="ltrRadio" name="directionRadio" class="custom-control-input direction-radio" data-direction="ltr">
      <label class="custom-control-label" for="ltrRadio">Ltr</label>
    </div>
    <div class="custom-control custom-radio custom-control-inline">
      <input type="radio" id="rtlRadio" name="directionRadio" class="custom-control-input direction-radio" data-direction="rtl">
      <label class="custom-control-label" for="rtlRadio">Rtl</label>
    </div>
  </div>
  </div>
  `;

    $(".color-Change").append(themeColorsDom);


    /* Default Theme Color, Border Radius and  Direction */
    var theme = "dore.light.bluenavy.min.css";
    var direction = "ltr";
    var radius = "rounded";

    if (typeof Storage !== "undefined") {
        if (localStorage.getItem("dore-theme-color")) {
            theme = localStorage.getItem("dore-theme-color");
        } else {
            localStorage.setItem("dore-theme-color", theme);
        }
        if (localStorage.getItem("dore-direction")) {
            direction = localStorage.getItem("dore-direction");
        } else {
            localStorage.setItem("dore-direction", direction);
        }
        if (localStorage.getItem("dore-radius")) {
            radius = localStorage.getItem("dore-radius");
        } else {
            localStorage.setItem("dore-radius", radius);
        }
    }

    $(".theme-color[data-theme='" + theme + "']").addClass("active");
    $(".direction-radio[data-direction='" + direction + "']").attr("checked", true);
    $(".radius-radio[data-radius='" + radius + "']").attr("checked", true);
    $("#switchDark").attr("checked", theme.indexOf("dark") > 0 ? true : false);

    loadStyle("css/" + theme, onStyleComplete);
    function onStyleComplete() {
        setTimeout(onStyleCompleteDelayed, 300);
    }

    function onStyleCompleteDelayed() {
        $("body").addClass(direction);
        $("html").attr("dir", direction);
        $("body").addClass(radius);
        $("body").dore();
    }

    $("body").on("click", ".theme-color", function (event) {
        event.preventDefault();
        var dataTheme = $(this).data("theme");
        if (typeof Storage !== "undefined") {
            localStorage.setItem("dore-theme-color", dataTheme);
            window.location.reload();
        }
    });

    $("input[name='directionRadio']").on("change", function (event) {
        var direction = $(event.currentTarget).data("direction");
        if (typeof Storage !== "undefined") {
            localStorage.setItem("dore-direction", direction);
            window.location.reload();
        }
    });

    $("input[name='radiusRadio']").on("change", function (event) {
        var radius = $(event.currentTarget).data("radius");
        if (typeof Storage !== "undefined") {
            localStorage.setItem("dore-radius", radius);
            window.location.reload();
        }
    });

    $("#switchDark").on("change", function (event) {
        var mode = $(event.currentTarget)[0].checked ? "dark" : "light";
        if (mode == "dark") {
            theme = theme.replace("light", "dark");
        } else if (mode == "light") {
            theme = theme.replace("dark", "light");
        }
        if (typeof Storage !== "undefined") {
            localStorage.setItem("dore-theme-color", theme);
            window.location.reload();
        }
    });

    $(".theme-button").on("click", function (event) {
        event.preventDefault();
        $(this)
            .parents(".theme-colorss")
            .toggleClass("shown");
    });

    $(document).on("click", function (event) {
        if (
            !(
                $(event.target)
                    .parents()
                    .hasClass("theme-colorss") ||
                $(event.target)
                    .parents()
                    .hasClass("theme-button") ||
                $(event.target).hasClass("theme-button") ||
                $(event.target).hasClass("theme-colorss")
            )
        ) {
            if ($(".theme-colorss").hasClass("shown")) {
                $(".theme-colorss").removeClass("shown");
            }
        }
    });
})(jQuery);

//  End System Prefrence 


// Currency

// get all elements in class 'base_64_icons'
let elements = document.getElementsByClassName('base_64_icons');
for (let i = 0; i < elements.length; i++) {
    // get value of value(base64 string) of input element
    let base64 = `${elements[i]['value']}`;
    src = `data:image/png;base64,${base64}`;
    //replace each input element with img element
    $(`#${elements[i]['id']}`).replaceWith(`<img width="50" class="base_64_icons" height="50" src="${src}">`);
}

//base64 upload image Currency
function imageUploaded() {
    var fileInput = document.getElementById('currencylogo');

    var reader = new FileReader();
    reader.readAsDataURL(fileInput.files[0]);

    reader.onload = function () {

        document.getElementById('upload_base').value = reader.result.replace("data:", "")
            .replace(/^.+,/, ""); // Set value base64 To Hidden input Form And  Remove (data:image/*format*) Set only bas64 Encode
    };
}
function imageUploadedUpdate() {
    var fileInput = document.getElementById('Updatelogo');

    var reader = new FileReader();
    reader.readAsDataURL(fileInput.files[0]);

    reader.onload = function () {

        document.getElementById('update_base').value = reader.result.replace("data:", "")
            .replace(/^.+,/, ""); // Set value base64 To Hidden input Form And  Remove (data:image/*format*) Set only bas64 Encode
    };
}

// end Currency

function toggle(source) {
    var checkboxes = document.querySelectorAll(' table input[type="checkbox"]');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i] != source)
            checkboxes[i].checked = source.checked;
    }
}



// system prefrence  js 
function prosessLogo(e) {
    var reader = new FileReader();
    reader.readAsDataURL(e.target.files[0]);

    reader.onload = function () {
        $('#LogoImg').attr('src', reader.result);
        document.getElementById('hideLogo').value = reader.result.replace("data:", "")
            .replace(/^.+,/, ""); // Set value base64 To Hidden input Form And  Remove (data:image/*format*) Set only bas64 Encode
    };
}
function prosessFavicon(e) {
    var reader = new FileReader();
    reader.readAsDataURL(e.target.files[0]);

    reader.onload = function () {
        document.getElementById('hideFavicon').value = reader.result.replace("data:", "")
            .replace(/^.+,/, ""); // Set value base64 To Hidden input Form And  Remove (data:image/*format*) Set only bas64 Encode
    };
}


// posts js 

// $('.item-list').hover(
//     function () {
//         var $this = $(this);
//         $this.data('defaultText', $this.text()); // get default  text 
//         $this.text("Update").fadeIn('slow'); //replace text
//     },
//     function () {
//         var $this = $(this); // caching $(this)
//         $this.text($this.data('defaultText'));
//     }

// )

$('#delete-item').click(function () {
    // get Item List Checked
    var items = $('.card').find('input:checked');


    // console.log(items.parent().parent().find('.item-list').text())
    // Delete Alert
    swal({
        // Question 
        title: "Do you want to delete?",
        text: items.parent().parent().find('.item-list').text(),
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                // Yes
                items.parent().parent().remove();
                swal("Poof! Your imaginary file has been deleted!", {
                    icon: "success",
                });
            }
        });



});

// Logs Script 
function check_input() {
    var val = document.getElementById('logs_delete');
    if (val.value == 'custom') {
        $('#content').append(`<input name="custom-number" type="text" id="custom-number" placeholder=" enter custom number" class=" form-control my-2">`);

    }
    else {
        $('#custom-number').remove();
    }
}


//  #############    Ticket page ################

var url = 'http://api.alquran.cloud/v1/quran/en.asad';
$.ajax(url, function (d) { }).done(function (d) {
    $.each(d.data.surahs, function (i, item) {
        $('#users-list').append(`
                                        <div class="d-flex flex-row mb-3 border-bottom pb-3">
                                            <a class="d-flex" href="#">
                                                <img alt="Profile Picture" src="/Admin/img/profiles/l-1.jpg" class="img-thumbnail border-0 rounded-circle mr-3 list-thumbnail align-self-center xsmall">
                                            </a>
                                            <div onclick="get_user_tickets(${item.number})" class="d-flex flex-grow-1 min-width-zero">
                                                <div class="m-2 pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero ">
                                                    <div class="min-width-zero ">
                                                        <div class="d-flex justify-content-between ">
                                                            <a href="#" class="">
                                                              
                                                                <p class="mb-0 truncate"> ${item.englishName}
                                                                  

                                                                </p>

                                                            </a>
                                                        </div>
                                                  
                                                        <p class="mb-0 text- "> ${item.englishNameTranslation}
                                                           
                                                        </p>
                                                    </div>
                                                    <span class=" badge badge-primary status-ticket">&nbsp;</span>

                                                </div>
                                            </div>
                                          
                                        </div>
                    
                    `)
    })
})

function get_user_tickets(event) {
    $('.notfoundmsg').remove();
    $('.chat-remove').remove();
    $("#scroll-chat").scrollTop(0);

    $('.chat-box').append(`
        
        <div class="col-12 chat-app notfoundmsg">
                    <div class="scroll" id="scroll-chat">
                        <div class="scroll-content chat-box d-flex align-item-center justify-content-center h-100">
                            <div class=" d-flex align-items-center"> 
                                <div class="d-flex flex-column text-center">
                                    <div class="loadingio-spinner-rolling-z71busg6ach"><div class="ldio-noxuww260un">
                                            <div></div>
                                            </div></div>                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        
        `);

    $.ajax(url, function (d) {

    }).done(function (d) {
        var datas = d.data.surahs.filter(function (data) {
            return data.number == event
        })
        $('#heading-name').html(datas[0].englishName);
        $.each(datas[0].ayahs, function (i, msg) {
            $('.notfoundmsg').remove();
            $('.chat-box').append(`
                                        <div class="card d-inline-block mb-3 float-right mr-2 chat-remove">
                                            <div class="position-absolute pt-1 pr-2 r-0">
                                                <span class="text-extra-small text-muted">09:41</span>
                                            </div>
                                            <div class="card-body">
                                                <div class="chat-text-left">
                                                    <p class="mb-0 text-semi-muted">
                                                    ${msg.text}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfixs chat-remove"></div>
                    
                    `)
            var elements = document.getElementById("scroll-chat");
            elements.scrollTop = elements.scrollHeight;
        })
    })
}

document.getElementById('AdminFileTicktBtn').addEventListener('click', fileupload);

function fileupload() {
    document.getElementById('AdminFileTickt').click();
}
document.getElementById('send').addEventListener('click', sendMsg);
document.getElementById('chat-input').addEventListener("keyup", function (event) {
    document.getElementById('send').classList.add('active-send')
    if (this.value == '') {
        document.getElementById('send').classList.remove('active-send')
    }
    if (event.keyCode === 13) {
        event.preventDefault();
        document.getElementById('send').click()
        document.getElementById('send').classList.remove('active-send')


    }
});

function sendMsg() {
    document.getElementById('send').classList.remove('active-send')
    var msg = $('.chat-input').val()
    if (!msg == '') {
        $('.chat-box').append(`
                <div class="card d-inline-block mb-3 float-right mr-2">
                    <div class="position-absolute pt-1 pr-2 r-0">
                        <span class="text-extra-small text-muted">09:41</span>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-row pb-2">
                            <div class="d-flex flex-grow-1 min-width-zero">
                                <div
                                    class="m-2 pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                    <div class="min-width-zero">
                                        <p class="mb-0 list-item-heading truncate">Admin</p>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="chat-text-left">
                            <p class="mb-0 text-semi-muted">
                            ${msg}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="clearfixs"></div>`)
        $('.chat-input').val('');
        var elements = document.getElementById("scroll-chat");
        elements.scrollTop = elements.scrollHeight;
    }
}
document.getElementById('delTicket').addEventListener("click", function () {
    swal({
        title: "Are you sure?",
        text: "Once Close",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                $('.chat-remove').remove();

                swal("Ticket Closed !", {
                    icon: "success",
                });
            } else {
                swal("Your  Ticket is safe!");
            }
        });

});