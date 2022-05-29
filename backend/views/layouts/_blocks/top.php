<?php

/* @var $this \yii\web\View */
/* @var $userName string */
/* @var $directoryAsset false|string */

?>

<div class="page-top">
	<div class="top-header"><?= $this->title ?></div>
	<div class="profile-panel">
		<div class="profile-item">
			<span class="small"><?= $userName; ?></span>
			<span class="user-icon fa fa-user-circle"></span>
            <a href="/user/logout">выйти</a>
		</div>
	</div>
</div>