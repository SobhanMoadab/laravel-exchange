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
                                            <input type="text" class="form-control rounded bg-light text-dark border-0 w-100 you-spend" value="0.00000">
                                            <div class="input-group-append ">
                                                <button class="btn btn-primary btn-exchange " type="button" data-toggle="modal" data-target="#YouSpend">BTC</button>
                                            </div>
                                        </div>



                                        <div class="input-group">
                                            <label>You Receive</label>
                                            <input type="text" class="form-control rounded bg-light text-dark border-0 w-100 you-receive" value="0">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary btn-exchange " type="button" data-toggle="modal" data-target="#ModalReceive">USD</button>
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
                                                <button class="btn btn-primary btn-exchange " type="button" data-toggle="modal" data-target="#ModalReceive">USD</button>
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <label>You Spend</label>
                                            <input type="text" class="form-control rounded bg-light text-dark border-0 w-100 you-spend" value="0.00000">
                                            <div class="input-group-append ">
                                                <button class="btn btn-primary btn-exchange " type="button" data-toggle="modal" data-target="#YouSpend">BTC</button>
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
                <button type="button" class="btn btn-secondary w-100" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/app.js')}}"></script>
<script>
    Echo.channel('price').listen('.App\\Events\\PriceList', (e) => {
        console.log(e);
    });
</script>
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
<!-- Wizard End-->


<!-- End Toast Script -->






<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<script>
    $(document).ready(() => {
      var CoinAPI = "https://api.coinstats.app/public/v1/coins";
      $.getJSON( CoinAPI, {
        tagmode: "any",
        format: "json"
      }).done(function( data ) {
          console.log(data)
        $.each( data.coins, function( i, item ) {
        $( "#listingCoin" ).append(`
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

    $('#listingCoin').on('click', '#coinBtn', function() {
    console.log('salam')

    });
    </script>
@include('client.Layout.Footer')