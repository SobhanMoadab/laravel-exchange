@include('User.Layout.Header')

<section class="mt-5 mb-4">
    <div class="container">
        <div class="row">
            <div class="border-bottom border-1">
                <h3 class="float-start">Tickets</h3>
            </div>
            @include('flash-message')
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Content</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                        <th scope="col">Created at</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tickets as $ticket)
                    <tr class="link-el" href="{{route('user_show_ticket', $ticket->id)}}">
                        <td class="text-center">{{$ticket->title}}</td>
                        <td class="text-center">{{$ticket->content}}</td>
                        <td class="text-center"><span class="badge  bg-info">@if($ticket->status == 0) Open @else Closed @endif</td>
                        <td class="text-center" onclick="delFunc({{$ticket->id}})" id="delete_ticket"><span class="badge  bg-info">Delete</span></td>
                        <td class="text-center">{{$ticket->created_at}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js">
</script>
<link rel="stylesheet" href="node_modules/sweetalert/dist/sweetalert.css">
<script>
    function delFunc() {
        swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((result) => {
                if (result.value) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "delete",
                        url: "{{url('/ticket')}}/" + id,
                        success: function(data) {
                            if (data['msg']) {
                                swal("Permissions Delete", {
                                    icon: "success",
                                });
                                // need update content
                            } else {
                                swal(
                                    'خطا',
                                    'مشکلی در انجام عملیات به وجود آمد، لطفا دوباره تلاش کنید',
                                    'error'
                                )
                            }

                        }
                    });
                } else if (result.dismiss === 'cancel') {
                    swal(
                        'انصراف',
                        'تغییری صورت نپذیرفت',
                        'error'
                    )

                } else {
                    swal("Your imaginary file is safe!");
                }
            });
    };
</script>
<script>
    $(document).ready(function($) {
        $(".link-el").click(function() {
            window.location = $(this).data("href");
        });
    });
    // get all elements in class 'base_64_icons'
    let elements = document.getElementsByClassName('base_64_icons');
    for (let i = 0; i < elements.length; i++) {
        // get value of value(base64 string) of input element
        let base64 = `${elements[i]['value']}`;
        src = `data:image/png;base64,${base64}`;
        //replace each input element with img element
        $(`#${elements[i]['id']}`).replaceWith(`<img width="50" class="base_64_icons" height="50" src="${src}">`);
    }
</script>
@include('User.Layout.Footer')