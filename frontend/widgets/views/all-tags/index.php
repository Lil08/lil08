<?php
/**@var $tags */
?>

<aside class="single-sidebar-widget tag_cloud_widget">
    <h4 class="widget_title">Теги</h4>
    <ul class="list">
        <?php foreach ($tags as $tag) {?>
            <li><a href="#"><?= $tag->name ?></a></li>
        <?php } ?>
    </ul>
</aside>
