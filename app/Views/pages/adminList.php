<?= $this->extend('layout/admin') 
?>

<?= $this->section('content') ?>


<!-- Hiển thị thông tin phiên bản -->

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800" data-toggle="modal" data-target="#exampleModal">List </h1>
    <div class="modal fade" id="chartPopup" tabindex="-1" role="dialog" aria-labelledby="chartPopupLabel"
        aria-hidden="true" >
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

          

        </div>





    </div>

   <!-- Trong view -->
   <table class="table bg-light" style="border-radius: 10px; color: darkblue">
    <thead>
        <tr class="text-secondary">
            <th>STT</th>
            <th>NAME</th>
            <th>EMAIL</th>
            <th>TYPE</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $index => $user): ?>
            <tr class="textbac">
                <td><?= $index + 1 ?></td>
                <td class="textinx"><?= esc($user['name']) ?></td>
                <td><?= esc($user['email']) ?></td>
                <td><?= esc($user['status']) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="col-md-3">
<!-- Thêm dropdown danh mục vào view -->
<div  class="dropdown bg-white container">
    <button class="btn custom-bg-white dropdown-toggle dropdown-toggle-end border-0" type="button"
        id="categoryDropdownButton" data-bs-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false">
        Category
    </button>
  
</div>




                </div>
<div class="row " style="height: 50px">
    <div class="col-lg-4 ">
        <!-- Số lượng hiển thị trên mỗi trang -->
        <div class=" py-5">
            <div class="d-flex align-items-center row">
                <div class="col-lg-2 align-items-right"><span class="align-items-end">Show:</span></div>
                <div class=" col-lg-3">
                    <div class="input-group ml-2">
                        <div class="input-group">
                            <input class="form-control text-center text-secondary" id="inputQuantity" name="quantity" type="number" value="2" style="max-width: 7rem">
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 " >
    entries <span class="text-secondary">
    <?php if (isset($pager) && is_array($pager->getDetails())) : ?>
        <?= $pager->getDetails()['currentPageStart'] ?? '' ?>-
        <?= $pager->getDetails()['currentPageEnd'] ?? '' ?> of <?= $pager->getDetails()['total'] ?? '' ?>
    <?php endif; ?>
    </span>
</div>

            </div>
        </div>
    </div>

    <!-- Nút chuyển trang -->
<!-- Nút chuyển trang -->
<!-- Nút chuyển trang -->
<!-- Nút chuyển trang -->
<div class="col-lg-6 py-2" style="padding-left: 30%;">
    <nav aria-label="Page navigation">
        <?php if (isset($pager) && is_array($pager->getDetails())) : ?>
            <?= $pager->links() ?>
        <?php endif; ?>
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