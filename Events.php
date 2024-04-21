<?php

namespace humhub\modules\profilecard;

use Yii;
use yii\helpers\Url;
use yii\base\BaseObject;
use humhub\modules\ui\menu\MenuLink;
use humhub\modules\ui\icon\widgets\Icon;
use humhub\modules\admin\widgets\AdminMenu;
use humhub\modules\admin\permissions\ManageModules;

class Events extends BaseObject
{

    public static function onAdminMenuInit($event)
    {
        if (!Yii::$app->user->can(ManageModules::class)) {
            return;
        }

        /** @var AdminMenu $menu */
        $menu = $event->sender;

        $menu->addEntry(new MenuLink([
            'label' => Yii::t('ProfilecardModule.base', 'Profile Card Settings'),
            'url' => Url::toRoute('/profilecard/admin/index'),
            'icon' => Icon::get('fa-id-card-o'),
            'isActive' => Yii::$app->controller->module && Yii::$app->controller->module->id == 'profilecard' && Yii::$app->controller->id == 'admin',
            'sortOrder' => 600,
            'isVisible' => true,
        ]));
    }

    public static function addProfileCard($event)
    {
        $module = Yii::$app->getModule('profilecard');
        $settings = $module->settings;

        $event->sender->addWidget(widgets\ProfileCard::class, [], ['sortOrder' => $settings->get('sortOrder')]);
    }
}