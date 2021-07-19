@include('./Admin/Layout/Header')
@include('./Admin/Layout/SidebarNav')
<main>
    <div class="container-fluid">
        <div class="row app-row">
            <div class="col-12 chat-app">
                <div class="d-flex flex-row justify-content-between mb-3 chat-heading-container">

                    <div class="card-body pl-0 align-self-center d-flex flex-lg-row justify-content-between min-width-zero">
                        <div>
                            <a href="#">
                                <p class="list-item-heading mb-1 truncate ">Sarah Kortney</p>
                            </a>
                            <p class="mb-0 text-muted text-small">Last seen today 01:24</p>
                        </div>
                        <div>
                            <button type="button" class="btn btn-outline-danger mx-4">
                                delete chat
                                <i class="simple-icon-trash"></i>
                            </button>
                        </div>

                    </div>


                </div>
                <div class="separator mb-5"></div>
                <div class="scroll" id="scroll-chat">
                    <div class="scroll-content chat-box">
                        <div class="card d-inline-block mb-3 float-left mr-2">
                            <div class="position-absolute pt-1 pr-2 r-0">
                                <span class="text-extra-small text-muted">09:25</span>
                            </div>
                            <div class="card-body">
                                <div class="d-flex flex-row pb-2">
                                    <div class=" d-flex flex-grow-1 min-width-zero">
                                        <div class="m-2 pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                            <div class="min-width-zero">
                                                <p class="mb-0 truncate list-item-heading">User</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="chat-text-left">
                                    <p class="mb-0 text-semi-muted">
                                        What do you think about our plans for this product launch?
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>

                        <div class="clearfix"></div>
                        <div class="card d-inline-block mb-3 float-left mr-2">
                            <div class="position-absolute pt-1 pr-2 r-0">
                                <span class="text-extra-small text-muted">09:30</span>
                            </div>
                            <div class="card-body">
                                <div class="d-flex flex-row pb-2 ">
                                    <a class=" btn btn-outline-primary p-2" href="/Admin/img/image.jpg" download>
                                        <i class="iconsminds-go-bottom"></i>
                                    </a>
                                    <div class="d-flex downfile ">
                                        fileName
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="card d-inline-block mb-3 float-right mr-2">
                            <div class="position-absolute pt-1 pr-2 r-0">
                                <span class="text-extra-small text-muted">09:41</span>
                            </div>
                            <div class="card-body">
                                <div class="d-flex flex-row pb-2">
                                    <div class="d-flex flex-grow-1 min-width-zero">
                                        <div class="m-2 pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                            <div class="min-width-zero">
                                                <p class="mb-0 list-item-heading truncate">Admin</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="chat-text-left">
                                    <p class="mb-0 text-semi-muted">
                                        I am very busy at the moment and on top of everything, I forgot my umbrella
                                        today.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="app-menu">
        <ul class="nav nav-tabs card-header-tabs ml-0 mr-0 mb-1" role="tablist">
            <li class="nav-item w-100 text-center">
                <a class="nav-link active" id="second-tab" data-toggle="tab" href="#secondFull" role="tab" aria-selected="false">Ticket</a>
            </li>
        </ul>

        <div class="p-4 h-75">
            <div class="form-group">
                <input type="text" class="form-control rounded" placeholder="Search">
            </div>
            <div class="tab-content h-100">


                <div class="tab-pane fade  h-100 active show" id="secondFull" role="tabpanel" aria-labelledby="second-tab">
                    <div class="scroll">

                        <div class="d-flex flex-row mb-3 border-bottom pb-3">
                            <a class="d-flex" href="#">
                                <img alt="Profile Picture" src="/Admin/img/profiles/l-1.jpg" class="img-thumbnail border-0 rounded-circle mr-3 list-thumbnail align-self-center xsmall">
                            </a>
                            <div class="d-flex flex-grow-1 min-width-zero">
                                <div class="m-2 pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                    <div class="min-width-zero">
                                        <a href="#">
                                            <p class="mb-0 truncate">Sarah Kortney</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-row mb-3 border-bottom pb-3">
                            <a class="d-flex" href="#">
                                <img alt="Profile Picture" src="/Admin/img/profiles/l-2.jpg" class="img-thumbnail border-0 rounded-circle mr-3 list-thumbnail align-self-center xsmall">
                            </a>
                            <div class="d-flex flex-grow-1 min-width-zero">
                                <div class="m-2 pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                    <div class="min-width-zero">
                                        <a href="#">
                                            <p class="mb-0 truncate">Williemae Lagasse</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-row mb-3 border-bottom pb-3">
                            <a class="d-flex" href="#">
                                <img alt="Profile Picture" src="/Admin/img/profiles/l-3.jpg" class="img-thumbnail border-0 rounded-circle mr-3 list-thumbnail align-self-center xsmall">
                            </a>
                            <div class="d-flex flex-grow-1 min-width-zero">
                                <div class="m-2 pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                    <div class="min-width-zero">
                                        <a href="#">
                                            <p class="mb-0 truncate">Tommy Nash</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-row mb-3 border-bottom pb-3">
                            <a class="d-flex" href="#">
                                <img alt="Profile Picture" src="/Admin/img/profiles/l-4.jpg" class="img-thumbnail border-0 rounded-circle mr-3 list-thumbnail align-self-center xsmall">
                            </a>
                            <div class="d-flex flex-grow-1 min-width-zero">
                                <div class="m-2 pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                    <div class="min-width-zero">
                                        <a href="#">
                                            <p class="mb-0 truncate">Mayra Sibley</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-row mb-3 border-bottom pb-3">
                            <a class="d-flex" href="#">
                                <img alt="Profile Picture" src="/Admin/img/profiles/l-5.jpg" class="img-thumbnail border-0 rounded-circle mr-3 list-thumbnail align-self-center xsmall">
                            </a>
                            <div class="d-flex flex-grow-1 min-width-zero">
                                <div class="m-2 pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                    <div class="min-width-zero">
                                        <a href="#">
                                            <p class="mb-0 truncate">Kathryn Mengel</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-row mb-3 border-bottom pb-3">
                            <a class="d-flex" href="#">
                                <img alt="Profile Picture" src="/Admin/img/profiles/l-2.jpg" class="img-thumbnail border-0 rounded-circle mr-3 list-thumbnail align-self-center xsmall">
                            </a>
                            <div class="d-flex flex-grow-1 min-width-zero">
                                <div class="m-2 pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                    <div class="min-width-zero">
                                        <a href="#">
                                            <p class="mb-0 truncate">Williemae Lagasse</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-row mb-3 border-bottom pb-3">
                            <a class="d-flex" href="#">
                                <img alt="Profile Picture" src="/Admin/img/profiles/l-3.jpg" class="img-thumbnail border-0 rounded-circle mr-3 list-thumbnail align-self-center xsmall">
                            </a>
                            <div class="d-flex flex-grow-1 min-width-zero">
                                <div class="m-2 pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                    <div class="min-width-zero">
                                        <a href="#">
                                            <p class="mb-0 truncate">Tommy Nash</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-row mb-3 border-bottom pb-3">
                            <a class="d-flex" href="#">
                                <img alt="Profile Picture" src="/Admin/img/profiles/l-4.jpg" class="img-thumbnail border-0 rounded-circle mr-3 list-thumbnail align-self-center xsmall">
                            </a>
                            <div class="d-flex flex-grow-1 min-width-zero">
                                <div class="m-2 pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                    <div class="min-width-zero">
                                        <a href="#">
                                            <p class="mb-0 truncate">Mayra Sibley</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-row mb-3 border-bottom pb-3">
                            <a class="d-flex" href="#">
                                <img alt="Profile Picture" src="/Admin/img/profiles/l-3.jpg" class="img-thumbnail border-0 rounded-circle mr-3 list-thumbnail align-self-center xsmall">
                            </a>
                            <div class="d-flex flex-grow-1 min-width-zero">
                                <div class="m-2 pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                    <div class="min-width-zero">
                                        <a href="#">
                                            <p class="mb-0 truncate">Tommy Nash</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-row mb-3 border-bottom pb-3">
                            <a class="d-flex" href="#">
                                <img alt="Profile Picture" src="/Admin/img/profiles/l-4.jpg" class="img-thumbnail border-0 rounded-circle mr-3 list-thumbnail align-self-center xsmall">
                            </a>
                            <div class="d-flex flex-grow-1 min-width-zero">
                                <div class="m-2 pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                    <div class="min-width-zero">
                                        <a href="#">
                                            <p class="mb-0 truncate">Mayra Sibley</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-row mb-3 border-bottom pb-3">
                            <a class="d-flex" href="#">
                                <img alt="Profile Picture" src="/Admin/img/profiles/l-5.jpg" class="img-thumbnail border-0 rounded-circle mr-3 list-thumbnail align-self-center xsmall">
                            </a>
                            <div class="d-flex flex-grow-1 min-width-zero">
                                <div class="m-2 pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                    <div class="min-width-zero">
                                        <a href="#">
                                            <p class="mb-0 truncate">Kathryn Mengel</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-row mb-3 border-bottom pb-3">
                            <a class="d-flex" href="#">
                                <img alt="Profile Picture" src="/Admin/img/profiles/l-2.jpg" class="img-thumbnail border-0 rounded-circle mr-3 list-thumbnail align-self-center xsmall">
                            </a>
                            <div class="d-flex flex-grow-1 min-width-zero">
                                <div class="m-2 pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                    <div class="min-width-zero">
                                        <a href="#">
                                            <p class="mb-0 truncate">Williemae Lagasse</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-row mb-3 border-bottom pb-3">
                            <a class="d-flex" href="#">
                                <img alt="Profile Picture" src="/Admin/img/profiles/l-3.jpg" class="img-thumbnail border-0 rounded-circle mr-3 list-thumbnail align-self-center xsmall">
                            </a>
                            <div class="d-flex flex-grow-1 min-width-zero">
                                <div class="m-2 pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                    <div class="min-width-zero">
                                        <a href="#">
                                            <p class="mb-0 truncate">Tommy Nash</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-row mb-3 pb-3">
                            <a class="d-flex" href="#">
                                <img alt="Profile Picture" src="/Admin/img/profiles/l-4.jpg" class="img-thumbnail border-0 rounded-circle mr-3 list-thumbnail align-self-center xsmall">
                            </a>
                            <div class="d-flex flex-grow-1 min-width-zero">
                                <div class="m-2 pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                    <div class="min-width-zero">
                                        <a href="#">
                                            <p class="mb-0 truncate">Mayra Sibley</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <a class="app-menu-button d-inline-block d-xl-none" href="#">
            <i class="simple-icon-options"></i>
        </a>
    </div>

    <div class="chat-input-container d-flex justify-content-between align-items-center">
        <input class="form-control chat-input flex-grow-1" type="text" placeholder="Say something...">
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
</main>
<script>
    document.getElementById('AdminFileTicktBtn').addEventListener('click', fileupload);

    function fileupload() {
        document.getElementById('AdminFileTickt').click();
    }
    document.getElementById('send').addEventListener('click', sendMsg);

    function sendMsg() {
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
                <div class="clearfix"></div>`)
            $('.chat-input').val('');
            var elements = document.getElementById("scroll-chat");
            elements.scrollTop = elements.scrollHeight;
        }
    }
</script>
@include('./Admin/Layout/Footer')