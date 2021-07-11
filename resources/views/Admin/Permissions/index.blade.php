@include('Admin.Layout.Header')
@include('Admin.Layout.SidebarNav')
<main>
    <div class="container-fluid">
        <div class="row ">
            <div class="col-12">
                <div class="mb-3">
                    <h1>Permission list </h1>
                    <div class="text-zero top-right-button-container">
                        <a  href="#" class="btn btn-primary btn-lg top-right-button mr-1">ADD NEW permisstion</a>

                    </div>
                    <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                        <ol class="breadcrumb pt-0">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">permisstion</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="col-12 my-3">
                <div class="card h-100 overflow-auto">
                    <div class="card-body">
                        <h5 class="card-title">Permission list</h5>
                        <ul class="list-group ">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Cras justo odio
                                <div class="d-flex">
                                    <button class="badge border-0 btn-danger badge-pill" onclick="delFunc()">Delete</button>
                                    <button class="badge border-0 btn-primary badge-pill">Update</button>

                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Cras justo odio
                                <div class="d-flex">
                                    <button class="badge border-0 btn-danger badge-pill" onclick="delFunc()">Delete</button>
                                    <button class="badge border-0 btn-primary badge-pill">Update</button>

                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Cras justo odio
                                <div class="d-flex">
                                    <button class="badge border-0 btn-danger badge-pill" onclick="delFunc()">Delete</button>
                                    <button class="badge border-0 btn-primary badge-pill">Update</button>

                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Cras justo odio
                                <div class="d-flex">
                                    <button class="badge border-0 btn-danger badge-pill" onclick="delFunc()">Delete</button>
                                    <button class="badge border-0 btn-primary badge-pill">Update</button>

                                </div>
                            </li>
                           
                        </ul>
                    </div>
                </div>
            </div>
            <script>
                function delFunc(){
                   swal({
                 title: "Are you sure?",
                 text: "Once deleted, you will not be able to recover this imaginary file!",
                 icon: "warning",
                 buttons: true,
                 dangerMode: true,
               })
               .then((willDelete) => {
                 if (willDelete) {
                   swal("Permissions Delete", {
                     icon: "success",
                   });
                 } else {
                   swal("Your imaginary file is safe!");
                 }
               });
                }
               </script>

        </div>
    </div>
</main>

@include('Admin.Layout.Footer')