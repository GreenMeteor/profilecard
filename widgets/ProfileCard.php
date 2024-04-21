<?php

namespace humhub\modules\profilecard\widgets;

use Yii;
use humhub\components\Widget;
use humhub\modules\user\models\User;

/**
 * ProfileCard displays user information in the sidebar.
 * 
 * @property User $user The user object to display information for.
 * @property string $template HTML wrapper around card.
 * 
 * @since 1.0.0
 * @author @Archblood
 */
class ProfileCard extends Widget
{
    /**
     * @var User|null The user object to display information for.
     */
    public $user;

    /**
     * @var string HTML wrapper around card.
     */
    public $template = '<div class="panel panel-user-sidebar">{card}</div>';

    /**
     * Renders the profile card widget.
     * If the $user property is not set, it retrieves the current user.
     * 
     * @return string The rendered profile card HTML.
     */
    public function run()
    {
        // If $user property is not set, retrieve the current user
        if ($this->user === null) {
            $this->user = Yii::$app->user->getIdentity();
        }

        $card = $this->render('profileCard', [
            'user' => $this->user,
        ]);

        return str_replace('{card}', $card, $this->template);
    }
}