
@include('Admin.Layout.Header')
@include('Admin.Layout.SidebarNav')
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="mb-4">Edit About Us</h5>
                    <form class="needs-validation tooltip-label-right" novalidate>
                        <div class="form-group position-relative error-l-50">
                            <label>Text Header</label>
                            <textarea class="form-control" rows="4" > 
                                Let's talk about everything!
                                
                                We thrive when coming up with innovative ideas but also understand that a smart concept should be supported with faucibus sapien odio measurable results.
                                </textarea>
                            
                        </div>
                        <div class="form-group position-relative error-l-50">
                            <label>Details Company</label>
                            <textarea class="form-control" rows="6" > 
                                
Email Address

JohnPBeau@jourrapide.com
Contact Number

+112 708-231-9668
Office Address

3429 Gnatty Creek Road Farmingdale, NY 11735

                            </textarea>
                            
                        </div>
                        <div class="form-group position-relative">
                            <label>Form Status </label>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck1"
                                    name="jQueryCheckbox" >
                                <label class="custom-control-label" for="customCheck1"> Your Name </label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck1"
                                    name="jQueryCheckbox" >
                                <label class="custom-control-label" for="customCheck1"> Your Email  </label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck1"
                                    name="jQueryCheckbox" >
                                <label class="custom-control-label" for="customCheck1"> Your Subject </label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck1"
                                    name="jQueryCheckbox" >
                                <label class="custom-control-label" for="customCheck1"> Your message  </label>
                            </div>
                            <div class="invalid-tooltip">
                                Checkboxes are required!
                            </div>
                        </div>


                        <div class="custom-control custom-checkbox mb-3 error-l-200">
                            <input type="checkbox" class="custom-control-input" id="customControlValidation1"
                                >
                            <label class="custom-control-label" for="customControlValidation1">Check this custom
                                checkbox</label>
                            <div class="invalid-tooltip">Check this!</div>
                        </div>
                        <button type="submit" class="btn btn-primary mb-0">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

@include('Admin.Layout.Footer')