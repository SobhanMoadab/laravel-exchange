@include('Layout.Header')
<section>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class=" col-12 col-sm-6 ">
                <div class="input-group">
                    <button class="position-absolute btn btn-success referral-btn" data-toggle="tooltip"
                        data-placement="top" title="copy link"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                            height="20" fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16">
                            <path
                                d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                        </svg></button>
                    <div class="mb-3 col-12">
                        <label for="formGroupExampleInput" class="form-label">Your referral link</label>
                        <input type="text" class="form-control bg-transparent" id="formGroupExampleInput"
                            value="http" aria-label="Disabled input example" disabled>
                    </div>
                </div>
                <div class="input-group">
                    <div class="mb-3 col-12">
                        <label for="formGroupExampleInput2" class="form-label">Link click count</label>
                        <input type="text" class="form-control bg-transparent" id="formGroupExampleInput2" value="0"
                            aria-label="Disabled input example" disabled>
                    </div>
                </div>
                <div class="input-group">
                    <div class="mb-3 col-12">
                        <label for="formGroupExampleInput2" class="form-label">Number of referred users</label>
                        <input type="text" class="form-control bg-transparent" id="formGroupExampleInput2" value="0"
                            aria-label="Disabled input example" disabled>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="input-group">
                    <div class="mb-3 col-12">
                        <label for="formGroupExampleInput" class="form-label">Total Commission Earned</label>
                        <input type="text" class="form-control bg-transparent" id="formGroupExampleInput"
                            value="0.00 USD" aria-label="Disabled input example" disabled>
                    </div>
                </div>
                <div class="input-group">
                    <div class="mb-3 col-12">
                        <label for="formGroupExampleInput2" class="form-label">Commission Withdrawn</label>
                        <input type="text" class="form-control bg-transparent" id="formGroupExampleInput2"
                            value="0.00 USD" aria-label="Disabled input example" disabled>
                    </div>
                </div>
                <div class="input-group">
                    <div class="mb-3 col-12">
                        <label for="formGroupExampleInput2" class="form-label">Commission Left to Withdraw</label>
                        <input type="text" class="form-control bg-transparent" id="formGroupExampleInput2"
                            value="0.00 USD" aria-label="Disabled input example" disabled>
                    </div>
                </div>
            </div>
        </div>


    </div>


</section>
<section>
    <div class="container mb-5">
        <div class="row">
            <table class="table bg-dark" style="border-radius: 10px;">
                <thead>
                    <tr>
                        <th scope="col" class="text-white">User</th>
                        <th scope="col" class="text-white">Date</th>
                        <th scope="col" class="text-white">Earned</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row" class="text-white">1</th>
                        <td class="text-white">Mark</td>
                        <td class="text-white">Otto</td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-white">2</th>
                        <td class="text-white">Jacob</td>
                        <td class="text-white">Thornton</td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-white">3</th>
                        <td class="text-white">Larry the Bird</td>
                        <td class="text-white">@twitter</td>
                    </tr>

                </tbody>
            </table>

        </div>
    </div>
</section>
@include('Layout.Footer')


