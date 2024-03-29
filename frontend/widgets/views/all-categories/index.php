<?php
/**@var $categories */
?>

<aside class="single_sidebar_widget post_category_widget">
    <h4 class="widget_title">Категории</h4>
    <ul class="list cat-list">
        <?php ?>
        <?php foreach ($categories as $category) { ?>
            <li>
                <a href="/blog/<?= $category->code ?>" class="d-flex justify-content-between">
                    <p><?= $category->title ?></p>
                    <p><?= $category->getPagesCount() ?></p>
                </a>
            </li>
        <?php } ?>
    </ul>
    <div class="br"></div>
</aside>
