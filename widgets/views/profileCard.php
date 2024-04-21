<?php

use yii\web\View;
use yii\helpers\Url;
use humhub\libs\Html;
use humhub\widgets\PanelMenu;
use humhub\modules\user\models\User;
use humhub\modules\user\widgets\Image;
use humhub\modules\ui\icon\widgets\Icon;
use humhub\modules\admin\widgets\AdminMenu;
use humhub\modules\user\widgets\PeopleDetails;
use humhub\modules\user\widgets\PeopleTagList;
use humhub\modules\user\widgets\ProfileHeaderCounterSet;

// Define the account settings menu items
$accountSettingsMenu = [
    ['label' => Icon::get('fa-cog') . ' Account Settings', 'url' => Url::toRoute('/user/account/edit')],
];

// Check if admin access is allowed
if (AdminMenu::canAccess()) {
    // Add the "Administration" menu item
    $accountSettingsMenu[] = ['label' => Icon::get('fa-cogs') . ' Administration', 'url' => Url::toRoute('/admin')];
}

// Convert the menu items array into HTML anchor tags
$extraMenusHtml = '';
foreach ($accountSettingsMenu as $menuItem) {
    $extraMenusHtml .= Html::tag('li', Html::a($menuItem['label'], $menuItem['url']));
}

/* @var $this View */
/* @var $user User */
?>
<div class="panel panel-default">
    <?= PanelMenu::widget([
        'id' => 'panel-userSidebarCard',
        'extraMenus' => $extraMenusHtml,
    ]); ?>
    <div class="panel-heading"><strong>Profile</strong> Card</div>
    <div class="panel-body"<?php if ($user !== null && $user->getProfileBannerImage() !== null && $user->getProfileBannerImage()->hasImage()) : ?> style="background-image: url('<?= $user->getProfileBannerImage()->getUrl() ?>'); background-size: auto auto; background-repeat: no-repeat;"<?php endif; ?>>
        <div class="panel-body">
            <?php if ($user !== null) : ?>
                <?= Image::widget([
                    'user' => $user,
                    'htmlOptions' => ['class' => 'panel-image-wrapper'],
                    'linkOptions' => ['data-contentcontainer-id' => $user->contentcontainer_id, 'class' => 'panel-image-link has-online-status img-size-large'],
                    'width' => 95,
                    'showSelfOnlineStatus' => true,
                ]); ?>
                <div class="panel-heading">
                    <strong class="panel-h1"><?= Html::containerLink($user); ?></strong>
                    <?php if (!empty($user->displayNameSub)) : ?>
                        <div><?= Html::encode($user->displayNameSub); ?></div>
                    <?php endif; ?>
                </div>
                <?= PeopleDetails::widget([
                    'user' => $user,
                    'template' => '<div class="panel-body">{lines}</div>',
                    'separator' => '<br>',
                ]); ?>
                <?= PeopleTagList::widget([
                    'user' => $user,
                    'template' => '<div class="panel-body">{tags}</div>',
                ]); ?>
                <?= ProfileHeaderCounterSet::widget(['user' => $user]); ?>
            <?php else : ?>
                <p>User not found.</p>
            <?php endif; ?>
        </div>
    </div>
</div>
