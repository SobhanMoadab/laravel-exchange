@include('client.Layout.Header')

<link rel="stylesheet" href="/Client/css/Wizard.css">
<!-- Toast Css Link -->
<link href="https://cdn.jsdelivr.net/npm/nice-toast-js/dist/css/nice-toast-js.min.css" rel="stylesheet"
    type="text/css" />
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<style>
    .line {
        height: 5px;
        width: 0%;
        border-radius: 40px;
        background-color: #7A57D1;
        box-shadow: 0 0 10px 0 var(--bs-indigo);
        z-index: 3;
    }

    .line::before {
        content: '';
        height: 5px;
        background-color: #0003;
        border-radius: 50px;
        position: absolute;
        z-index: 0;
        width: 96%;
    }

    .stepbodytwo {
        display: none;
    }

    .stepbodytree {
        display: none;
    }

    .stepbodyfor {
        display: none;
    }

    .stepOne {
        color: transparent;
    }

    .stepTwo {
        color: transparent;
    }

    .stepTree {
        color: transparent;
    }

    .stepFor {
        color: transparent;
    }

    .wizard-verify {
        display: none;
    }

    .modal {
        position: fixed;
        bottom: 0;
        top: auto;
        right: auto;
        left: auto;
        height: auto;
        padding-right: auto !important;
        overflow-y: hidden !important;
    }

    .modal.fade .modal-dialog {
        transition: transform .3s ease-out;
        transform: translate(0, 0) !important;
    }

    .modal-dialog.modal-dialog-centered {
        margin-bottom: 0 !important;
        max-width: 1000px !important;
    }

    @media only screen and (max-width:991px) {
        .modal-dialog.modal-dialog-centered {
            margin: 0 !important;
            max-width: 1000px !important;
        }
    }

    .modal-content {

        border: 0px solid transparent !important;
        border-radius: 20px 20px 0 0 !important;
        outline: 0 !important;
    }

    .slide-top {
        -webkit-animation: slide-top 0.4s cubic-bezier(0.165, 0.840, 0.440, 1.000) both;
        animation: slide-top 0.4s cubic-bezier(0.165, 0.840, 0.440, 1.000) both;
    }

    @-webkit-keyframes slide-top {
        0% {
            -webkit-transform: translateY(100px);
            transform: translateY(100px);
        }

        100% {
            -webkit-transform: translateY(0px);
            transform: translateY(0px);
        }
    }

    @keyframes slide-top {
        0% {
            -webkit-transform: translateY(100px);
            transform: translateY(100px);
        }

        100% {
            -webkit-transform: translateY(0px);
            transform: translateY(0px);
        }
    }

    .list-group {
        max-height: 220px;
        margin-bottom: 10px;
        overflow-y: scroll;
        -webkit-overflow-scrolling: touch;
    }

