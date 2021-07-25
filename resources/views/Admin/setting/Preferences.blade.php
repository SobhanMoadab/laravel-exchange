@include('Admin.Layout.Header')
@include('Admin.Layout.SidebarNav')
<main>
    <div class="container-fluid">
        <div class="row ">
        <div class="col-12 col-xl-6 my-2">
            <div class="card">
                <div class="card-body color-Change">
                </div>
            </div>
        </div>
        <div class=" col-12 col-xl-6 my-2 ">
            <div class="card">
                <div class="card-body ">
                    <form action="">
                        <div class="my-1">
                            <label for="site-title"> Site Title</label>
                            <input type="text" name="site title" id="site-title" class="form-control">
                        </div>
                        <div class="my-1">
                            <label for="logo"> Logo</label>
                            <div class="change-Img" onclick="document.getElementById('logo').click()">
                                <input type="file" id="logo" onchange="prosessLogo(event)" class="d-none"  accept="image/*">
                                <label class="mx-2">Click To Change Logo</label>
                                <input type="hidden" name="logo" id="hideLogo" />
                                <img src="" alt="" id="LogoImg" width="100">
                            </div>
                        </div>
                        <div class="my-1">
                            <label for="favicon"> Favicon</label>
                            <div class="change-Img" onclick="document.getElementById('favicon').click()">
                                <input type="file" id="favicon" onchange="prosessFavicon(event)" class="d-none"  accept="image/*">
                                <div>
                                    <label>Click To Change Fav icon</label>
                                    <p> image size in 50x50</p>
                                </div>

                                <input type="hidden" name="favicon" id="hideFavicon" />
                                <img src="" alt="" id="faviconImg" width="50">
                            </div>
                        </div>

                        <button class="btn btn-primary w-100 my-2  " type="submit">SaveChange</button>
                    </form>
                </div>
            </div>
        </div>

</div>
</div>
</main>
@include('Admin.Layout.Footer')