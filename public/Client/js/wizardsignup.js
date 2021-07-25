$().ready(function () {
    $('.line').animate({ width: '35%' }, 1000, 'easeInOutQuint')
    $('.stepOne').animate({ color: '#7A57D1' })
    if ($('.you-spend').val() == '') {
        $('.you-spend').val('0')
    }
    $(".you-spend").keyup(function () {
        $(".you-receive").val($(this).val() * 2350);
    });
    $.niceToast.setup({
        position: "bottom-right",
        timeout: 5000,
    });
})
$('.step-next').click(
    function () {
        if ($('.you-spend').val() == 0) {
            $.niceToast.error("Please enter the number");
        }
        else if ($('.you-receive').val() >= 100) {
            $.niceToast.error('The maximum amount payable in each purchase must be 100$');
        }
        else {
            $('.line').animate({ width: '65%' }, 1000, 'easeInOutQuint')
            $('.stepOne').animate({ color: '#7A57D1' })
            $('.stepTwo').animate({ color: '#7A57D1' })

            $('.stepbodyone').slideUp('fast');
            $('.stepbodytwo').slideDown('fast');
        }
    }
)
$('#step-two-next').click(function () {
    $('.line').animate({ width: '100%' }, 1000, 'easeInOutQuint')
    $('.stepOne').animate({ color: '#7A57D1' })
    $('.stepTwo').animate({ color: '#7A57D1' })
    $('.stepTree').animate({ color: '#7A57D1' })

    $('.stepbodytwo').slideUp('fast')
    $('.stepbodyfinish').slideDown('fast')
}
)

$('#step-two-back').click(
    function () {
        $('.stepOne').animate({ color: '#7A57D1' })
        $('.stepTwo').animate({ color: '#aaa' })

        $('.line').animate({ width: '25%' }, 1000, 'easeInOutQuint')
        $('.stepbodytwo').slideUp('fast');
        $('.stepbodyone').slideDown('fast');
    }
)


$('#step-two-check').click(function () {
    $('.step-tree-form').slideUp('fast');
    $('.wizard-verify').fadeIn('fast');
    $('#step-two-check').remove();
    $('#step-two-next').removeClass('d-none')



})
// $('.stepbodytree input[name=fullname]').keyup(function () {
//     if ($('.stepbodytree input[name=fullname]').val().length <= 4) {
//         $('.stepbodytree input[name=fullname]').addClass('border-danger')
//     } else if ($('.stepbodytree input[name=fullname]').val().length >= 4) {
//         $('.stepbodytree input[name=fullname]').removeClass('border-danger')
//         $('.stepbodytree input[name=fullname]').addClass('border-success')

//     }
// })
// $('.stepbodytree input[name=email]').keyup(function () {
//     var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
//     if (!regex.test($('.stepbodytree input[name=email]').val())) {
//         $('.stepbodytree input[name=email]').addClass('border-danger')
//     } else {
//         $('.stepbodytree input[name=email]').removeClass('border-danger')
//         $('.stepbodytree input[name=email]').addClass('border-success')
//     }
// })
// $('.stepbodytree input[name=password]').keyup(function () {
//     var regex = /^[a-zA-Z0-9_-]{8,15}$/;
//     if (regex.test($('.stepbodytree input[name=password]').val())) {
//         $('.stepbodytree input[name=password]').removeClass('border-danger')
//         $('.stepbodytree input[name=password]').addClass('border-success')
//     } else {
//         $('.stepbodytree input[name=password]').addClass('border-danger')
//     }

// })
