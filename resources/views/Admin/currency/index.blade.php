@include('Admin.layout.Header')
@include('Admin.layout.SidebarNav')
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="d-flex justify-content-around">
                <div class="col-12 ">
                    <h1>Currency</h1>
                    <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                    </nav>
                    <div class="top-right-button-container">
                        <button type="button" class="btn btn-primary btn-lg top-right-button mr-1" data-toggle="modal" data-backdrop="static" data-target="#exampleModalRight">ADD NEW</button>
                        <div class="modal fade modal-right" id="exampleModalRight" tabindex="-1" role="dialog" aria-labelledby="exampleModalRight" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Add New</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="text-left" action="{{route('create_currency')}}" method="POST">
                                            @csrf
                                            @include('flash-message')
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" class="form-control" name="name" placeholder="">
                                            </div>
                                            <div class="form-group">
                                                <label>Price</label>
                                                <input type="text" class="form-control" name="price" placeholder="">
                                            </div>
                                            <div class="form-group">
                                                <label>Min</label>
                                                <input type="text" name="min" class="form-control" placeholder="">
                                            </div>
                                            <div class="form-group">
                                                <label>Max</label>
                                                <input type="text" name="max" class="form-control" placeholder="">
                                            </div>
                                            <div class="form-group">
                                                <label>Logo currency</label>
                                                <input type="File" id="currencylogo" onchange="imageUploaded();" class="form-control" accept=".png, .jpg, .jpeg, .gif">
                                                <input type="hidden" name="icon" id="upload_base" />
                                            </div>
                                            <div class="select-country" data-input-name="Currncy" data-selected-country="BTC">
                                            </div>

                                            <div class="form-group">
                                                <label>Status</label>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="is_active" class="custom-control-input" id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1">Active</label>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="cancel" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="top-right-button-container">
                        <div class="modal fade modal-right" id="UpdateModalRight" tabindex="-1" role="dialog" aria-labelledby="UpdateModalRight" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Update</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="text-left" action="{{route('create_currency')}}" method="POST">
                                            @csrf
                                            @include('flash-message')
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" class="form-control" name="name" placeholder="">
                                            </div>
                                            <div class="form-group">
                                                <label>Price</label>
                                                <input type="text" class="form-control" name="price" placeholder="">
                                            </div>
                                            <div class="form-group">
                                                <label>Min</label>
                                                <input type="text" name="min" class="form-control" placeholder="">
                                            </div>
                                            <div class="form-group">
                                                <label>Max</label>
                                                <input type="text" name="max" class="form-control" placeholder="">
                                            </div>
                                            <div class="form-group">
                                                <label>Logo </label>
                                                <input type="File" id="Updatelogo" onchange="imageUploadedUpdate();" class="form-control" accept=".png, .jpg, .jpeg, .gif">
                                                <input type="hidden" name="upload_base" id="update_base" />

                                            </div>
                                            <div class="select-country" data-input-name="Currncy" data-selected-country="BTC">
                                            </div>


                                            <div class="form-group">
                                                <label>Status</label>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="is_active" class="custom-control-input" id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1">Active</label>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="cancel" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="separator mb-5"></div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-12  ">
                <li class="list-group-item d-flex align-items-center rounded border-0">
                    <div class="col-3">
                        Coin Name
                    </div>
                    <div class="col-3">
                        Availability
                    </div>
                    <div class="col-2">
                        Icon
                    </div>
                    <div class="col-3">
                        Action
                    </div>

                </li>
                </ul>
                <ul class="list-group  mt-2">
                    @foreach($currencies as $index=>$currency)
                    <li class="list-group-item d-flex align-items-center border-0">
                        <div class="col-3 align-items-center border-0">{{ucwords($currency->name)}}</div>
                        <div class="col-3 align-items-center border-0">  @if($currency->is_active == 1) Active @elseif($currency->is_active == 0) Deactive @endif</div>
                        <div class="col-2">
                            <input type="hidden" id="{{$currency->id}}" value="{{$currency->icon}}" class="base_64_icons">
                        </div>
                        <div class="col-3 align-items-center border-0">
                            <button class="btn btn-success">Update</button>
                            <button class="btn btn-danger">Delete</button>
                        </div>

                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

</main>
@include('Admin.layout.Footer')