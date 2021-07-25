@include('Client.Layout.Header')
<!-- START HOME -->
<link rel="stylesheet" href="/Client/css/Wizard.css">

<section class="bg-home-2 align-items-center d-flex" id="home">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="text-center">
                    <h1 class="display-5 fw-normal text-white"> OK Exchange<span class="fw-bold"
                            style="color:#ffed1b; text-shadow: 0px 0px 10px #ffed1b;  ">Ecms</span>
                    </h1>

                    <p class="home-desc text-light mt-4">A digital web design studio creating modern & engaging
                        online. Separated they live in Bookmarksgrove
                        right the Semantics, a large language ocean.</p>
                    <!--Exchange-->
                    <div class=" mt-4 p-3 row ">
                        <!--tab button-->
                        <div class="card  border-0 shadow-white p-4 my-2 ">
                            <!--Sell ​​to site-->
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
                                                <input value="" id="amount_1" data-currency="bitcoin" type="text"
                                                    class="form-control rounded bg-light text-dark border-0 w-100 you-spend">
                                                {{-- <div class="input-group-append ">
                                                        <button class="btn btn-primary btn-exchange"  type="button" data-toggle="modal" data-target="#YouSpend" id="coinName"> BTC</button> --}}
                                                <div class="input-group-append">
                                                    <div class="btn btn-primary btn-exchange  border-0" type="button"
                                                        data-toggle="modal" data-target="#YouSpend">
                                                        <img id="currency_id"
                                                            src="data:image/png;base64,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"
                                                            width="20" height="20">
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="input-group">
                                                <label>You Receive</label>
                                                <input id="amount_2" type="text"
                                                    class="form-control rounded bg-light text-dark border-0 w-100 you-receive"
                                                    value="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary btn-exchange border-0" type="button"
                                                        data-toggle="modal" data-target="#ModalReceive">USD</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-lg-6  exchange-table">
                                    <div class="card bg-light text-white border-0 h-100 ">
                                        <div class="card-body p-4 pb-3">
                                            <table class=" float-end">
                                                <tbody class="text-dark ">
                                                    <tr>
                                                        <td dir="ltr" class="pr-0 font-weight-500 position-relative">
                                                            <span id="coin-rate">

                                                            </span> <span> $</span>
                                                        </td>
                                                        <td class="pl-0 ">
                                                            Exchange rate
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pr-0 font-weight-500"><span class="coin-name">
                                                            </span></td>
                                                        <td class="pl-0">
                                                            Coin Name
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pr-0 font-weight-500"><span>instantaneous</span></td>
                                                        <td class="pl-0">
                                                            estimated time
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pr-0 font-weight-500 position-relative coin-status">
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
                            <!--Purchase the site-->
                            <div class="card-body d-none justify-content-center align-content-center row  exchange"
                                id="Purchase-body">
                                <div class="col-12 col-sm-12 col-lg-6">
                                    <div
                                        class="card bg-transparent border-0  d-flex justify-content-center align-content-center row ">

                                        <div class="card-body  d-flex justify-content-center  row">
                                            <div class="input-group">
                                                <label>You Receive</label>
                                                <input id="amount_4" type="text"
                                                    class="form-control rounded bg-light text-dark border-0 w-100 you-receive"
                                                    value="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary btn-exchange border-0" type="button"
                                                        data-toggle="modal" data-target="#ModalReceive">USD</button>
                                                </div>
                                            </div>
                                            <div class="input-group">
                                                <label>You Spend</label>
                                                <input value="" id="amount_3" data-currency="bitcoin" type="text"
                                                    class="form-control rounded bg-light text-dark border-0 w-100 you-spend">
                                                {{-- <div class="input-group-append ">
                                                        <button class="btn btn-primary btn-exchange"  type="button" data-toggle="modal" data-target="#YouSpend" id="coinName"> BTC</button> --}}
                                                <div class="input-group-append">
                                                    <div class="btn btn-primary btn-exchange  border-0" type="button"
                                                        data-toggle="modal" data-target="#YouSpend">
                                                        <img id="currency_id_2"
                                                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAKTklEQVR4AdXBC5DcdWEA4O/3++/dZZNsyDuwRzBEQUQKCgocGYHWKnpUoo7YOo5Tx860dujOOL6qeDpW56bT6WOK23F0nGmtWgcFtULlKlqqFkmQR6zyskCBwm0SyHuP7GVv9//r5XEQks3z9iJ+X3ACNarliJOwCAswy167sB1bsLVYqbWcIMEMaVTLJi3GAFbhApyFxehB9EIJLWzDw1iHNbgdTxYrtWQGBF3UqJZNWoTV+H0MYC6C4zeOX+JG3IDHi5Va0iVBFzSqZZPOwjV4FxaZGTvxfVyH24uVWts0BdPQqJZNWoFP4F2Y48Ro4TZ8GmuLlVpynILj1KiWi7gGH8dCvx678BV8slipbXQcgmPUqJZNOhtfxCoEv35P4BrcUqzUkmOQOQaNajngnbgRZyF4cZiPq9EzNFj66fBIve0oZY5So1qOuBZVzPXik+EynDU0WBoZHqk3HYXMUWhUyxn+Btci8+L2Slw8NFj67vBIfZcjyBxBo1qO+Gt8EMFvhtNx8dBg6dvDI/Wmw8gcRqNaDvgYPoGgi0LffHHBSml8Gyk3A1bgrKHB0neGR+pth5A5jKHB0jvwD8h0WXbmar1v+arsle8WT3mNtP4uJsZ02SvQOzRY+o/hkbpOokNoVMtn4QvoMQNi/wAhCnOWypZfSqthtzBnmZ4rPi87933iknPIek3Th/B2hxB10KiWZ+GLWGQmxIJ4ymtNyTfdJzV32C2efIHsjNV6Lv2s3qtvEZdfapoK+FyjWl6ug+gAjWrZpPfjdaYhLj1XWPQKCrMcKJROFeYtNyUfXUtKdov9A56TT0ib7tcFZfxVo1qODlBwsOW4FsE0FAauFU+9RBrbIN+4Tj56h7y2Vtr+hFi+iJCZko+usUeIYvkiU9K2/5We3aBLrsaXcav9FOynUS2b9FEsMR2ForjsPEImlPplpX7Zy36P1JbGNniBVkPadJ/dwpxlwvyVpuS1taSkSwr4TKNa/lGxUmvap+CFVuIPTVNc8lv0lhwkZEKp3wtkfXquul7acLeUNykUTclH1+iy1+JKfMc+mf0MDZY+jt82bYmdz5C3hdmLyfocUgjCnGXisleLJ7/Gc/KW9n1fkcZquiigPDRY+ufhkXoyKbNPo1ou4Usoma5mXb7+Lu3/+bb2g9eLyy4QSv2OSYiyl79dLF8kNTZLO/4PSRf045bhkXrNpOh5b8LJuizt3KR9/9ccl9gjLr9U71Vf0/uWrwonvUQXFPAe+0TPeyeCGRBK/TpJ2x7TvPEqrZ9+Vv7EbTTHdBbE0y7X+46bxFNeqwve2qiW+0wqmNSoluficjMk9g/oJB+9Q77hHvmGe1j3BaG4UDxjtcKr3y+UTnWgUFys581f0vzmldLYqGk4Fa/G2miv87HQTOgtCUvO0Uk+usb+UmOL9i/+SfObg/KnbtdJmL1E4fz3m6aI15sU7TWAaAbExa8Q+uY7SN6Sr79LJ6mx2cQPP0izrpN42uXEgmlaZVK01wVmSCxfTIgOlHY8IY2NOpT0bE2+9VEdzVpA1meazm1Uy1lsVMsmnW2GxP4BneSja0nJIcUeYdYCHU3sJJ8wTUuxJKIPZTOhZ46w5Byd5BvXITiUbOWbhHnLdZI2P0S7aZoKWF7ASZhrBsTFZwt983VSWDUke9lb5LU75Zvul+qjTOwUiovElW9UOPd9hKiT9iM36YKAkwsoIZoBsXwRIeok9M0XTrtMPO0yz0mJEBxOvuEe7Ydv1iXzC+hDMANi/yWOSQgOJ1//MxP//qe0d+mSWQVEM6FntrDsPJ20f/UtCrPEZecLc09GcDjp2Y1aPxnSfuz75G3dVMAuMyAuPlvoPclB2k2tn/2ttP0JYkFYeKZsxe/KznybsPAMBAcKc5bKzvsj+cafS2M1XbQroo62LovliwnBgVL9SWnHU/bIW9KmB7Tu/pxd179R83vvk7Y+7GBBLF+s963fEOYs00XbI7ajocti/yU6yWs/I7UdJJ+QP3ar5rfeJh9do5Mwf6XCwLUIuiBhfcQ41uumwixx2at0ko+ucThpfKuJH32M1rhOspe+WSgu0AUtPBWLlVrCQ6YhLDxTPP0NwuylhEz2ktfTN89B2k35hnscSdr2mFQf1VHPHKF0qi7YhKcL9lqH1Y5LULjww7KXXcnEs9JYTSgtR3CgtONJqf6UIyr00TvXDPtlsVJrFex1BxKCYxTmr5Ct+B179MwRFpzhUPKn15G3HUl2+hXC7KU6au+SxjbogjtMKtjrLuzASY5Rdva7KRQdjeylg8K80+Sja+Ub7pE2Pyg1tpA3EYRZC2Vnrla48EOEoJN886+kxibTlOM2kwomFSu1bY1q+XZc6ViESLMuf+aX4sIzyfocVmG2eMqF4ikX2iPlNMek5hgxE2YtIOt1OPkjN5Ny07QRd5tU8LwbcKVjkXKtu6/j7uuE4kJh2QVi/4Ds1FXCopcTexxWiPTNE/rmORpp5zPaD3xdF/xbsVJrmFTwvJuxCYsdh9TYIj3+A/njP9BCXPoqvVffRMh0RWpr/fhaaXybaWrjK/YpeN4WfAPX6IKw4KWEzJSJ2z5it7j8dbKVbyLrdbRSs671k09qP3qLLvg51ton2qdYqZn0eezUBbF/wHOadflj39d+4Ota//UpUtuUtPlB+VO3SzuelHZtp92kNS7t2i5tekDr3s9rXv8G7Ydu0AUJ1xUrtZZ9Cl7oQXwT7zUdIYjli0zJt/xKGt9it7D0VRSKprTurmo//F2yHrJZQqGPlKR2k4mdpLYuuh832k+0n2KlljCMbaYhzO0X5p1mSj56JynZLfYPeE5qy2t32qM9QbMu7dwkNTbTrJPauijHZ4qVWsN+ooM9gr8zDXHJOUim5LU19ghRLF9kStr2mPTsBifIrfiOA2QOMDxSNzRYuhdXoOw4pO2Paz98k/TMfYxvlj90A61xYfYSPRd/lKzHbvmj35M//kMnwFa8s1ipPe0AUQfFSm0Mf4y645G3pK2PaD94vYnbPiKNb7VHzLQf/Z60/QnyCfnoGidAjj/HQzooOLR78UF8EVEXpLH1Jn74AUImnPQSaefTToAv4x+LlZpOMocwPFI3NFj6OUq4RFclxrfSbpphP8Z7ipXaLoeQOYzhkXoaGiz9J1bgPL9Z1uGqYqW2zWFkjmB4pJ4PDZZuwek412+GdbiyWKltdASZozA8Um8PDZZuxgK8BsGL121YXazUnnYUMkdpeKSeDw2WbsUWXIYeLy5tfAnvLVZq2x2lzDEYHqmnocHSnfgJBrDEi8Mm/Bn+slipNR2D4Dg1quUF+BT+BEW/Hm3cjA8XK7VHHYdgGhrVcsD5+AtcgYITI+FefBojxUqt7TgFXdColiNW4QN4M4pmRgt34u9xc7FS22Wagi5qVMsBp+MPcDXORq/paeNJ/Cv+BeuKlVpblwQzpFEtR6zE5ViFC7ACsxERvFBCQhM1/DfuwI/wi2Kl1jQDghOkUS2bNAfLcAoWooiIcWzD01iP7cVKLXcC/D+RSZixVou13gAAAABJRU5ErkJggg=="
                                                            width="20" height="20">
                                                    </div>
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
                                                            <span id="coin-rate-2">

                                                            </span> <span> $</span>
                                                        </td>
                                                        <td class="pl-0 text-right">
                                                            Exchange rate
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pr-0 font-weight-500"><span class="coin-name-2">
                                                            </span></td>
                                                        <td class="pl-0">
                                                            Coin Name
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pr-0 font-weight-500"><span>instantaneous</span></td>
                                                        <td class="pl-0">
                                                            estimated time
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pr-0 font-weight-500 position-relative coin-status">
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
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" id="watchvideomodal" data-keyboard="false" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog modal-lg">
            <div class="modal-content home-modal">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <video id="VisaChipCardVideo" class="video-box" controls>
                    <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
                    <!--Browser does not support <video> tag -->
                </video>
            </div>
        </div>
    </div>
