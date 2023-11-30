<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
<!-- 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <title>SB Admin 2 - Blank</title>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="/assets/css/styles.css" rel="stylesheet" />
   <!-- Bootstrap core CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />

<!-- Font Awesome icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">

<!-- Your custom styles -->
<link href="/assets/css/styles.css" rel="stylesheet" />

<!-- Bootstrap core JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- jQuery -->


<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>

    <!-- Nhúng thư viện Chart.js -->
    <style>
    .colod {
        background-color: #EEEEEE;
        border-radius: 10px;
    }

    .noew {
        padding: 2%;
        border-radius: 100px;
    }

    .list-group-item {
        border: none;
    }
    </style>

    <div class="colod" style="font-size: 14px;">
        <div class="row noew">
            <div class="col-lg-2 "  >

            <nav class="navbar navbar-expand-lg navbar-light  border-bottom" style="z-index: 100;position:fixed;">
                    <div class="container-fluid" style="padding-top:0px;">
                        <button class="btn btn-primary" id="sidebarToggle" hidden > Toggle Menu</button>
                        <button class="navbar-toggler"  type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent" >
                            <div class="d-flex" id="wrapper" style="width:300px;">
                                <!-- Sidebar-->
                                <div class="list-group-item-secondary1 " style=" border-radius: 20px;"
                                    id="sidebar-wrapper">
                                    <div class="sidebar-heading list-group-item-secondary" style="border-radius:10px">
                                        <p style=" font-size: 25px;"><strong><span class="colored-text text-lg "
                                                    style="  background-color: DarkBlue;color: white;border-radius:5%;padding-right:5px;
                                                    padding-left:5px">SOCIAL</span>HEAT</strong>
                                        </p>
                                    </div>
                                    <div class="list-group list-group-flush " border:none style="width:75%">
                                        <a class="list-group-item list-group-item-action list-group-item-secondary p-3" href="/public/dashboard"><img src="/assets/img/dashboard.svg"><strong> Dashboard</strong></a>
                                        <a class="list-group-item list-group-item-action list-group-item-secondary p-3"href="/public/product"><img src="/assets/img/product.svg"><strong> Product</strong></a>
                                        <a class="list-group-item list-group-item-action list-group-item-secondary p-3" href="/public/productManager"><img src="/assets/img/productt.svg"><strong> Product Advcant</strong> </a>
                                        <a class="list-group-item list-group-item-action list-group-item-secondary p-3" href="#!"><img src="/assets/img/storea.svg"><strong> Profile</strong></a>
                                        <a class="list-group-item list-group-item-action list-group-item-secondary p-3" href="/public/supplier"><img src="/assets/img/supplier.svg"><strong> Supplier</strong></a>
                                        <a class="list-group-item list-group-item-action list-group-item-secondary p-3" href="#!"><img src="/assets/img/change.svg"><strong> Change Password</strong></a>
                                        <a class="list-group-item list-group-item-action list-group-item-secondary p-3"
                                            type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample"
                                            aria-expanded="false" aria-controls="collapseWidthExample" href="#!"><img src="/assets/img/admin.svg"><strong> Admin</strong></a>
            
            
            
                                        <div  style="height:90px">
                                            <div class="collapse collapse-horizontal" id="collapseWidthExample">
                                                <div class="card card-body list-group-item-secondary "
                                                    style="width: 200px;border:none;">
            
                                                    <li class="list-group-item list-group-item-secondary "
                                                        style="line-height: 0.5;"><i class="bi bi-dot"></i>
                                                        An item</li>
                                                    <li class="list-group-item list-group-item-secondary" style="line-height: 0.5;">
                                                        <i class="bi bi-dot"></i>A
                                                        second item</li>
                                                    <!-- <!-- <li class="list-group-item list-group-item-secondary "><i
                                                            class="bi bi-dot"></i>An item</li>
                                                    <li class="list-group-item list-group-item-secondary"><i class="bi bi-dot"></i>A
                                                        second item</li> -->
                                                    <!-- <li class="list-group-item list-group-item-secondary "
                                                        style="line-height: 0.5;"><i class="bi bi-dot"></i>An item</li>
                                                    <li class="list-group-item list-group-item-secondary "
                                                        style="line-height: 0.5;"><i class="bi bi-dot"></i>A second item</li> -->
            
            
                                                </div>
            
                                            </div>
                                        </div>
            
                                    </div>
                                    <div class="container mt-2">
                                        <div class="row ">
                                            <div class="col-lg-3 pr-5">
                                                <div class="circular-image small ">
                                                    <img src="/assets/img/undraw_profile.svg" style="width:50px" alt="Profile Image">
            
                                                </div>
                                            </div>
                                            <div class="col-lg-5 mt-2" id="usernameDisplay">
    <?php
    // Kiểm tra xem người dùng đã đăng nhập chưa
    if (session()->get('user')) {
        echo session()->get('user')['name']; // Hiển thị tên người dùng
    }
    ?>
</div>
<div class="col-lg-4 mt-1" >
<div class="dropdown dropup" style="position:absolute; overflow: visible;">
<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-gear"></i>
    </button>
    <ul class="dropdown-menu dropdown-menu-dark" style="position:absolute; top: -200%; right: 0;">
  <li ><a class="dropdown-item" href="<?= base_url('logout') ?>">Đăng xuất</a></li>
    <!-- <li><a class="dropdown-item" href="#">Another action</a></li>
    <li><a class="dropdown-item" href="#">Something else here</a></li> -->
    <li><hr class="dropdown-divider"></li>
    <!-- <li><a class="dropdown-item" href="#">Separated link</a></li> -->
  </ul>
</div>


</div>
                                        </div>
                                    </div>
                                </div>
            
                                <!-- Page content wrapper-->
            
                            </div>
                    </div>
                </nav>

            </div>


            <div class="col-lg-10" style="padding-left:100px">


                <?= $this->renderSection('content') ?>
            </div>
        </div>

    </div>


</html>
















