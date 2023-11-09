<?php

use humhub\widgets\PanelMenu;
use humhub\modules\user\widgets\Image;
?>

<div class="panel panel-default friends" id="space-friends-panel">
    <?= PanelMenu::widget(['id' => 'space-friends-panel']); ?>
    <div class="panel-heading"><?= Yii::t('FriendsModule.base', '<strong>Space</strong> friends'); ?> (<?= $totalMemberCount ?>)</div>
    <div class="panel-body">
        <?php foreach ($users as $user) : ?>
            <?php
                // Standard member
                echo Image::widget(['user' => $user, 'width' => 32, 'showTooltip' => true]);
            ?>
        <?php endforeach; ?>

        <?php if ($showListButton) : ?>
            <br>
            <a href="<?= $urlFriendsList; ?>" data-target="#globalModal" class="btn btn-default btn-sm"><?= Yii::t('FriendsModule.base', 'Show all'); ?></a>
        <?php endif; ?>

    </div>
</div>