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

                                            <button class="btn btn-outline-primary w-100"> Create Ticket </button>
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
\
@include('./Admin/Layout/Footer')