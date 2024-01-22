<?= $this->extend('layout/admin') ?>

<?= $this->section('content') ?>
<style>
.image-container {
    position: relative;
    display: inline-block;
}

.badge {

    top: 0;
    background-color: rgb(92, 180, 124);
    right: 0;

    color: white;
    width: 30px;
    height: 30px;
    padding: 5px 5px;
    border-radius: 50%;
}
</style>
<style>
    .sticky-top {
        position: sticky;
        top: 0;
        background-color: #EEEEEE; /* Adjust the background color as needed */
        z-index: 1000; /* Adjust the z-index if needed */
        border-bottom: 1px solid #ddd; /* Add a border if needed */
    }
</style>

<div class="d-sm-flex align-items-center justify-content-between mb-4 sticky-top">
    <h1 class="h3 mb-0 text-gray-800">Product Manager</h1>
</div>


<!-- <div class="hew bg-light text-dark container" style="min-width: 100%; overflow-x: auto;">
    <nav class="hew bg-light text-dark container-fluid" style="min-width: 600px; overflow-x: auto;"> -->
    <nav class="hew bg-light text-dark container" style=" overflow-y: auto; ">


        <style>
        @media (max-width: 600px) {
            nav {
                min-width: 600px;
                overflow-x: auto;
            }
        }
        </style>

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3 ">
           
        </button>

        <div class="">
            <!-- Các phần tử con của phần tử sẽ sử dụng flexbox layout -->

            <div class="row">
            <div class="col-md-3">
    <!-- Topbar Search -->
    <script>
    function handleSearchInputChange() {
        // Lấy giá trị của trường searchItem
        var searchValue = document.getElementsByName('searchItem')[0].value;

        // Lấy URL hiện tại của trang
        var currentUrl = window.location.href;

        // Tạo một đối tượng URL từ URL hiện tại
        var urlObject = new URL(currentUrl);

        // Xóa tham số searchItem hiện tại trong URL
        urlObject.searchParams.delete('searchItem');

        // Nếu giá trị mới của searchItem khác null hoặc undefined, thêm giá trị mới vào URL
        if (searchValue.trim() !== '') {
            urlObject.searchParams.append('searchItem', encodeURIComponent(searchValue));
        }

        // Chuyển hướng trang đến URL mới
        window.location.href = urlObject.href;
    }

    function handleSearchFormSubmit() {
        // Tránh chuyển hướng mặc định của form và thực hiện chuyển hướng theo ý muốn
        handleSearchInputChange();
        return false;
    }
</script>

<!-- Search Form -->
<form class="d-flex mb-3 mb-md-0" method="get" action="<?= base_url('product') ?>" onsubmit="return handleSearchFormSubmit()">
    <div class="input-group">
        <input type="text" class="form-control border-0 small" placeholder="Search Code/Name..." aria-label="Search" aria-describedby="basic-addon2" name="searchItem" value="<?= $searchName ?? '' ?>" oninput="handleSearchInputChange()">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary border-0 bg-white" type="submit">
                <i class="bi bi-search border-0"></i>
            </button>
        </div>
    </div>
</form>

</div>




                <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
                    rel="stylesheet" />
                <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
                <div class="col-md-3 mb-3 mb-md-0">
    <!-- Ô tìm kiếm sử dụng Select2 -->
    <select class="form-select border-0" id="categoryDropdownButton" name="category" onchange="handleSubCategoryDropdownSelection1(this.value)">
        <option selected disabled>sub_category</option>
   <?php foreach ($uniqueSubCategories as $categoryItem): ?>
    <?php $categoryArray = (array)$categoryItem; ?>
    <option value="<?= $categoryArray['sub_category'] ?>"><?= $categoryArray['sub_category'] ?></option>
<?php endforeach; ?>



    </select>
</div>


                <!-- Thêm mã JavaScript -->

                <!-- Add Select2 CSS and JS files -->
                <script>
                // Hàm xử lý khi một mục trong dropdown sub_category được chọn
                function handleSubCategoryDropdownSelection1(value) {
    var currentUrl = window.location.href;
    var urlObject = new URL(currentUrl);

    // Xóa tất cả các tham số sub_category hiện tại trong URL
    urlObject.searchParams.delete('sub_category');

    // Thêm giá trị mới của sub_category vào URL
    urlObject.searchParams.append('sub_category', encodeURIComponent(value));

    console.log("New URL:", urlObject.href);

    window.location.href = urlObject.href;
}

