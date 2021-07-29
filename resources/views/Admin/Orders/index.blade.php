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
            <div class="card" style="overflow-x: scroll">
                <div class="card-body">
                    <h5 class="card-title"> Orders </h5>
                    <table class="table table-hover hove ">
                        <thead>
                            <tr>
                                <th scope="col"> Id</th>
                                <th scope="col"> User Email</th>
                                <th scope="col"> Currency</th>
                                <th scope="col"> Date</th>
                                <th scope="col"> Status</th>
                                <th scope="col"> Amount </th>
                                <th scope="col"> </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr id="order-1" class="table-list ">
                                    <th scope="row">{{ $order->id }}</th>
                                    <th scope="row"> ali@ali.com</th>
                                    <td> {{ ucfirst($order['currency']['name']) }}</td>
                                    <td> {{ $order->created_at }}</td>
                                    @php
                                        $upd = str_replace('_', ' ', $order->order_status);
                                    @endphp
                                    <td> <span class="badge bg-primary">{{ ucfirst($upd) }}</span></td>
                                    <td>{{ $order->amount }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary "> View</button>
                                        <button class="btn btn-sm btn-primary "
                                            onclick="ConfOrder({{ $order->id }})"> Confirm</button>
                                        <button class="btn btn-sm btn-danger " onclick="delOrder({{ $order->id }})">
                                            Delete</button>
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

        function ConfOrder(id) {
            swal({
                    title: "Are you sure?",
                    text: " Confirm Order Id ?  " + id,
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        swal("You Are Confirmed Order Id : " + id + "!", {
                            icon: "success",
                        });
                    } else {
                        swal(" Order Not Confrim ");
                    }
                });
        }

        function delOrder(id) {
            swal({
                    title: "Are you sure?",
                    text: " Delete Order Id ?  " + id,
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        swal("Order Deleted!", {
                            icon: "success",
                        });
                    } else {
                        swal("Your  Order " + id + " is safe!");
                    }
                });
        }
    </script>
</main>
@include('/Admin/layout.Footer')
