
@include('Admin.Layout.Header')
@include('Admin.Layout.SidebarNav')
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="mb-4">Edit </h5>
                    <form class="needs-validation tooltip-label-right" >
                        <div class="form-group position-relative error-l-50">
                            <label>Name</label>
                            <input type="text" class="form-control" required>
                            <div class="invalid-tooltip">
                                Name is required!
                            </div>
                        </div>
                       
                        <div class="form-group position-relative error-l-50">
                            <label>Details</label>
                            <textarea class="form-control" rows="2" required></textarea>
                            <div class="invalid-tooltip">
                                Details are required!
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mb-0">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

@include('Admin.Layout.Footer')