function handleCategoryDropdownSelection1(value) {
    var currentUrl = window.location.href;
    var urlObject = new URL(currentUrl);

    // Xóa tất cả các tham số category hiện tại trong URL
    urlObject.searchParams.delete('category');

    // Thêm giá trị mới của category vào URL
    urlObject.searchParams.append('category', encodeURIComponent(value));

    window.location.href = urlObject.href;
}

                </script>


                <div class="col-md-3 ">
                    <!-- Topbar Search -->
                    <!-- Thêm mã JavaScript -->
                    <script>
                    // Hàm xử lý khi một mục trong dropdown nhà cung cấp được chọn
                    function handleVendorDropdownSelection(value) {
    var currentUrl = window.location.href;
    var urlObject = new URL(currentUrl);

    // Xóa tất cả các tham số vendor hiện tại trong URL
    urlObject.searchParams.delete('vendor');

    // Thêm giá trị mới của vendor vào URL
    urlObject.searchParams.append('vendor', encodeURIComponent(value));

    window.location.href = urlObject.href;
}

                    </script>

                    <!-- Thêm dropdown nhà cung cấp vào view -->
                    <div class="dropdown bg-white container mb-3">
                    <button class="btn custom-bg-white dropdown-toggle dropdown-toggle-end border-0" type="button"
        id="vendorDropdownButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
        style="opacity: 0.7;">
    Vendor
</button>

    <div class="dropdown-menu" aria-labelledby="vendorDropdownButton" style="width: 230px;">
        <a class="dropdown-item" href="#" onclick="handleVendorDropdownSelection('ACME')">ACME</a>
        <a class="dropdown-item" href="#" onclick="handleVendorDropdownSelection('Modway')">Modway</a>
    </div>
</div>



                </div>




                <style>
                .dropdown-menu {
                    z-index: 10000;
                    /* Tăng giá trị này */
                    position: relative;
                    top: -10px;
                    max-height: 150px;
                    /* Thiết lập chiều cao tối đa */
                    overflow-y: auto;
                    /* Thêm thanh cuộn nếu chiều cao vượt quá max-height */
                }
                </style>
                <div class="col-md-3">
                    <!-- Ô tìm kiếm sử dụng Select2 -->
                    <select class="form-select border-0" id="categoryDropdownButton" name="category"
                        onchange="handleCategoryDropdownSelection1(this.value)">
                        <option hidden value="category" selected >Category</option>
                        <?php foreach ($uniqueCategories as $categoryItem): ?>
    <?php $categoryArray = (array)$categoryItem; ?>
    <option value="<?= $categoryArray['category'] ?>"><?= $categoryArray['category'] ?></option>
<?php endforeach; ?>


                    </select>
                </div>

                <!-- Thêm mã JavaScript -->
             

            </div>




        </div>
        <br>
        <!-- hhhhhhhhhhhhhhhhhhhhhhhhhhhh -->


        
        <div class="row">
    <div class="col-md-6">
    <script>
    function handlePriceInputChange() {
        // Lấy giá trị của các trường price_from và price_to
        var priceFromValue = document.getElementsByName('price_from')[0].value;
        var priceToValue = document.getElementsByName('price_to')[0].value;

        // Lấy URL hiện tại của trang
        var currentUrl = window.location.href;

        // Tạo một đối tượng URL từ URL hiện tại
        var urlObject = new URL(currentUrl);

        // Xóa tất cả các tham số price hiện tại trong URL
        urlObject.searchParams.delete('price_from');
        urlObject.searchParams.delete('price_to');

        // Nếu giá trị mới của price_from khác null hoặc undefined, thêm giá trị mới vào URL
        if (priceFromValue.trim() !== '') {
            urlObject.searchParams.append('price_from', encodeURIComponent(priceFromValue));
        }

        // Nếu giá trị mới của price_to khác null hoặc undefined, thêm giá trị mới vào URL
        if (priceToValue.trim() !== '') {
            urlObject.searchParams.append('price_to', encodeURIComponent(priceToValue));
        }

        // Chuyển hướng trang đến URL mới
        window.location.href = urlObject.href;
    }

    function handleFormSubmit() {
        // Tránh chuyển hướng mặc định của form và thực hiện chuyển hướng theo ý muốn
        handlePriceInputChange();
        return false;
    }
</script>

        <!-- Price Filter Form -->
      <!-- Price Filter Form -->
<form class="d-flex flex-column flex-md-row mb-3" method="get" action="<?= base_url('product') ?>">
    <div class="form-group mb-2">
        <label class="py-2 pr-4 text-secondary">Price :</label>
    </div>
    <div class="form-group mb-2">
        <input type="text" class="form-control bg-white border-0" placeholder="From" name="price_from" value="<?= $priceFrom ?>">
    </div>
    <div class="form-group mb-2">
        <h5 class="py-2 pr-4 text-secondary">-</h5>
    </div>
    <div class="form-group mb-2">
        <input type="text" class="form-control bg-white border-0" placeholder="To" name="price_to" value="<?= $priceTo ?>" onchange="handlePriceInputChange()">
    </div>
    <button type="submit" hidden class="btn btn-primary ml-md-2">Filter</button>
