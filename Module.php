<?php

namespace humhub\modules\friends;

use Yii;
use yii\helpers\Url;
use humhub\modules\user\models\User;
use humhub\modules\content\components\ContentContainerActiveRecord;
use humhub\modules\content\components\ContentContainerModule;

class Module extends ContentContainerModule
{
    /**
     * @inheritdoc
     */
//    public $resourcesPath = 'resources';

    /**
     * @inheritdoc
     */
    public function getContentContainerTypes()
    {
        return [
            User::class,
        ];
    }

    /**
     * @inheritdoc
     */
    public function disable()
    {
        parent::disable();
    }

    /**
     * @inheritdoc
     */
    public function disableContentContainer(ContentContainerActiveRecord $container)
    {
        parent::disableContentContainer($container);
    }

    public function getName()
    {
        return Yii::t('FriendsModule.base', 'Friends');
    }

    public function getDescription()
    {
        return Yii::t('FriendsModule.base', 'Adds a widget showing a list of space friends.');
    }

    /**
     * @inheritdoc
     */
    public function getContentContainerName(ContentContainerActiveRecord $container)
    {
        return Yii::t('FriendsModule.base', 'Friends');
    }

    /**
     * @inheritdoc
     */
    public function getContentContainerDescription(ContentContainerActiveRecord $container)
    {
        return Yii::t('FriendsModule.base', 'Adds a widget showing a list of space friends.');
    }

//    public function getConfigUrl()
//    {
//        return Url::to([
//            '/friends/config'
//        ]);
//    }

//   public function getContentContainerConfigUrl(ContentContainerActiveRecord $container)
//    {
//        return $container->createUrl('/friends/container-config');
//    }


    /**
     * @inheritdoc
     */
    public function getPermissions($contentContainer = null)
    {
        if ($contentContainer instanceof Space) {
            return [
                new permissions\ViewWidget()
            ];
        }

        return [];
    }
}
