<?php

/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2018 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 *
 */
/* @var $this yii\web\View */
/* @var $model \humhub\modules\friends\models\SnippetModuleSettings */

use humhub\modules\ui\form\widgets\ActiveForm;
use \yii\helpers\Html;

?>

<div class="panel panel-default">

    <div class="panel-heading"><?= Yii::t('FriendsModule.base', '<strong>Friends</strong> module configuration'); ?></div>

    <div class="panel-body">
        <?php $form = ActiveForm::begin(); ?>
        
        <div class="help-block">
            <?= Yii::t('FriendsModule.base', 'Edit <strong>max shown users</strong> in friends-list and <strong>sort order</strong> of the widget') ?>
        </div>

        <?= $form->field($model, 'myfriendsSnippetMaxItems')->input('number', ['min' => 1, 'max' => 30]) ?>
        <?= $form->field($model, 'myfriendsSnippetSortOrder')->input('number', ['min' => 0]) ?>

        <hr>

        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'data-ui-loader' => '']) ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>