</form>

   
    </div>

    <div class="col-md-6">
        <!-- Stock Filter Form -->
        <script>
    function handleStockInputChange() {
        // Lấy giá trị của các trường Stock_from và Stock_to
        var stockFromValue = document.getElementsByName('Stock_from')[0].value;
        var stockToValue = document.getElementsByName('Stock_to')[0].value;

        // Lấy URL hiện tại của trang
        var currentUrl = window.location.href;

        // Tạo một đối tượng URL từ URL hiện tại
        var urlObject = new URL(currentUrl);

        // Xóa tất cả các tham số Stock hiện tại trong URL
        urlObject.searchParams.delete('Stock_from');
        urlObject.searchParams.delete('Stock_to');

        // Nếu giá trị mới của Stock_from khác null hoặc undefined, thêm giá trị mới vào URL
        if (stockFromValue.trim() !== '') {
            urlObject.searchParams.append('Stock_from', encodeURIComponent(stockFromValue));
        }

        // Nếu giá trị mới của Stock_to khác null hoặc undefined, thêm giá trị mới vào URL
        if (stockToValue.trim() !== '') {
            urlObject.searchParams.append('Stock_to', encodeURIComponent(stockToValue));
        }

        // Chuyển hướng trang đến URL mới
        window.location.href = urlObject.href;
    }

    function handleFormSubmit() {
        // Tránh chuyển hướng mặc định của form và thực hiện chuyển hướng theo ý muốn
        handleStockInputChange();
        return false;
    }
</script>

<!-- Stock Filter Form -->
<form class="d-flex flex-column flex-md-row mb-3" method="get" action="<?= base_url('product') ?>">
    <div class="form-group mb-2">
        <label class="py-2 pr-4 text-secondary">Stock :</label>
    </div>
    <div class="form-group mb-2">
        <input type="text" class="form-control bg-white border-0" placeholder="From" name="Stock_from" value="<?= $StockFrom ?>">
    </div>
    <div class="form-group mb-2">
        <h5 class="py-2 pr-4 text-secondary">-</h5>
    </div>
    <div class="form-group mb-2">
        <input type="text" class="form-control bg-white border-0" placeholder="To" name="Stock_to" value="<?= $StockTo ?>" onchange="handleStockInputChange()">
    </div>
    <button type="submit" hidden class="btn btn-primary ml-md-2">Filter</button>
</form>

    </div>
    <form action="/exportSelectedCSV" method="post">
    <div class="d-sm-flex align-items-center justify-content-between ">
        <h1 class=""></h1>
        <div class="">
            <a href="productImport">
            <button type="button" style="  color: white" class="btn btn-primary align-items-end ">Import
                product update</button></a>

                <!-- <button type="button" class="btn btn-primary" style="padding-left: 10px;" data-toggle="modal" data-target="#chartPopup">Xem Biểu Đồ</button>
                -->
                <a href="<?= base_url('exportCSV') ?>">
            <button type="submit" style="  background-color: DarkBlue;color: white" class="btn btn-primary align-items-end"
              >Export product CSV
                </button> </a>
        </div>
    </div>
</div>



    </nav>
    <script>
        function updateSelectedProductsAndPage() {
    var selectedProducts = [];

    // ... Code để cập nhật selectedProducts từ checkbox ...

    // Lấy giá trị trang hiện tại từ tham số trên URL
    var urlParams = new URLSearchParams(window.location.search);
    var currentPage = parseInt(urlParams.get('page')) || 1;

    var dataToStore = {
        selectedProducts: selectedProducts,
        currentPage: currentPage
    };

    localStorage.setItem('exportData', JSON.stringify(dataToStore));
}

    </script>
  

<br>
<div class="d-sm-flex align-items-center justify-content-between mb-4">

    <div class="modal fade" id="chartPopup" tabindex="-1" aria-labelledby="chartPopupLabel" aria-hidden="true"
        style="z-index: 9999" >
        <div class="modal-dialog modal-lg">
            <!-- Bỏ role="document" vì không còn cần thiết -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="chartPopupLabel">Biểu Đồ Doanh Thu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <!-- Thay thế class close và data-dismiss -->
                </div>
                <div class="modal-body">
                    <table class="table">
                        <div class="row">
                            <div class="col-lg-3">
                                <p>Number of updates: <span id="numberOfDays"></span></p>
                                <!-- Các phần khác của thông tin sản phẩm -->
                            </div>
                            <div class="col-lg-3"><strong>
                                   
                                </strong></div>
                        </div>
                    </table>
                    <canvas id="revenueChart" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>

