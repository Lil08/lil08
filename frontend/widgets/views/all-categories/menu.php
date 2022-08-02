<?php
/**@var $categories */
?>
<ul class="dropdown-menu">
    <?php foreach ($categories as $category) { ?>
        <li class="nav-item"><a class="nav-link" href="/blog/<?= $category->code ?>"><?= $category->title ?></a>
        </li>
    <?php } ?>
</ul>
