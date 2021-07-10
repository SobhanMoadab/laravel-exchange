@include('client.Layout.Header')

<link rel="stylesheet" href="/Client/css/Wizard.css">
<!-- Wizard Start -->
<section class=" bg-home-2 signup-step-container">
    <div class="container">
        <div class="card border-0 rounded-2 py-3 shadow">
            <div class="card-body">
                <div class="row d-flex justify-content-center">

                    <div class="col-md-10">
                        <div class="wizard">
                            <div class="wizard-inner">
                                <div class="connecting-line"></div>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active">
                                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" aria-expanded="true"><span class="round-tab">1 </span></a>
                                    </li>
                                    <li role="presentation" class="disabled">
                                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" aria-expanded="false"><span class="round-tab">2</span></a>
                                    </li>
                                    <li role="presentation" class="disabled">
                                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab"><span class="round-tab">3</span></a>
                                    </li>
                                    <li role="presentation" class="disabled">
                                        <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab"><span class="round-tab">4</span></a>
                                    </li>
                                </ul>
                            </div>
                            <form role="form" action="index.html" class="login-box">
                                @csrf
                                <div class="tab-content" id="main_form">
                                    <div class="tab-pane active" role="tabpanel" id="step1">
                                        <h4 class="text-center">Step 1</h4>
                                        <div class="row">
                                            <div class="col-md-12">

                                                <div class="card rounded-2 border-0 shadow-white p-4 ">
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
                                                                    <i data-feather="moon"></i>Purchase from the site
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
                                                                        <p id="take">Take</p>
                                                                        <input id="test" type="string" class="form-control rounded bg-dark text-white border-0 w-100" aria-label="Text input with dropdown button">
                                                                        <div class="input-group-append">
                                                                            <button class="btn btn-primary dropdown-toggle btn-exchange " type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</button>
                                                                            <div class="dropdown-menu">
                                                                                <a class="dropdown-item" href="#">Action</a>
                                                                                <a class="dropdown-item" href="#">Another action</a>
                                                                                <a class="dropdown-item" href="#">Something else
                                                                                    here</a>
                                                                                <div role="separator" class="dropdown-divider">
                                                                                </div>
                                                                                <a class="dropdown-item" href="#">Separated link</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>



                                                                    <div class="input-group">
                                                                        <p id="give">You</p>
                                                                        <input type="text" class="form-control rounded text-white bg-dark border-0 w-100" aria-label="Text input with dropdown button">
                                                                        <div class="input-group-append">
                                                                            <button class="btn btn-primary dropdown-toggle btn-exchange " type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</button>
                                                                            <div class="dropdown-menu">
                                                                                <a class="dropdown-item" href="#">Action</a>
                                                                                <a class="dropdown-item" href="#">Another action</a>
                                                                                <a class="dropdown-item" href="#">Something else
                                                                                    here</a>
                                                                                <div role="separator" class="dropdown-divider">
                                                                                </div>
                                                                                <a class="dropdown-item" href="#">Separated link</a>
                                                                            </div>
                                                                        </div>

                                                                        <div class="dropdown">
                                                                            <button onclick="myFunction()" class="dropbtn">Dropdown</button>
                                                                            <div id="myDropdown" class="dropdown-content">
                                                                                <a href="#home">Home</a>
                                                                                <a href="#about">About</a>
                                                                                <a href="#contact">Contact</a>
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-12 col-lg-6  exchange-table">
                                                            <div class="card bg-dark text-white h-100 ">
                                                                <div class="card-body p-4 pb-3 justify-content-end">

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <button type="button" class="btn btn-primary w-100 shadow-lg mt-3  next-step "> Exchange & Next</button>
                                                    </div>
                                                    <div class="card-body d-none justify-content-center align-content-center row  exchange" id="Purchase-body">
                                                        <div class="col-12 col-sm-12 col-lg-6">
                                                            <div class="card bg-transparent border-0  d-flex justify-content-center align-content-center row ">

                                                                <div class="card-body  d-flex justify-content-center  row">



                                                                    <div class="input-group">
                                                                        <p id="give">You</p>
                                                                        <input type="text" class="form-control rounded text-white bg-dark border-0 w-100" aria-label="Text input with dropdown button">
                                                                        <div class="input-group-append">
                                                                            <button class="btn btn-primary dropdown-toggle btn-exchange " type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</button>
                                                                            <div class="dropdown-menu">
                                                                                <a class="dropdown-item" href="#">Action</a>
                                                                                <a class="dropdown-item" href="#">Another action</a>
                                                                                <a class="dropdown-item" href="#">Something else
                                                                                    here</a>
                                                                                <div role="separator" class="dropdown-divider">
                                                                                </div>
                                                                                <a class="dropdown-item" href="#">Separated link</a>
                                                                            </div>
                                                                        </div>

                                                                        <div class="dropdown">
                                                                            <button onclick="myFunction()" class="dropbtn">Dropdown</button>
                                                                            <div id="myDropdown" class="dropdown-content">
                                                                                <a href="#home">Home</a>
                                                                                <a href="#about">About</a>
                                                                                <a href="#contact">Contact</a>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="input-group">
                                                                        <p id="take">Take</p>
                                                                        <input type="text" class="form-control rounded bg-dark text-white border-0 w-100" aria-label="Text input with dropdown button">
                                                                        <div class="input-group-append">
                                                                            <button class="btn btn-primary dropdown-toggle btn-exchange " type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</button>
                                                                            <div class="dropdown-menu">
                                                                                <a class="dropdown-item" href="#">Action</a>
                                                                                <a class="dropdown-item" href="#">Another action</a>
                                                                                <a class="dropdown-item" href="#">Something else
                                                                                    here</a>
                                                                                <div role="separator" class="dropdown-divider">
                                                                                </div>
                                                                                <a class="dropdown-item" href="#">Separated link</a>
                                                                            </div>
                                                                        </div>

                                                                        <div class="dropdown">
                                                                            <button onclick="myFunction()" class="dropbtn">Dropdown</button>
                                                                            <div id="myDropdown" class="dropdown-content">
                                                                                <a href="#home">Home</a>
                                                                                <a href="#about">About</a>
                                                                                <a href="#contact">Contact</a>
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-12 col-lg-6  exchange-table">
                                                            <div class="card bg-dark text-white h-100 ">
                                                                <div class="card-body p-4 pb-3 justify-content-end">

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <button type="button" class="btn btn-primary w-100 shadow-lg mt-3  next-step "> Exchange & Next </button>
                                                    </div>

                                                </div>
                                            </div>


                                        </div>
                                        {{-- <ul class="list-inline pull-right">
                                    <li><button type="button" class="default-btn next-step">Continue to next step</button></li>
                                </ul> --}}
                                    </div>
                                    <div class="tab-pane" role="tabpanel" id="step2">
                                        <h4 class="text-center">Step 2</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input class="form-control" type="text" name="name" placeholder=" Name">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Email" aria-label="Email">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-success" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                                                <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
                                                            </svg> Send Email</button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="  col-12 mb-3 text-center align-content-center  ">
                                                <label class="text-center w-100"> Enter Code</label>
                                                <div class="divOuter w-100">
                                                    <div class=" divInner ">
                                                        <input type="text">
                                                    </div>
                                                </div>
                                                <button class="btn mt-3 btn-outline-warning" type="button">Check</button>

                                            </div>


                                        </div>


                                        <ul class="list-inline d-flex justify-content-between">
                                            <li><button type="button" class="default-btn prev-step">Back</button></li>
                                            <li><button type="button" class="default-btn  next-step">Continue</button></li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane" role="tabpanel" id="step3">
                                        <h4 class="text-center">Step 3</h4>
                                        <div class="border-left col-12 my-2"> Information : A color copy of valid passport or other official state ID (e.g. driver's license, identity card, etc). The ID must be valid and contain the client's full name.</div>

                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Account Name *</label>
                                                    <input class="form-control" type="text" name="name" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Information</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile">
                                                        <label class="custom-file-label" for="customFile">Select file</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Number *</label>
                                                    <input class="form-control" type="text" name="name" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Country *</label>
                                                    <select name="country" class="form-control" id="country">
                                                        <option value="NG" selected="selected">Nigeria</option>
                                                        <option value="NU">Niue</option>
                                                        <option value="NF">Norfolk Island</option>
                                                        <option value="KP">North Korea</option>
                                                        <option value="MP">Northern Mariana Islands</option>
                                                        <option value="NO">Norway</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Password *</label>
                                                    <input class="form-control" type="text" name="name" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Repassword *</label>
                                                    <input class="form-control" type="text" name="name" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="list-inline d-flex justify-content-between">
                                            <li><button type="button" class="default-btn prev-step">Back</button></li>

                                            <li><button type="button" class="default-btn next-step">Continue</button></li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane" role="tabpanel" id="step4">
                                        <h4 class="text-center">Step 4</h4>
                                        <div class="all-info-container">
                                            <div class="d-flex justify-content-between align-center">
                                                <div class="card col-3 align-items-center p-4 ">
                                                    paypal
                                                </div>
                                                <div class="card col-3 align-items-center p-4">
                                                    paypal
                                                </div>
                                                <div class="card col-3 align-items-center p-4">
                                                    paypal
                                                </div>

                                            </div>
                                        </div>

                                        <ul class="list-inline d-flex justify-content-between">
                                            <li><button type="button" class="default-btn prev-step">Back</button></li>
                                            <li><button type="button" class="default-btn next-step">Finish</button></li>
                                        </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="{{asset('js/app.js')}}"></script>
<script>
    Echo.channel('price').listen('.App\\Events\\PriceList', (e) => {
        console.log(e);
    });
</script>
<script>
    (function worker() {
        $.ajax({
            url: '/price',
            success: function(data) {
                console.log('success')
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
</script>
<!-- Wizard End-->
@include('client.Layout.Footer')