@include('client.Layout.Header')

<link rel="stylesheet" href="/Client/css/Wizard.css">
<!-- Wizard Start -->
<section class=" bg-home-2 signup-step-container">
    <div class="container">
        <div class="card border-0 rounded-2 py-3 shadow">
            <div class="card-body">
        <div class="row d-flex justify-content-center">

               
            <div class="col-md-10">
                <div class="card my-5">
                    <div class="card-body wizardstep ">
        
                        <div class="stephead mx-auto align-content-center">
                            <div class="d-flex justify-content-around mb-3">
                                <div class="p-2">step one</div>
                                <div class="p-2 ">step two</div>
                                <div class="p-2">step tree</div>
                            </div>
                            <div class="line  mx-1"></div>
                        </div>
                        <div class="stepbodyone">
                            <div id="step1" class="my-2">
                                <input type="text" class="form-control" placeholder="Username">
                            </div>
                            <div id="step2 " class="my-2">
                                <input type="text" placeholder="password" class="form-control">
                            </div>
                            <div id="step3" class="my-2">
                                <input type="text" placeholder="Goodby" class="form-control">
                            </div>
                            <button id="step-next" class="btn btn-primary"> next</button>
                        </div>
                        <div class="stepbodytwo">
                            <div id="step1" class="my-2">
                                <input type="text" class="form-control" placeholder="Username">
                            </div>
                            <div id="step2 " class="my-2">
                                <input type="text" placeholder="password" class="form-control">
                            </div>
                            <div id="step3" class="my-2">
                                <input type="text" placeholder="Goodby" class="form-control">
                            </div>
                            <div id="step1" class="my-2">
                                <input type="text" class="form-control" placeholder="Username">
                            </div>
                            <div id="step2 " class="my-2">
                                <input type="text" placeholder="password" class="form-control">
                            </div>
                            <div id="step3" class="my-2">
                                <input type="text" placeholder="Goodby" class="form-control">
                            </div>
                            <button id="step-two-next" class="btn btn-primary"> next</button>
                            <button id="step-two-back" class="btn btn-primary"> back</button>
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
                            <button type="submit" class="btn btn-primary"> Fnish</button>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</section>
<!-- Wizard End -->
@include('client.Layout.Footer')
