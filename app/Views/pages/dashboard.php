<?= $this->extend('layout/admin') ?>

<?= $this->section('content') ?>

<div class="s">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

    </div>
    <!-- Content Row -->
    <div class="row ">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card  shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold  text-uppercase mb-1">
                                <div class="row">
                                   
                                    <div class="col-lg-3"> <img src="/assets/img/vuong.svg" alt="Product Image"></div>
                                    <div class="col-lg-5 pt-3" style="line-height:0">
                                        <p> Total Product</p>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"> <?= $totalProducts ?></div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card  shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                            <div class="text-xs font-weight-bold  text-uppercase mb-1">
                                <div class="row">
                                  
                                    <div class="col-lg-3"> <img src="/assets/img/tui.svg" alt="Product Image"></div>
                                    <div class="col-lg-5 pt-3" style="line-height:0">
                                        <p> Total Supplier</p>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalSupplier ?></div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                            <div class="text-xs font-weight-bold  text-uppercase mb-1">
                                <div class="row">
                                    
                                    <div class="col-lg-3"> <img src="/assets/img/store.svg" alt="Product Image"></div>
                                    <div class="col-lg-5 pt-3" style="line-height:0">
                                        <p> Total Store</p>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">123</div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->

    </div>
    <hr>

</div>
<!-- Content Row -->
<?= $this->endSection() ?>