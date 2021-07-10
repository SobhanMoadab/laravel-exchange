$().ready(function () {
    $('.line').animate({ width: '30%' }, 1000, 'easeInOutQuint')
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
        if ($('.you-spend').val() == 0 || $('.you-receive').val() == 0) {
            $.niceToast.error("Please enter the number");
        }
        else if ($('.you-receive').val() <= 540000) {
            $.niceToast.error('The maximum amount payable in each purchase must be 540000$');
        }
        else {
            $('.line').animate({ width: '60%' }, 1000, 'easeInOutQuint')
            $('.stepOne').animate({ color: '#7A57D1' })
            $('.stepTwo').animate({ color: '#7A57D1' })

            $('.stepbodyone').slideUp('fast')
            $('.stepbodytwo').slideDown('fast');
        }
    }
)
$('#step-two-next').click(
    function () {
        $('.line').animate({ width: '100%' }, 1000, 'easeInOutQuint')
        $('.stepOne').animate({ color: '#7A57D1' })
        $('.stepTwo').animate({ color: '#7A57D1' })
        $('.stepTree').animate({ color: '#7A57D1' })

        $('.stepbodytwo').slideUp('fast')
        $('.stepbodytree').slideDown('fast');
    }
)
$('#step-two-back').click(
    function () {
        $('.stepOne').animate({ color: '#7A57D1' })
        $('.stepTwo').animate({ color: '#aaa' })

        $('.line').animate({ width: '30%' }, 1000, 'easeInOutQuint')
        $('.stepbodytwo').slideUp('fast');
        $('.stepbodyone').slideDown('fast');
    }
)


