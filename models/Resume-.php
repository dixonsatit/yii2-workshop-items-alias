<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%resume}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $fistname
 * @property string $lastname
 * @property integer $education_level
 * @property integer $marital_status
 * @property integer $sex
 * @property string $skill
 */
class Resume extends \yii\db\ActiveRecord
{
    const SEX_MEN = 1;
    const SEX_WOMEN = 2;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%resume}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['education_level', 'marital_status', 'sex'], 'integer'],
            [['title'], 'string', 'max' => 150],
            [['fistname', 'lastname'], 'string', 'max' => 255],
            [['skill'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'fistname' => Yii::t('app', 'Fistname'),
            'lastname' => Yii::t('app', 'Lastname'),
            'education_level' => Yii::t('app', 'Education Level'),
            'marital_status' => Yii::t('app', 'Marital Status'),
            'sex' => Yii::t('app', 'Sex'),
            'skill' => Yii::t('app', 'Skill'),
        ];
    }

    /**
     * @inheritdoc
     * @return ResumeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ResumeQuery(get_called_class());
    }

    public static function itemsAlias($key){

      $items = [
        'sex'=>[
          self::SEX_MEN => 'ชาย',
          self::SEX_WOMEN => 'หญิง'
        ],
        'title'=>[
          1 => 'นาย',
          2 => 'นางสาว',
          3 => 'นาง'
        ],
        'skill'=>[
          'php' => 'PHP',
          'js' => 'JavaScript',
          'css' => 'CSS',
          'html5' => 'Html5',
          'angularjs' => 'AngularJs',
          'node.js' => 'Node.Js',
          'reactjs' => 'ReactJs',
          'go'=>'Go',
          'ruby'=>'ruby on rails',
          'swiff' => 'Swiff',
          'android' => 'Android',
      ]
    ];
      return ArrayHelper::getValue($items,$key,[]);
      //return array_key_exists($key, $items) ? $items[$key] : [];
    }

    public function getItemSex()
    {
      return self::itemsAlias('sex');
    }

    public function getItemTitle()
    {
      return self::itemsAlias('title');
    }

    public function getItemSkill()
    {
      return self::itemsAlias('skill');
    }

    public function getSexLebel(){
        return ArrayHelper::getValue($this->getItemSex(),$this->sex);
    }

    public function getTitleLebel(){
        return ArrayHelper::getValue($this->getItemTitle(),$this->title);
    }

    public function getSkillLebel(){
        return ArrayHelper::getValue($this->getItemSkill(),$this->skill);
    }


}
