<?php

use CodeIgniter\Pager\PagerRenderer;

/**
 * @var PagerRenderer $pager
 */
$pager->setSurroundCount(2);
?>




<div class="col-md-6 py-5">
<style>
    .pagination .page-item {
        display: inline-block;
        margin-right: 5px; /* Khoảng cách giữa các nút */
    }

    .pagination .page-item a {
        color: #808080; /* Màu chữ khi chưa active là xám */
        background-color: #f8f9fa; /* Màu nền khi chưa active */
        padding: 8px 12px; /* Điều chỉnh khoảng cách giữa chữ và viền nút */
        border: 1px solid #dee2e6; /* Viền nút */
        
        border-radius: 4px; /* Bo tròn góc nút */
    }

    .pagination .page-item.active a {
        background-color: #343a40; /* Màu nền khi active là đen */
        color: #fff; /* Màu chữ khi active là trắng */
        height: 12vh;
    }
    .pagination .page-item.disabled span.page-link {
    display: inline-block;
    min-width: 30px; /* Điều chỉnh chiều rộng tối thiểu */
    min-height: 30px; /* Điều chỉnh chiều cao tối thiểu */
    padding: 8px 12px; /* Điều chỉnh khoảng cách giữa chữ và viền nút */
    border: 1px solid #dee2e6; /* Viền nút */
    border-radius: 4px; /* Bo tròn góc nút */
    background-color: #f8f9fa; /* Màu nền khi chưa active */
    color: #808080; /* Màu chữ khi chưa active là xám */
}

</style>


<nav aria-label="<?= lang('Pager.pageNavigation') ?>">
    <ul class="pagination">

    <?php if ($pager->hasPrevious()) : ?>
    <li class="page-item">
        <a class="page-link" href="<?= $pager->getPrevious() ?>" aria-label="<?= lang('Pager.previous') ?>">
            <i class="fas fa-chevron-left" aria-hidden="true"></i>
        </a>
    </li>

<?php endif ?>


        <?php $currentPage = isset($_GET['page']) ? (int) $_GET['page'] : 1; ?>

        <?php foreach ($pager->links() as $index => $link) : ?>
            <?php if ($link['title'] === '...') : ?>
                <!-- Ellipsis -->
                <li class="page-item disabled"><span class="page-link">...</span></li>
            <?php else : ?>
                
                <!-- Regular page link -->
                <?php if ($link['active']) : ?>
                
                    
            <li class="page-item disabled"><span class="page-link">...</span></li>
                <?php else : ?>
                    <?php if ($index == 0 || $index == count($pager->links()) - 1 || abs($link['title'] - $currentPage) <= 1) : ?>
                        <li class="page-item">
                            <a class="page-link" href="<?= $link['uri'] ?>">
                                <?= $link['title'] ?>
                            </a>
                        </li>
                    <?php elseif (abs($link['title'] - $currentPage) == 2) : ?>
                        <!-- Show ellipsis when there is a gap of 2 pages -->
                        <li class="page-item disabled"><span class="page-link">...</span></li>
                    <?php endif ?>
                <?php endif ?>
            <?php endif ?>
        <?php endforeach ?>

        <?php if ($pager->hasNext()) : ?>
            <li class="page-item">
                <a class="page-link" href="<?= $pager->getNext() ?>" aria-label="<?= lang('Pager.next') ?>">
                    <i class="fas fa-chevron-right" aria-hidden="true"></i>
                </a>
            </li>
        <?php endif ?>

    </ul>
</nav>




    </div>