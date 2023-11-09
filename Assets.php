<?php

/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2018 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 *
 */

namespace humhub\modules\friends\assets;

use yii\web\AssetBundle;

class Assets extends AssetBundle
{
//    public $css = [
//        'friends.css',
//    ];
//    public $js = [
//        'friends.js'
//    ];

    public function init()
    {
        $this->sourcePath = dirname(__FILE__) . '/assets';
        parent::init();
    }
}