</section>
<!-- END HOME -->

<!-- START SERVICES -->
<section class="section" id="services">

    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-lg-8 ">
                <div class="heading-box text-center">
                    <h3 class="heading-title fw-normal">Our many years of experience in business make us expers
                        at
                        <span class="fw-bold">Best Web Services For Effective Business</span> your life and into
                        your business.
                    </h3>

                    <p class="heading-desc text-muted mt-4">We craft digital, graphic and dimensional thinking,
                        to
                        create category leading brand
                        experiences that have meaning and add a value for our clients.</p>
                </div>

            </div>

        </div>
        <!--card SERVICES--->
        <div class="row mt-5 pt-4">
            <div class="col-lg-4">
                <div class="services-box  border-primary rounded-2  text-center hover-effect mt-4">
                    <div class="services-icon">
                        <i class="pe-7s-network"></i>
                    </div>

                    <h5 class="mt-4 pt-1">Digital Design</h5>
                    <p class="text-muted mt-4 mb-0">Some quick example text to build on the card title and bulk
                        the card's content Moltin gives you platform.</p>

                    <div class="mt-4">
                        <a href="" class="text-primary">Read More <i class="mdi mdi-arrow-right ms-1"></i></a>
                    </div>


                </div>
            </div>

            <div class="col-lg-4">
                <div class="services-box text-center rounded-2 shadow-poper-2 border-primary hover-effect mt-4">
                    <div class="services-icon">
                        <i class="pe-7s-server"></i>

                    </div>

                    <h5 class="mt-4 pt-1">Strategy Solutions</h5>
                    <p class="text-muted mt-4 mb-0">Separated they live in Bookmark sgrove right at the coast of
                        the Semtics langu ocean necessary regelialia.</p>

                    <div class="mt-4">
                        <a href="" class="text-primary">Read More <i class="mdi mdi-arrow-right ms-1"></i></a>
                    </div>


                </div>
            </div>

            <div class="col-lg-4">
                <div class="services-box text-center rounded-2  border-primary hover-effect mt-4">
                    <div class="services-icon">
                        <i class="pe-7s-add-user"></i>

                    </div>

                    <h5 class="mt-4 pt-1">Awesome Support</h5>
                    <p class="text-muted mt-4 mb-0">It is a paradisematic country sentences, in which roasted
                        parts
                        of
                        into your mouth leave for the World.</p>

                    <div class="mt-4">
                        <a href="" class="text-primary">Read More <i class="mdi mdi-arrow-right ms-1"></i></a>
                    </div>


                </div>
            </div>
        </div>
    </div>
