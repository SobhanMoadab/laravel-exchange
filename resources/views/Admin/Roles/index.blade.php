@include('Admin.Layout.Header')
@include('Admin.Layout.SidebarNav')
<main>
    <div class="container-fluid">
        <div class="row ">
            <div class="col-12">
                <h1> All Roles </h1>
                <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                    <ol class="breadcrumb pt-0">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Roles</li>
                    </ol>
                </nav>
                <div class="separator mb-5"></div>
            </div>
            <div class="col-12 my-3">
                <div class="card h-100 overflow-auto">
                    <div class="card-body">
                        <h5 class="card-title">All Roles</h5>
                        <ul class="list-group ">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Super-Admin
                                <div class="d-flex">
                                    <span class="badge badge-info badge-pill m-1">Update</span>
                                    <span class="badge badge-info badge-pill m-1">Delete</span>
                                    <span class="badge badge-info badge-pill m-1">Create</span>
                                    <span class="badge badge-info badge-pill m-1">Post</span>
                                    <span class="badge badge-info badge-pill m-1">Page</span>

                                </div>
                                <div class="d-flex">
                                    <button class="badge border-0 btn-danger badge-pill" onclick="delFunc()" >Delete</button>
                                    <button class="badge border-0 btn-primary badge-pill">Update</button>

                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Super-Admin
                                <div class="d-flex">
                                    <span class="badge badge-info badge-pill m-1">Update</span>
                                    <span class="badge badge-info badge-pill m-1">Delete</span>
                                    <span class="badge badge-info badge-pill m-1">Create</span>
                                    <span class="badge badge-info badge-pill m-1">Post</span>
                                    <span class="badge badge-info badge-pill m-1">Page</span>

                                </div>
                                <div class="d-flex">
                                    <button class="badge border-0 btn-danger badge-pill" onclick="delFunc()" >Delete</button>
                                    <button class="badge border-0 btn-primary badge-pill">Update</button>

                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Super-Admin
                                <div class="d-flex">
                                    <span class="badge badge-info badge-pill m-1">Update</span>
                                    <span class="badge badge-info badge-pill m-1">Delete</span>
                                    <span class="badge badge-info badge-pill m-1">Create</span>
                                    <span class="badge badge-info badge-pill m-1">Post</span>
                                    <span class="badge badge-info badge-pill m-1">Page</span>

                                </div>
                                <div class="d-flex">
                                    <button class="badge border-0 btn-danger badge-pill" onclick="delFunc()" >Delete</button>
                                    <button class="badge border-0 btn-primary badge-pill">Update</button>

                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Super-Admin
                                <div class="d-flex">
                                    <span class="badge badge-info badge-pill m-1">Update</span>
                                    <span class="badge badge-info badge-pill m-1">Delete</span>
                                    <span class="badge badge-info badge-pill m-1">Create</span>
                                    <span class="badge badge-info badge-pill m-1">Post</span>
                                    <span class="badge badge-info badge-pill m-1">Page</span>

                                </div>
                                <div class="d-flex">
                                    <button class="badge border-0 btn-danger badge-pill" onclick="delFunc()" >Delete</button>
                                    <button class="badge border-0 btn-primary badge-pill">Update</button>

                                </div>
                            </li>
                           

                        </ul>
                    </div>
                </div>
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
    swal("Roles Delete", {
      icon: "success",
    });
  } else {
    swal("Your imaginary file is safe!");
  }
});
 }
</script>

</main>

@include('Admin.Layout.Footer')