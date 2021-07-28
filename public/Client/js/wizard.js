/***js animate step click***/
$().ready(function () {
    $('.line').animate({
        width: '50%'
    }, 1000, 'easeInOutQuint')
    $('.stepOne').animate({
        color: '#7A57D1'
    })
    if ($('.you-spend').val() == '') {
        $('.you-spend').val('0')
    }
    $.niceToast.setup({
        position: "bottom-right",
        timeout: 5000,
    });
})
$('#verifyBtn').click(function () {
    let url = '/verify'
    document.location.href = url;
})
$('.step-next').click(
    function () {
        if ($('.you-spend').val() == 0 || $('.you-receive').val() == 0) {
            $.niceToast.error("Please enter the number");
        } else if ($('.you-receive').val() >= 100) {
            $.niceToast.error('The maximum amount payable in each purchase must be 100$');
            $('#verifyBtn').css("display", "block");

        } else {
            $('.line').animate({
                width: '100%'
            }, 1000, 'easeInOutQuint')
            $('.stepOne').animate({
                color: '#7A57D1'
            })
            $('.stepTwo').animate({
                color: '#7A57D1'
            })

            $('.stepbodyone').slideUp('fast')
            $('.stepbodytwo').slideDown('fast');
        }
    }
)
$('#step-two-next').click(
    function () {
        $('.line').animate({
            width: '100%'
        }, 1000, 'easeInOutQuint')
        $('.stepOne').animate({
            color: '#7A57D1'
        })
        $('.stepTwo').animate({
            color: '#7A57D1'
        })

        $('.stepbodytwo').slideUp('fast')
        $('.stepbodytree').slideDown('fast');
    }
)
$('#step-two-back').click(
    function () {
        $('.stepOne').animate({
            color: '#7A57D1'
        })
        $('.stepTwo').animate({
            color: '#aaa'
        })

        $('.line').animate({
            width: '50%'
        }, 1000, 'easeInOutQuint')
        $('.stepbodytwo').slideUp('fast');
        $('.stepbodyone').slideDown('fast');
    }
)
$('.country_select2').select2();
// $('.country_select2').materialSelect();


$('#step-two-next').click(function () {
    const input_code = $('#verification_code').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "post",
        url: "{{ url('/api/verify_order_email') }}",
        data: {
            code: input_code
        },
        success: function (data) {
            if (data['msg']) {
                alert(data['msg'])
                console.log(data['msg'])
            } else {
                alert('failed to verify')

            }

        }
    });
})