</section>
<!-- END SERVICES -->


<!-- START FEATURES -->
<section class="section bg-light" id="features">
    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-8">

                <div class="heading-box text-center">
                    <h3 class="heading-title"><span class="fw-normal">The Features that </span> we present</h3>
                    <p class="heading-desc text-muted mt-3">We craft digital, graphic and dimensional thinking,
                        to
                        create category leading brand
                        experiences that have meaning and add a value for our clients.</p>
                </div>

            </div>

        </div>


        <div class="row mt-5 pt-4 align-items-center">

            <div class="col-lg-5">
                <div class="mt-4">
                    <div class="mt-4">
                        <h3><span class="fw-normal">We love make things </span>amazing and simple</h3>
                        <p class="text-muted mt-3">Separated they live in Bookmarksgrove right at the coast of
                            the
                            Semantics, a large language ocean.</p>
                    </div>

                    <div class="mt-4 pt-3">
                        <div class="d-flex">
                            <div class="features-count">
                                <h5 class="f-14 text-primary">01</h5>
                            </div>

                            <div class="flex-1 ps-3">
                                <h5 class="f-18 mt-1">Marketing Performance</h5>
                                <p class="text-muted mt-2">Separated they live in Bookmarksgrove right at the
                                    coast
                                    the
                                    Semantics,
                                    a large language ocean. A small river
                                    name Duden flows by regelialia.</p>
                            </div>
                        </div>

                        <div class="d-flex mt-3">
                            <div class="features-count">
                                <h5 class="f-14 text-primary">02</h5>
                            </div>

                            <div class="flex-1 ps-3">
                                <h5 class="f-18 mt-1">Marketing business</h5>
                                <p class="text-muted mt-2 mb-0">Separated they live in Bookmarksgrove right
                                    at the coast of the Semantics, a large language ocean publishing
                                    web page editors now.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 offset-lg-1">
                <div class="mt-4 p-4">

                    <img src="/client/images/features/img-1.png" class="img-fluid" alt="">

                </div>
            </div>

        </div>


        <div class="row mt-5 pt-4 align-items-center">

            <div class="col-lg-6">
                <div class="mt-4 p-4">
                    <img src="/client/images/features/img-2.png" class="img-fluid" alt="">
                </div>
            </div>

            <div class="col-lg-5 offset-lg-1">
                <div class="mt-4">
                    <h3><span class="fw-normal">Creative solutions to </span> expand your business!</h3>
                    <p class="text-muted mt-3">Separated they live in Bookmarksgrove right at the coast of the
                        Semantics, a large language ocean.</p>
                </div>

                <div class="mt-4 pt-3">
                    <div class="d-flex">
                        <div class="features-icon">
                            <i class="pe-7s-display2 text-primary"></i>
                        </div>

                        <div class="flex-1 ps-3">
                            <h5 class="f-18 mt-1">We put a lot of effort in design.</h5>
                            <p class="text-muted mt-2">Some quick example text to build on the card title and
                                make
                                up the bulk
                                of the card's content. Moltin gives platform web sites still in their infancy.
                            </p>
                        </div>
                    </div>

                    <div class="d-flex mt-3">
                        <div class="features-icon">
                            <i class="pe-7s-date text-primary"></i>
                        </div>

                        <div class="flex-1 ps-3">
                            <h5 class="f-18 mt-1">Submit Your Orgnization.</h5>
                            <p class="text-muted mt-2">Credibly brand standards compliant on users without
                                extensible services.
                                Anibh euismod tincidunt laoreet Ipsum combined with a passage.</p>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>
