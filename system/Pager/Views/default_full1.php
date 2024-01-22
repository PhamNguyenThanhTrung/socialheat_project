<nav aria-label="<?= lang('Pager.pageNavigation') ?>">
	<ul class="pagination">
		<?php if ($pager->hasPrevious()) : ?>
			<li>
				<a href="<?= $pager->getFirst() ?>" aria-label="<?= lang('Pager.first') ?>">
					<span aria-hidden="true"><?= lang('Pager.first') ?></span>
				</a>
			</li>
			<li>
				<a href="<?= $pager->getPrevious() ?>" aria-label="<?= lang('Pager.previous') ?>">
					<span aria-hidden="true"><?= lang('Pager.previous') ?></span>
				</a>
			</li>
		<?php endif ?>

		<?php foreach ($pager->links() as $link) : ?>
			<li <?= $link['active'] ? 'class="active"' : '' ?>>
				<a href="<?= $link['uri'] ?>">
					<?= $link['title'] ?>
				</a>
			</li>
		<?php endforeach ?>

		<?php if ($pager->hasNext()) : ?>
			<li>
				<a href="<?= $pager->getNext() ?>" aria-label="<?= lang('Pager.next') ?>">
					<span aria-hidden="true"><?= lang('Pager.next') ?></span>
				</a>
			</li>
			<li>
				<a href="<?= $pager->getLast() ?>" aria-label="<?= lang('Pager.last') ?>">
					<span aria-hidden="true"><?= lang('Pager.last') ?></span>
				</a>
			</li>
		<?php endif ?>
	</ul>
</nav>

<?php

use CodeIgniter\Pager\PagerRenderer;

/**
 * @var PagerRenderer $pager
 */
$pager->setSurroundCount(2);
?>




<div class="col-md-6 py-5">
<style>
    .pagination .page-item a {
        color: #000; /* Đổi màu chữ thành đen */
    }

    .pagination .page-item.active a {
        background-color: #000; /* Đổi màu nền khi trang đang active thành đen */
        color: #fff; /* Đổi màu chữ khi trang đang active thành trắng */
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
                    <li class="page-item active">
                        <span class="page-link"><?= $link['title'] ?></span>
                    </li>
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





