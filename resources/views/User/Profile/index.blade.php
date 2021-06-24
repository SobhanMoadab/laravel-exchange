@include('../layout.Header')
@include('../layout.SidebarNav')
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="mb-2">
                    <h1>User Profile</h1>
                    <div class="text-zero top-right-button-container">
                        <button type="button"
                            class="btn btn-lg btn-outline-primary dropdown-toggle dropdown-toggle-split top-right-button top-right-button-single"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            ACTIONS
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">Logout</a>
                            <a class="dropdown-item" href="#">Another action</a>
                        </div>
                    </div>
                    <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                        <ol class="breadcrumb pt-0">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Profile</li>
                        </ol>
                    </nav>
                </div>
                <ul class="nav nav-tabs separator-tabs ml-0 mb-5" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="first-tab" data-toggle="tab" href="#first" role="tab"
                            aria-controls="first" aria-selected="true">PROFILE</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="second-tab" data-toggle="tab" href="#second" role="tab"
                            aria-controls="second" aria-selected="false">About</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="third-tab" data-toggle="tab" href="#third" role="tab"
                            aria-controls="third" aria-selected="false">Payment</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane show active" id="first" role="tabpanel" aria-labelledby="first-tab">
                        <div class="row">
                            <div class="col-12 mb-5">
                                <img class="social-header card-img" src="img/social/header.jpg" />
                            </div>
                            <div class="col-12 col-lg-5 col-xl-4 col-left">
                                <a href="img/profiles/1.jpg" class="lightbox">
                                    <img alt="Profile" src="img/profiles/l-1.jpg"
                                        class="img-thumbnail card-img social-profile-img">
                                </a>

                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="text-center pt-4">
                                            <p class="list-item-heading pt-2">Sarah Cortney</p>
                                        </div>
                                        <p class="mb-3">
                                            I’m a web developer. I spend my whole day, practically every day,
                                            experimenting with HTML, CSS, and JavaScript; dabbling with Python and
                                            Ruby; and inhaling a wide variety of potentially useless information
                                            through a few hundred RSS feeds. I build websites that delight and
                                            inform. I do it well.
                                        </p>

                                        <p class="text-muted text-small mb-2">Location</p>
                                        <p class="mb-3">Nairobi, Kenya</p>

                                        <p class="text-muted text-small mb-2">Responsibilities</p>
                                        <p class="mb-3">
                                            <a href="#">
                                                <span
                                                    class="badge badge-pill badge-outline-theme-2 mb-1">FRONTEND</span>
                                            </a>
                                            <a href="#">
                                                <span
                                                    class="badge badge-pill badge-outline-theme-2 mb-1">JAVASCRIPT</span>
                                            </a>
                                            <a href="#">
                                                <span
                                                    class="badge badge-pill badge-outline-theme-2 mb-1">SECURITY</span>
                                            </a>
                                            <a href="#">
                                                <span
                                                    class="badge badge-pill badge-outline-theme-2 mb-1">DESIGN</span>
                                            </a>
                                        </p>
                                        <p class="text-muted text-small mb-2">Contact</p>
                                        <div class="social-icons">
                                            <ul class="list-unstyled list-inline">
                                                <li class="list-inline-item">
                                                    <a href="#"><i class="simple-icon-social-facebook"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="#"><i class="simple-icon-social-twitter"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="#"><i class="simple-icon-social-instagram"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="card mb-4 d-none d-lg-block">
                                    <div class="card-body">
                                        <h5 class="card-title"><span>Photos</span><a
                                                class="btn-link float-right text-small pt-1" href="#">View All</a>
                                        </h5>
                                        <div class="row social-image-row gallery">
                                            <div class="col-6">
                                                <a href="img/products/marble-cake.jpg">
                                                    <img class="img-fluid border-radius"
                                                        src="img/products/marble-cake-thumb.jpg" />
                                                </a>
                                            </div>
                                            <div class="col-6">
                                                <a href="img/products/parkin.jpg">
                                                    <img class="img-fluid border-radius"
                                                        src="img/products/parkin-thumb.jpg" />
                                                </a>
                                            </div>
                                            <div class="col-6">
                                                <a href="img/products/fruitcake.jpg">
                                                    <img class="img-fluid border-radius"
                                                        src="img/products/fruitcake-thumb.jpg" />
                                                </a>
                                            </div>
                                            <div class="col-6">
                                                <a href="img/products/tea-loaf.jpg">
                                                    <img class="img-fluid border-radius"
                                                        src="img/products/tea-loaf-thumb.jpg" />
                                                </a>
                                            </div>
                                            <div class="col-6">
                                                <a href="img/products/napoleonshat.jpg">
                                                    <img class="img-fluid border-radius"
                                                        src="img/products/napoleonshat-thumb.jpg" />
                                                </a>
                                            </div>
                                            <div class="col-6">
                                                <a href="img/products/magdalena.jpg">
                                                    <img class="img-fluid border-radius"
                                                        src="img/products/magdalena-thumb.jpg" />
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card mb-4 d-none d-lg-block">
                                    <div class="card-body">
                                        <h5 class="card-title">Who to Follow</h5>

                                        <div
                                            class="d-flex flex-row mb-3 pb-3 border-bottom justify-content-between align-items-center">
                                            <a href="#">
                                                <img src="img/profiles/l-2.jpg" alt="Philip Nelms"
                                                    class="img-thumbnail border-0 rounded-circle list-thumbnail align-self-center xsmall" />
                                            </a>
                                            <div class="pl-3 flex-fill">
                                                <a href="#">
                                                    <p class="font-weight-medium mb-0">Philip Nelms</p>
                                                    <p class="text-muted mb-0 text-small">09.08.2019 - 12:45</p>
                                                </a>
                                            </div>
                                            <div>
                                                <a class="btn btn-outline-primary btn-xs" href="#">FOLLOW</a>
                                            </div>
                                        </div>

                                        <div
                                            class="d-flex flex-row mb-3 pb-3 border-bottom justify-content-between align-items-center">
                                            <a href="#">
                                                <img src="img/profiles/l-4.jpg" alt="Mimi Carreira"
                                                    class="img-thumbnail border-0 rounded-circle list-thumbnail align-self-center xsmall" />
                                            </a>
                                            <div class="pl-3 flex-fill">
                                                <a href="#">
                                                    <p class="font-weight-medium mb-0">Mimi Carreira</p>
                                                    <p class="text-muted mb-0 text-small">14.08.2019 - 10:10</p>
                                                </a>
                                            </div>
                                            <div>
                                                <a class="btn btn-outline-primary btn-xs" href="#">FOLLOW</a>
                                            </div>
                                        </div>

                                        <div
                                            class="d-flex flex-row mb-3 pb-3 border-bottom justify-content-between align-items-center">
                                            <a href="#">
                                                <img src="img/profiles/l-3.jpg" alt="Brynn Bragg"
                                                    class="img-thumbnail border-0 rounded-circle list-thumbnail align-self-center xsmall" />
                                            </a>
                                            <div class="pl-3 flex-fill">
                                                <a href="#">
                                                    <p class="font-weight-medium mb-0">Brynn Bragg</p>
                                                    <p class="text-muted mb-0 text-small">23.07.2019 - 16:10</p>
                                                </a>
                                            </div>
                                            <div>
                                                <a class="btn btn-outline-primary btn-xs" href="#">FOLLOW</a>
                                            </div>
                                        </div>

                                        <div
                                            class="d-flex flex-row mb-3 pb-3 border-bottom justify-content-between align-items-center">
                                            <a href="#">
                                                <img src="img/profiles/l-7.jpg" alt="Rasheeda Vaquera"
                                                    class="img-thumbnail border-0 rounded-circle list-thumbnail align-self-center xsmall" />
                                            </a>
                                            <div class="pl-3 flex-fill">
                                                <a href="#">
                                                    <p class="font-weight-medium mb-0">Rasheeda Vaquera</p>
                                                    <p class="text-muted mb-0 text-small">18.07.2019 - 12:00</p>
                                                </a>
                                            </div>
                                            <div>
                                                <a class="btn btn-outline-primary btn-xs" href="#">FOLLOW</a>
                                            </div>
                                        </div>

                                        <div
                                            class="d-flex flex-row mb-3 pb-3 border-bottom justify-content-between align-items-center">
                                            <a href="#">
                                                <img src="img/profiles/l-8.jpg" alt="Mayra Sibley"
                                                    class="img-thumbnail border-0 rounded-circle list-thumbnail align-self-center xsmall" />
                                            </a>
                                            <div class="pl-3 flex-fill">
                                                <a href="#">
                                                    <p class="font-weight-medium mb-0">Esperanza Lodge</p>
                                                    <p class="text-muted mb-0 text-small">13.07.2019 - 13:00</p>
                                                </a>
                                            </div>
                                            <div>
                                                <a class="btn btn-outline-primary btn-xs" href="#">FOLLOW</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="card mb-4 d-none d-lg-block">
                                    <div class="position-absolute card-top-buttons">
                                        <button class="btn btn-header-light icon-button">
                                            <i class="simple-icon-refresh"></i>
                                        </button>
                                    </div>

                                    <div class="card-body">
                                        <h5 class="card-title">Recent Posts</h5>
                                        <div>
                                            <div class="d-flex flex-row mb-3">
                                                <a class="d-block position-relative" href="#">
                                                    <img src="img/products/marble-cake-thumb.jpg" alt="Marble Cake"
                                                        class="list-thumbnail border-0" />
                                                    <span
                                                        class="badge badge-pill badge-theme-2 position-absolute badge-top-right">NEW</span>
                                                </a>
                                                <div class="pl-3 pt-2 pr-2 pb-2">
                                                    <a href="#">
                                                        <p class="list-item-heading">Progressively Maintain
                                                            Extensive Infomediaries</p>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-row mb-3">
                                                <a class="d-block position-relative" href="#">
                                                    <img src="img/products/fruitcake-thumb.jpg" alt="Fruitcake"
                                                        class="list-thumbnail border-0" />
                                                </a>
                                                <div class="pl-3 pt-2 pr-2 pb-2">
                                                    <a href="#">
                                                        <p class="list-item-heading">Assertively Iterate Resource
                                                            Maximizing</p>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-row mb-3">
                                                <a class="d-block position-relative" href="#">
                                                    <img src="img/products/chocolate-cake-thumb.jpg" alt="Chocolate Cake"
                                                        class="list-thumbnail border-0" />
                                                </a>
                                                <div class="pl-3 pt-2 pr-2 pb-2">
                                                    <a href="#">
                                                        <p class="list-item-heading">Podcasting Operational Change
                                                        </p>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-row">
                                                <a class="d-block position-relative" href="#">
                                                    <img src="img/products/fat-rascal-thumb.jpg" alt="Fat Rascal"
                                                        class="list-thumbnail border-0" />
                                                </a>
                                                <div class="pl-3 pt-2 pr-2 pb-2">
                                                    <a href="#">
                                                        <p class="list-item-heading">Manufactured Products</p>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-7 col-xl-8 col-right">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h5 class="mb-4">Form Grid</h5>
            
                                        <form>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Email</label>
                                                    <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4">Password</label>
                                                    <input type="password" class="form-control" id="inputPassword4"
                                                        placeholder="Password">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputAddress">Address</label>
                                                <input type="text" class="form-control" id="inputAddress"
                                                    placeholder="1234 Main St">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputAddress2">Address 2</label>
                                                <input type="text" class="form-control" id="inputAddress2"
                                                    placeholder="Apartment, studio, or floor">
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputCity">City</label>
                                                    <input type="text" class="form-control" id="inputCity">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputState">State</label>
                                                    <select id="inputState" class="form-control">
                                                        <option selected>Choose...</option>
                                                        <option>...</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="inputZip">Zip</label>
                                                    <input type="text" class="form-control" id="inputZip">
                                                </div>
                                            </div>
            
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                                    value="option1">
                                                <label class="form-check-label" for="inlineCheckbox1">1</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                                    value="option2">
                                                <label class="form-check-label" for="inlineCheckbox2">2</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3"
                                                    disabled>
                                                <label class="form-check-label" for="inlineCheckbox3">3 (disabled)</label>
                                            </div>
            
                                            <button type="submit" class="btn btn-primary d-block mt-3">Save</button>
                                        </form>
                                    </div>
                                </div>
            
                        
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="second" role="tabpanel" aria-labelledby="second-tab">
                  <!-- tabs panel two --> 
                    </div>


                    <div class="tab-pane fade" id="third" role="tabpanel" aria-labelledby="third-tab">
                  <!-- tabs panel tree --> 
 
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@include('../layout.Footer')
