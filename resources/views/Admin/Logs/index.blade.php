@include('Admin.Layout.Header')
@include('Admin.Layout.SidebarNav')
<main>

    <div class="container-fluid">
        <div class="row ">
            <div class="col-5">
                <form action="#">
                    <select name="" onchange="check_input()" class="form-control my-2" id="logs_delete">
                        <option value="30">30</option>
                        <option value="60" selected="selected">60</option>
                        <option value="90">90</option>
                        <option value="custom">custom</option>
                    </select>
                    <div id="content"></div>
                    <button type="submit" class="btn btn-primary "> delete </button>
                </form>
            </div>
        </div>


</main>

@include('Admin.Layout.Footer')