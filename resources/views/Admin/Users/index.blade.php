@include('Admin.Layout.Header')
@include('Admin.Layout.SidebarNav')
<main>
    <div class="container-fluid">
        <div class="row ">
            <div class="col-12">
                <div class="mb-2">
                    <h1>Users</h1>
                    <div class="top-right-button-container">
                        <button type="button" class="btn btn-primary btn-lg top-right-button mr-1" data-toggle="modal" data-backdrop="static" data-target="#userModalRight">ADD NEW</button>
                        {{--  Add New Modal User --}}

                        <div class="modal fade modal-right" id="userModalRight" tabindex="-1" role="dialog" aria-labelledby="userModalRight" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Add New Users</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @include('flash-message')
                                    <div class="modal-body">
                                        <form class="text-left" action="{{route('store_page')}}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label>Username (required)</label>
                                                <input type="text" name="username" class="form-control" placeholder="" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Email (required)</label>
                                                <input type="email" name="email" class="form-control" placeholder="" required>
                                            </div>
                                            <div class="form-group">
                                                <label>First Name </label>
                                                <input type="text" name="firstname" class="form-control" placeholder="">
                                            </div>
                                            <div class="form-group">
                                                <label>Last Name </label>
                                                <input type="text" name="lastname" class="form-control" placeholder="">
                                            </div>
                                            <div class="form-group">
                                                <label>Password (required)</label>
                                                <input type="password" name="password" class="form-control" placeholder="" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Roles</label>
                                                    <select name="role" id="role" class="form-control">
                                                        <option value="suspended">Suspended</option>
                                                        <option selected="selected" value="pending_user">Pending</option>
                                                        <option value="subscriber">Subscriber</option>
                                                        <option value="contributor">Contributor</option>
                                                        <option value="author">Author</option>
                                                        <option value="editor">Editor</option>
                                                        <option value="administrator">Administrator</option>			
                                                    </select>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        {{--  End Add New Modal User --}}



                        {{--  Update Modal User --}}
                        <div class="modal fade modal-right" id="updateModalRight" tabindex="-1" role="dialog" aria-labelledby="updateModalRight" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Update Users</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @include('flash-message')
                                    <div class="modal-body">
                                        <form class="text-left" action="{{route('store_page')}}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label>Username (required)</label>
                                                <input type="text" name="username" class="form-control" placeholder="" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Email (required)</label>
                                                <input type="email" name="email" class="form-control" placeholder="" required>
                                            </div>
                                            <div class="form-group">
                                                <label>First Name </label>
                                                <input type="text" name="firstname" class="form-control" placeholder="">
                                            </div>
                                            <div class="form-group">
                                                <label>Last Name </label>
                                                <input type="text" name="lastname" class="form-control" placeholder="">
                                            </div>
                                            <div class="form-group">
                                                <label>Password (required)</label>
                                                <input type="password" name="password" class="form-control" placeholder="" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Roles</label>
                                                    <select name="role" id="role" class="form-control">
                                                        <option value="suspended">Suspended</option>
                                                        <option selected="selected" value="pending_user">Pending</option>
                                                        <option value="subscriber">Subscriber</option>
                                                        <option value="contributor">Contributor</option>
                                                        <option value="author">Author</option>
                                                        <option value="editor">Editor</option>
                                                        <option value="administrator">Administrator</option>			
                                                    </select>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Update / Save</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        {{--  End Update Modal User --}}

                        <div class="btn-group">
                            <div class="btn btn-primary btn-lg pl-4 pr-0 check-button">
                                <label class="custom-control custom-checkbox mb-0 d-inline-block">
                                    <input type="checkbox" class="custom-control-input" id="checkAll">
                                    <span class="custom-control-label">&nbsp;</span>
                                </label>
                            </div>
                            <button type="button" class="btn btn-lg btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-2">
                    <a class="btn pt-0 pl-0 d-inline-block d-md-none" data-toggle="collapse" href="#displayOptions" role="button" aria-expanded="true" aria-controls="displayOptions">
                        Display Options
                        <i class="simple-icon-arrow-down align-middle"></i>
                    </a>
                    <div class="collapse d-md-block" id="displayOptions">
                        <div class="d-block d-md-inline-block">
                            <div class="btn-group float-md-left mr-1 mb-1">
                                <button class="btn btn-outline-dark btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Order By
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">A-Z</a>
                                    <a class="dropdown-item" href="#">Z-A</a>
                                </div>
                            </div>
                            <div class="search-sm d-inline-block float-md-left mr-1 mb-1 align-top">
                                <input placeholder="Search...">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="separator mb-5"></div>
                <div class="row bg-white pt-2  rounded-1">

                    <div class="col-12  ">
    
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col"> </th>
                                    <th scope="col">User Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
    
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Admin</td>
                                    <td>Info@test.com</td>
                                    <td>Administrator</td>
                                    <td>
                                        <div class="d-flex ">
                                            <button class="btn-table rounded-1 btn-info mx-1" data-toggle="modal" data-backdrop="static" data-target="#updateModalRight"> update</button>
                                            <button class="btn-table rounded-1 btn-danger mx-1"> Delete</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Larry</td>
                                    <td>test@test.com</td>
                                    <td>Editor</td>
                                    <td>
                                        <div class="d-flex ">
                                            <button class="btn-table rounded-1 btn-info mx-1" data-toggle="modal" data-backdrop="static" data-target="#updateModalRight"> update</button>
                                            <button class="btn-table rounded-1 btn-danger mx-1"> Delete</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>


</main>

@include('Admin.Layout.Footer')