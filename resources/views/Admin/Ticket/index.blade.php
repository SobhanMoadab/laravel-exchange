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
                                {{-- User name  --}}
                                <p class="list-item-heading mb-1 truncate ">Name: <span id="heading-name"></span></p>
                            </a>
                            {{-- Date Create Ticket  --}}
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

                        <div class="col-12 chat-app notfoundmsg">
                            <div class="scroll" id="scroll-chat">
                                <div class="scroll-content chat-box d-flex align-item-center justify-content-center h-100">
                                    <div class=" d-flex align-items-center"> 
                                        <div class="d-flex flex-column text-center">
                                            <i class="iconsminds-close display-3" style="color:#eee;"></i>
                                            <span class=" w-100 my-3"> Message Not Found </span> 
                                            
                                            <button class="btn btn-outline-primary w-100" > Create Ticket  </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            {{-- ########   end Chat   ########### --}}




            {{-- ########    Chat notfound   ########### --}}
            {{-- <div class="col-12 chat-app">
                    <div class="scroll" id="scroll-chat">
                        <div class="scroll-content chat-box d-flex align-item-center justify-content-center h-100">
                            <div class=" d-flex align-items-center"> 
                                <div class="d-flex flex-column text-center">
                                    <i class="iconsminds-close display-3" style="color:#eee;"></i>
                                    <span class=" w-100 my-3"> Message Not Found </span> 
                                    
                                    <button class="btn btn-outline-primary w-100" > Create Ticket  </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            {{-- ########    end Chat notfound   ########### --}}

        </div>
    </div>

    <div class="app-menu">

        {{-- Modal Button  --}}
        <button class=" btn btn-primary rounded-2 w-100" type="button" data-toggle="modal" data-backdrop="static" data-target="#TicketCreate">Create New Ticket </button>
        {{-- End --}}

        <ul class="nav nav-tabs card-header-tabs ml-0 mr-0 my-1" role="tablist">
            <li class="nav-item w-100 text-center">
                <a class="nav-link active" id="first-tab" data-toggle="tab" href="#firstFull" role="tab"
                    aria-selected="true">Messages</a>
            </li>
        </ul>
        <div class="p-4 h-75">
            <div class="form-group">
                {{-- Sreach User Ticket --}}
                <input type="text" class="form-control rounded" placeholder="Search">
            </div>
            <div class="tab-content h-100">

                <div class="tab-pane fade show active  h-100" id="firstFull" role="tabpanel" aria-labelledby="first-tab">

                    <div class="scroll">

                        <div class="d-flex flex-row mb-1 border-bottom pb-3 mb-3">
                            <a class="d-flex" href="#">
                                <img alt="Profile Picture" src="/Admin/img/profiles/l-1.jpg" class="img-thumbnail border-0 rounded-circle mr-3 list-thumbnail align-self-center xsmall">
                            </a>
                            <div class="d-flex flex-grow-1 min-width-zero">
                                <div class="pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                    <div class="min-width-zero">
                                        <a href="#">
                                            <p class=" mb-0 truncate">Sarah Kortney</p>
                                        </a>
                                        <p class="mb-1 text-muted text-small">14:20</p>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="d-flex flex-row mb-1 border-bottom pb-3 mb-3">
                            <a class="d-flex" href="#">
                                <img alt="Profile Picture" src="/Admin/img/profiles/l-2.jpg" class="img-thumbnail border-0 rounded-circle mr-3 list-thumbnail align-self-center xsmall">
                            </a>
                            <div class="d-flex flex-grow-1 min-width-zero">
                                <div class="pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                    <div class="min-width-zero">
                                        <a href="#">
                                            <p class=" mb-0 truncate">Rasheeda Vaquera</p>
                                        </a>
                                        <p class="mb-1 text-muted text-small">11:10</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-row mb-1 border-bottom pb-3 mb-3">
                            <a class="d-flex" href="#">
                                <img alt="Profile Picture" src="/Admin/img/profiles/l-3.jpg" class="img-thumbnail border-0 rounded-circle mr-3 list-thumbnail align-self-center xsmall">
                            </a>
                            <div class="d-flex flex-grow-1 min-width-zero">
                                <div class="pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                    <div class="min-width-zero">
                                        <a href="#">
                                            <p class=" mb-0 truncate">Shelia Otterson</p>
                                        </a>
                                        <p class="mb-1 text-muted text-small">09:50</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-row mb-1  pb-3 mb-3">
                            <a class="d-flex" href="#">
                                <img alt="Profile Picture" src="/Admin/img/profiles/l-4.jpg" class="img-thumbnail border-0 rounded-circle mr-3 list-thumbnail align-self-center xsmall">
                            </a>
                            <div class="d-flex flex-grow-1 min-width-zero">
                                <div class="pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                    <div class="min-width-zero">
                                        <a href="#">
                                            <p class=" mb-0 truncate">Latarsha Gama</p>
                                        </a>
                                        <p class="mb-1 text-muted text-small">09:10</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="tab-pane fade  h-100 active show" id="secondFull" role="tabpanel" aria-labelledby="second-tab">
                    <div class="scroll" id="users-list">


{{-- list User --}}

                    </div>
                </div>
            </div>
        </div>

        <a class="app-menu-button d-inline-block d-xl-none" href="#">
            <i class="simple-icon-options"></i>
        </a>
    </div>

    <div class="chat-input-container d-flex justify-content-between align-items-center">
        <input class="form-control chat-input flex-grow-1" id="chat-input" type="text" placeholder="Say something...">
        <div>
            <input id='AdminFileTickt' type='file' onchange="files" hidden />
            <button id='AdminFileTicktBtn' type="button" class="btn btn-outline-primary icon-button large">
                <i class="simple-icon-paper-clip"></i>
            </button>
            <button type="button" id="send" class="btn btn-primary icon-button large">
                <i class="simple-icon-arrow-right"></i>
            </button>

        </div>
    </div>
    {{-- Modal Add Ticket  --}}
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
    {{-- End Modal  --}}


</main>
<script>
    // user ticket data
// console.log(json)
var url = 'http://api.alquran.cloud/v1/quran/en.asad';
$.ajax(url, function(d){
}).done(function(d){
    $.each(d.data.surahs, function (i, item) {
                    $('#users-list').append(`
                                        <div class="d-flex flex-row mb-3 border-bottom pb-3">
                                            <a class="d-flex" href="#">
                                                <img alt="Profile Picture" src="/Admin/img/profiles/l-1.jpg" class="img-thumbnail border-0 rounded-circle mr-3 list-thumbnail align-self-center xsmall">
                                            </a>
                                            {{-- @foreach($users as $index=>$user)
                                            @if(!empty($users[$index]['tickets'])) --}}
                                            <div onclick="get_user_tickets(${item.number})" class="d-flex flex-grow-1 min-width-zero">
                                                <div class="m-2 pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero ">
                                                    <div class="min-width-zero ">
                                                        <div class="d-flex justify-content-between ">
                                                            <a href="#" class="">
                                                                {{-- User Name --}}
                                                                <p class="mb-0 truncate"> ${item.englishName}
                                                                    {{-- {{$users[$index]['email']}} --}}

                                                                </p>

                                                            </a>
                                                        </div>
                                                        {{-- Ticket Title --}}
                                                        <p class="mb-0 text- "> ${item.englishNameTranslation}
                                                            {{-- {{$users[$index]['tickets'][0]['content']}} --}}
                                                        </p>
                                                    </div>
                                                    <span class=" badge badge-primary status-ticket">&nbsp;</span>

                                                </div>
                                            </div>
                                            {{-- @endif
                                            @endforeach --}}
                                        </div>
                    
                    `)  
    })
})

function get_user_tickets(event){
    $('.notfoundmsg').remove();
    $('.chat-remove').remove();
    $("#scroll-chat").scrollTop(0);

    $('.chat-box').append(`
        
        <div class="col-12 chat-app notfoundmsg">
                    <div class="scroll" id="scroll-chat">
                        <div class="scroll-content chat-box d-flex align-item-center justify-content-center h-100">
                            <div class=" d-flex align-items-center"> 
                                <div class="d-flex flex-column text-center">
                                    <div class="loadingio-spinner-rolling-z71busg6ach"><div class="ldio-noxuww260un">
                                            <div></div>
                                            </div></div>                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        
        `);

    $.ajax(url, function(d){
       
    }).done(function(d){
    var datas = d.data.surahs.filter(function(data){
        return data.number == event })
            $('#heading-name').html(datas[0].englishName);
            $.each(datas[0].ayahs , function (i, msg) {
                     $('.notfoundmsg').remove();
                    $('.chat-box').append(`
                                        <div class="card d-inline-block mb-3 float-right mr-2 chat-remove">
                                            <div class="position-absolute pt-1 pr-2 r-0">
                                                <span class="text-extra-small text-muted">09:41</span>
                                            </div>
                                            <div class="card-body">
                                                <div class="chat-text-left">
                                                    <p class="mb-0 text-semi-muted">
                                                    ${msg.text}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfixs chat-remove"></div>
                    
                    `)
                    var elements = document.getElementById("scroll-chat");
                    elements.scrollTop = elements.scrollHeight;
            })
    })
}

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

    function sendMsg() {
        document.getElementById('send').classList.remove('active-send')
        var msg = $('.chat-input').val()
        if (!msg == '') {
            $('.chat-box').append(`
                <div class="card d-inline-block mb-3 float-right mr-2">
                    <div class="position-absolute pt-1 pr-2 r-0">
                        <span class="text-extra-small text-muted">09:41</span>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-row pb-2">
                            <div class="d-flex flex-grow-1 min-width-zero">
                                <div
                                    class="m-2 pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                    <div class="min-width-zero">
                                        <p class="mb-0 list-item-heading truncate">Admin</p>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="chat-text-left">
                            <p class="mb-0 text-semi-muted">
                            ${msg}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="clearfixs"></div>`)
                    $('.chat-input').val('');
                    var elements = document.getElementById("scroll-chat");
                    elements.scrollTop = elements.scrollHeight;
                }
            }
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