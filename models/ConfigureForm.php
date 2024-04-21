<?php

namespace humhub\modules\profilecard\models;

use Yii;

/**
 * ConfigureForm defines the configurable fields.
 */
class ConfigureForm extends \yii\base\Model
{
    /**
     * Sort the order of the widget
     */
    public $sortOrder;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['sortOrder', 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sortOrder' => Yii::t('ProfilecardModule.base', 'Sort Order:'),
        ];
    }

    public function loadSettings()
    {
        $module = Yii::$app->getModule('profilecard');
        $settings = $module->settings;

        $this->sortOrder = $settings->get('sortOrder');

        return true;
    }

    public function save()
    {
        $module = Yii::$app->getModule('profilecard');
        $settings = $module->settings;

        $settings->set('sortOrder', $this->sortOrder);

        return true;
    }

}