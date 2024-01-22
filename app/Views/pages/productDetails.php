<?= $this->extend('layout/admin') ?>

<?= $this->section('content') ?>

<body>
    <!-- Page Content-->
    <div class="container px-4 px-lg-5 bg-white pt-5 py-5">
        <!-- Heading Row-->
        <div class="row gx-4 gx-lg-5 align-items-center my-5">
            <div class="col-lg-5 text-center mb-4 mb-lg-0" style="border-right:solid">
                <?php
                // Kiểm tra xem có dữ liệu sản phẩm không
                if (!empty($productDetails)) {
                    $images = explode(',', $productDetails['images']);
                    if (!empty($images)) : ?>
                        <img class="img-fluid rounded mb-4 mb-lg-0" src="<?= $images[0] ?>" style="max-height:300px;" alt="Product Image">
                    <?php endif; ?>

                    <div id="productImageCarousel" class="carousel slide mt-4" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <?php
                            $images = explode(',', $productDetails['images']);
                            $imageChunks = array_chunk($images, 3);

                            foreach ($imageChunks as $index => $chunk) : ?>
                                <div class="carousel-item <?= ($index === 0) ? 'active' : '' ?>">
                                    <div class="row">
                                        <?php foreach ($chunk as $image) : ?>
                                            <div class="col-4">
                                                <img class="d-block w-100 mb-2" src="<?= $image ?>" style="max-height:80px;" alt="Product Image" data-bs-toggle="modal" data-bs-target="#imageModal" onclick="showModalImage('<?= $image ?>')">
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#productImageCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#productImageCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                <?php } else {
                    // Hiển thị thông báo nếu không có dữ liệu sản phẩm
                    echo '<p>Không tìm thấy thông tin sản phẩm.</p>';
                }
                ?>
            </div>

            <?php
            // Kiểm tra xem có dữ liệu sản phẩm không
            if (!empty($productDetails)) {
            ?>
                <div class="col-lg-7">
                   
                    <h1 class="font-weight-light"><?= $productDetails['name'] ?></h1>
                    <p><?= $productDetails['short_description'] ?></p>
                    <p><strong>Price: </strong><?= $productDetails['price'] ?>$</p>
                    <p><strong>SKU: </strong><?= $productDetails['sku'] ?></p>
                    <p><strong>Vendor: </strong><?= $productDetails['vendor'] ?></p>
                    <p><strong>UPC: </strong><?= $productDetails['upc'] ?></p>
                    <!-- Thêm các dòng này để hiển thị các thông tin khác của sản phẩm -->
                  <!-- Giả sử bạn đã có một biến $productDetails['description'] -->
                  <?php
$description = $productDetails['description'];
$shortDescription = strlen($description) > 100 ? substr($description, 0, 100) . '...' : $description;

?>

<p id="productDescription"><strong>description: </strong><?= $shortDescription ?></p>
<a id="readMoreButton" href="#" onclick="toggleDescription()">Xem thêm</a>

<script>
var fullDescription = <?= json_encode($productDetails['description']) ?>;
var isExpanded = false;

function toggleDescription() {
    var descriptionElement = document.getElementById('productDescription');
    var buttonElement = document.getElementById('readMoreButton');

    if (isExpanded) {
        descriptionElement.innerHTML = <?= json_encode($shortDescription) ?>;
        buttonElement.innerHTML = 'Xem thêm';
    } else {
        descriptionElement.innerHTML = fullDescription;
        buttonElement.innerHTML = 'Rút gọn';
    }

    isExpanded = !isExpanded;
}
</script>


                  
                 
                </div>
            <?php } ?>
        </div>

        <!-- Call to Action-->
     
        <div class="card container p-4 my-4 " id="productDetailsContainer">
    <div class="row ">
        <h3 class="bg-warning">Product Information:</h3>
        <div class="col-lg-6" id="firstColumn">
            <p class="hidden1">Shipping Fee: <?= $productDetails['shipping_fee'] ?></p>
            <p class="hidden1">MSRP: <?= $productDetails['msrp'] ?></p>
            <p class="hidden1">Sale Price 1: <?= $productDetails['sale_price_1'] ?></p>
            <!-- Thêm class "hidden" cho các dòng cần ẩn -->
            <p class="hidden">Sale Price 2: <?= $productDetails['sale_price_2'] ?></p>
            <p class="hidden">Profit: <?= $productDetails['profit'] ?></p>
            <!-- Thêm class "hidden" cho các dòng cần ẩn -->
            <p class="hidden">Weight: <?= $productDetails['weight'] ?></p>
            <p class="hidden">Length: <?= $productDetails['lenght'] ?></p>
            <p class="hidden">Width: <?= $productDetails['width'] ?></p>
            <p class="hidden">Depth: <?= $productDetails['depth'] ?></p>
            <p class="hidden">Height: <?= $productDetails['height'] ?></p>
            <p class="hidden">Package Weight: <?= $productDetails['package_weight'] ?></p>
            <p class="hidden">Package Length: <?= $productDetails['package_lenght'] ?></p>
            <p class="hidden">Package Height: <?= $productDetails['package_height'] ?></p>
        </div>
        <div class="col-lg-6" id="secondColumn">
            <p class="hidden1">Category: <?= $productDetails['category'] ?></p>
            <p class="hidden1">Sub Category: <?= $productDetails['sub_category'] ?></p>
            <p class="hidden1">Material: <?= $productDetails['material'] ?></p>
            <!-- Thêm class "hidden" cho các dòng cần ẩn -->
            <p class="hidden">Color: <?= $productDetails['color'] ?></p>
            <p class="hidden">Shipping Type: <?= $productDetails['shipping_type'] ?></p>
            <p class="hidden">Stock: <?= $productDetails['stock'] ?></p>
            <p class="hidden">Product URL: <?= $productDetails['product_url'] ?></p>
            <p class="hidden">Users Input: <?= $productDetails['users_input'] ?></p>
            <p class="hidden">Create Date: <?= $productDetails['create_date'] ?></p>
            <!-- Thêm class "hidden" cho các dòng cần ẩn -->
            <p class="hidden">Bucket Images: <?= $productDetails['bucket_images'] ?></p>
            <p class="hidden">Error Images: <?= $productDetails['error_images'] ?></p>
            <p class="hidden">Is Shopify: <?= $productDetails['is_shopify'] ?></p>
         
        </div>
       
                                          
                                     
    </div>
    <div class="text-center">
        <a id="viewMoreBtn" href="#">Xem thêm</a>
    </div>
