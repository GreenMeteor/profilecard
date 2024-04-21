<?php

namespace humhub\modules\profilecard;

use humhub\modules\profilecard\Events;
use humhub\modules\profilecard\Module;
use humhub\modules\admin\widgets\AdminMenu;
use humhub\modules\dashboard\widgets\Sidebar;

return [
    'id' => 'profilecard',
    'class' => Module::class,
    'namespace' => 'humhub\modules\profilecard',
    'events' => [
        ['class' => Sidebar::class, 'event' => Sidebar::EVENT_INIT, 'callback' => [Events::class, 'addProfileCard']],
        ['class' => AdminMenu::class, 'event' => AdminMenu::EVENT_INIT, 'callback' => [Events::class, 'onAdminMenuInit']]
    ]
];