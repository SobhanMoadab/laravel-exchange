@include('Admin.Layout.Header')
@include('Admin.Layout.SidebarNav')
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="mb-2">
                    <h1>Rules</h1>
                    <div class="top-right-button-container">
                        <button type="button" class="btn btn-primary btn-lg top-right-button mr-1" data-toggle="modal"
                            data-backdrop="static" data-target="#exampleModalRight">ADD NEW</button>

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
                                    @include('flash-message')
                                    <div class="modal-body">
                                        <form class="text-left" action="{{route('store_page')}}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label>Title</label>
                                                <input type="text" name="name" class="form-control" placeholder="">
                                            </div>
                                            <div class="form-group">
                                                <label>Details</label>
                                                <textarea placeholder="" name="body" class="form-control"
                                                    rows="2"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Type</label>
                                                <div class="custom-control custom-checkbox">
                                                    <select name="page_type">
                                                        @foreach($pages as $page)
                                                        <option value='FAQ'>{{$page->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-primary"
                                                    data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

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
                                                <option value="Flexbox">Flexbox</option>
                                                <option value="Sass">Sass</option>
                                                <option value="React">React</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Labels</label>
                                            <select class="form-control select2-multiple" multiple="multiple"
                                                data-width="100%">
                                                <option value="New Framework">New Framework</option>
                                                <option value="Education">Education</option>
                                                <option value="Personal">Personal</option>
                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <label>Status</label>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                <label class="custom-control-label" for="customCheck1">Completed</label>
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
                </div>
                <div class="separator mb-5"></div>
                @foreach($pages as $page)
                <div class="list disable-text-selection" data-check-all="checkAll">
                    <div class="card d-flex flex-row mb-3">
                        <div class="d-flex flex-grow-1 min-width-zero">
                            <div
                                class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                                <a class="list-item-heading mb-0 truncate w-40 w-xs-100 mt-0" href="Apps.Survey.html">
                                    <span class="align-middle d-inline-block"> {{$page->name}} </span>
                                </a>
                                <div class="w-10 w-xs-100">
                                    <span class="badge badge-pill badge-secondary">{{$page->page_type}}</span>
                                </div>
                                <div class="w-10 w-xs-100">
                                    <span class="badge badge-pill badge-secondary">{{$page->created_at}}</span>
                                </div>
                                <div class="w-10 w-xs-100">
                                    <a href="" class=""><span class="btn-sm btn-info d-inline-block text-truncate"
                                            style="max-width: 100px;">Update</span></a>
                                </div>
                            </div>
                            <label class="custom-control custom-checkbox mb-1 align-self-center mr-4">
                                <input type="checkbox" class="custom-control-input">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </div>
                    </div>
                </div>
                @endforeach
                <div>
                    <div class="card d-flex flex-row mb-3">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label fs-5">Email address</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fs-5">Example textarea</label>
                                <textarea class="form-control" rows="3"></textarea>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">submit</button>
                                <button type="button" class="btn btn-danger">delete</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</main>
@include('Admin.Layout.Footer')