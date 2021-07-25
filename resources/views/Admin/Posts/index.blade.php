@include('Admin.Layout.Header')
@include('Admin.Layout.SidebarNav')
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="mb-2">
                    <h1>Posts</h1>
                    <div class="top-right-button-container">
                        <button type="button" class="btn btn-primary btn-lg top-right-button mr-1"
                            data-toggle="modal" data-backdrop="static" data-target="#exampleModalRight">ADD NEW</button>

                        <div class="modal fade modal-right" id="exampleModalRight" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalRight" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Add New</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="form-group">
                                                <label>Title</label>
                                                <input type="text" class="form-control" placeholder="">
                                            </div>
                                            <div class="form-group">
                                                <label>Details</label>
                                                <textarea placeholder="" class="form-control" rows="2"></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label>Category</label>
                                                <select class="form-control">
                                                    <option label="&nbsp;">&nbsp;</option>
                                                    <option value="Flexbox">Flexbox</option>
                                                    <option value="Sass">Sass</option>
                                                    <option value="React">React</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Status</label>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customCheck1">
                                                    <label class="custom-control-label"
                                                        for="customCheck1">Completed</label>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-primary"
                                            data-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="btn-group">
                            <div class="btn btn-primary btn-lg pl-4 pr-0 check-button">
                                <label class="custom-control custom-checkbox mb-0 d-inline-block">
                                    <input type="checkbox" class="custom-control-input" id="checkAll">
                                    <span class="custom-control-label">&nbsp;</span>
                                </label>
                            </div>
                            <button type="button"
                                class="btn btn-lg btn-primary dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" id="delete-item" >Delete</a>
                                <a class="dropdown-item" href="#">Another action</a>
                            </div>
                        </div>
                    </div>
                    {{-- modal Add New --}}
                    <div class="modal fade modal-right" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add New</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label>Details</label>
                                            <textarea class="form-control" rows="2"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Category</label>
                                            <select class="form-control select2-single" data-width="100%">
                                                <option label="&nbsp;">&nbsp;</option>
                                                <option value="Flexbox">News</option>
                                                <option value="Sass">Sass</option>
                                                <option value="React">React</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="customCheck1">
                                                <label class="custom-control-label"
                                                    for="customCheck1">Completed</label>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-primary"
                                        data-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- End Modal Add New --}}
                    {{-- Modal Update  --}}

                    <div class="modal fade modal-right" id="UpdateModalRight" tabindex="-1" role="dialog"
                        aria-labelledby="UpdateModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update post</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label>Details</label>
                                            <textarea class="form-control" rows="2"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Category</label>
                                            <select class="form-control select2-single" data-width="100%">
                                                <option label="&nbsp;">&nbsp;</option>
                                                <option value="Flexbox">News</option>
                                                <option value="Sass">Sass</option>
                                                <option value="React">React</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Status</label>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="customCheck1">
                                                <label class="custom-control-label"
                                                    for="customCheck1">Completed</label>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-primary"
                                        data-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- End Modal Update --}}
                </div>

                <div class="mb-2">
                    <a class="btn pt-0 pl-0 d-inline-block d-md-none" data-toggle="collapse" href="#displayOptions"
                        role="button" aria-expanded="true" aria-controls="displayOptions">
                        Display Options
                        <i class="simple-icon-arrow-down align-middle"></i>
                    </a>
                    <div class="collapse d-md-block" id="displayOptions">
                        <div class="d-block d-md-inline-block">
                            <div class="btn-group float-md-left mr-1 mb-1">
                                <button class="btn btn-outline-dark btn-xs dropdown-toggle" type="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Order By
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#"></a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                </div>
                            </div>
                            <div class="search-sm d-inline-block float-md-left mr-1 mb-1 align-top">
                                <input placeholder="Search...">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="separator mb-5"></div>


                <div class="row">
                    <div class="col-12 list" data-check-all="checkAll" >

                        <div class="card d-flex flex-row mb-3">
                            <div class="d-flex flex-grow-1 min-width-zero">
                                <div
                                    class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                                    <a class="list-item-heading mb-0 truncate w-40 w-xs-100 item-list" >
                                        fdrfhghg Cake
                                    </a>
                                    <p class="mb-0 text-muted text-small w-15 w-xs-100">Cakes</p>
                                    <p class="mb-0 text-muted text-small w-15 w-xs-100">02.04.2018</p>
                                    <div class="w-15 w-xs-100">
                                        <span class="badge badge-pill badge-secondary">ON HOLD</span>
                                    </div>

                                  
                                </div>
                                <div class="d-flex align-items-center mx-2">
                                    <button class="btn btn-sm btn-info truncate"  data-toggle="modal" data-backdrop="static" data-target="#exampleModalRight"> Update</button>
                                </div>
                                <label class="custom-control custom-checkbox mb-1 align-self-center pr-4">
                                    <input type="checkbox" class="custom-control-input">
                                    <span class="custom-control-label">&nbsp;</span>
                                </label >
                            </div>
                        </div>
                        <div class="card d-flex flex-row mb-3"  >
                            <div class="d-flex flex-grow-1 min-width-zero">
                                <div
                                    class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                                    <a class="list-item-heading mb-0 truncate w-40 w-xs-100 item-list" >
                                        fdrfhghg Cake
                                    </a>
                                    <p class="mb-0 text-muted text-small w-15 w-xs-100">One Items</p>
                                    <p class="mb-0 text-muted text-small w-15 w-xs-100">02.04.2018</p>
                                    <div class="w-15 w-xs-100">
                                        <span class="badge badge-pill badge-secondary">ON HOLD</span>
                                    </div>

                                  
                                </div>
                                <div class="d-flex align-items-center mx-2">
                                    <button class="btn btn-sm btn-info truncate"  data-toggle="modal" data-backdrop="static" data-target="#exampleModalRight"> Update</button>
                                </div>
                                <label  class="custom-control custom-checkbox mb-1 align-self-center pr-4">
                                    <input type="checkbox" class="custom-control-input">
                                    <span class="custom-control-label">&nbsp;</span>
                                </label >
                            </div>
                        </div>

    {{-- page Ination  --}}
                        <nav class="mt-4 mb-3">
                            <ul class="pagination justify-content-center mb-0">
                                <li class="page-item ">
                                    <a class="page-link first" href="#">
                                        <i class="simple-icon-control-start"></i>
                                    </a>
                                </li>
                                <li class="page-item ">
                                    <a class="page-link prev" href="#">
                                        <i class="simple-icon-arrow-left"></i>
                                    </a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item ">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">3</a>
                                </li>
                                <li class="page-item ">
                                    <a class="page-link next" href="#" aria-label="Next">
                                        <i class="simple-icon-arrow-right"></i>
                                    </a>
                                </li>
                                <li class="page-item ">
                                    <a class="page-link last" href="#">
                                        <i class="simple-icon-control-end"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@include('Admin.Layout.Footer')