</div>

<style>
    .hidden {
        display: none;
        opacity: 0.1;
        transition: opacity 0.3s ease;
    }
    .hidden1 {
        opacity: 0.7;
        transition: opacity 0.3s ease;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const viewMoreBtn = document.getElementById("viewMoreBtn");

        viewMoreBtn.addEventListener("click", function () {
            // Hiển thị tất cả các dòng có class "hidden"
            const hiddenElements = document.querySelectorAll(".hidden");
            hiddenElements.forEach(function (element) {
                element.style.display = "block";
                element.style.opacity = "1"; // Đặt opacity về 1 khi hiển thị
            });

            // Hiển thị tất cả các dòng có class "hidden1"
            const hiddenElements1 = document.querySelectorAll(".hidden1");
            hiddenElements1.forEach(function (element) {
                element.style.opacity = "1"; // Đặt opacity về 1 khi hiển thị
            });

            // Ẩn nút "Xem thêm" sau khi đã hiển thị tất cả dữ liệu
            viewMoreBtn.style.display = "none";
        });
    });
</script>


        <!-- Content Row-->
        <!-- <div class="row gx-4 gx-lg-5">
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="card-title">Card One</h2>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem magni quas ex numquam, maxime minus quam molestias corporis quod, ea minima accusamus.</p>
                    </div>
                    <div class="card-footer"><a class="btn btn-primary btn-sm" href="#!">More Info</a></div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="card-title">Card Two</h2>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod tenetur ex natus at dolorem enim! Nesciunt pariatur voluptatem sunt quam eaque, vel, non in id dolore voluptates quos eligendi labore.</p>
                    </div>
                    <div class="card-footer"><a class="btn btn-primary btn-sm" href="#!">More Info</a></div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="card-title">Card Three</h2>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem magni quas ex numquam, maxime minus quam molestias corporis quod, ea minima accusamus.</p>
                    </div>
                    <div class="card-footer"><a class="btn btn-primary btn-sm" href="#!">More Info</a></div>
                </div>
            </div>
        </div> -->
    </div>

    <!-- Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ảnh sản phẩm</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img class="img-fluid" id="modalImage" alt="Product Image" style="max-height:500px;">
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JS-->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script> -->
    <!-- Your custom scripts go here -->
    <script>
        function showModalImage(imageSrc) {
            document.getElementById('modalImage').src = imageSrc;
            $('#imageModal').modal('show');
        }

        $(document).ready(function () {
            $('#imageModal').on('hidden.bs.modal', function () {
                $('.modal-backdrop').remove();
            });
        });
    </script>
</body>
</html>

<!-- Content Row -->
<?= $this->endSection() ?>
