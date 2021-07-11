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
                        <h5 class="card-title">Create Permission</h5>
                        <input type="text" class="form-control" placeholder="Permition name" />
                        <input type="checkbox" class="my-3" onclick="toggle(this);" />Check all permission

                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td> <input type="checkbox" value="post" /> Post </td>
                                    <td> <input type="checkbox" value="page" />Page </td>
                                    <td> <input type="checkbox" value="create" /> Create </td>
                                </tr>
                                <tr>
                                    <td> <input type="checkbox" value="Delete" />Delete </td>
                                    <td> <input type="checkbox" value="Update" /> Update </td>
                                    <td> <input type="checkbox" /> Create </td>
                                </tr>
                                <tr>
                                    <td> <input type="checkbox" />Delete </td>
                                    <td> <input type="checkbox" /> Create </td>
                                    <td> <input type="checkbox" /> Update </td>
                                </tr>


                            </tbody>
                        </table>
                        <button class="btn btn-primary"> Create</button>
                    </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
</main>

@include('Admin.Layout.Footer')