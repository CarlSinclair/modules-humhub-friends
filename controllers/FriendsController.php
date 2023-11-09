<?php

/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2016 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 */

namespace humhub\modules\friends\controllers;

use Yii;
use humhub\modules\friendship\models\Friends;
use humhub\modules\user\widgets\UserListBox;
use humhub\components\behaviors\AccessControl;
use humhub\modules\content\components\ContentContainerController;
use humhub\modules\user\models\User;
/**
 * FriendsController is the main controller for showing up friends-list.
 */
class FriendsController extends ContentContainerController
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'acl' => [
                'class' => AccessControl::class,
            ]
        ];
    }

    /**
     * Returns an user list which are space friends
     */
    public function actionFriendsList()
    {
        $title = Yii::t('FriendsModule.base', "<strong>Friends</strong>");

        return $this->renderAjaxContent(UserListBox::widget([
                            'query' => Friendship::getFriendsQuery($this->user))->visible(),
                            'title' => $title
        ]));
    }

}

?>
