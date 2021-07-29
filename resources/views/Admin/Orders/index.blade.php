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
                                <th scope="col"> Id</th>
                                <th scope="col"> Currency</th>
                                <th scope="col"> Date</th>
                                <th scope="col"> Status</th>
                                <th scope="col"> Amount </th>
                                <th scope="col"> </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr id="order-1" class="table-list ">
                                <th scope="row">{{$order->id}}</th>
                                <td> {{ucfirst($order['currency']['name']) }}</td>
                                <td> {{$order->created_at}}</td>
                                @php
                                $upd = str_replace('_', ' ', $order->order_status);
                                @endphp
                                <td> <span class="badge bg-primary">{{ucfirst($upd)}}</span></td>
                                <td>{{$order->amount}}</td>
                                <td>
                                    <button class="btn btn-sm btn-primary "> View</button>
                                    <button class="btn btn-sm btn-primary "> Confirm</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('.table-list').click(function() {
            console.log($(this).attr('id'))
        })
    </script>
</main>
@include('/Admin/layout.Footer')