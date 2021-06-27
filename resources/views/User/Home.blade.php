@include('User.Layout.Header')
    <!--start card-->
    <section>
        <div class="container">

            <div class="row mt-4 mb-5 row-card-dashboard">
                <div class="col-12 col-sm-12 my-2  col-md-4">
                    <div class="card card-dashboard">
                        <div class="card-body rounded-2"
                            style="background: linear-gradient(144deg, rgba(138,39,129,1) 0%, rgba(245,56,94,1) 100%); ">
                            <h5 class="card-title text-white">Orders Sum</h5>
                            <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor"
                                class="bi bi-bag position-relative text-white icon-dashboard" viewBox="0 0 16 16">
                                <path
                                    d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                            </svg>
                            <p class="card-title text-white">$0.00</p>
                            <hr>
                            <a href="#" class="text-white link-card"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                                    height="20" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                                </svg>Orders Count: 0</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 my-2 col-md-4">
                    <div class="card card-dashboard">
                        <div class="card-body   rounded-2"
                            style="background: linear-gradient(144deg, rgba(39,138,74,1) 0%, rgba(56,196,245,1) 100%); ">
                            <h5 class="card-title text-white">Discount</h5>
                            <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor"
                                class="bi bi-percent position-relative text-white icon-dashboard" viewBox="0 0 16 16">
                                <path
                                    d="M13.442 2.558a.625.625 0 0 1 0 .884l-10 10a.625.625 0 1 1-.884-.884l10-10a.625.625 0 0 1 .884 0zM4.5 6a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 1a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5zm7 6a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 1a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                            </svg>
                            <p class="card-title text-white">0</p>
                            <hr>
                            <a href="#" class="text-white link-card"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                                    height="20" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                                </svg>More Info</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 my-2 col-md-4">
                    <div class="card card-dashboard">
                        <div class="card-body bg-danger rounded-2"
                            style="background: linear-gradient(139deg, rgba(213,33,33,1) 0%, rgba(208,193,25,1) 100%); ">
                            <h5 class="card-title text-white">Referrals Sum</h5>
                            <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor"
                                class="bi bi-people-fill position-relative text-white icon-dashboard"
                                viewBox="0 0 16 16">
                                <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                <path fill-rule="evenodd"
                                    d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z" />
                                <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                            </svg>
                            <p class="card-title text-white">$0.00</p>
                            <hr>
                            <a href="#" class="text-white link-card"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                                    height="20" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                                </svg>Referrals Count: 0</a>
                        </div>
                    </div>
                </div>


            </div>



    </section>
    <!--end card-->
    <!--start transaction-->
    <section>
        <div class="container col-12 mb-5 ">

            <div class="row bg-dark px-3 rounded-2">
                <h5 class="transaction text-white">Transaction</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-white" scope="col">#</th>
                            <th class="text-white" scope="col">status</th>
                            <th class="text-white" scope="col">Digital currency</th>
                            <th class="text-white" scope="col">wallet</th>
                            <th class="text-white" scope="col">Last update</th>
                            <th class="text-white" scope="col">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                                    class="bi bi-arrow-up-circle-fill text-success" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8A8 8 0 1 0 0 8a8 8 0 0 0 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z" />
                                </svg>
                            </th>
                            <td><span class="badge bg-danger">Sold</span></td>
                            <td class="text-white">BTC</td>
                            <td class="text-white">Using - Bank *******5264</td>
                            <td class="fw-bold text-danger">-0.000242 BTC</td>
                            <td class="text-white">-0.125 USD4</td>
                        </tr>
                        <tr>
                            <th><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                                    class="bi bi-arrow-down-circle-fillr text-danger" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z" />
                                </svg>
                            </th>
                            <td><span class="badge bg-success">buy</span></td>
                            <td class="text-white">LTC</td>
                            <td class="text-white">Using - Bank *******5264</td>
                            <td class="fw-bold text-success">-0.000242 BTC</td>
                            <td class="text-white">-0.125 USD4</td>
                        </tr>
                        <tr>
                            <th><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                                    class="bi bi-arrow-up-circle-fill text-success" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8A8 8 0 1 0 0 8a8 8 0 0 0 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z" />
                                </svg>
                            </th>
                            <td><span class="badge bg-danger">Sold</span></td>
                            <td class="text-white">XRP</td>
                            <td class="text-white">Using - Bank *******5264</td>
                            <td class="fw-bold text-danger">-0.000242 BTC</td>
                            <td class="text-white">-0.125 USD4</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>

    </section>
    <!--end transaction-->

@include('User.Layout.Footer')
