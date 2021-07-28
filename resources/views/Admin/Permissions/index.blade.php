@include('Admin.Layout.Header')
@include('Admin.Layout.SidebarNav')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<style>
    .select2-container--default .select2-selection--single {
        border-radius: .1rem;
        outline: initial !important;
        box-shadow: initial !important;
        font-size: .8rem;
        padding: .5rem .75rem;
        line-height: 1;
        border: 1px solid #d7d7d7;
        border-top-color: rgb(215, 215, 215);
        border-right-color: rgb(215, 215, 215);
        border-bottom-color: rgb(215, 215, 215);
        border-left-color: rgb(215, 215, 215);
        background: #fff;
        color: #3a3a3a;
        border-color: #d7d7d7;
        height: calc(2em + .8rem);
    }

</style>
<main>

    <div class="container-fluid">
        <div class="row ">
            <div class="col-12">
                <div class="mb-3">
                    <h1>Permission list </h1>
                    {{-- <div class="text-zero top-right-button-container">
                        <a href="#" class="btn btn-primary btn-lg top-right-button mr-1">ADD NEW permisstion</a>

                    </div> --}}
                    <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                        <ol class="breadcrumb pt-0">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">permisstion</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="col-6 my-3 ">
                <div class="card  overflow-auto">
                    <div class="card-body">
                        <h5 class="card-title">User list</h5>
                        <ul class="list-group ">

                            <a href="#"
                                class="list-group-item list-group-item-action d-flex justify-content-between  align-items-center active ">

                                <div href="#" class=" py-2">
                                    Ali
                                </div>

                                <span>
                                    Editor
                                </span>
                            </a>
                            <a href="#"
                                class="list-group-item list-group-item-action d-flex justify-content-between  align-items-center ">

                                <div href="#" class=" py-2">
                                    Abas
                                </div>

                                <span>
                                    Admin
                                </span>
                            </a>


                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-6 my-3">
                <div class="card">
                    <div class="card-body ">
                        <form action="">
                            <h5 class="card-title">Permission Edit </h5>
                            <label> User Details </label>
                            <hr class="w-25">
                            <div class="form-row mb-2">
                                <div class="col">
                                    <label> First Name</label>
                                    <br>
                                    <span> Ali</span>
                                </div>
                                <div class="col">
                                    <label> Last Name</label>
                                    <br>
                                    <span> Abasi chobari</span>
                                </div>
                            </div>
                            <br>
                            <div class="form-row mb-2">
                                <div class="col">
                                    <label> Email</label>
                                    <br>
                                    <span> ali@aliali.com</span>
                                </div>
                                <div class="col">
                                    <label> Contry</label>
                                    <br>
                                    <span> Brezil</span>
                                </div>
                            </div>

                            <br>

                            <label> Profile Permissions </label>
                            <hr class="w-25">
                            <div class="form-row mb-2">

                                <div class="col">
                                    <label for="Roles"> Roles</label>
                                    <br>
                                    <!-- Dropdown -->
                                    <select id='selRoles' class=" " id="Roles">
                                        <option value='0'>Select User</option>
                                        <option value='1'>Yogesh singh</option>
                                        <option value='2'>Sonarika Bhadoria</option>
                                        <option value='3'>Anil Singh</option>
                                        <option value='4'>Vishal Sahu</option>
                                        <option value='5'>Mayank Patidar</option>
                                        <option value='6'>Vijay Mourya</option>
                                        <option value='7'>Rakesh sahu</option>
                                    </select>


                                </div>

                            </div>

                            <button class="btn btn-primary"> Update</button>
                        </form>
                    </div>
                </div>
            </div>

            <script>
                $("#selContry").select2({
                    width: '100%'
                });
                $("#selRoles").select2({
                    width: '100%'

                });


                function Update() {
                    swal("A wild Pikachu appeared! What do you want to do?", {
                            buttons: {
                                cancel: "Run away!",
                                catch: {
                                    text: "Throw Pokéball!",
                                    value: "catch",
                                },
                                defeat: true,
                            },
                        })
                        .then((value) => {
                            switch (value) {

                                case "defeat":
                                    swal("Pikachu fainted! You gained 500 XP!");
                                    break;

                                case "catch":
                                    swal("Gotcha!", "Pikachu was caught!", "success");
                                    break;

                                default:
                                    swal("Got away safely!");
                            }
                        });
                }
            </script>

        </div>
    </div>
</main>

@include('Admin.Layout.Footer')
