<?= $this->extend('layout/admin') ?>

<?= $this->section('content') ?>
<style>

</style>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800" data-toggle="modal" data-target="#exampleModal">Supplier</h1>
    <div class="modal fade" id="chartPopup" tabindex="-1" role="dialog" aria-labelledby="chartPopupLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" style=" max-width: 500px;max-height: 600px;" role="document">
            <!-- Đổi modal-lg cho modal lớn hơn -->
            <div class="modal-content">
                <div class="modal-header">
                   
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>
                <div class="modal-body">
                    <table class="table">
                        <div class="row">
                           
                            <div class="col-lg-12"><strong>
                                   
                                    <p>
                                    <div class=" bg-white">
                                    <div class="row">
                            <div class="col-lg-3">
                                <h6 class="py-2 pr-4 text-secondary ">Suplier Name <h6>

                            </div>
                            <div class="col-lg-9 d-flex">

                                <input type="text" class="form-control bg-white " placeholder="Today Decor"
                                    aria-label="Default" aria-describedby="inputGroup-sizing-default">
                            
                               
                            </div>
                        </div>
                                       

                                            
                                      <br>
                                        <button class="btn btn-primary custom-bg-white  container" style="border:solid 1px #B4CDCD;">

                                            Category
                                        </button>
                                      
                                    </div>
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
                style="  background-color: #000033;color: white;border-radius:5%;padding:10px;"
                class="btn custom-darkblue-btn align-items-end" data-toggle="modal" data-target="#chartPopup">Add
                Supplier</button>

        </div>





    </div>

    <table class="table bg-light " style="border-radius:10px;color:darkblue">

        <thead>
            <tr class="text-secondary">
                <th>P CODE</th>
                <th>NAME</th>
             
                <th>TOTAL SKU</th>
              
            </tr>
        </thead>
        <tbody>
            <tr class="textin">
                <td>001</td>
                <td>Product Lorem Ipsum is simply dummy text </td>
            
                <td>50</td>
               
            </tr>
            <tr class="textin">
                <td>002</td>
                <td>Product Lorem Ipsum is simply dummy text </td>
              
                <td>30</td>
               
            </tr>
            <tr class="textin">
                <td>003</td>
                <td>Product Lorem Ipsum is simply dummy text </td>
              
                <td>25</td>
             
            </tr>
            <tr class="textin">
                <td>004</td>
                <td>Product Lorem Ipsum is simply dummy text </td>
               
                <td>40</td>
              
            </tr>
            <tr class="textin">
                <td>005</td>
                <td>Product Lorem Ipsum is simply dummy text </td>
              
                <td>20</td>
              
            </tr>
        </tbody>
    </table>

    <div class="row " style="height:50px">
        <div class="col-lg-4 ">

            <div class=" py-5">
                <div class="d-flex align-items-center row">
                    <div class="col-lg-2 align-items-right"> <span class="align-items-end">Show:</span></div>
                    <div class=" col-lg-3">

                        <div class="input-group ml-2">
                            <div class="input-group">

                                <input class="form-control text-center text-secondary" id="inputQuantity"
                                    name="quantity" type="number" value="5" style="max-width: 7rem">

                            </div>

                        </div>
                    </div>

                    <div class="col-lg-7 ">entries <span class="text-secondary">1-5 of 25</span> </div>
                </div>
            </div>


        </div>
        <div class="col-lg-6 py-5" style="padding-left: 28%;">

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
    </div>
</div>
<!-- Content Row -->
<?= $this->endSection() ?>