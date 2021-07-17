@include('User.Layout.Header')
 
<section class="mt-5 mb-4">
    <div class="container">
        <div class="row">
            <div class="border-bottom border-1">
                <h3 class="float-start">Support</h3>
                <p class="float-end">Page 1 of 0 , Result 0</p>
            </div>
            <div class=" mb-3 mt-4 d-flex justify-content-between">
                <a href="#" class="float-end">
                    <button type="button" class="btn btn-primary">List</button>
                </a>
                <select class=" form-select form-select-sm w-25" aria-label=".form-select-sm example">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>

            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Title</th>
                        <th scope="col">Ticket Status</th>
                        <th scope="col">Last Update</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="link-el" data-href="#">
                        <td class="text-center">1400/03/31&nbsp;(2021/06/21&nbsp;14:05)</td>
                        <td class="text-center">
                            <div class="text-left text-truncate w-75"><a><i
                                        class="icon md-comment-list margin-right-5"></i>#6883361 -
                                    Error - Wallet 1245-****-1215 Error - Wallet 1245-****-1215</a>
                            </div>
                        </td>
                        <td class="text-center"><span class="badge  bg-danger">Danger</span></td>
                        <td>1400/03/31&nbsp;(2021/06/21&nbsp;14:05)</td>
                    </tr>
                    <tr class="link-el" data-href="#">
                        <td class="text-center">1400/03/31&nbsp;(2021/06/21&nbsp;14:05)</td>
                        <td class="text-center">
                            <div class="text-left text-truncate w-75"><a><i
                                        class="icon md-comment-list margin-right-5"></i>#6883361 -
                                    Error - Wallet 1245-****-1215 Error - Wallet 1245-****-1215</a>
                            </div>
                        </td>
                        <td class="text-center"><span class="badge  bg-success">Done</span></td>
                        <td>1400/03/31&nbsp;(2021/06/21&nbsp;14:05)</td>
                    </tr>
                    <tr class="link-el" data-href="#">
                        <td class="text-center">1400/03/31&nbsp;(2021/06/21&nbsp;14:05)</td>
                        <td class="text-center">
                            <div class="text-left text-truncate w-75"><a><i
                                        class="icon md-comment-list margin-right-5"></i>#6883361 -
                                    Error - Wallet 1245-****-1215 Error - Wallet 1245-****-1215</a>
                            </div>
                        </td>
                        <td class="text-center"><span class="badge  bg-info">in progress</span></td>
                        <td>1400/03/31&nbsp;(2021/06/21&nbsp;14:05)</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</section>

<script>

    $(document).ready(function ($) {
        $(".link-el").click(function () {
            window.location = $(this).data("href");
        });
    });
</script>
@include('User.Layout.Footer')
