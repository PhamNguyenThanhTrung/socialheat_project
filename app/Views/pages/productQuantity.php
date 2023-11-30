<?= $this->extend('layout/admin') ?>

<?= $this->section('content') ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Product Quantity</h1>

</div>

<style>




</style>


<div class="container1">


    <div class="container bg-light pt-4 py-3 ">
        <div class="dropdown bg-white container border">
            <button class="btn btn-white dropdown-toggle containe " type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
               Supplier Name
            </button>
            <ul class="dropdown-menu w-100">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
        </div>
        <div class="row bg-white pt-3 dashed-border ">
            <div class="col-2 d-flex align-items-left pr-5 text-dark icon1">
                <i class="bi bi-file-earmark-arrow-up"></i>
            </div>
            <div class="col text-left"><strong>
                    <p class="mb-2 text-dark">Drop here or click to select files</p>
                    <p class="mb-2 small text-secondary">File type: xls, csv</p>
                    <p class="mb-2 small text-secondary">Columns: column1 | column2 | column3 | column4</p><strong>
            </div>


        </div>
        <div class="buttons text-center">
            <button class="btn btn-secondary w-35 pl-5">Download File Template</button>
            <button class="btn btn-primary w-50">Update Quantity</button>
        </div>
    </div>






</div>

<?= $this->endSection('content') ?>