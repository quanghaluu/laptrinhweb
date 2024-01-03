<div class="product__pagination">
    <?php
    if ($current_page > 3) {
        $first_page = 1;
        ?>
        <a href="?<?= $param ?>page=<?= $first_page ?>">Đầu</a>
        <?php
    }
    if ($current_page > 1) {
        $prev_page = $current_page - 1;
        ?>
        <a href="?<?= $param ?>page=<?= $prev_page ?>"><i class="fa fa-long-arrow-left"></i></a>
    <?php }
    ?>
    <?php if ($totalPages > 1) {
        for ($sl = 1; $sl <= $totalPages; $sl++) {
            if ($sl != $current_page) {
                if ($sl > $current_page - 3 && $sl < $current_page + 3) { ?>
                    <a href="?<?= $param ?>page=<?= $sl ?>"><?= $sl ?></a>
                <?php }
            } else { ?>
                <strong>
                    <?= $sl ?>
                </strong>
            <?php }
        }
    } ?>

    <?php
    if ($current_page <= $totalPages - 1) {
        $next_page = $current_page + 1;
        ?>
        <a href="?<?= $param ?>page=<?= $next_page ?>"><i class="fa fa-long-arrow-right"></i></a>
        <?php
    }
    if ($current_page < $totalPages - 2) {
        $end_page = $totalPages;
        ?>
        <a href="?<?= $param ?>page=<?= $end_page ?>">Cuối</a>
        <?php
    }
    ?>
</div>