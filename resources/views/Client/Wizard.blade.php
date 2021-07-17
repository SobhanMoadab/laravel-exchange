@include('client.Layout.Header')

<link rel="stylesheet" href="/Client/css/Wizard.css">
<!-- Toast Css Link -->
<link href="https://cdn.jsdelivr.net/npm/nice-toast-js/dist/css/nice-toast-js.min.css" rel="stylesheet" type="text/css" />
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

<!-- Wizard Start -->

<div class="container">
    <div class="card my-5">
        <div class="card-body wizardstep ">
            <a class=" logo d-flex justify-content-center my-2 " href="#">
                <img src="images/E-cms.png" alt="" height="40">
            </a>
            <div class="stephead mx-auto align-content-center">
                <div class="d-flex justify-content-around mb-3">
                    <div class="p-2 stepOne">quantity</div>
                    <div class="p-2 stepTwo">Invoice confirmation</div>
                    <div class="p-2 stepTree">The final invoice</div>
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

                        <div class="card-body d-flex justify-content-center align-content-center row  exchange" id="sell-body">
                            <div class="col-12 col-sm-12 col-lg-6">
                                <div class="card bg-transparent border-0  d-flex justify-content-center align-content-center row ">

                                    <div class="card-body  d-flex justify-content-center  row">


                                        <div class="input-group">
                                            <label>You Spend</label>
                                            <input value="" id="amount_1" data-currency="bitcoin" type="number" class="form-control rounded bg-light text-dark border-0 w-100 you-spend">
                                            {{-- <div class="input-group-append ">
                                                <button class="btn btn-primary btn-exchange"  type="button" data-toggle="modal" data-target="#YouSpend" id="coinName"> BTC</button> --}}
                                            <div class="input-group-append">
                                                <div class="btn  btn-exchange" type="button" data-toggle="modal" data-target="#YouSpend">
                                                    <img id="currency_id" src="data:image/png;base64,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" width="30" height="30">
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" input-group">
                                            <label>You Receive</label>
                                            <input id="amount_2" type="number" class="form-control rounded bg-light text-dark border-0 w-100 you-receive">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary btn-exchange" type="button" data-toggle="modal" id="sell_to_site_img_icon" data-target="#ModalReceive"></button>
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
                                                    <td class="pr-0 font-weight-500 position-relative"><span class="text-success">live</span>
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
                        <div class="card-body d-none justify-content-center align-content-center row  exchange" id="Purchase-body">
                            <div class="col-12 col-sm-12 col-lg-6">
                                <div class="card bg-transparent border-0  d-flex justify-content-center align-content-center row ">

                                    <div class="card-body  d-flex justify-content-center  row">
                                        <div class="input-group">
                                            <label>You Receive</label>
                                            <input type="text" class="form-control rounded bg-light text-dark border-0 w-100 you-receive" value="0">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary btn-exchange" type="button" data-toggle="modal" data-target="#ModalReceive">USD</button>
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <label>You Spend</label>
                                            <input type="text" class="form-control rounded bg-light text-dark border-0 w-100 you-spend" value="0.00000">
                                            <div class="input-group-append ">
                                                <button class="btn btn-primary btn-exchange" data-toggle="modal" data-target="#YouSpend">BTC</button>
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
                                                    <td class="pr-0 font-weight-500 position-relative"><span class="text-success">live</span>
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
                <div class="stepbodytree">
                    <div id="step1" class="my-2">
                        <input type="text" class="form-control" placeholder="Username">
                    </div>
                    <div id="step2 " class="my-2">
                        <input type="text" placeholder="password" class="form-control">
                    </div>
                    <div id="step3" class="my-2">
                        <input type="text" placeholder="Goodby" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary w-100"> Fnish</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal slide-top" id="YouSpend" tabindex="-1" role="dialog" aria-labelledby="ModalReceiveTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title
                </h5>
            </div>
            <div class="modal-body border-0">
                <button type="submit" class="list-group" id="listingCoin">
            </div>
        </div>
        <div class="modal-footer border-0">
            <button type="button" id="closeModal" class="btn btn-secondary w-100" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>

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

<script src="https://code.jqSuery.com/jquery-3.6.0.min.js"></script>
<script>
    function change_logo(icon, name) {
        $('#currency_id').attr('src', `data:image/png;base64,${icon}`);
        const amount_1_input = document.getElementById('amount_1');
        const amount_2_input = document.getElementById('amount_2');
        amount_1_input.value = "";
        amount_2_input.value = "";
        amount_1_input.attributes['data-currency'].value = name;
        $('#closeModal').click();
    }

    $('#amount_1').keyup(function() {
        const amount_1_input = document.getElementById('amount_1');
        $.ajax({
            url: `https://api.coinstats.app/public/v1/coins/${amount_1_input.attributes['data-currency'].value}`,
            success: function(data) {
                let quantity = amount_1_input.value;
                document.getElementById('amount_2').value = Number(quantity * data.coin['price']).toFixed(2);
            },
            error: function(err) {
                alert({
                    err
                });
            }
        });
    });
    $(document).ready(() => {
        document.getElementById('amount_1').value = "";
        document.getElementById('amount_2').value = "";
        $.ajax({
            url: '/api/currency',
            success: function(data) {
                $.each(data.currencies, function(i, item) {
                    $("#listingCoin").append(`
                            <button type="button" id="${item.name}" onclick="change_logo('${item.icon}','${item.name}')"
                                class="list-group-item d-flex justify-content-between  list-group-item-action ">
                                <div class="d-flex justify-content-between">
                                    <span class="ticker-prog"><img width="30" src="data:image/png;base64,${item.icon}"
                                            alt=""></span>
                                    <span class="px-2 d-flex">
                                        ${item.name.charAt(0).toUpperCase() + item.name.slice(1)}
                                    </span>
                                </div> 
                            </button>
                `)
                })
            }

        })
    })
</script>


@include('client.Layout.Footer')