</div>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
<script>$(document).ready(function () {
                        var chartModal = $('#chartPopup');
                        var chart; // Biến lưu trữ biểu đồ
                    
                        $('.show-chart-modal').click(function () {
                            var sku = $(this).data('sku');
                            $.ajax({
                                url: '/get-chart-data',
                                type: 'POST',
                                data: {sku: sku},
                                dataType: 'json',
                                success: function (data) {
                                    updateModalContent(data);
                                    chartModal.modal('show');
                                },
                                error: function () {
                                    console.log('Error fetching data');
                                }
                            });
                        });
                    
                        function updateModalContent(data) {
                            $('#numberOfDays').text(data.importDates.length);
                            
                            // Kiểm tra xem biểu đồ đã được tạo chưa
                            if (chart) {
                                // Nếu đã tồn tại, hủy biểu đồ hiện tại trước khi tạo một biểu đồ mới
                                chart.destroy();
                            }
                    
                            var ctx = document.getElementById('revenueChart').getContext('2d');
                            chart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: data.importDates,
                                    datasets: [{
                                        label: 'Revenue',
                                        data: data.importedStockValues,
                                        backgroundColor: '#0099FF',
                                        borderColor: '#0099FF',
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero: true
                                            }
                                        }],
                                        xAxes: [{
                                            barPercentage: 0.5
                                        }]
                                    }
                                }
                            });
                        }
                    });
                    
                    
                    </script>


<!-- Load Bootstrap and Chart.js scripts -->
<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>

<nav class="hew bg-light text-dark container">

<!-- <button type="submit">Export</button> -->
    <div class="bg-light container" style="padding-left:30px;min-width: 600px; overflow-x: auto;">
        <div class="d-sm-flex align-items-center justify-content-between mb-4 bg-light">
            <div>
                <h3 class="pr-5 align-items-start" style="margin-bottom: 10px;color:darkblue;padding-top:10%">Result
                </h3>
                <p class="text-secondary">Total product: <?= $pager->getDetails()['total'] ?></p>
            </div>
        </div>
        <div class="table-responsive d-md-table">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">
                            <input type="checkbox" id="checkAll">
                        </th>
                        <th scope="col" class="text-muted" onclick="toggleSort('id')">
                            <div style="display: flex; align-items: center;margin-bottom:-17px">
                                <p style="width:20px;padding-top:20px">ID</p>
                                <div id="sortIcon" class="sort-icon" style="margin-left: 5px;">
                                    <a href="<?= site_url('product?sort=asc&column=id'); ?>"><i
                                            class="fas fa-sort-up"></i></a>
                                    <a href="<?= site_url('product?sort=desc&column=id'); ?>"><i
                                            class="fas fa-sort-down"></i></a>
                                </div>
                            </div>

                        </th>

                        <th scope="col" class="text-muted">Images</th>
                        <th scope="col" class="text-muted">SKU</th>
                        <th scope="col" class="text-muted">Vendor</th>
                        <th scope="col" class="text-muted">UPC</th>
                        <th scope="col" class="text-muted">Name</th>
                        <th scope="col" class="text-muted text-nowrap">Short Description</th>
                        <th scope="col" class="text-muted">Description</th>
                        <th scope="col" class="text-muted" onclick="toggleSort('price')">
                            <div style="display: flex; align-items: center;margin-bottom:-17px">
                                <p style="padding-top:20px">Price</p>
                                <div id="sortIcon" class="sort-icon" style="margin-left: 10px;">
                                    <a href="<?= site_url('product?sort=asc&column=price'); ?>"><i
                                            class="fas fa-sort-up"></i></a>
                                    <a href="<?= site_url('product?sort=desc&column=price'); ?>"><i
                                            class="fas fa-sort-down"></i></a>
                                </div>
                            </div>

                        </th>
                        <script>
                        function toggleSort(column) {
                            // Lấy thẻ biểu tượng của cột được click
                            var sortIcon = document.getElementById('sortIcon' + column);

                            // Đặt tất cả các icon về trạng thái không được chọn
                            var allIcons = document.querySelectorAll('.sort-icon');
                            allIcons.forEach(function(icon) {
                                icon.classList.remove('asc', 'desc');
                            });

                            // Kiểm tra trạng thái sắp xếp hiện tại và thay đổi
                            if (sortIcon.classList.contains('asc')) {
                                sortIcon.classList.remove('asc');
                                sortIcon.classList.add('desc');
                                sortIcon.querySelector('.fa-sort-up').style.color = '#555';
                                sortIcon.querySelector('.fa-sort-down').style.color = '#f00';
                                // Thực hiện hành động sắp xếp giảm dần
                                // ...

                                // Gửi yêu cầu sắp xếp đến server hoặc thực hiện sắp xếp ngay tại đây
                                sortData(column, 'desc');
                            } else {
                                sortIcon.classList.remove('desc');
                                sortIcon.classList.add('asc');
                                sortIcon.querySelector('.fa-sort-up').style.color = '#0f0';
                                sortIcon.querySelector('.fa-sort-down').style.color = '#555';
                                // Thực hiện hành động sắp xếp tăng dần
                                // ...

                                // Gửi yêu cầu sắp xếp đến server hoặc thực hiện sắp xếp ngay tại đây
                                sortData(column, 'asc');
                            }
                        }
                        </script>
                        
        </div>

        </th>

        <style>
        .wid {
            padding-right: 10px
        }

        .sort-icon {
            display: flex;
            flex-direction: column;
            align-items: center;

        }

        #sortIcon a {
            margin: -11.7px;
            padding-top: 4px;
            font-size: 13.5px;
            /* Khoảng cách giữa hai biểu tượng */
        }

        #sortIcon a i {
            color: #555;
            /* Màu mặc định cho biểu tượng chưa được chọn */
        }

        #sortIcon a.asc i {
            color: #0f0;
            /* Màu khi được sắp xếp tăng dần */
        }

        #sortIcon a.desc i {
            color: #f00;
            /* Màu khi được sắp xếp giảm dần */
        }
        </style>
        <!-- Bao gồm thư viện Font Awesome (bạn có thể sử dụng phiên bản khác) -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <th scope="col" class="text-muted" onclick="toggleSort('shipping_fee')">
            <div style="display: flex; align-items: center;margin-bottom:-17px" >
                <p style="width:120%;padding-top:20px"  class=" text-nowrap">Shipping Fee</p>
                <div id="sortIcon" class="sort-icon" style="margin-left: 10px;">
                    <a href="<?= site_url('product?sort=asc&column=shipping_fee'); ?>"><i
                            class="fas fa-sort-up"></i></a>
                    <a href="<?= site_url('product?sort=desc&column=shipping_fee'); ?>"><i
                            class="fas fa-sort-down"></i></a>
                </div>
            </div>

        </th>
        <th scope="col" class="text-muted" onclick="toggleSort('msrp')">
            <div style="display: flex; align-items: center;margin-bottom:-17px">
                <p style="width:120%;padding-top:20px">MSRP</p>
                <div id="sortIcon" class="sort-icon" style="margin-left: 10px;">
                    <a href="<?= site_url('product?sort=asc&column=msrp'); ?>"><i
                            class="fas fa-sort-up"></i></a>
                    <a href="<?= site_url('product?sort=desc&column=msrp'); ?>"><i
                            class="fas fa-sort-down"></i></a>
                </div>
            </div>

        </th>
        <th scope="col" class="text-muted" onclick="toggleSort('sale_price_1')">
            <div style="display: flex; align-items: center;margin-bottom:-17px">
                <p style="width:120%;padding-top:20px" class="text-nowrap">Sale Price 1</p>
                <div id="sortIcon" class="sort-icon" style="margin-left: 10px;">
                    <a href="<?= site_url('product?sort=asc&column=sale_price_1'); ?>"><i
                            class="fas fa-sort-up"></i></a>
                    <a href="<?= site_url('product?sort=desc&column=sale_price_1'); ?>"><i
                            class="fas fa-sort-down"></i></a>
                </div>
            </div>

        </th>

        <th scope="col" class="text-muted" onclick="toggleSort('sale_price_2')">
            <div style="display: flex; align-items: center;margin-bottom:-17px">
                <p style="width:120%;padding-top:20px" class="text-nowrap">Sale Price 2</p>
                <div id="sortIcon" class="sort-icon" style="margin-left: 10px;">
    <a href="<?= site_url('product?sort=asc&column=sale_price_2'); ?>"><i class="fas fa-sort-up "></i></a>
    <a href="<?= site_url('product?sort=desc&column=sale_price_2'); ?>"><i class="fas fa-sort-down "></i></a>
