@include('Layout/Header')
    <!-- START HOME -->
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




                        <div class=" mt-4 p-3 row ">
                            <!--tab button-->





                            <div class="card rounded-2 border-0 shadow-white p-4 ">
                                <div class="menu-header">
                                    <div class="theme-switcher">
                                        <input type="radio" id="light-theme" name="themes" onclick="tabs(event)"
                                            checked />
                                        <label for="light-theme">
                                            <span>
                                                <i data-feather="sun"></i>Sell ​​to site
                                            </span>
                                        </label>
                                        <input type="radio" id="dark-theme" onclick="tabs(event)" name="themes" />
                                        <label for="dark-theme">
                                            <span>
                                                <i data-feather="moon"></i>Purchase from the site
                                            </span>
                                        </label>
                                        <span class="slider"></span>
                                    </div>
                                </div>

                                <div class="card-body d-flex justify-content-center align-content-center row  exchange">
                                    <div class="col-12 col-sm-12 col-lg-6">
                                        <div
                                            class="card bg-transparent border-0  d-flex justify-content-center align-content-center row ">

                                            <div class="card-body  d-flex justify-content-center  row">


                                                <div class="input-group">
                                                    <p id="take">Take</p>
                                                    <input type="text"
                                                        class="form-control rounded bg-dark text-white border-0 w-100"
                                                        aria-label="Text input with dropdown button">


                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary dropdown-toggle btn-exchange "
                                                            type="button" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">Dropdown</button>
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
                                                    <p id="give">You</p>
                                                    <input type="text"
                                                        class="form-control rounded text-white bg-dark border-0 w-100"
                                                        aria-label="Text input with dropdown button">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary dropdown-toggle btn-exchange "
                                                            type="button" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">Dropdown</button>
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

                                </div>

                                <button class="btn btn-primary w-100 shadow-lg "> exchange</button>
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

                        <img src="images/features/img-1.png" class="img-fluid" alt="">

                    </div>
                </div>

            </div>


            <div class="row mt-5 pt-4 align-items-center">

                <div class="col-lg-6">
                    <div class="mt-4 p-4">
                        <img src="images/features/img-2.png" class="img-fluid" alt="">
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

    <!-- START COUNTER -->
    <section class="section-sm bg-primary m-4 rounded-2 ">
        <div class="color-overlay bg-primary rounded-2 shadow-poper"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="counter-box text-center mt-4 mt-lg-0 text-white">
                        <div class="mt-4">
                            <i class="pe-7s-user display-4"></i>
                        </div>
                        <h1 class="counter_value mt-3" data-target="370">0</h1>
                        <p class="mb-0 mt-2 text-uppercase">Happy Clients</p>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="counter-box text-center mt-4 mt-lg-0 text-white">
                        <div class="mt-4">
                            <i class="pe-7s-download display-4"></i>
                        </div>
                        <h1 class="counter_value mt-3" data-target="208">0</h1>
                        <p class="mb-0 mt-2 text-uppercase">Download</p>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="counter-box text-center mt-4 mt-lg-0 text-white">
                        <div class="mt-4">
                            <i class="pe-7s-smile display-4"></i>
                        </div>
                        <h1 class="counter_value mt-3" data-target="450">0</h1>
                        <p class="mb-0 mt-2 text-uppercase">Happy Users</p>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="counter-box text-center mt-4 mt-lg-0 text-white">
                        <div class="mt-4">
                            <i class="pe-7s-headphones display-4"></i>
                        </div>
                        <h1 class="counter_value mt-3" data-target="500">0</h1>
                        <p class="mb-0 mt-2 text-uppercase">Years of expe</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- END COUNTER -->

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
                                    <img src="images/users/img-1.jpg" class="img-fluid rounded-circle" alt="">
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
                                    <img src="images/users/img-2.jpg" class="img-fluid rounded-circle" alt="">
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
                                    <img src="images/users/img-3.jpg" class="img-fluid rounded-circle" alt="">
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
                                    <img src="images/users/img-4.jpg" class="img-fluid rounded-circle" alt="">
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
                        <img src="images/clients/img-1.png" alt="logo-img" class="mx-auto img-fluid d-block">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="client-images mt-4">
                        <img src="images/clients/img-2.png" alt="logo-img" class="mx-auto img-fluid d-block">
                    </div>
                </div>
                <div class="col-lg-3 ">
                    <div class="client-images mt-4">
                        <img src="images/clients/img-3.png" alt="logo-img" class="mx-auto img-fluid d-block">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="client-images mt-4">
                        <img src="images/clients/img-4.png" alt="logo-img" class="mx-auto img-fluid d-block">
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
    @include('Layout/Footer')