<!-- END FEATURES -->

<!-- START NEWS -->
<section class="section-sm bg-primary m-4 rounded-2 ">
    <div class="color-overlay bg-primary rounded-2 shadow-poper">
        <h3 class="text-white text-center">News</h3>
    </div>
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3  g-4">
            <div class="col">
                <div class="card h-100 rounded-2 shadow-white p-2">
                    <div class="card-body rounded-2">
                        <h5 class="card-title title-news">Physical visa and master card for you!</h5>
                        <p>26 Oct 2018</p>
                        <p class="card-text fs-6">It's our new service! we provide physical visa and master card for
                            you to use it in websites or in markets or</p>
                    </div>
                    <a href="#" class="btn btn-primary rounded-2">READ MORE</a>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 rounded-2 shadow-white p-2">
                    <div class="card-body rounded-2">
                        <h5 class="card-title title-news">Money transfer from your country to other country</h5>
                        <p>26 Oct 2018</p>
                        <p class="card-text fs-6">Our new service helps you to transfer your money to other cities
                            in another country fast and safe</p>
                    </div>
                    <a href="#" class="btn btn-primary rounded-2">READ MORE</a>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 rounded-2 shadow-white p-2">
                    <div class="card-body rounded-2">
                        <h5 class="card-title title-news">Crypto signals</h5>
                        <p>26 Oct 2018</p>
                        <p class="card-text fs-6">Crypto Finds a Friendly EU Island in the Sun</p>
                    </div>
                    <a href="#" class="btn btn-primary rounded-2 ">READ MORE</a>

                </div>
            </div>

        </div>
    </div>