</div>


            </div>

        </th>
        <th scope="col" class="text-muted" onclick="toggleSort('profit')">
            <div style="display: flex; align-items: center;margin-bottom:-17px">
                <p style="width:120%;padding-top:20px">Profit</p>
                <div id="sortIcon" class="sort-icon" style="margin-left: 10px;">
    <a href="<?= site_url('product?sort=asc&column=profit'); ?>"><i class="fas fa-sort-up "></i></a>
    <a href="<?= site_url('product?sort=desc&column=profit'); ?>"><i class="fas fa-sort-down "></i></a>
</div>


            </div>

        </th>
        <th scope="col" class="text-muted" onclick="toggleSort('profit')">
            <div style="display: flex; align-items: center;margin-bottom:-17px">
                <p style="width:120%;padding-top:20px">Weight</p>
                <div id="sortIcon" class="sort-icon" style="margin-left: 10px;">
    <a href="<?= site_url('product?sort=asc&column=profit'); ?>"><i class="fas fa-sort-up "></i></a>
    <a href="<?= site_url('product?sort=desc&column=profit'); ?>"><i class="fas fa-sort-down "></i></a>
</div>


            </div>

        </th>
        <th scope="col" class="text-muted" onclick="toggleSort('profit')">
            <div style="display: flex; align-items: center;margin-bottom:-17px">
                <p style="width:120%;padding-top:20px">Length</p>
                <div id="sortIcon" class="sort-icon" style="margin-left: 10px;">
    <a href="<?= site_url('product?sort=asc&column=profit'); ?>"><i class="fas fa-sort-up "></i></a>
    <a href="<?= site_url('product?sort=desc&column=profit'); ?>"><i class="fas fa-sort-down "></i></a>
