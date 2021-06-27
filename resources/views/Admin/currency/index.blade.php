@include('Admin.layout.Header')
@include('Admin.layout.SidebarNav')
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Currncy</h1>
                <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                    <ol class="breadcrumb pt-0">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">Library</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Data</li>
                    </ol>
                </nav>
                <div class="separator mb-5"></div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-12  ">
                    <li class="list-group-item d-flex justify-content-between align-items-center border-0">
                        <div>
                            Currncy Name
                            </div>
                            <div class=" text-warning ">
                               Price
                            </div>
                            <div class="text-danger">
                               Min
                            </div>
                            <div class="text-info">
                               Max
                            </div>
                          <div >
                           status
                          </div>
                    </li>
                  </ul>
                <ul class="list-group  mt-2">
                    <li class="list-group-item d-flex justify-content-between align-items-center border-0">
                        <div>
                         <img width="20" src="/client/images/svg/bitcoin-441959.svg" class="mr-2" alt="">
                         USD
                         </div>
                         <div class=" text-warning ">
                            Price: $90.4
                         </div>
                         <div class="text-danger">
                            Min: $90.4
                         </div>
                         <div class="text-info">
                            Max: $90.4
                         </div>
                       <div class="form-check form-switch">
                         <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                       </div>
                     </li>
                     <li class="list-group-item d-flex justify-content-between align-items-center border-0">
                        <div>
                         <img width="20" src="/client/images/svg/aurouracoin-441945.svg" class="mr-2" alt="">
                         DOAG
                         </div>
                         <div class=" text-warning ">
                            Price: $90.4
                         </div>
                         <div class="text-danger">
                            Min: $90.4
                         </div>
                         <div class="text-info">
                            Max: $90.4
                         </div>
                         
                       <div class="form-check form-switch">
                         <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                       </div>
                     </li>
                     <li class="list-group-item d-flex justify-content-between align-items-center border-0">
                        <div>
                         <img width="20" src="/client/images/svg/devcoin-441952.svg" class="mr-2" alt="">
                         TTER
                         </div>
                         <div class=" text-warning ">
                            Price: $90.4
                         </div>
                         <div class="text-danger">
                            Min: $90.4
                         </div>
                         <div class="text-info">
                            Max: $90.4
                         </div>
                         
                       <div class="form-check form-switch">
                         <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                       </div>
                     </li>
                     
                  </ul>
            </div>
        </div>
    </div>
</main>
@include('Admin.layout.Footer')