</style>
<!-- START HOME -->
<div class="container">
    <div class="card my-5">
        <div class="card-body wizardstep ">
            <a class=" logo d-flex justify-content-center my-2 " href="#">
                <img src="images/E-cms.png" alt="" height="40">
            </a>
            <div class="stephead mx-auto align-content-center">
                <div class="d-flex justify-content-around mb-3">
                    <div class="p-2 stepOne">quantity</div>
                    <div class="p-2 stepTwo">Createing User</div>
                    <div class="p-2 stepTree">The final invoice</div>
                    <div class="p-2 stepFor">The final invoice</div>
                </div>
                <div class="line  mx-1"></div>
            </div>
            <form action="">
                <div class="stepbodyone">

                    <div class="card  border-0 shadow-white p-4 my-2 ">
                        <div class="menu-header">
                            <div class="tab-switcher">
                                <input type="radio" id="Sell" name="themes" onclick="tabsSell()" checked />
                                <label for="Sell">
                                    <span>
                                        <i data-feather="sun"></i>Sell ​​to site
                                    </span>
                                </label>
                                <input type="radio" id="Purchase" onclick="tabsPurchase()" name="themes" />
                                <label for="Purchase">
                                    <span>
                                        <i data-feather="moon"></i>Purchase the site
                                    </span>
                                </label>
                                <span class="slider"></span>
                            </div>
                        </div>

                        <div class="card-body d-flex justify-content-center align-content-center row  exchange"
                            id="sell-body">
                            <div class="col-12 col-sm-12 col-lg-6">
                                <div
                                    class="card bg-transparent border-0  d-flex justify-content-center align-content-center row ">

                                    <div class="card-body  d-flex justify-content-center  row">


                                        <div class="input-group">
                                            <label>You Spend</label>
                                            <input type="text"
                                                class="form-control rounded bg-light text-dark border-0 w-100 you-spend"
                                                value="0.00000">
                                            <div class="input-group-append ">
                                                <button class="btn btn-primary btn-exchange " type="button"
                                                    data-toggle="modal" data-target="#YouSpend" id="coinName">
                                                    BTC</button>
                                            </div>
                                        </div>



                                        <div class="input-group">
                                            <label>You Receive</label>
                                            <input type="text"
                                                class="form-control rounded bg-light text-dark border-0 w-100 you-receive"
                                                value="0">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary btn-exchange " type="button"
                                                    data-toggle="modal" data-target="#ModalReceive">USD</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-lg-6  exchange-table">
                                <div class="card bg-light text-white border-0 h-100 ">
                                    <div class="card-body p-4 pb-3">
                                        <table class=" float-end text-right">
                                            <tbody class="text-dark text-right">
                                                <tr>
                                                    <td dir="ltr" class="pr-0 font-weight-500 position-relative">
                                                        <span>
                                                            836,476,500
                                                        </span> <span> $</span>
                                                    </td>
                                                    <td class="pl-0 text-right">
                                                        Exchange rate
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pr-0 font-weight-500"><span>Buy from us</span></td>
                                                    <td class="pl-0">
                                                        Type of exchange
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pr-0 font-weight-500"><span>instantaneous</span></td>
                                                    <td class="pl-0">
                                                        estimated time
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pr-0 font-weight-500 position-relative"><span
                                                            class="text-success">live</span>
                                                        <!---->
                                                    </td>
                                                    <td class="pl-0"><span>Purchase status</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <button type="button" class=" step-next btn btn-primary w-100 shadow-lg mt-3 ">
                                exchange</button>
                        </div>
                        <div class="card-body d-none justify-content-center align-content-center row  exchange"
                            id="Purchase-body">
                            <div class="col-12 col-sm-12 col-lg-6">
                                <div
                                    class="card bg-transparent border-0  d-flex justify-content-center align-content-center row ">

                                    <div class="card-body  d-flex justify-content-center  row">
                                        <div class="input-group">
                                            <label>You Receive</label>
                                            <input type="text"
                                                class="form-control rounded bg-light text-dark border-0 w-100 you-receive"
                                                value="0">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary btn-exchange " type="button"
                                                    data-toggle="modal" data-target="#ModalReceive">USD</button>
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <label>You Spend</label>
                                            <input type="text"
                                                class="form-control rounded bg-light text-dark border-0 w-100 you-spend"
                                                value="0.00000">
                                            <div class="input-group-append ">
                                                <button class="btn btn-primary btn-exchange " type="button"
                                                    data-toggle="modal" data-target="#YouSpend">BTC</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-lg-6  exchange-table">
                                <div class="card bg-light text-white border-0 h-100 ">
                                    <div class="card-body p-4 pb-3">
                                        <table class=" float-end text-right">
                                            <tbody class="text-dark text-right">
                                                <tr>
                                                    <td dir="ltr" class="pr-0 font-weight-500 position-relative">
                                                        <span>
                                                            836,476,500
                                                        </span> <span> $</span>
                                                    </td>
                                                    <td class="pl-0 text-right">
                                                        Exchange rate
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pr-0 font-weight-500"><span>Buy from us</span></td>
                                                    <td class="pl-0" id="coinNames">
                                                        Type of exchange
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pr-0 font-weight-500"><span>instantaneous</span></td>
                                                    <td class="pl-0">
                                                        estimated time
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pr-0 font-weight-500 position-relative"><span
                                                            class="text-success">live</span>
                                                        <!---->
                                                    </td>
                                                    <td class="pl-0"><span>Purchase status</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <button type="button" class=" step-next btn btn-primary w-100 shadow-lg mt-3 ">
                                exchange</button>
                        </div>



                    </div>
                </div>
                <div class="stepbodytwo my-3">
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="First name">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Last name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="First name">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Last name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="First name">
                        </div>

                    </div>
                    <div class="d-flex justify-content-around">
                        <button type="button" id="step-two-back" class="btn btn-secondary w-50 mx-1"> back</button>
                        <button type="button" id="step-two-next" class="btn btn-primary w-50 mx-1"> next</button>
                    </div>
                </div>
                <div class="stepbodytree my-3">
                    <div class="step-tree-form">
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" name="fullname" placeholder="Full name">
                            </div>
                            <div class="col">
                                <input type="email" class="form-control" name="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                            <div class="col">
                                <input type="password" class="form-control" name="confirm_password"
                                    placeholder="confirm Password">
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col">
                                <label> Contry</label>
                                <select name="" id="" class="form-control">
                                    <option value="fdfd">ffsfsdfsd</option>
                                    <option value="fdfd">sdfsdfds</option>
                                    <option value="fdfd">sdfdsfsdf</option>
                                </select>

                            </div>
                            <div class="col">
                                <label> Enter Personal Cart</label>
                                <input type="file" class="form-control">
                            </div>

                        </div>
                    </div>
                    <div class="row wizard-verify  ">
                        <div class="col d-flex justify-content-center">
                            <input type="text" class="form-control w-50 text-center border-info "
                                placeholder="Enter Code">
                        </div>

                    </div>
                    <div class="d-flex justify-content-around">
                        <button type="button" id="step-tree-back" class="btn btn-secondary w-50 mx-1"> back</button>
                        <button type="button" id="step-tree-check" class="btn disabled   btn-secondary w-50 mx-1">
                            Check</button>
                        <button type="button" id="step-tree-next" class="btn btn-primary w-50 mx-1 d-none">
                            next</button>
                    </div>
                </div>
                <div class="stepbodyfor">

                    <div class="d-flex justify-content-around align-content-center py-5">

                        <a class=" btn rounded-2 shadow-poper-3 d-flex align-content-center p-5">
                            payment
                        </a>
                        <div class=" btn rounded-2 shadow-poper-3 d-flex align-content-center p-5">
                            payment
                        </div>
                        <div class=" btn rounded-2 shadow-poper-3 d-flex align-content-center p-5">
                            payment
                        </div>


                    </div>

                    <button type="submit" class="btn btn-primary w-100"> Finish</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal slide-top" id="YouSpend" tabindex="-1" role="dialog" aria-labelledby="ModalReceiveTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title
                </h5>
            </div>
            <div class="modal-body border-0">
                <div class="list-group" id="listingCoin">

                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" id="closeModal" class="btn btn-secondary w-100"
                    data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
{{-- <script src="{{asset('js/app.js')}}"></script>
<script>
    Echo.channel('price').listen('.App\\Events\\PriceList', (e) => {
        console.log(e);
    });

</script> --}}
<!-- <script>
    (function worker() {
        $.ajax({
            url: '/price',
            success: function(data) {
                console.log('success')
                console.log(data)
            },
            error: function(err) {
                console.log({
                    err: err
                });
            },
            complete: function() {
                // Schedule the next request when the current one's complete
                setTimeout(worker, 5000);
            }
        });
    })();
