<?php

/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2018 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 *
 */

namespace humhub\modules\friends\models;

use Yii;
use \yii\base\Model;

class SnippetModuleSettings extends Model
{

    /**
     * @var int maximum amount of shown users
     */
    public $myFriendsSnippetMaxItems = 23;

    /**
     * @var int defines the snippet widgets sort order
     */
    public $myFriendsSnippetSortOrder = 100;


    public function init()
    {
        $module = Yii::$app->getModule('friends');
        $this->myFriendsSnippetMaxItems = $module->settings->get('myFriendsSnippetMaxItems', $this->myFriendsSnippetMaxItems);
        $this->myFriendsSnippetSortOrder = $module->settings->get('myFriendsSnippetSortOrder', $this->myFriendsSnippetSortOrder);
    }

    /**
     * Static initializer
     * @return \self
     */
    public static function instantiate()
    {
        return new self;
    }

    /**
     * @inheritDoc
     */
    public function rules()
    {
        return [
            ['myFriendsSnippetMaxItems',  'number', 'min' => 1, 'max' => 30],
            ['myFriendsSnippetSortOrder',  'number', 'min' => 0],
        ];
    }

    /**
     * @inheritDoc
     */
    public function attributeLabels()
    {
        return [
            'myFriendsSnippetMaxItems' => Yii::t('FriendsModule.base', 'Max user items'),
            'myFriendsSnippetSortOrder' => Yii::t('FriendsModule.base', 'Sort order'),
        ];
    }

    public function save()
    {
        if(!$this->validate()) {
            return false;
        }

        $module = Yii::$app->getModule('Friends');
        $module->settings->set('myFriendsSnippetMaxItems', $this->myFriendsSnippetMaxItems);
        $module->settings->set('myFriendsSnippetSortOrder', $this->myFriendsSnippetSortOrder);
        return true;
    }
}
