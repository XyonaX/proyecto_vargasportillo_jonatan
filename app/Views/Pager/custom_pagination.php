<?php $pager->setSurroundCount(2) ?>

<div aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <?php if ($pager->hasPrevious()) : ?>
            <li class="page-item disabled">
                <a class="page-link" href="<?= $pager->getPrevious() ?>">Previous</a>
            </li>
        <?php endif ?>
        <?php foreach ($pager->links() as $link) : ?>

            <li class="page-item mt-2"><a class="page-link" href="<?= $link['uri'] ?>"><?= $link['title'] ?></a></li>
        <?php endforeach ?>
        <?php if ($pager->hasNext()) : ?>

        <li class="page-item">
            <a class="page-link" href="<?= $pager->getNext() ?>">Next</a>
        </li>
        <?php endif ?>
    </ul>
</div>