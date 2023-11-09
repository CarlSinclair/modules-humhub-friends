<?php

use humhub\modules\user\widgets\ProfileSidebar as ProfileSidebar;
use humhub\modules\friends\Module;
use humhub\modules\friends\Events;

return array(
    'id' => 'friends',
    'class' => Module::class,
    'namespace' => 'humhub\modules\friends',
    'events' => [
	['class' => ProfileSidebar::class, 'event' => ProfileSidebar::EVENT_INIT, 'callback' => [Events::class, 'onProfileSidebarInit']],
]
);
?>