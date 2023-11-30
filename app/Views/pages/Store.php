<?= $this->extend('layout/admin') ?>

<?= $this->section('content') ?>
<style>

</style>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800" data-toggle="modal" data-target="#exampleModal"> Store</h1>
    <div class="modal fade" id="chartPopup" tabindex="-1" role="dialog" aria-labelledby="chartPopupLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" style=" max-width: 500px;max-height: 600px;" role="document">
            <!-- Đổi modal-lg cho modal lớn hơn -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="chartPopupLabel">name </h5>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>
                <div class="modal-body">
                    <table class="table">
                        <div class="row">
                            <div class="col-lg-3">
                                <p class="mb-5">Store Name</p>


                                <p class="mb-5">Store type</p>
                                <p>Store Logo</p>
                            </div>
                            <div class="col-lg-7"><strong>
                                    <input type="text" class="form-control bg-white width mb-4" placeholder="From"
                                        aria-label="Default" aria-describedby="inputGroup-sizing-default" style="border:solid 1px #B4CDCD;width:330px">
                                    <p>
                                    <div class="dropdown bg-white">
                                        <button class="btn custom-bg-white dropdown-toggle " type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false" style="border:solid 1px #B4CDCD;width:330px">

                                            Category
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                    </p>


                                    <div class="position-relative row">
                                        <p class="col-lg-3">
                                            <img src="assets/img/undraw_profile_2.svg" width="100px"
                                                alt="Product Image">
                                        </p>
                                        <div class="position-absolute bottom-0 col-lg-8 ">
                                            <!-- Nút 1 -->
                                            <button class="btn btn-primary btn-sm me-2">
                                            <i class="bi bi-x-lg"></i>
                                            </button>
                                            <!-- Nút 2 -->
                                            <button class="btn btn-danger btn-sm">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <p class="text-secondary " style="font-size:10px"> Allowed file type: jpg, png,jpeg.
                                    </p>
                                </strong>
                            </div>
                        </div>



                    </table>


                </div>
            </div>
        </div>
    </div>
</div>


<br>
<div class="bg-light" style="padding: 20px;border-radius:10px;">
    <div class="d-sm-flex align-items-center justify-content-between mb-4 bg-light">


        <div>

            <button
                style="  background-color: #000033;color: white;border-radius:5%;padding-right:5px;padding-left:5px;width:100px"
                class="btn custom-darkblue-btn align-items-end" data-toggle="modal" data-target="#chartPopup">Add
                Store</button>

        </div>





    </div>

    <table class="table bg-light text-primary" style="border-radius:10px;">

        <thead>
            <tr class="text-secondary" >
                <th style="width: 15%;">P CODE</th>
                <th style="width: 45%;">NAME</th>
                <th style="width: 20%;">TYPE</th>
                <th style="width: 20%;">TOTAL SKU</th>
                <th style="width: 20%;">LOGO</th>
            </tr>
        </thead>
        <tbody>
            <tr style="color: darkblue; font-weight: 500;" >
                <td>001</td>
                <td>Product Lorem Ipsum is simply dummy text </td>
                <td>Type A</td>
                <td>50</td>
                <td><img src="/assets/img/undraw_profile.svg" alt="Logo 1" width="30px"></td>
            </tr>
            <tr style="color: darkblue; font-weight: 500;">
                <td>002</td>
                <td>Product Lorem Ipsum is simply dummy text </td>
                <td>Type B</td>
                <td>30</td>
                <td><img src="/assets/img/undraw_profile.svg" alt="Logo 1" width="30px"></td>
            </tr>
            <tr style="color: darkblue; font-weight: 500;">
                <td>003</td>
                <td>Product Lorem Ipsum is simply dummy text </td>
                <td>Type A</td>
                <td>25</td>
                <td><img src="/assets/img/undraw_profile.svg" alt="Logo 1" width="30px"></td>
            </tr>
            <tr style="color: darkblue; font-weight: 500;">
                <td>004</td>
                <td>Product Lorem Ipsum is simply dummy text </td>
                <td>Type C</td>
                <td>40</td>
                <td><img src="/assets/img/undraw_profile.svg" alt="Logo 1" width="30px"></td>
            </tr>
            <tr style="color: darkblue; font-weight: 500;">
                <td>005</td>
                <td>Product Lorem Ipsum is simply dummy text </td>
                <td>Type B</td>
                <td>20</td>
                <td><img src="/assets/img/undraw_profile.svg" alt="Logo 1" width="30px"></td>
            </tr>
        </tbody>
    </table>

    <div class="row justify-content-between">
    <div class="col-lg-4 col-md-6"> <!-- Thêm class col-md-6 cho responsive -->
        <div class="py-3">
            <div class="d-flex align-items-center">
                <div class="col-lg-2 col-md-3 align-items-right"> <!-- Thêm class col-md-3 cho responsive -->
                    <span>Show:</span>
                </div>
                <div class="col-lg-3 col-md-6 ml-2"> <!-- Thêm class col-md-6 cho responsive và điều chỉnh margin -->
                    <div class="input-group">
                        <input class="form-control text-center text-secondary" id="inputQuantity" name="quantity" type="number" value="5" style="max-width: 7rem">
                    </div>
                </div>
                <div class="col-lg-7 col-md-3"> <!-- Thêm class col-md-3 cho responsive -->
                    entries <span class="text-secondary">1-5 of 25</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 py-3" style="padding-left: 0;"> <!-- Thêm class col-md-6 cho responsive -->
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-end"> <!-- Thêm class justify-content-end để căn phải -->
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




    <div class="d-sm-flex align-items-center justify-content-between mb-4 bg-light">
        <div>
            <h3 class="pr-5 align-items-start" style="margin-bottom: 10px;color:darkblue"></h3>

        </div>
    </div>
</div>
<!-- Content Row -->
<?= $this->endSection() ?>