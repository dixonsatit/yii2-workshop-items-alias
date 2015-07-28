<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%skill}}".
 *
 * @property integer $id
 * @property string $name
 */
class Skill extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%skill}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

    /**
     * @inheritdoc
     * @return SkillQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SkillQuery(get_called_class());
    }
}