</div>


            </div>

        </th>   <th scope="col" class="text-muted" onclick="toggleSort('profit')">
            <div style="display: flex; align-items: center;margin-bottom:-17px">
                <p style="width:120%;padding-top:20px">Width</p>
                <div id="sortIcon" class="sort-icon" style="margin-left: 10px;">
    <a href="<?= site_url('product?sort=asc&column=profit'); ?>"><i class="fas fa-sort-up "></i></a>
    <a href="<?= site_url('product?sort=desc&column=profit'); ?>"><i class="fas fa-sort-down "></i></a>
</div>


            </div>

        </th>   <th scope="col" class="text-muted" onclick="toggleSort('profit')">
            <div style="display: flex; align-items: center;margin-bottom:-17px">
                <p style="width:120%;padding-top:20px">Depth</p>
                <div id="sortIcon" class="sort-icon" style="margin-left: 10px;">
    <a href="<?= site_url('product?sort=asc&column=profit'); ?>"><i class="fas fa-sort-up "></i></a>
    <a href="<?= site_url('product?sort=desc&column=profit'); ?>"><i class="fas fa-sort-down "></i></a>
</div>


            </div>

        </th>   <th scope="col" class="text-muted" onclick="toggleSort('profit')">
            <div style="display: flex; align-items: center;margin-bottom:-17px">
                <p style="width:120%;padding-top:20px">Height</p>
                <div id="sortIcon" class="sort-icon" style="margin-left: 10px;">
    <a href="<?= site_url('product?sort=asc&column=profit'); ?>"><i class="fas fa-sort-up "></i></a>
    <a href="<?= site_url('product?sort=desc&column=profit'); ?>"><i class="fas fa-sort-down "></i></a>
</div>


            </div>

        </th>   <th scope="col" class="text-muted" onclick="toggleSort('profit')">
            <div style="display: flex; align-items: center;margin-bottom:-17px">
                <p style="width:120%;padding-top:20px" class="text-nowrap">Package Weight</p>
                <div id="sortIcon" class="sort-icon" style="margin-left: 10px;">
    <a href="<?= site_url('product?sort=asc&column=profit'); ?>"><i class="fas fa-sort-up "></i></a>
    <a href="<?= site_url('product?sort=desc&column=profit'); ?>"><i class="fas fa-sort-down "></i></a>
</div>


            </div>

        </th>   <th scope="col" class="text-muted" onclick="toggleSort('profit')">
            <div style="display: flex; align-items: center;margin-bottom:-17px">
                <p style="width:120%;padding-top:20px" class="text-nowrap">Package Length</p>
                <div id="sortIcon" class="sort-icon" style="margin-left: 10px;">
    <a href="<?= site_url('product?sort=asc&column=profit'); ?>"><i class="fas fa-sort-up "></i></a>
    <a href="<?= site_url('product?sort=desc&column=profit'); ?>"><i class="fas fa-sort-down "></i></a>
</div>


            </div>

        </th>   <th scope="col" class="text-muted" onclick="toggleSort('profit')">
            <div style="display: flex; align-items: center;margin-bottom:-17px">
                <p style="width:120%;padding-top:20px" class="text-nowrap">Package Height</p>
                <div id="sortIcon" class="sort-icon" style="margin-left: 10px;">
    <a href="<?= site_url('product?sort=asc&column=profit'); ?>"><i class="fas fa-sort-up "></i></a>
    <a href="<?= site_url('product?sort=desc&column=profit'); ?>"><i class="fas fa-sort-down "></i></a>
</div>


            </div>

        </th>  
        
       
        
       
      
       
       
        
       
        <th scope="col" class="text-muted">Category</th>
        <th scope="col" class="text-muted text-nowrap" >Sub Category</th>
        <th scope="col" class="text-muted">Material</th>
        <th scope="col" class="text-muted">Color</th>
        <th scope="col" class="text-muted" onclick="toggleSort('profit')">
            <div style="display: flex; align-items: center;margin-bottom:-17px">
                <p style="width:120%;padding-top:20px" class="text-nowrap">Shipping Type</p>
                <div id="sortIcon" class="sort-icon" style="margin-left: 10px;">
    <a href="<?= site_url('product?sort=asc&column=profit'); ?>"><i class="fas fa-sort-up "></i></a>
    <a href="<?= site_url('product?sort=desc&column=profit'); ?>"><i class="fas fa-sort-down "></i></a>
</div>


            </div>

        </th>
        <th scope="col" class="text-muted" onclick="toggleSort('stock')">
            <div style="display: flex; align-items: center;margin-bottom:-17px">
                <p style="width:120%;padding-top:20px">Stock</p>
                <div id="sortIcon" class="sort-icon" style="margin-left: 10px;">
    <a href="<?= site_url('product?sort=asc&column=stock'); ?>"><i class="fas fa-sort-up "></i></a>
    <a href="<?= site_url('product?sort=desc&column=stock'); ?>"><i class="fas fa-sort-down "></i></a>
