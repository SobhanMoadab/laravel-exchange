@include('Admin.Layout.Header')
@include('Admin.Layout.SidebarNav')
<main>
    <div class="container-fluid">
        <div class="row ">
            <div class="col-12">
                <h1>Edit Roles </h1>
                <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                    <ol class="breadcrumb pt-0">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">Roles</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
                <div class="separator mb-5"></div>
            </div>
                <div class="col-12 my-3">
                    <div class="card">
                        <div class="card-body">
                            <form action="">
                            <h5 class="card-title">Edit Roles</h5>
                            <input type="text" class="form-control" placeholder="Permition name" value="admin-role" />
                            <input type="checkbox" class="my-3" onclick="toggle(this);" >Check all permission

                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td> <input type="checkbox" value="Post"  /> Post </td>
                                    </tr>
                                    <tr>
                                        <td> <input type="checkbox" checked value="Page" >Page </td>
                                    </tr>
                                    <tr>
                                        <td> <input type="checkbox" checked />Edit </td>
                                    </tr>


                                </tbody>
                            </table>
                            <button class="btn btn-primary"> Update</button>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>

  

<script>
//  function swal(){
//     swal({
//   title: "Are you sure?",
//   text: "Once deleted, you will not be able to recover this imaginary file!",
//   icon: "warning",
//   buttons: true,
//   dangerMode: true,
// })
// .then((willDelete) => {
//   if (willDelete) {
//     swal("Poof! Your imaginary file has been deleted!", {
//       icon: "success",
//     });
//   } else {
//     swal("Your imaginary file is safe!");
//   }
// });
//  }
</script>

</main>

@include('Admin.Layout.Footer')