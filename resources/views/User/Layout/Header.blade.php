<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="Themesdesign" />

    <link rel="shortcut icon" href="/User/images/favicon.ico">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="/User/css/bootstrap.min.css" type="text/css">

    <!--Material Icon -->
    <link rel="stylesheet" type="text/css" href="/User/css/materialdesignicons.min.css" />

    <!-- Pe-icon-7 icon -->
    <link rel="stylesheet" type="text/css" href="/User/css/pe-icon-7-stroke.css">

    <!-- tinyslider -->
    <link rel="stylesheet" href="/User/css/tiny-slider.css">

    <!-- Custom  Css -->
    <link rel="stylesheet" type="text/css" href="/User/css/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="/Admin/js/vendor/jquery-3.3.1.min.js"></script>
</head>

<body class="bg-light">
    <!-- START  NAVBAR -->
    <nav class="navbar navbar-expand-lg  navbar-white fixed-top navbar-custom sticky sticky-light">
        <div class="container" id="navbar">

            <!-- LOGO -->



            <a class="navbar-brand logo text-uppercase " href="index-1.html">
                <img src="/Client/images/E-cms.png" alt="" height="40">
            </a>
            <div>
                <a href="/login"><button id="nav-btn"
                        class="btn-sm btn-primary mx-1 border-0 bg-transparent">login</button></a>
                <a href="/register"><button class="btn-sm btn-primary mx-1 border-0">register</button></a>
                <button onclick="navPhoneOpen()" class="d-lg-none bg-transparent mx-1 border-0"><i
                        class="bi bi-list text-white" id="nav-phone-icon"></i>
                </button>

            </div>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto" id="navbar-navlist">
                    <li class="nav-item active">
                        <a id="nav-link" class="nav-link  " href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a id="nav-link" class="nav-link " href="/feedback">Feedback</a>
                    </li>
                    <li class="nav-item">
                        <a id="nav-link" class="nav-link" href="/wizard">Wizard</a>
                    </li>
                    <li class="nav-item">
                        <a id="nav-link" class="nav-link " href="/faq">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a id="nav-link" class="nav-link" href="/contactus">ContactUs</a>
                    </li>
                </ul>


            </div>
        </div>


    </nav>
    <div id="nav-phone" class="menu-mobile  d-lg-none">
        <div class="d-flex justify-content-center w-100 p-3 ">
            <button onclick="navPhoneclose()"
                class="justify-content-around flex-column align-content-end bg-transparent border-0">
                <svg viewBox="0 0 24 24" class="i-float_left cursor-pointer" style="width: 34px; height: 34px;">
                    <path fill="#fff"
                        d="M13.46,12L19,17.54V19H17.54L12,13.46L6.46,19H5V17.54L10.54,12L5,6.46V5H6.46L12,10.54L17.54,5H19V6.46L13.46,12Z">
                    </path>
                </svg>
            </button>

            <a class=" logo d-flex flex-direction-column flex-grow-1 flex-row-reverse " href="#">
                <img src="/Client/images/E-cms.png" alt="" height="40">
            </a>
        </div>

        <ul class="navbar-nav ms-auto" id="navbar-navlist">
            <li class="nav-item">
                <a id="nav-link" class="nav-link " href="/">Home</a>
            </li>
            <li class="nav-item">
                <a id="nav-link" class="nav-link " href="/feedback">Feedback</a>
            </li>
            <li class="nav-item">
                <a id="nav-link" class="nav-link" href="/wizard">Wizard</a>
            </li>
            <li class="nav-item">
                <a id="nav-link" class="nav-link " href="/faq">FAQ</a>
            </li>
            <li class="nav-item">
                <a id="nav-link" class="nav-link" href="/contactus">ContactUs</a>
            </li>
        </ul>
    </div>

    <!-- END NAVBAR -->
    <section class="heading">
        <div class="container">
            <div class="text-center mb-5 ">
                <h1 class="display-5 fw-normal text-white">Dashboard <span class="fw-bold text-white"> User Name</span>
                </h1>

            </div>

        </div>
        <nav class="navbar w-100 navbar-expand-lg  ">
            <div class="container bg-white py-3 px-0 rounded-2">

                <div class=" overflow navbar-collapse">
                    <ul class="nav mx-auto nav-user  ">
                        <li class="nav-item">

                            <a class="nav-link-user active " href="/users"> <i class="bi bi-person"></i> Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link-user" href="/users/order"><i class="bi bi-credit-card-2-back-fill"></i>
                                Order</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link-user" href="/users/verify"><i class="bi bi-person-check"></i>
                                verify</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link-user" href="/users/referrals"><i class="bi bi-broadcast"></i>
                                referrals</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link-user" href="/users/setting"><i class="bi bi-gear-wide-connected"></i>
                                Setting</a>
                        </li>
                    </ul>


                </div>
            </div>


        </nav>
    </section>

    <!-- tickers start -->
    <div class="contain-div container-fluid ">
        <div class="row cycle-slideshow" data-cycle-fx=carousel data-cycle-speed="2000" data-cycle-timeout=1
            data-cycle-easing="linear" data-cycle-carousel-fluid=true data-cycle-pause-on-hover="true"
            data-cycle-slides="> div">

            <div class="box">
                <div class="ticker-box">
                    <div class="ticker-date">9/08<span class="ticker-prog"><img width="20"
                                src="/client/images/svg/bitcoin-441959.svg" alt=""></span></div>
                </div>
            </div>
            <div class="box">
                <div class="ticker-box">
                    <div class="ticker-date">9/08<span class="ticker-prog"><img width="20"
                                src="/Client/images/svg/aurouracoin-441945.svg" alt=""></span></div>
                </div>
            </div>
            <div class="box">
                <div class="ticker-box">
                    <div class="ticker-date">9/08<span class="ticker-prog"><img width="20"
                                src="/Client/images/svg/dash-441957.svg" alt=""></span></div>
                </div>
            </div>
            <div class="box">
                <div class="ticker-box">
                    <div class="ticker-date">9/08<span class="ticker-prog"><img width="20"
                                src="/Client/images/svg/devcoin-441952.svg" alt=""></span></div>
                </div>
            </div>
            <div class="box">
                <div class="ticker-box">
                    <div class="ticker-date">9/08<span class="ticker-prog"><img width="20"
                                src="/Client/images/svg/dogecoin-441958.svg" alt=""></span></div>
                </div>
            </div>
            <div class="box">
                <div class="ticker-box">
                    <div class="ticker-date">9/08<span class="ticker-prog"><img width="20"
                                src="/Client/images/svg/etherium-441951.svg" alt=""></span></div>
                </div>
            </div>

        </div>
    </div>

    <!-- tckers End -->
