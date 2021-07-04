
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
                            <label>Toltip One</label>
                            <input type="text" class="form-control" >
                            <div class="invalid-tooltip">
                                Name is required!
                            </div>
                        </div>
                       
                        <div class="form-group position-relative error-l-50">
                            <label>Details</label>
                            <textarea class="form-control" rows="2" ></textarea>
                            <div class="invalid-tooltip">
                                Details are required!
                            </div>
                        </div>
                        <div class="form-group position-relative error-l-50">
                            <label>Toltip Two</label>
                            <input type="text" class="form-control" >
                            <div class="invalid-tooltip">
                                Name is required!
                            </div>
                        </div>
                       
                        <div class="form-group position-relative error-l-50">
                            <label>Details</label>
                            <textarea class="form-control" rows="2" ></textarea>
                            <div class="invalid-tooltip">
                                Details are required!
                            </div>
                        </div>
                        <div class="form-group position-relative error-l-50">
                            <label>Toltip Tree</label>
                            <input type="text" class="form-control" >
                            <div class="invalid-tooltip">
                                Name is required!
                            </div>
                        </div>
                       
                        <div class="form-group position-relative error-l-50">
                            <label>Details</label>
                            <textarea class="form-control" rows="2" ></textarea>
                            <div class="invalid-tooltip">
                                Details are required!
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