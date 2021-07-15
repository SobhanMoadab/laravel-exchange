@include('User.Layout.Header')

<!--start card-->
<section class="container">
    <div class="card border-0 ">
        <div class="card-body">

            <form class="needs-validation" novalidate>
                <div class="row border-left mb-3"><label> A color copy of valid passport or other official state ID
                        (e.g. driver's
                        license, identity card, etc). The ID must be valid and contain the client's full
                        name.</label></div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom01">First name</label>
                        <input type="text" name="f_name" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom02">Last name</label>
                        <input type="text" name="l_name" class="form-control" id="validationCustom02" placeholder="Last name" value="Otto" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom02">Phone Number</label>
                        <input type="text" name="phone" class="form-control" id="validationCustom02" placeholder="Phone Number" value="Otto" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom02">Address</label>
                        <input type="text" name="address" class="form-control" id="validationCustom02" placeholder="Address" value="Otto" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom04" class="px-2  border-left">Passport Picture</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01" required>
                            <label class="custom-file-label" for="inputGroupFile01"></label>
                        </div>
                        <div class="invalid-feedback">
                            Please provide a valid Email.
                        </div>
                    </div>
                </div>
                <div class="row border-left mb-3"><label> A recent utility bill (e.g. electricity, gas, water,
                        phone, oil, Internet and/or cable TV connections), or bank statement confirming your
                        registered address.</label></div>
                <div class="mb-3">
                    <div class="form-group">
                        <select class="form-control" name="country_id" placeholder="Contrry" id="ConuntrySelect1">
                            @foreach($countries as $country)
                            <option value="{{$country['id']}}">{{$country['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" name="term_agreement" type="checkbox" value="" id="invalidCheck" required>
                        <label class="form-check-label" for="invalidCheck">
                            Agree to terms and conditions
                        </label>
                        <div class="invalid-feedback">
                            You must agree before submitting.
                        </div>

                    </div>
                    <div class=" d-flex flex-row-reverse">
                        <button class="btn btn-primary" type="submit">Submit form</button>
                    </div>
                </div>
            </form>

            <script>
                // Example starter JavaScript for disabling form submissions if there are invalid fields
                (function() {
                    'use strict';
                    window.addEventListener('load', function() {
                        // Fetch all the forms we want to apply custom Bootstrap validation styles to
                        var forms = document.getElementsByClassName('needs-validation');
                        // Loop over them and prevent submission
                        var validation = Array.prototype.filter.call(forms, function(form) {
                            form.addEventListener('submit', function(event) {
                                if (form.checkValidity() === false) {
                                    event.preventDefault();
                                    event.stopPropagation();
                                }
                                form.classList.add('was-validated');
                            }, false);
                        });
                    }, false);
                })();
            </script>
        </div>
    </div>
</section>
@include('User.Layout.Footer')