<?php

use humhub\helpers\Html;
use humhub\modules\widgets\form\ActiveForm;

/* @var $model \humhub\modules\user\models\forms\Login */
?>

<div class="panel panel-default">
    <div class="panel-body">
        <?php $form = ActiveForm::begin([
            'id' => 'guest-login-form',
            'action' => ['/user/auth/login'],  // Point to HumHub's core AuthController
            'method' => 'post',
        ]); ?>

        <?= $form->field($model, 'username')->textInput(['placeholder' => Yii::t('UserModule.auth', 'username or email')]); ?>

        <?= $form->field($model, 'password')->passwordInput(['placeholder' => Yii::t('UserModule.auth', 'password')]); ?>

        <?= $form->field($model, 'rememberMe')->checkbox(); ?>

        <?= Html::submitButton(Yii::t('UserModule.auth', 'Sign in'), ['class' => 'btn btn-primary', 'data-ui-loader' => '']); ?>

        <?php ActiveForm::end(); ?>
    </div>
</div>
