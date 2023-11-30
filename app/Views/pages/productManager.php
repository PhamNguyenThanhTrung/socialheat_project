<?= $this->extend('layout/admin') ?>

<?= $this->section('content') ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Product Manager</h1>

</div>

<div class="hew bg-light text-dark container">
    <nav class="hew bg-light text-dark container">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3 ">
            <i class="fa fa-bars"></i>
        </button>

        <div class="">
            <!-- Các phần tử con của phần tử sẽ sử dụng flexbox layout -->

            <div class="row">
                <div class="col-md-3">
                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search bg-white ">
                        <div class="input-group ">
                            <div class="input-group-append">
                                <button class="btn " type="button">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                            <input type="text" class="form-control border-0 small " placeholder="Search Code/Name..."
                                aria-label="Search" aria-describedby="basic-addon2">

                        </div>
                    </form>
                </div>

                <div class="col-md-3">
                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search bg-white">
                        <div class="input-group">
                            <div class="input-group-append">
                                <button class="btn " type="button">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                            <input type="text" class="form-control border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">

                        </div>
                    </form>
                </div>
                <div class="col-md-3 ">
                    <!-- Topbar Search -->
                    <div class="dropdown bg-white container">
                        <button class="btn custom-bg-white dropdown-toggle dropdown-toggle-end" type="button"
                            id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            Supplier
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>

                </div>


                <div class="col-md-3">
                    <!-- Topbar Search -->
                    <div class="dropdown bg-white">
                        <button class="btn custom-bg-white dropdown-toggle dropdown-toggle-end" type="button"
                            id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            Category
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>


                </div>
            </div>




        </div>
        <br>
        <!-- hhhhhhhhhhhhhhhhhhhhhhhhhhhh -->
        <div class="row">
            <div class="col-md-4">
                <!-- Topbar Search -->
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search ">
                    <div class="input-group input-group-sm mb-3 ">
                        <div class="input-group-prepend">
                            <div class="row">
                                <div class="col-lg-2">
                                    <h6 class="py-2 pr-4 text-secondary">Price <h6>

                                </div>
                                <div class="col-lg-10 d-flex">

                                    <input type="text" class="form-control bg-white border-0" placeholder="From"
                                        aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                    <div class="input-group-prepend">
                                        <h5 class="" style="padding:5px ">- <h5>
                                    </div>
                                    <input type="text" class="form-control bg-white border-0" placeholder="To"
                                        aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                </div>
                            </div>

                        </div>

                    </div>
                </form>

            </div>

            <div class="col-md-4">
                <!-- Topbar Search -->
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search ">
                    <div class="input-group input-group-sm mb-3 ">
                        <div class="row">
                            <div class="col-lg-3">
                                <h6 class="py-2 pr-4 text-secondary">Quantity <h6>

                            </div>
                            <div class="col-lg-9 d-flex">

                                <input type="text" class="form-control bg-white border-0" placeholder="From"
                                    aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                <div class="input-group-prepend">
                                    <h5 style="padding:5px ">- <h5>
                                </div>
                                <input type="text" class="form-control bg-white border-0" placeholder="To"
                                    aria-label="Default" aria-describedby="inputGroup-sizing-default">
                            </div>
                        </div>
                    </div>
                </form>

            </div>
            <div class="col-md-4">
                <!-- Topbar Search -->
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search ">
                    <div class="input-group input-group-sm mb-3 ">
                        <div class="row">
                            <div class="col-lg-3">
                                <h6 class="py-2 pr-4 text-secondary">Shipping <h6>

                            </div>
                            <div class="col-lg-9 d-flex">

                                <input type="text" class="form-control bg-white border-0" placeholder="From"
                                    aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                <div class="input-group-prepend">
                                    <h5 style="padding:5px ">- <h5>
                                </div>
                                <input type="text" class="form-control bg-white border-0" placeholder="To"
                                    aria-label="Default" aria-describedby="inputGroup-sizing-default">
                            </div>
                        </div>
                    </div>
                </form>

            </div>



        </div>


    </nav>
    <div class="d-sm-flex align-items-center justify-content-between ">
        <h1 class=""></h1>
        <div>
            <button style="  color: white" class="btn btn-primary align-items-end" data-toggle="modal"
                data-target="#chartPopup">Import
                product</button>

            <button style="  background-color: DarkBlue;color: white" class="btn btn-primary align-items-end"
                data-toggle="modal" data-target="#chartPopup">Export
                product</button>
            <button class="btn btn-primary" data-toggle="modal" data-target="#chartPopup">Xem Biểu Đồ</button>
        </div>
    </div>
</div>


</nav>
<br>

<div class="container4">
    <div class="row">
        <div class="col-md-12">
            <div class="bg-light" style="padding: 20px;border-radius:20px">

                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <div class="mb-4">
                        <strong>
                            <h5 class="pr-5 align-items-start" style="margin-bottom: 10px;color:darkblue">Result</h5>
                        </strong>
                        <p>Total product: 120.549</p>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table bg-light" style="border-radius: 10px;">
        <thead>
            <tr>
                <th scope="col">P CODE</th>
                <th scope="col">P NAME</th>
                <th scope="col">P NAME AI</th>
                <th scope="col">DESCRIPTION</th>
                <th scope="col">DESCRIPTION AI</th>
                <th scope="col">PRICING</th>
                <th scope="col">PRICING NEW</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">12345</th>
                <td>Product 1</td>
                <td>Product AI 1</td>
                <td>Description 1</td>
                <td>Description AI 1</td>
                <td>$50.00</td>
                <td>$45.00</td>
            </tr>
            <tr>
                <th scope="row">67890</th>
                <td>Product 2</td>
                <td>Product AI 2</td>
                <td>Description 2</td>
                <td>Description AI 2</td>
                <td>$65.00</td>
                <td>$60.00</td>
            </tr>
            <tr>
                <th scope="row">54321</th>
                <td>Product 3</td>
                <td>Product AI 3</td>
                <td>Description 3</td>
                <td>Description AI 3</td>
                <td>$75.00</td>
                <td>$70.00</td>
            </tr>
            <tr>
                <th scope="row">54321</th>
                <td>Product 3</td>
                <td>Product AI 3</td>
                <td>Description 3</td>
                <td>Description AI 3</td>
                <td>$75.00</td>
                <td>$70.00</td>
            </tr>
            <tr>
                <th scope="row">54321</th>
                <td>Product 3</td>
                <td>Product AI 3</td>
                <td>Description 3</td>
                <td>Description AI 3</td>
                <td>$75.00</td>
                <td>$70.00</td>
            </tr>
        </tbody>
    </table>

    <div class="row justify-content-between">
                    <div class="col-md-4">
                        <div class="py-5">
                            <div class="d-flex align-items-center">
                                <div class="mr-2"> <span>Show:</span></div>
                                <div class="mr-2">
                                    <div class="input-group">
                                        <input class="form-control text-center text-secondary" id="inputQuantity"
                                            name="quantity" type="number" value="5" style="max-width: 7rem">
                                    </div>
                                </div>
                                <div>entries <span class="text-secondary">1-5 of 25</span> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 py-5">
                        <nav aria-label="Page navigation">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">...</a></li>

                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
                </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.image-container {
    position: relative;
    display: inline-block;
}

.badge {
    position: absolute;
    top: 0;
    right: 0;
    background-color: red;
    color: white;
    padding: 5px 10px;
    border-radius: 50%;
}
</style>


<!-- Content Row -->
<?= $this->endSection() ?>