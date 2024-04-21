<?php

use humhub\modules\ui\form\widgets\SortOrderField;
use humhub\modules\ui\form\widgets\ActiveForm;
use humhub\libs\Html;

?>

<div class="panel panel-default">
    <div class="panel-heading"><?= Yii::t('ProfilecardModule.base', '<strong>Profile</strong> Card module configuration'); ?></div>
    <div class="panel-body">
        <?php $form = ActiveForm::begin(['id' => 'configure-form']); ?>
        <div class="form-group">
            <?= $form->field($model, 'sortOrder')->widget(SortOrderField::class) ?>
        </div>
        <hr>
        <div class="form-group">
            <?= Html::submitButton(Yii::t('ProfilecardModule.base', 'Save'), ['class' => 'btn btn-primary', 'data-ui-loader' => '']); ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>