</section>
<!-- END NEWS -->


<!-- START CLENT -->
<section class="section bg-light" id="client">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="heading-box text-center">
                    <h3 class="heading-title"><span class="fw-normal">What they say about us</span>
                        honest reviews</h3>
                    <p class="heading-desc text-muted mt-3">The Big Oxmox advised her not to do so, because
                        there
                        were thousands
                        of bad Commas, wild Question Marks and devious Semikoli.</p>
                </div>
            </div>
        </div>


        <div class="row mt-5 pt-4">
            <div class="col-lg-12">
                <div class="client-slider pb-5">


                    <div>
                        <!--feedback kind-->
                        <div class="bg-white client-desc mt-4">

                            <div class="d-flex">
                                <div class="testi-icon me-3">
                                    <i class="mdi mdi-format-quote-open text-primary"></i>
                                </div>
                                <div class="flex-1">
                                    <p class="text-muted mb-0">“I've learned that and people will forget what
                                        you
                                        said,
                                        people
                                        will a forget what you did, but people will
                                        never aliquam in nunc quis
                                        tincidunt forgeta in how you never forget how donec in efficitur lectus,
                                        them feel.”
                                    </p>

                                    <div class="mt-3">
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i>
                                            </li>
                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i>
                                            </li>
                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i>
                                            </li>
                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i>
                                            </li>
                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="client-user mt-5 d-flex">
                            <div class="client-img pe-3">
                                <img src="/client/images/users/img-1.jpg" class="img-fluid rounded-circle" alt="">
                            </div>
                            <div class="flex-1">
                                <h5 class="f-18 mb-0">Brandon Carney</h5>
                                <p class="text-muted mb-0">- Designer</p>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="bg-white client-desc mt-4">

                            <div class="d-flex">
                                <div class="testi-icon me-3">
                                    <i class="mdi mdi-format-quote-open text-primary"></i>
                                </div>
                                <div class="flex-1">
                                    <p class="text-muted mb-0">“Our task must be to free ourselves by widening
                                        our
                                        circle
                                        of comsion to embrace all living creatures and the whole of quis
                                        consectetur
                                        nunc sit
                                        amet semper justo. scelerisque
                                        and its beauty.”
                                    </p>

                                    <div class="mt-3">
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i>
                                            </li>
                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i>
                                            </li>
                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i>
                                            </li>
                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="client-user mt-5 d-flex">
                            <div class="client-img pe-3">
                                <img src="/client/images/users/img-2.jpg" class="img-fluid rounded-circle" alt="">
                            </div>
                            <div class="flex-1">
                                <h5 class="f-18 mb-0">Jeremiah Eskew</h5>
                                <p class="text-muted mb-0">- Developer</p>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="bg-white client-desc mt-4">

                            <div class="d-flex">
                                <div class="testi-icon me-3">
                                    <i class="mdi mdi-format-quote-open text-primary"></i>
                                </div>
                                <div class="flex-1">
                                    <p class="text-muted mb-0">“I've learned that and people will forget what
                                        you
                                        said,
                                        people
                                        will a forget what you did, but people will
                                        never aliquam in nunc quis
                                        tincidunt forgeta in how you never forget how donec in efficitur lectus,
                                        them feel.”
                                    </p>

                                    <div class="mt-3">
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i>
                                            </li>
                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i>
                                            </li>
                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="client-user mt-5 d-flex">
                            <div class="client-img pe-3">
                                <img src="/client/images/users/img-3.jpg" class="img-fluid rounded-circle" alt="">
                            </div>
                            <div class="flex-1">
                                <h5 class="f-18 mb-0">William Alderman</h5>
                                <p class="text-muted mb-0">- CEO</p>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="bg-white client-desc mt-4">

                            <div class="d-flex">
                                <div class="testi-icon me-3">
                                    <i class="mdi mdi-format-quote-open text-primary"></i>
                                </div>
                                <div class="flex-1">
                                    <p class="text-muted mb-0">“Our task must be to free ourselves by widening
                                        our
                                        circle
                                        of comsion to embrace all living creatures and the whole of quis
                                        consectetur
                                        nunc sit
                                        amet semper justo. scelerisque
                                        and its beauty.”
                                    </p>

                                    <div class="mt-3">
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i>
                                            </li>
                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i>
                                            </li>
                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i>
                                            </li>
                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i>
                                            </li>
                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="client-user mt-5 d-flex">
                            <div class="client-img pe-3">
                                <img src="/client/images/users/img-4.jpg" class="img-fluid rounded-circle" alt="">
                            </div>
                            <div class="flex-1">
                                <h5 class="f-18 mb-0">Zachary Tevis</h5>
                                <p class="text-muted mb-0">- Manager</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>


        <div class="text-center">
            <a href="#" class="btn btn-primary rounded-2">READ MORE</a>
        </div>
    </div>
