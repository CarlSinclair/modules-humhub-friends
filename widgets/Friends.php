<?php

/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2017 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 */

namespace humhub\modules\friends\widgets;

use humhub\components\Widget;
use humhub\modules\friendship\models\Friendship;
use humhub\modules\user\models\User;

/**
 * Space Friends Snippet
 *
 * @author davidborn
 */
class friends extends Widget
{

    /**
     * @var int maximum friends to display
     */
    public $maxFriends;

    /**
     * @var Space the space
     */
    public $space;

    /**
     * @inheritdoc
     */
    public function run()
    {
        $users = $this->getUserQuery()->all();

        return $this->render('friends', [
                    'users' => $users,
                    'showListButton' => (count($users) == $this->maxFriends),
                    'urlFriendsList' => Url::to(['/friendship/list/popup', 'userId' => $this->user->id]),
                    'totalMemberCount' => Friendship::getFriendsQuery($this->user)->count()
        ]);
    }

    /**
     * Returns a query for friends of this space
     *
     * @return \yii\db\ActiveQuery the query
     */
    protected function getUserQuery()
    {
        $query = Friendship::getFriendsQuery($this->user)->count();
        $query->limit($this->maxFriends);
        return $query;
    }
}

?>
