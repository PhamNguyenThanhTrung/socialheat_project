<?= $this->extend('layout/admin') ?>

<?= $this->section('content') ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Product Import Update</h1>

</div>

<style>




</style>


<div class="container1">

<form action="/public/upload" method="post" enctype="multipart/form-data">
    <div class="container bg-light pt-4 py-3 justify-content-center " style="width:600px ">
        <div class="dropdown bg-white container border">
            <button class="btn btn-white dropdown-toggle container " type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
               Supplier Name
            </button>
            <ul class="dropdown-menu w-100">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
        </div><br> 
        <div class="row bg-white pt-3 dashed-border m-3">
            <div class="col-2 d-flex align-items-left pr-5 text-dark icon1">
                <i class="bi bi-file-earmark-arrow-up"></i>
            </div>

            <div class="col text-left">
                <strong>
                    <p class="mb-2 text-dark" id="fileInfo">Drop here or click to select files</p>
                    <p class="mb-2 small text-secondary" id="fileType">File type: xls, csv</p>
                    <p class="mb-2 small text-secondary" id="fileColumns">Columns: column1 | column2 | column3 | column4</p>
                </strong>
            </div>
            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>
            
            <!-- Input field for file selection -->
            <input type="file" name="file" accept=".xls, .csv" class="form-control-file mt-3" onchange="updateFileInfo(this.files)">

        </div>
        <div class="buttons text-center">
            <button type="button" onclick="downloadTemplate()" class="btn btn-secondary w-35 pl-5">Download File Template</button>
            <button type="submit" class="btn btn-primary w-50">Import Product</button>
        </div>
    </div>
</form>

<script>
    function updateFileInfo(files) {
        if (files.length > 0) {
            const fileInfo = document.getElementById("fileInfo");
            const fileType = document.getElementById("fileType");
            const fileColumns = document.getElementById("fileColumns");

            const file = files[0];
            fileInfo.textContent = `File: ${file.name}`;
            fileType.textContent = `File type: ${file.type}`;

            // Đọc file CSV và xác định cột
            const reader = new FileReader();
            reader.onload = function (e) {
                const content = e.target.result;
                const lines = content.split('\n');
                
                if (lines.length > 0) {
                    const firstLine = lines[0].trim();
                    const columns = firstLine.split(';'); // Chỉnh sửa dấu chia cột tùy thuộc vào định dạng thực tế

                    if (columns.length > 0) {
                        fileColumns.textContent = `Columns: ${columns.join(' | ')}`;
                    }
                }
            };

            reader.readAsText(file);
        }
    }
</script>


<script>
    function downloadTemplate() {
        window.location.href = '<?= base_url('exportTemplate') ?>';
    }
</script>




</div>

<?= $this->endSection('content') ?>