</section>
<!-- END CLIENT -->

<!-- START CLIENT LOGO -->
<section class="section pt-0 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <h3 class="fw-normal">More than <span class="fw-bold">46,000+</span> companies trust
                        socialup
                    </h3>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-lg-3">
                <div class="client-images mt-4">
                    <img src="/client/images/clients/img-1.png" alt="logo-img" class="mx-auto img-fluid d-block">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="client-images mt-4">
                    <img src="/client/images/clients/img-2.png" alt="logo-img" class="mx-auto img-fluid d-block">
                </div>
            </div>
            <div class="col-lg-3 ">
                <div class="client-images mt-4">
                    <img src="/client/images/clients/img-3.png" alt="logo-img" class="mx-auto img-fluid d-block">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="client-images mt-4">
                    <img src="/client/images/clients/img-4.png" alt="logo-img" class="mx-auto img-fluid d-block">
                </div>
            </div>




        </div>

    </div>
</section>
<!-- END LOGO -->

<!-- START PRICING -->
<section class="section" id="pricing">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-lg-8">

                <div class="heading-box text-center">
                    <h3 class="heading-title"><span class="fw-normal">Start your creative project </span> with
                        the
                        right plans</h3>
                    <p class="heading-desc text-muted mt-3">Call to action pricing table is really crucial to
                        your
                        for your business website.
                        Make your bids stand-out with amazing options.</p>
                </div>

            </div>

        </div>

        <div class="row mt-5 pt-4">
            <div class="col-lg-4">
                <div class="pricing-box bg-white text-center mt-4 hover-effect">
                    <div class="pricing-plan">
                        <h5 class="mb-0">Free Plan</h5>
                    </div>
                    <div class="pricing-price bg-light">
                        <h1 class="mb-1">$79</h1>
                        <p class="text-uppercase text-muted f-13 mb-0">Billing Per Month</p>
                    </div>

                    <div class="pricing-features">
                        <div>
                            <p>Up to <span class="fw-bold">10</span> Users</p>
                            <p><span class="fw-bold">5</span> Projects</p>
                            <p><span class="fw-bold">Free</span> Update</p>
                            <p><span class="fw-bold">10GB</span> Storage</p>
                            <p><span class="fw-bold">1</span> Domain Name</p>
                            <p><span class="fw-bold">2</span> Month pcense</p>
                            <p><span class="fw-bold">24/7</span> Support</p>
                        </div>

                        <div class="mt-4 pt-2">
                            <a href="" class="btn btn-primary">Start with Wizous</a>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-4">
                <div class="pricing-box bg-white text-center mt-4 hover-effect">
                    <div class="pricing-lable">
                        <span class="lable-name text-uppercase">Popular</span>
                    </div>
                    <div class="pricing-plan">
                        <h5 class="mb-0">Basic Plan</h5>
                    </div>
                    <div class="pricing-price bg-light">
                        <h1 class="mb-1">$129</h1>
                        <p class="text-uppercase text-muted f-13 mb-0">Billing Per Month</p>
                    </div>

                    <div class="pricing-features">
                        <div>
                            <p>Up to <span class="fw-bold">10</span> Users</p>
                            <p><span class="fw-bold">5</span> Projects</p>
                            <p><span class="fw-bold">Free</span> Update</p>
                            <p><span class="fw-bold">10GB</span> Storage</p>
                            <p><span class="fw-bold">1</span> Domain Name</p>
                            <p><span class="fw-bold">2</span> Month pcense</p>
                            <p><span class="fw-bold">24/7</span> Support</p>
                        </div>

                        <div class="mt-4 pt-2">
                            <a href="" class="btn btn-primary">Start with Wizous</a>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-4">
                <div class="pricing-box bg-white text-center mt-4 hover-effect">
                    <div class="pricing-plan">
                        <h5 class="mb-0">Premium Plan</h5>
                    </div>
                    <div class="pricing-price bg-light">
                        <h1 class="mb-1">$249</h1>
                        <p class="text-uppercase text-muted f-13 mb-0">Billing Per Month</p>
                    </div>

                    <div class="pricing-features">
                        <div>
                            <p>Up to <span class="fw-bold">10</span> Users</p>
                            <p><span class="fw-bold">5</span> Projects</p>
                            <p><span class="fw-bold">Free</span> Update</p>
                            <p><span class="fw-bold">10GB</span> Storage</p>
                            <p><span class="fw-bold">1</span> Domain Name</p>
                            <p><span class="fw-bold">2</span> Month pcense</p>
                            <p><span class="fw-bold">24/7</span> Support</p>
                        </div>

                        <div class="mt-4 pt-2">
                            <a href="" class="btn btn-primary">Start with Wizous</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- END PRICING -->
