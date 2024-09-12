<?php

namespace humhub\modules\profilecard\widgets;

use Yii;
use humhub\components\Widget;

/**
 * GuestLoginWidget displays login fields for guest users in HumHub.
 */
class GuestLogin extends Widget
{
    /**
     * @var string HTML wrapper around login form.
     */
    public $template = '<div class="panel panel-guest-login">{form}</div>';

    /**
     * Renders the guest login widget.
     * 
     * @return string The rendered login form HTML.
     */
    public function run()
    {
        $form = $this->render('guestLoginForm', [
            'model' => $this->getLoginForm(),
        ]);

        return str_replace('{form}', $form, $this->template);
    }

    /**
     * Returns the login form model.
     * 
     * @return \humhub\modules\user\models\forms\Login
     */
    protected function getLoginForm()
    {
        return new \humhub\modules\user\models\forms\Login();
    }
}
