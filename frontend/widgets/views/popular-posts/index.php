<?php
/**
 * @var $posts
 * @var \common\models\Post $post
 */
?>
<aside class="single_sidebar_widget popular_post_widget">
    <h3 class="widget_title">Popular Posts</h3>
    <?php foreach ($posts as $post) { ?>
        <div class="media post_item">
            <?php if ($post->image) { ?>
                <img src="<?= $post->image ?>" alt="post" width="50px">
            <?php } ?>
            <div class="media-body">
                <a href="<?= $post->getUrl() ?>"><h3><?= $post->title ?></h3></a>
                <p><?= $post->createdAt ?></p>
            </div>
        </div>
    <?php } ?>
    <div class="br"></div>
</aside>