<!--START model Exchange-->
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
<!--END model Exchange-->    
    <!-- START CTA -->
    <div class="section-sm bg-cta" id="contact">
        <div class="color-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-lg-8">

                    <div class="heading-box text-white text-center">
                        <h3 class="heading-title">Let's Get Started</h3>
                        <p class="heading-desc text-white-50 mt-3">Far far away, behind the word mountains, far from
                            the
                            countries Vokalia and Consonantia,
                            there suspendisse suscipit sapien sit amet live the blind texts.</p>

                        <div class="mt-4">
                            <a href="" class="btn btn-primary">Get Started <i class="mdi mdi-arrow-right ps-1"></i></a>
                        </div>

                        <p class="mt-4 mb-0">Have a question? Give us a call 347-776-3316</p>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- END CTA -->


    <script>
        /****js model exhange*** */
        function change_coin(icon, name, price, status) {

            $('#currency_id').attr('src', `data:image/png;base64,${icon}`);
            $('#currency_id_2').attr('src', `data:image/png;base64,${icon}`);
            $('#coin-rate').text(price);
            $('#coin-rate-2').text(price);
            if (status == 1) {
                $('.coin-status').html('<span class="text-success">live</span>')
            } else {
                $('.coin-status').html('<span class="text-danger">Not Active</span>')

            }
            if (status == 1) {
                $('.coin-status-2').html('<span class="text-success">live</span>')
            } else {
                $('.coin-status-2').html('<span class="text-danger">Not Active</span>')

            }
            $('.coin-name').text(name)
            const amount_1_input = document.getElementById('amount_1');
            const amount_2_input = document.getElementById('amount_2');
            amount_1_input.value = "";
            amount_2_input.value = "";
            amount_1_input.attributes['data-currency'].value = name;
            $('#closeModal').click();

            $('.coin-name-2').text(name)
            const amount_3_input = document.getElementById('amount_3');
            const amount_4_input = document.getElementById('amount_4');
            amount_3_input.value = "";
            amount_4_input.value = "";
            amount_3_input.attributes['data-currency'].value = name;
            $('#closeModal').click();
        }

        $('#amount_1').keyup(function () {
            const amount_1_input = document.getElementById('amount_1');
            $.ajax({
                url: `https://api.coinstats.app/public/v1/coins/${amount_1_input.attributes['data-currency'].value}`,
                success: function (data) {
                    let quantity = amount_1_input.value;
                    document.getElementById('amount_2').value = Number(quantity * data.coin[
                        'price']).toFixed(2);
                },
                error: function (err) {
                    alert({
                        err
                    });
                }
            });
        });

        $('#amount_3').keyup(function () {
            const amount_3_input = document.getElementById('amount_3');
            $.ajax({
                url: `https://api.coinstats.app/public/v1/coins/${amount_3_input.attributes['data-currency'].value}`,
                success: function (data) {
                    let quantity = amount_3_input.value;
                    document.getElementById('amount_4').value = Number(quantity * data.coin[
                        'price']).toFixed(2);
                },
                error: function (err) {
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
                success: function (data) {
                    $.each(data.currencies, function (i, item) {
                        $("#listingCoin").append(`
                            <button type="button" id="${item.name}" onclick="change_coin('${item.icon}','${item.name}','${item.price}','${item.is_active}')"
                                class="list-group-item d-flex justify-content-between  list-group-item-action ">
                                <div class="d-flex justify-content-between">
                                    <span class="ticker-prog"><img width="30" src="data:image/png;base64,${item.icon}"
                                            alt=""></span>
                                    <span class="px-2 d-flex">
                                        ${item.name.charAt(0).toUpperCase() + item.name.slice(1)}
                                    </span>
                                </div> 

                            </button> `)

                    });
                }

            });
        });

        $(document).ready(() => {
            document.getElementById('amount_3').value = "";
            document.getElementById('amount_4').value = "";
            $.ajax({
                url: '/api/currency',
                success: function (data) {
                    $.each(data.currencies, function (i, item) {
                        $("#listingCoin").append(`
                            <button type="button" id="${item.name}" onclick="change_coin('${item.icon}','${item.name}','${item.price}','${item.is_active}')"
                                class="list-group-item d-flex justify-content-between  list-group-item-action ">
                                <div class="d-flex justify-content-between">
                                    <span class="ticker-prog"><img width="30" src="data:image/png;base64,${item.icon}"
                                            alt=""></span>
                                    <span class="px-2 d-flex">
                                        ${item.name.charAt(0).toUpperCase() + item.name.slice(1)}
                                    </span>
                                </div> 

                            </button> `)

                    });
                }

            });
        });

    </script>
    @include('client.Layout.Footer')
