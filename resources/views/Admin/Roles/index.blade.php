@include('Admin.Layout.Header')
@include('Admin.Layout.SidebarNav')
<main>
    <div class="container-fluid">
        <div class="row ">
            <div class="col-12">
                <div class="mb-3">
                    <h1>All Roles</h1>
                    <div class="text-zero top-right-button-container">
                        <a href="{{route('create_role_form')}}" class="btn btn-primary btn-lg top-right-button mr-1">ADD NEW</a>
                    </div>
                    <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                        <ol class="breadcrumb pt-0">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">Library</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Data</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-12 my-3">
                <div class="card h-100 overflow-auto">
                    <div class="card-body">
                        <h5 class="card-title">All Roles</h5>
                        <ul class="list-group ">
                            @foreach($roles as $role)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{$role->name}}
                                @if(!empty($role->permissions[0]))
                                <div class="d-flex">
                                    @foreach($role->permissions as $permissions)
                                    <span class="badge badge-info badge-pill m-1">{{$permissions->name}}</span>
                                    @endforeach
                                </div>
                                @endif
                                <div class="d-flex">
                                    <button class="badge border-0 btn-danger badge-pill" onclick="delFunc()">Delete</button>
                                    <button class="badge border-0 btn-primary badge-pill">Update</button>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>
        function delFunc() {
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