@include('User.Layout.Header');

<section class=" mt-5 mb-4">
    <div class="container bg-white rounded-2">
        <div class="row p-4 shadow-lg rounded-2">
            <div class="border-bottom border-1">
                <h3 class="float-start">View Ticket 6580844</h3>
            </div>
            <div class="mt-4 mb-4">
                <h5 class="mt-2 float-start">Title Ticket</h5>
                <a class="btn btn-primary float-end" href="#">Return</a>
            </div>
            <ul class="report-ticket">
                <li>Creation time : 1400/04/21 (2021/07/12 07:52)</li>
                <li>Last update : 1400/04/21 (2021-07-12 08:05:53)</li>
                <li>Ticket status : Answered</li>
                <li>sales : department</li>
            </ul>
            <div>
                <button id="click-reply-show" class="btn btn-success float-end ">New Ticket</button>
                <button id="click-reply-hide" class="btn btn-danger float-end" style="display:none;">Close </button>
            </div>
            <div class="reply-ticket " style="display: none;" >
                <form id="form-ticket" onsubmit="return validate()" method="post">
                    <div class="card my-2">
                        <div class="card-body">

                            <p>Message</p>
                            <textarea class="w-100" rows="9" name="textarea"></textarea>
                            <p>attachment</p>
                            <p class="fw-light">Allowed extensions: .jpg, .gif, .jpeg, .png, 
                            </p>
                            <div id="ticket-attachment">
                                <input class="form-control file-ticket" type="file" id="ticketImage" onchange="imageUploadedTicket();" accept=".png, .jpg, .jpeg, .gif">
                                <input type="hidden" name="icon" id="upload_base_ticket" />
                            </div>
                            <input id="ticket-add" type="button" class="btn btn-primary float-end"
                                value="New attachment">
                            <input id="ticket-Delete" type="button" class="btn btn-danger button-ticket float-end"
                                value="Delete">
                            <input type="submit" class="btn btn-success float-start" value="send">
                        </div>
                    </div>
                </form>
            </div>
            <div class="card mt-4 p-0">
                <div class="card-header bg-primary text-white">
                    adminheader|E-cms
                </div>
                <div class="card-body">
                    <p class="card-text fs-5">greetings and respect</p>
                    <p class="card-text fs-5">Dear users tickets will be closed in the following.</p>
                    <p class="card-text fs-5">Thank you for your support</p>
                    <p class="card-text">1400/04/21 (2021/07/12 08:05)</p>
                </div>
            </div>
            <div class="card mt-4 p-0">
                <div class="card-header bg-primary text-white">
                    Automatic robot|E-cms
                </div>
                <div class="card-body">
                    <p class="card-text fs-5">greetings and respect</p>
                    <p class="card-text fs-5">Dear users tickets will be closed in the following.</p>
                    <p class="card-text fs-5">Thank you for your support</p>
                    <p class="card-text">1400/04/21 (2021/07/12 08:05)</p>
                </div>
            </div>
            <div class="card mt-4 p-0">
                <div class="card-header bg-secondary text-white">
                    Name User|User
                </div>
                <div class="card-body">
                    <p class="card-text fs-5">greetings and respect</p>
                    <p class="card-text fs-5">Dear users tickets will be closed in the following.</p>
                    <p class="card-text fs-5">Thank you for your support</p>
                    <p class="card-text">1400/04/21 (2021/07/12 08:05)</p>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    
function validateForm() {
    let x = document.forms["myForm"]["text"].value;
    let y = document.forms["myForm"]["textarea"].value;
    if (x == "" || y == "") {
        alert("Please check all the marked options.");
        return false;
    }
}
$('#ticket-add').click(function () {
    $('#ticket-attachment').append('<input class="form-control file-ticket" type="file">');
});
$('#ticket-Delete').click(function () {
    $('#ticket-attachment').empty();
});
$('#click-reply-show').click(function () {
    $('.reply-ticket').slideDown('fast');
    $('#click-reply-hide').css('display', 'flex');
    $(this).css('display', 'none');
});
$('#click-reply-hide').click(function () {
    $('.reply-ticket').slideUp('fast');
    $('#click-reply-show').css('display', 'flex');
    $(this).css('display', 'none');
});
function validate() {
    let x = document.forms["myticket"]["textarea"].value;
    if (x == "") {
        alert("Please check all the marked options.");
        return false;
    }
}
</script>

@include('User.Layout.Footer');