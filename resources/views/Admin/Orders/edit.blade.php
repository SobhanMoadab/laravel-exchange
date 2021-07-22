@include('/Admin/layout.Header')
@include('/Admin/layout.SidebarNav')
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Orders</h1>
                <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                    <ol class="breadcrumb pt-0">
                        <li class="breadcrumb-item">
                            <a href="#">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Order</li>
                    </ol>
                </nav>
                <div class="separator mb-5"></div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class=" d-flex justify-content-between row">

                        <div class=" col-12 col-sm-6 d-flex flex-column w-50 my-2  ">
                            <div class=" d-flex justify-content-between align-items-center ">
                                <div class=" d-flex flex-column">
                                    <label style="font-size: 20px;"> Order Detail Id 203 </label>
                                    <label class=" "> Payment on July 30, 1400 @ 11:36 p.m. </label>
                                </div>
                                <div>
                                    <button class=" btn btn-primary print"> Print </button>
                                </div>
                            </div>

                            <hr class="w-100">
                            <div>
                                <label> Order Date: </label>
                                <span> 2021/5/8</span>
                            </div>
                            <div>
                                <label> User Name: </label>
                                <span> eham qanbari </span>
                            </div>
                            <div>
                                <label> User Email: </label>
                                <span> mmd@md.com </span>
                            </div>
                            <div>
                                <label> User Payment: </label>
                                <span> 5869-8851-6589-5248 </span>
                            </div>
                            <div>
                                <label> Pay at: </label>
                                <span> 5869-7655-6788-45645 </span>
                            </div>
                            <div>
                                <label> Transaction: </label>
                                <span> Paypal </span>
                            </div>
                            <div class=" align-content-between flex-wrap ">
                                <label> status: </label>
                                <select class="form-control " name="" id="">
                                    <option value=""> Was paid </option>
                                    <option value=""> pending</option>
                                </select>
                            </div>
                        </div>
                        <div class=" col-12 col-sm-6 w-50">

                            <table class="table table-bordered" id="printTable">
                                <tbody>
                                    <tr>
                                        <th scope="row"> Order Id :</th>
                                        <td> 203 </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"> Payment</th>
                                        <td>Payment on July 30, 1400 @ 11:36 p.m. </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Name </th>
                                        <td>eham qanbari</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"> Email </th>
                                        <td> mmd@md.com </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"> Coin</th>
                                        <td>BTC </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"> Coin Number</th>
                                        <td>1 </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"> Purchase Amount </th>
                                        <td>24,600,000 $ </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"> Status </th>
                                        <td class=" text-success"> Was paid </td>
                                    </tr>
                                </tbody>
                            </table>


                        </div>

                    </div>
                </div>
            </div>

        </div>



    </div>
    <script>
        $('.table-list').click(function () {
            console.log($(this).attr('id'))
        })
    </script>
</main>
@include('/Admin/layout.Footer')