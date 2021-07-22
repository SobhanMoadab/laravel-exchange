@include('Admin.Layout.Header')
@include('Admin.Layout.SidebarNav')
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="mb-2">
                    <h1>Maintenance</h1>
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
                <div class="list disable-text-selection" data-check-all="checkAll">
                    <div class="card d-flex flex-row mb-3">
                        <div class="d-flex flex-grow-1 min-width-zero">
                            <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center"
                                style="cursor:pointer;">
                                <span class="align-middle d-inline-block fs-5">title</span>
                                <div class="form-check form-switch">
                                    <input class="form-check-input w-100 h-100" type="checkbox"
                                        id="flexSwitchCheckChecked" checked>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</main>
@include('Admin.Layout.Footer')