</div>


            </div>

        </th>
       
       
        <th scope="col" class="text-muted text-nowrap">Product URL</th>

        <th scope="col" class="text-muted text-nowrap">Users Input</th>
        <th scope="col" class="text-muted text-nowrap">Create Date</th>
        <th scope="col" class="text-muted text-nowrap">Bucket Images</th>
        <th scope="col" class="text-muted text-nowrap">Error Images</th>
        
       
        <th scope="col" class="text-muted" onclick="toggleSort('is_shopify')">
            <div style="display: flex; align-items: center;margin-bottom:-17px">
                <p style="width:120%;padding-top:20px" class="text-nowrap">Is Shopify</p>
                <div id="sortIcon" class="sort-icon" style="margin-left: 10px;">
    <a href="<?= site_url('product?sort=asc&column=is_shopify'); ?>"><i class="fas fa-sort-up "></i></a>
    <a href="<?= site_url('product?sort=desc&column=is_shopify'); ?>"><i class="fas fa-sort-down "></i></a>
</div>
            </div>

        </th>
        </tr>
        </thead>
        <tbody>
        <?php if (empty($products)) : ?>
        <!-- Hiển thị thông báo khi không có sản phẩm -->
        <tr>
            <td colspan="30">
               <h5 class="text-left">
               Không có sản phẩm nào.
               </h1></td>
        </tr>
    <?php else : ?>
            <?php foreach ($products as $product) : ?>
            
            <tr>
                
            <script>
document.addEventListener('DOMContentLoaded', function () {
    var checkAllCheckbox = document.getElementById('checkAll');
    var checkboxItems = document.querySelectorAll('.checkboxItem');
    var currentPage = parseInt(new URLSearchParams(window.location.search).get('page')) || 1;

    function updateSelectedProducts() {
        var selectedProducts = JSON.parse(sessionStorage.getItem('selectedProducts')) || {};
        selectedProducts[currentPage] = [];

        for (var i = 0; i < checkboxItems.length; i++) {
            var checkbox = checkboxItems[i];
            var productId = checkbox.getAttribute('data-id');

            if (checkbox.checked) {
                selectedProducts[currentPage].push(productId);
            }
        }

        sessionStorage.setItem('selectedProducts', JSON.stringify(selectedProducts));
    }

    function loadSelectedProducts() {
        var storedSelectedProducts = JSON.parse(sessionStorage.getItem('selectedProducts')) || {};
        var selectedProducts = storedSelectedProducts[currentPage] || [];

        for (var i = 0; i < checkboxItems.length; i++) {
            var checkbox = checkboxItems[i];
            var productId = checkbox.getAttribute('data-id');
            checkbox.checked = selectedProducts.includes(productId);
        }

        checkAllCheckbox.checked = storedSelectedProducts['checkAll'] || false;
    }

    function checkAll() {
        checkboxItems.forEach(function (checkbox) {
            checkbox.checked = checkAllCheckbox.checked;
        });

        updateSelectedProducts();
    }

    checkboxItems.forEach(function (checkbox) {
        checkbox.addEventListener('click', function () {
            updateSelectedProducts();
            checkAllCheckbox.checked = checkboxItems.length === document.querySelectorAll('.checkboxItem:checked').length;
        });
    });

    checkAllCheckbox.addEventListener('click', function () {
        checkAll();
    });

    loadSelectedProducts();
});


</script>

<td><input class="checkboxItem" type="checkbox" name="selectedProducts[]" value="<?= $product['id']; ?>" data-id="<?= $product['id']; ?>"></td>

            <!-- Các cột dữ liệu khác của sản phẩm -->
        
                <td><?= $product['id'] ?></td>
                
                <td class="my-5">
                    <?php
    $images = explode(',', $product['images']);
    if (!empty($images)) : ?>
                    <div class="col-lg-1">
                        <div class="image-container">
                            <img style="border-radius:20px" src="<?= $images[0] ?>" alt="Product Image" width="30"
                                height="30" loading="lazy">
                        </div>
                    </div>
                    <?php endif; ?>
                </td>
                <td class=" text-multiline"><?= $product['sku'] ?></td>
                <td><?= $product['vendor'] ?></td>
                <td><?= $product['upc'] ?></td>
                <style>
                .text-multiline {
                    white-space: nowrap;
                    /* Ngăn chặn xuống dòng */
                    overflow: hidden;
                    text-overflow: ellipsis;
                    /* Hiển thị chấm ba chấm khi dữ liệu bị cắt ngắn */
                }
                </style>
                
                <td class="text-multiline">
    <a href="<?= base_url('productDetails/' . $product['id']); ?>" target="_blank">
        <?= $product['name'] ?>
    </a>
