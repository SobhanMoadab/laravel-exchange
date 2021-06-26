@if ($errors->any())
    <div class="form-group form-group-last">
        <div class="alert alert-danger" role="alert" id="kt_form_1_msg">
            <div class="alert-icon"><i class="flaticon-more"></i></div>
            <div class="alert-text">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="alert-close">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="la la-close"></i></span>
                </button>
            </div>
        </div>
    </div>
@endif

@if(Session::has('success'))
    <div class="form-group form-group-last">
        <div class="alert alert-success" role="alert" id="kt_form_1_msg">
            <div class="alert-icon"><i class="flaticon-more"></i></div>
            <div class="alert-text">
                {{Session::get('success')}}
            </div>
            <div class="alert-close">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="la la-close"></i></span>
                </button>
            </div>
        </div>
    </div>
@endif

@if(Session::has('Error'))
    <div class="form-group form-group-last">
        <div class="alert alert-danger" role="alert" id="kt_form_1_msg">
            <div class="alert-icon"><i class="flaticon-more"></i></div>
            <div class="alert-text">
                {{Session::get('Error')}}
            </div>
            <div class="alert-close">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="la la-close"></i></span>
                </button>
            </div>
        </div>
    </div>
@endif
