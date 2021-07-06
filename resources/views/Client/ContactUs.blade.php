@include('Client.Layout.Header')
<section class="bg-home-2 align-items-center d-flex">

    <div class="container">
        <div class="row">


            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <section class="section ">
                            <div class="container">
                                <div class="row mt-5 pt-4">
                                    <div class="col-lg-3">

                                        <div class="mt-4">
                                            <h5 class="f-17 mb-1 mt-4 pt-2">
                                                Email Address: JohnPBeau@jourrapide.com

                                                Contact Number: +112 708-231-9668

                                                Office Address: 3429 Gnatty Creek Road Farmingdale, NY 11735
                                                
                                            </h5>
                                        </div>

                                    </div>

                                    <div class="col-lg-8 offset-lg-1">
                                        <div class="custom-form mt-4">
                                            <form method="post" name="myForm" onsubmit="return validateForm()">
                                                <p id="error-msg"></p>
                                                <div id="simple-msg"></div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group mt-2">
                                                            <input name="name" id="name" type="text"
                                                                class="form-control" placeholder="Your name">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group mt-2">
                                                            <input name="email" id="email" type="email"
                                                                class="form-control" placeholder="Your email">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group mt-2">
                                                            <input type="text" class="form-control" id="subject"
                                                                placeholder="Your Subject..">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group mt-2">
                                                            <textarea name="comments" id="comments" rows="4"
                                                                class="form-control"
                                                                placeholder="Your message..."></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-lg-12">
                                                        <input type="submit" id="submit" name="send"
                                                            class="submitBnt btn btn-rounded btn-primary"
                                                            value="Send Message">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>




                            </div>
                        </section>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('Client.Layout.Footer')
