@include('Admin.layout.Header')
@include('Admin.layout.SidebarNav')
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="d-flex justify-content-around">
                <div class="col-12 ">
                    <h1>Currncy</h1>
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
                                                <input type="File" name="Logo" class="form-control" >
                                            </div>
                                            <div class="select-country" data-input-name="Currncy" data-selected-country="BTC">
                                            </div>

                                            <div class="form-group">
                                                <label>Status</label>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="is_active" class="custom-control-input" id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1">Completed</label>
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
                                                <label>Logo currency</label>
                                                <input type="File" name="Logo" class="form-control" >
                                            </div>
                                            <div class="select-country" data-input-name="Currncy" data-selected-country="BTC">
                                            </div>

                                            <div class="form-group">
                                                <label>Status</label>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="is_active" class="custom-control-input" id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1">Completed</label>
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
                <li class="list-group-item d-flex justify-content-between align-items-center rounded border-0">
                    <div>
                        Currncy Name
                    </div>

                    <div>
                        status
                    </div>

                </li>
                </ul>
                <ul class="list-group  mt-2">
                    <li class="list-group-item d-flex justify-content-between align-items-center border-0">
                        <div>
                            <img width="20" src="/client/images/svg/bitcoin-441959.svg" class="mr-2" alt="">
                            USD
                        </div>
                        <div class=" text-warning ">
                            Price: $90.4
                        </div>
                        <div class="text-danger">
                            Min: $90.4
                        </div>
                        <div class="text-info">
                            Max: $90.4
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                            <button class="btn badge badge-danger border-0 rounded"> Delete</button>
                            <button class="btn badge badge-info border-0 rounded" data-toggle="modal" data-backdrop="static" data-target="#UpdateModalRight"> Update</button>

                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center border-0">
                        <div>
                            <img width="20" src="/client/images/svg/aurouracoin-441945.svg" class="mr-2" alt="">
                            DOAG
                        </div>
                        <div class=" text-warning ">
                            Price: $90.4
                        </div>
                        <div class="text-danger">
                            Min: $90.4
                        </div>
                        <div class="text-info">
                            Max: $90.4
                        </div>

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                            <button class="btn badge badge-danger border-0 rounded"> Delete</button>
                            <button class="btn badge badge-info border-0 rounded" data-toggle="modal" data-backdrop="static" data-target="#UpdateModalRight"> Update</button>

                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center border-0">
                        <div>
                            <img width="20" src="/client/images/svg/devcoin-441952.svg" class="mr-2" alt="">
                            TTER
                        </div>
                        <div class=" text-warning ">
                            Price: $90.4
                        </div>
                        <div class="text-danger">
                            Min: $90.4
                        </div>
                        <div class="text-info">
                            Max: $90.4
                        </div>

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                            <button class=" btn badge badge-danger border-0 rounded"> Delete</button>
                            <button class="btn badge badge-info border-0 rounded " data-toggle="modal" data-backdrop="static" data-target="#UpdateModalRight"> Update</button>


                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</main>
@include('Admin.layout.Footer')