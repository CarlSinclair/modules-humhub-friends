<?php
/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2018 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 *
 */

namespace humhub\modules\friends;

use Yii;
use yii\base\BaseObject;
use humhub\modules\friends\models\SnippetModuleSettings;
use humhub\modules\friends\widgets\Friends;
use humhub\modules\friends\permissions\ViewWidget;


/*
 * @var $user \humhub\modules\user\models\User
 */

class Events extends BaseObject
{
    public static function onProfileeSidebarInit($event)
    {
        if (Yii::$app->user->isGuest) {
            return;
        }

        $user = $event->sender->user;
        $settings = SnippetModuleSettings::instantiate();

        if ($user->isModuleEnabled('friends')) {
            if ($user->permissionManager->can(ViewWidget::class)) {
                $event->sender->addWidget(Friends::class, ['maxFriends' => $settings->myFriendsSnippetMaxItems, 'space' => $space], ['sortOrder' => $settings->myFriendsSnippetSortOrder]);
            }
        }
    }
}