</td>

                <!-- Thêm thuộc tính data-bs-toggle và data-bs-placement để kích hoạt Tooltip -->
                <!-- Thêm thuộc tính data-bs-toggle và data-bs-placement để kích hoạt Tooltip -->
                <td class="text-multiline" title="<?= $product['short_description'] ?>">
                    <?php
        $shortDescription = (strlen($product['short_description']) > 20) ? substr($product['short_description'], 0, 20) . '...' : $product['short_description'];
        echo $shortDescription;
    ?>
                </td>




                <!-- Thêm thuộc tính data-bs-toggle và data-bs-placement để kích hoạt Tooltip -->
                <td class="text-multiline" 
                    title="<?= $product['description'] ?>">
                    <?php
        $description = (strlen($product['description']) > 20) ? substr($product['description'], 0, 20) . '...' : $product['description'];
        echo $description;
    ?>
                </td>
                <style>
                .tooltip-inner {
                    background-color: #ffcc00;
                    /* Đổi màu nền của Tooltip */
                    color: #333;
                    /* Đổi màu chữ của Tooltip */
                }

                .text-muted {
                    white-space: nowrap;
                    /* Ngăn chặn xuống dòng */
                    overflow: hidden;
                    text-overflow: ellipsis;
                    /* Hiển thị chấm ba chấm khi dữ liệu bị cắt ngắn */
                }
                </style>
                <!-- Kích hoạt Tooltip bằng JavaScript -->
                <script>
                // Đợi cho trang tải xong
                document.addEventListener('DOMContentLoaded', function() {
                    // Kích hoạt Tooltip cho tất cả phần tử có thuộc tính data-bs-toggle="tooltip"
                    var tooltipTriggerList = [].slice.call(document.querySelectorAll(
                        '[data-bs-toggle="tooltip"]'));
                    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                        return new bootstrap.Tooltip(tooltipTriggerEl);
                    });
                });
                </script>

                <td><?= $product['price'] ?></td>
                <td class=" text-multiline"><?= $product['shipping_fee'] ?></td>
                <td><?= $product['msrp'] ?></td>
                <td><?= $product['sale_price_1'] ?></td>
                <td><?= $product['sale_price_2'] ?></td>
                <td><?= $product['profit'] ?></td>
                <td><?= $product['weight'] ?></td>
                <td><?= $product['lenght'] ?></td>
                <td><?= $product['width'] ?></td>
                <td><?= $product['depth'] ?></td>
                <td><?= $product['height'] ?></td>
                <td><?= $product['package_weight'] ?></td>
                <td><?= $product['package_lenght'] ?></td>
                <td><?= $product['package_height'] ?></td>
                <td><?= $product['category'] ?></td>
                <td class=" text-multiline"><?= $product['sub_category'] ?></td>
                <td class=" text-multiline"><?= $product['material'] ?></td>
                <td><?= $product['color'] ?></td>
                <td><?= $product['shipping_type'] ?></td>
                <td><a href="#" class="show-chart-modal" data-toggle="modal" data-target="#chartPopup" data-sku="<?= $product['sku'] ?>"> <?= $product['stock'] ?></a></td>

                <td class=" text-multiline"><a href="<?= $product['product_url'] ?>" target="_blank">Product URL</a>
                </td>


                <td><?= $product['users_input'] ?></td>
                <td class=" text-multiline"><?= $product['create_date'] ?></td>
                <td><?= $product['bucket_images'] ?></td>
                <td><?= $product['error_images'] ?></td>
                <td><?= $product['is_shopify'] ?></td>
               
            </tr>
               
            <?php endforeach; ?>
            <!-- Thêm dòng dữ liệu khác ở đây -->
            <?php endif; ?>
        </tbody>
        </table>
        </form>
        <!-- phân trang -->
        <!-- Hiển thị thanh phân trang với nút -->
        <div class="row ">
            <div class="col-md-2">
                <div class="py-5">
                    <div class="d-flex align-items-center">
                        <div class="mr-2"> <span><Strong>Show:</Strong> </span></div>
                        <div class="mr-2">
                            <div class="input-group">
                                <form method="get" action="<?= base_url('product') ?>" id="perPageForm">
                                    <input  type="number" class="form-control text-center text-secondary" id="inputQuantity"
                                        name="quantity" value="<?= $perPage ?>" min="1" style="max-width: 3.2rem;max-height: 1.7rem"
                                        onchange="submitForm()">
                                        
                                </form>
                            </div>
                        </div>
                        <div><strong>entries</strong>  <span class="text-secondary"><?= $pager->getDetails()['total'] ?></span> of
                            <?= $pager->getDetails()['total'] ?> </div>
                    </div>
                </div>
            </div>
            <script>
            // Hàm để tự động submit biểu mẫu khi giá trị thay đổi
            function submitForm() {
    document.getElementById('perPageForm').submit();
    return false;
}

            </script>
              <div class="col-md-1">
              <?php if (isset($pager) && is_array($pager->getDetails())) : ?>
            <?= $pager->links() ?>
            <?php endif; ?>
            </div>
          
        </div>
    </div>




    </div>
    <!-- Content Row -->
    <?= $this->endSection() ?>