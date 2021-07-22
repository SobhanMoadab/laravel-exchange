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

        <div class="col-12 ">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"> Orders </h5>
                    <table class="table table-hover hove ">
                        <thead>
                            <tr>
                                <th scope="col"> Order Id</th>
                                <th scope="col"> Order</th>
                                <th scope="col"> Date</th>
                                <th scope="col"> Status</th>
                                <th scope="col"> Sum </th>
                                <th scope="col"> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="order-1" class="table-list ">
                                <th scope="row">203</th>
                                <td> BTC</td>
                                <td> 2021/5/4</td>
                                <td> <span class="badge bg-primary"> Was paid </span></td>
                                <td>24,600,000 $</td>
                                <td>

                                    <button class="btn btn-sm btn-primary "> View</button>
                                </td>

                            </tr>
                            <tr id="order-2" class="table-list">
                                <th scope="row">205</th>
                                <td> BTC </td>
                                <td> 2021/5/4</td>
                                <td> <span class="badge bg-warning"> Pending </span></td>
                                <td>0 $</td>
                                <td>

                                    <button class="btn btn-sm btn-primary "> View</button>
                                </td>

                            </tr>

                        </tbody>
                    </table>
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