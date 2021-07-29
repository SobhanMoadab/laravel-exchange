@include('./Admin/Layout/Header')
@include('./Admin/Layout/SidebarNav')
<main>
    <div class="container-fluid">
        <div class="row app-row">

            {{-- ########   start  Chat   ########### --}}
            <div class="col-12 chat-app">
                <div class="d-flex flex-row justify-content-between mb-3 chat-heading-container">

                    <div class="card-body pl-0 align-self-center d-flex flex-lg-row justify-content-between min-width-zero">
                        <div>
                            <a href="#">
                                <p class="list-item-heading mb-1 truncate ">Ticket Status</p>
                            </a>
                            {{-- Status Ticket (Process{ class="badge bg-info"  }, Close { class="badge bg-danger"}, Open { class="badge bg-success"} ) --}}
                            <p class="mb-0 text-muted text-small"> <span class=" badge bg-info "> Process</span> </p>
                        </div>
                        <div>
                            <a href="#">
                                {{-- User name --}}
                                <p class="list-item-heading mb-1 truncate ">Name: <span id="heading-name"></span></p>
                            </a>
                            {{-- Date Create Ticket --}}
                            <p class="mb-0 text-muted text-small">Ticket Created: 2021/3/4 01:24</p>
                        </div>
                        <div>
                            {{-- close Chat (delete) --}}
                            <button type="button" id="delTicket" class="btn btn-outline-danger mx-4">
                                Close the ticket
                            </button>
                        </div>

                    </div>


                </div>
                {{-- Chat Box Ticket --}}
                <div class="separator mb-5"></div>
                <div class="scroll" id="scroll-chat">
                    <div class="scroll-content chat-box ">

                        {{-- <div class="col-12 chat-app notfoundmsg">
                            <div class="scroll" id="scroll-chat">
                                <div
                                    class="scroll-content chat-box d-flex align-item-center justify-content-center h-100">
                                    <div class=" d-flex align-items-center">
                                        <div class="d-flex flex-column text-center">
                                            <i class="iconsminds-close display-3" style="color:#eee;"></i>
                                            <span class=" w-100 my-3"> Message Not Found </span>

                                            <button class="btn btn-outline-primary w-100"> Create Ticket </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}


                    </div>
                </div>
            </div>
            {{-- ########   end Chat   ########### --}}




            {{-- ########    Chat notfound   ########### --}}
            {{-- <div class="col-12 chat-app">
                <div class="scroll" id="scroll-chat">
                    <div class="scroll-content chat-box d-flex align-item-center justify-content-center h-100">
                        @foreach ($users as $user)
                            {{ $user->user_tickets }}
            @endforeach
        </div>
    </div>
    </div> --}}
    {{-- ########    end Chat notfound   ########### --}}

    </div>
    </div>

    <div class="app-menu">

        {{-- Modal Button --}}
        <button class=" btn btn-primary rounded-2 w-100" type="button" data-toggle="modal" data-backdrop="static" data-target="#TicketCreate">Create New Ticket </button>
        {{-- End --}}

        <ul class="nav nav-tabs card-header-tabs ml-0 mr-0 my-1" role="tablist">
            <li class="nav-item w-100 text-center">
                <a class="nav-link active" id="first-tab" data-toggle="tab" href="#firstFull" role="tab" aria-selected="true">Messages</a>
            </li>
        </ul>
        <div class="p-4 h-75">
            <div class="form-group">
                {{-- Sreach User Ticket --}}
                <input type="text" class="form-control rounded" placeholder="Search">
            </div>
            <div class="tab-content h-100">
                <div class="tab-pane fade  h-100 active show" id="secondFull" role="tabpanel" aria-labelledby="second-tab">
                    <div class="scroll" id="">
                        @foreach ($users as $user)
                        @if ($user->user_tickets->count())
                        <div class="d-flex flex-row mb-3 border-bottom pb-3"> <a class="d-flex" href="#"> <img alt="Profile Picture" src="/Admin/img/profiles/l-1.jpg" class="img-thumbnail border-0 rounded-circle mr-3 list-thumbnail align-self-center xsmall">
                            </a>
                            <div onclick="get_user_tickets({{ $user->user_tickets }})" class="d-flex flex-grow-1 min-width-zero">
                                <div class="m-2 pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero ">
                                    <div class="min-width-zero ">
                                        <div class="d-flex justify-content-between ">
                                            <a href="#" class="">
                                                <p class="mb-0 truncate"> {{ $user->email }}
                                                </p>
                                            </a>
                                        </div>
                                        <p class="mb-0 text- "> {{ $user->user_tickets->last()->content }}
                                        </p>
                                    </div> <span class=" badge badge-primary status-ticket">&nbsp;</span>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>

                <a class="app-menu-button d-inline-block d-xl-none" href="#">
                    <i class="simple-icon-options"></i>
                </a>
            </div>
            <div class="chat-input-container d-flex justify-content-between align-items-center">
                <input class="form-control chat-input flex-grow-1 send_ticket_class" id="chat-input" name="content" type="text" placeholder="Say something...">
                <input class="form-control chat-input send_ticket_class" id="chat-input " type="text" name="title" placeholder="Title...">
                <div>
                    <input id='AdminFileTickt' type='file' onchange="files" hidden />
                    <button id='AdminFileTicktBtn' type="button" class="btn btn-outline-primary icon-button large">
                        <i class="simple-icon-paper-clip"></i>
                    </button>

                </div>
                <button onclick="send_ticket()" type="button" id="send" class="btn btn-primary icon-button large">
                    <i class="simple-icon-arrow-right"></i>
                </button>
            </div>
            {{-- Modal Add Ticket --}}
            <div class="modal fade modal-right" id="TicketCreate" tabindex="-1" role="dialog" aria-labelledby="TicketCreate" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        {{-- Start Modal --}}
                        <form>
                            <div class="modal-header">
                                <h5 class="modal-title">Add New Ticket</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">

                                <div class="form-group">
                                    {{-- Ticket Title --}}
                                    <label>Title</label>
                                    <input type="text" name="title" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    {{-- Ticket Msg --}}
                                    <label>Message</label>
                                    <textarea placeholder="" name="message" class="form-control" rows="2"></textarea>
                                </div>
                                {{-- Ticket Creator { User  or  Admin} --}}
                                <div class="form-group">
                                    <label> Ticket Creator (search User)</label>
                                    <input name="creator" list="Users" class="form-control selectss">
                                    <datalist id="Users">
                                        <option value="Admin">
                                        <option value="User One">
                                        <option value="Ali">
                                        <option value="symon">
                                        <option value="v">
                                    </datalist>
                                </div>
                                {{-- Ticket Status Select Option --}}
                                <div class="form-group">
                                    <label> Ticket Status</label>
                                    <select name="status" class="form-control">
                                        <option label="&nbsp;">&nbsp;</option>
                                        <option value="Close">Close</option>
                                        <option value="Open">Open</option>
                                        <option value="Process">Process</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            {{-- End Modal --}}


</main>
<script>
    function send_ticket() {
        let form = $('.send_ticket_class').serialize();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "post",
            data: form,
            url: "{{url('dashboard/orders/accept')}}/" + id,
            success: function(data) {
                if (data['msg'] == 'success') {
                    location.reload();
                } 
            },
            error: function(err) {
                console.log(err)
            }
        });
    }

    // User list click show content chat 
    function get_user_tickets(user_tickets) {
        let tickets = user_tickets;
        $('.chat-remove').remove();
        tickets.forEach(function(ticket) {
            if (ticket['admin_id'] == null) {
                $('.chat-box').append(
                    `
                    <div class="card d-inline-block mb-3 float-right mr-2 chat-remove">
                    <div class="position-absolute pt-1 pr-2 r-0">
                        <span class="text-extra-small text-muted">09:41</span>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-row pb-2">
                            <div class="d-flex flex-grow-1 min-width-zero">
                                <div
                                    class="m-2 pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                    <div class="min-width-zero">
                                        <p class="mb-0 list-item-heading truncate">${ticket['title']}</p>
                                    </div>
                                </div>
                            </div>
        
                        </div>
        
                        <div class="chat-text-left">
                            <p class="mb-0 text-semi-muted">
                                ${ticket['content']}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="clearfixs chat-remove"></div>
                    `
                );
            } else {
                `
                <div class="card d-inline-block mb-3 float-left mr-2 chat-remove">
                    <div class="position-absolute pt-1 pr-2 r-0">
                        <span class="text-extra-small text-muted">09:30</span>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-row pb-2">
        
                            <div class="d-flex flex-grow-1 min-width-zero">
                                <div
                                    class="m-2 pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                    <div class="min-width-zero">
                                        <p class="mb-0 truncate list-item-heading">User</p>
                                    </div>
                                </div>
                            </div>
                        </div>
        
                        <div class="chat-text-left">
                            <p class="mb-0 text-semi-muted">
                                {{ $user->id }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="clearfix chat-remove"></div>

                `
            }
        });
    }



    // upload image file  
    document.getElementById('AdminFileTicktBtn').addEventListener('click', fileupload);

    function fileupload() {
        document.getElementById('AdminFileTickt').click();
    }
    document.getElementById('send').addEventListener('click', sendMsg);
    document.getElementById('chat-input').addEventListener("keyup", function(event) {
        document.getElementById('send').classList.add('active-send')
        if (this.value == '') {
            document.getElementById('send').classList.remove('active-send')
        }
        if (event.keyCode === 13) {
            event.preventDefault();
            document.getElementById('send').click()
            document.getElementById('send').classList.remove('active-send')


        }
    });
    //  send message 
    // function sendMsg() {
    //     document.getElementById('send').classList.remove('active-send')
    //     var msg = $('.chat-input').val()
    //     if (!msg == '') {
    //         $('.chat-box').append(`
    //             <div class="card d-inline-block mb-3 float-right mr-2">
    //                 <div class="position-absolute pt-1 pr-2 r-0">
    //                     <span class="text-extra-small text-muted">09:41</span>
    //                 </div>
    //                 <div class="card-body">
    //                     <div class="d-flex flex-row pb-2">
    //                         <div class="d-flex flex-grow-1 min-width-zero">
    //                             <div
    //                                 class="m-2 pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
    //                                 <div class="min-width-zero">
    //                                     <p class="mb-0 list-item-heading truncate">Admin</p>
    //                                 </div>
    //                             </div>
    //                         </div>

    //                     </div>

    //                     <div class="chat-text-left">
    //                         <p class="mb-0 text-semi-muted">
    //                         ${msg}
    //                         </p>
    //                     </div>
    //                 </div>
    //             </div>
    //             <div class="clearfixs"></div>`)
    //         $('.chat-input').val('');
    //         var elements = document.getElementById("scroll-chat");
    //         elements.scrollTop = elements.scrollHeight;
    //     }
    // }
    // delete chat
    document.getElementById('delTicket').addEventListener("click", function() {
        swal({
                title: "Are you sure?",
                text: "Once Close",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {

                    $('.chat-remove').remove();

                    swal("Ticket Closed !", {
                        icon: "success",
                    });
                } else {
                    swal("Your  Ticket is safe!");
                }
            });

    });
</script>
@include('./Admin/Layout/Footer')