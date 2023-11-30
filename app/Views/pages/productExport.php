<?= $this->extend('layout/admin') ?>

<?= $this->section('content') ?>
<style>

</style>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Product Export</h1>

</div>


<br>
<div class="bg-light container" style="padding: 20px;">
    <div class="d-sm-flex align-items-center justify-content-between mb-4 bg-light">
        <div>
            <h3 class="pr-5 align-items-start" style="margin-bottom: 10px; color: darkblue;">Result</h3>
            <p class="text-secondary">Total product: 120.549</p>
        </div>
        <div>
            <button style="background-color: MidnightBlue; color: white; border-radius: 5%; padding-right: 5px; padding-left: 5px;" class="btn custom-darkblue-btn align-items-end" data-toggle="modal" data-target="#chartPopup">GENERATION AL</button>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table bg-light" style="border-radius: 10px;">
        <thead>
            <tr>
                <th class="text-secondary" scope="col ">P CODE</th>
                <th class="text-secondary" scope="col ">P NAME</th>
                <th class="text-primary" scope="col ">P NAME AI</th>
                <th class="text-secondary" scope="col">DESCRIPTION</th>
                <th class="text-primary" scope="col">DESCRIPTION AI</th>
                <th class="text-secondary" scope="col">PRICING</th>
                <th class="text-primary con" scope="col">PRICING NEW</th>
            </tr>
        </thead>
        <tbody>
            <tr>
               <strong> <th scope="row">12345</th>
                <td >Contrary to popular belief</td></strong>
                <td class="text-info">Contrary to popular belief</td>
                <td class="text-secondary">Lorem Ipsum is simply dummy text of the printing Description</td>
                <td class="text-info">Lorem Ipsum has been the industry's standard dummy</td>
                <td>$50.00</td>
                <td class="text-info">$45.00</td>
            </tr>
            <tr>
                <th scope="row">67890</th>
                <td>Contrary to popular belief</td>
                <td  class="text-info">Contrary to popular belief 2</td>
                <td class="text-secondary">Lorem Ipsum is simply dummy text of the printing Description</td>
                <td  class="text-info">Lorem Ipsum has been the industry's standard dummy</td>
                <td>$65.00</td>
                <td  class="text-info">$60.00</td>
            </tr>
            <tr>
                <th scope="row">54321</th>
                <td>Contrary to popular belief</td>
                <td  class="text-info">Contrary to popular belief 3</td>
                <td class="text-secondary">Lorem Ipsum is simply dummy text of the printing Description</td>
                <td  class="text-info">Lorem Ipsum has been the industry's standard dummy</td>
                <td>$75.00</td>
                <td  class="text-info">$70.00</td>
            </tr>
            <tr>
                <th scope="row">54321</th>
                <td>Contrary to popular belief</td>
                <td  class="text-info"> Contrary to popular beliefv 4</td>
                <td class="text-secondary font-weight-bold">Lorem Ipsum is simply dummy text of the printing Description</td>
                <td  class="text-info">Lorem Ipsum has been the industry's standard dummy</td>
                <td>$75.00</td>
                <td  class="text-info">$70.00</td>
            </tr>
            <tr>
                <th scope="row">54321</th>
                <td>Contrary to popular belief</td>
                <td  class="text-info">Product AI 3</td>
                <td class="text-secondary font-weight-bold">Lorem Ipsum is simply dummy text of the printing Description</td>
                <td  class="text-info">Lorem Ipsum has been the industry's standard dummy</td>
                <td>$75.00</td>
                <td  class="text-info">$70.00</td>
            </tr>
        </tbody>
    </table>

    <div class="row justify-content-between">
        <div class="col-lg-4 ">

            <div class=" py-5">
                <div class="d-flex align-items-center row">
                    <div class="col-lg-2 align-items-right"> <span class="align-items-end">Show:</span></div>
                    <div class=" col-lg-3">

                        <div class="input-group ml-2">
                            <div class="input-group">

                                <input class="form-control text-center text-secondary" id="inputQuantity" name="quantity" type="number"
                                    value="5" style="max-width: 7rem">

                            </div>

                        </div>
                    </div>

                    <div class="col-lg-7 ">entries <span class="text-secondary">1-5 of 25</span> </div>
                </div>
            </div>


        </div>
        <div class="col-lg-6 py-5" style="padding-left: 22%;">

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



        <div>

<button class="btn btn-primary pr-5 btn-block" style="width:300px" data-toggle="modal" data-target="#chartPopup">Export CSV</button>
        </div>





    </div>



</div>





<!-- Content Row -->
<?= $this->endSection() ?>