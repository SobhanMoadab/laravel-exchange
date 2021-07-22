@include('Admin.Layout.Header')
@include('Admin.Layout.SidebarNav')
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="mb-2">
                    <h1>verification help</h1>
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
                        <div class="card-body" style="height:350px">
                                <div>
                                    <div class="col-5 float-start"> 
                                        <label class="form-label fs-5">First name</label>
                                        <input class="w-10" type="checkbox">
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-5 float-end"> 
                                        <label class="form-label fs-5">Last name</label>
                                        <input class="w-10" type="checkbox">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>                      
                                <div>
                                    <div class="col-5 float-start"> 
                                        <label class="form-label mt-2 fs-5">Email</label>
                                        <input class="w-10" type="checkbox">
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-5 float-end"> 
                                        <label class="form-label mt-2 fs-5">Address</label>
                                        <input class="w-10" type="checkbox">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div>
                                    <div class="col-5 float-start"> 
                                        <label class="form-label mt-2 fs-5">file</label>
                                        <input class="w-10" type="checkbox">
                                        <img src="" weight="50" height="50">
                                    </div>
                                    <div class="col-5 float-end"> 
                                        <label class="form-label mt-2 fs-5">Country</label>
                                        <input class="w-10" type="checkbox">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="position-absolute" style="top:85%">
                                  <button type="button" class="btn btn-primary">Checked</button>
                                </div>
                                
                            </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</main>
@include('Admin.Layout.Footer')