</script> -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(() => {
        var CoinAPI = "https://api.coinstats.app/public/v1/coins";
        $.getJSON(CoinAPI, {
            tagmode: "any",
            format: "json"
        }).done(function (data) {
            console.log(data)
            $.each(data.coins, function (i, item) {
                $("#listingCoin").append(`
                    <button type="button" id="coinBtn" value="${item.id}"
                        class="list-group-item d-flex justify-content-between  list-group-item-action ">
                        <div class="d-flex justify-content-between">
                            <span class="ticker-prog"><img width="30" src="${item.icon}"
                                    alt=""></span>
                            <span class="px-2 d-flex">
                                ${item.name}
                               ( ${item.symbol} )
                            </span>
                        </div> 
                    </button>
                   
        `)
                // if ( i === 3 ) {
                //   return false;
                // }
            });
        });
    });

    $('#listingCoin').on('click', '#coinBtn', function () {
        var value = $(this).val();
        $('#closeModal').click();

        $.ajax({
            url: '/price/' + value,
            success: function (data) {
                console.log('success')
                const res = $.parseJSON(data.currency);
                const symbol = res.coin.symbol;
                const price = res.coin.price;
                $('#coinName').text(symbol)
                $('.you-spend').val(price)
            },
            error: function (err) {
                console.log({
                    err: err
                });
            },
            complete: function () {
                setTimeout(worker, 5000);
            }
        });
    });
    $().ready(function () {
        $('.line').animate({
            width: '25%'
        }, 1000, 'easeInOutQuint')
        $('.stepOne').animate({
            color: '#7A57D1'
        })
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
            } else if ($('.you-receive').val() <= 540000) {
                $.niceToast.error('The maximum amount payable in each purchase must be 540000$');
            } else {
                $('.line').animate({
                    width: '50%'
                }, 1000, 'easeInOutQuint')
                $('.stepOne').animate({
                    color: '#7A57D1'
                })
                $('.stepTwo').animate({
                    color: '#7A57D1'
                })

                $('.stepbodyone').slideUp('fast');
                $('.stepbodytwo').slideDown('fast');
            }
        }
    )
    $('#step-two-next').click(
        function () {
            $('.line').animate({
                width: '75%'
            }, 1000, 'easeInOutQuint')
            $('.stepOne').animate({
                color: '#7A57D1'
            })
            $('.stepTwo').animate({
                color: '#7A57D1'
            })
            $('.stepTree').animate({
                color: '#7A57D1'
            })

            $('.stepbodytwo').slideUp('fast');
            $('.stepbodytree').slideDown('fast');
        }
    )
    $('#step-tree-next').click(
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
            $('.stepTree').animate({
                color: '#7A57D1'
            })
            $('.stepFor').animate({
                color: '#7A57D1'
            })

            $('.stepbodytree').slideUp('fast')
            $('.stepbodyfor').slideDown('fast');
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
                width: '25%'
            }, 1000, 'easeInOutQuint')
            $('.stepbodytwo').slideUp('fast');
            $('.stepbodyone').slideDown('fast');
        }
    )
    $('#step-tree-back').click(
        function () {
            $('.stepOne').animate({
                color: '#7A57D1'
            })
            $('.stepTwo').animate({
                color: '#7A57D1'
            })
            $('.stepTree').animate({
                color: '#aaa'
            })

            $('.line').animate({
                width: '50%'
            }, 1000, 'easeInOutQuint')
            $('.stepbodytree').slideUp('fast');
            $('.stepbodytwo').slideDown('fast');
        }
    )


    $('input').keyup(function () {
        if ($('.stepbodytree input[name=fullname]').val() == '') {
            $('.stepbodytree input[name=fullname]').addClass('border-danger')
            $('#step-tree-check').removeClass('btn-warning')
            $('#step-tree-check').addClass('disabled')
            $('#step-tree-check').addClass('btn-secondary')
        } else if ($('.stepbodytree input[name=email]').val() == '') {
            $('.stepbodytree input[name=fullname]').addClass('border-danger')
            $('#step-tree-check').removeClass('btn-warning')
            $('#step-tree-check').addClass('disabled')
            $('#step-tree-check').addClass('btn-secondary')
        } else if ($('.stepbodytree input[name=password]').val() == '') {
            $('.stepbodytree input[name=password]').addClass('border-danger')
            $('#step-tree-check').removeClass('btn-warning')
            $('#step-tree-check').addClass('disabled')
            $('#step-tree-check').addClass('btn-secondary')
        } else if ($('.stepbodytree input[name=confirm_password]').val() == '') {
            $('.stepbodytree input[name=repassword]').addClass('border-danger')
            $('#step-tree-check').removeClass('btn-warning')
            $('#step-tree-check').addClass('disabled')
            $('#step-tree-check').addClass('btn-secondary')

        } else if ($('.stepbodytree input[name=password]').val() != $(
                '.stepbodytree input[name=confirm_password]').val()) {
            $('.stepbodytree input[name=repassword]').addClass('border-danger')
            $('#step-tree-check').removeClass('btn-warning')
            $('#step-tree-check').addClass('disabled')
            $('#step-tree-check').addClass('btn-secondary')

        } else {
            $('#step-tree-check').removeClass('disabled')
            $('#step-tree-check').removeClass('btn-secondary')
            $('#step-tree-check').addClass('btn-warning')
        }
    })
    $('#step-tree-check').click(function () {
        $('.step-tree-form').slideUp('fast');
        $('.wizard-verify').fadeIn('fast');
        $('#step-tree-check').remove();
        $('#step-tree-next').removeClass('d-none')



    })
    $('.stepbodytree input[name=fullname]').keyup(function () {
        if ($('.stepbodytree input[name=fullname]').val().length <= 4) {
            $('.stepbodytree input[name=fullname]').addClass('border-danger')
        } else if ($('.stepbodytree input[name=fullname]').val().length >= 4) {
            $('.stepbodytree input[name=fullname]').removeClass('border-danger')
            $('.stepbodytree input[name=fullname]').addClass('border-success')

        }
    })
    $('.stepbodytree input[name=email]').keyup(function () {
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!regex.test($('.stepbodytree input[name=email]').val())) {
            $('.stepbodytree input[name=email]').addClass('border-danger')
        } else {
            $('.stepbodytree input[name=email]').removeClass('border-danger')
            $('.stepbodytree input[name=email]').addClass('border-success')
        }
    })
    $('.stepbodytree input[name=password]').keyup(function () {
        var regex = /^[a-zA-Z0-9_-]{8,15}$/;
        if (regex.test($('.stepbodytree input[name=password]').val())) {
            $('.stepbodytree input[name=password]').removeClass('border-danger')
            $('.stepbodytree input[name=password]').addClass('border-success')
        } else {
            $('.stepbodytree input[name=password]').addClass('border-danger')
        }

    })

</script>


@include('client.Layout.Footer')
