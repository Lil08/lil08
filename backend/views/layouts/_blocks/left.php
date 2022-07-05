<?php

use andrewdanilov\adminpanel\Menu;

/* @var $this \yii\web\View */
/* @var $siteName string */
/* @var $directoryAsset false|string */

?>

<div class="page-left">
	<div class="sidebar-heading"><?= $siteName ?></div>
	<?= Menu::widget(['items' => [
		['label' => 'Dashboard', 'url' => ['/site/index'], 'icon' => 'tachometer-alt'],
		[],
		['label' => 'Блог'],
		['label' => 'Категории', 'url' => ['/category/index'], 'icon' => ['symbol' => 'tags', 'type' => 'solid']],
        ['label' => 'Теги', 'url' => ['/tag/index'], 'icon' => ['symbol' => 'tag', 'type' => 'solid']],
		['label' => 'Посты', 'url' => ['/post/index'], 'icon' => ['symbol' => 'newspaper', 'type' => 'solid']],
		['label' => 'Комментарии', 'url' => ['/comments/index'], 'icon' => ['symbol' => 'newspaper', 'type' => 'solid']],
		[],
		['label' => 'Система'],
		['label' => 'Пользователи', 'url' => ['/user/index'], 'icon' => 'users'],
	]]) ?>
</div>
