@include('User.Layout.Header')

<section class=" mt-5 mb-4">
        <div class="container bg-white">
            <div class="row p-4 shadow-lg rounded-2">
                <div class="border-bottom border-1">
                    <h3 class="float-start">Support system:
                        Please select the relevant service and topic</h3>
                </div>
                <p class=" mt-5 mb-5">By choosing the service and topic you want, you can get the answer to your
                    question as soon as possible.</p>
                <div class="select-ticket">
                    <p class="position-absolute">Service:</p>
                    <select class="form-select float-end" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class=" mt-5 mb-3 p-4 shadow">
                    <button class="btn btn-primary">
                        <a href="#" class="text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                                class="bi bi-arrow-bar-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M6 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L12.293 7.5H6.5A.5.5 0 0 0 6 8zm-2.5 7a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5z" />
                            </svg>
                            Pre-purchase questions</a>
                    </button>

                </div>

            </div>
        </div>
</section>

@include('User.Layout.Footer')