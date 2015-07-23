<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\behaviors\AttributeBehavior;
use \yii\db\ActiveRecord;
/**
 * This is the model class for table "{{%resume}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $firstname
 * @property string $lastname
 * @property integer $education_level
 * @property integer $marital_status
 * @property integer $sex
 * @property string $skill
 */
class Resume extends ActiveRecord
{
  const SEX_MEN = 1;
  const SEX_WOMEN = 2;

    public function behaviors()
    {
        return [
            [
                'class' => AttributeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'skill',
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'skill',
                ],
                'value' => function ($event) {
                    return implode(',', $this->skill);
                },
            ],
        ];
    }
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
            [['title','firstname', 'lastname','education_level', 'marital_status', 'sex'], 'required'],
            [['education_level', 'marital_status', 'sex'], 'integer'],
            [['title'], 'string', 'max' => 150],
            [['firstname', 'lastname'], 'string', 'max' => 255],
            [['skill'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'คำนำหน้า'),
            'firstname' => Yii::t('app', 'ชื่อ'),
            'lastname' => Yii::t('app', 'นามสกุล'),
            'education_level' => Yii::t('app', 'การศึกษา'),
            'marital_status' => Yii::t('app', 'สถานะสมรส'),
            'sex' => Yii::t('app', 'เพศ'),
            'skill' => Yii::t('app', 'ทักษะ'),

            'fullName'=> Yii::t('app', 'ชื่อ - นามสกุล'),
            'educationName'=>Yii::t('app', 'การศึกษา'),
            'maritalName'=> Yii::t('app', 'สถานะสมรส'),
            'sexName' => Yii::t('app', 'เพศ'),
            'skillName'=> Yii::t('app', 'ทักษะ')
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
        'marital'=>[
          1 => 'โสด',
          2 => 'สมรส',
          3 => 'เป็นหม้าย',
          4 => 'หย่าร้าง'
        ],
        'education'=>[
          1 => 'ต่ำกว่ามัธยมศึกษาตอนต้น',
          2 => 'มัธยมศึกษาตอนต้น',
          3 => 'ปวช',
          4 => 'มัธยมศึกษาตอนปลาย',
          5 => 'ปวส',
          6 => 'อนุปริญญา',
          7 => 'ปริญญาตรี',
          8 => 'ปริญญาโท',
          9 => 'ปริญญาเอก'
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

    public function getItemMarital()
    {
      return self::itemsAlias('marital');
    }

    public function getItemEducation()
    {
      return self::itemsAlias('education');
    }

    public function getItemTitle()
    {
      return self::itemsAlias('title');
    }

    public function getItemSkill()
    {
      return self::itemsAlias('skill');
    }

    public function getSexName(){
        return ArrayHelper::getValue($this->getItemSex(),$this->sex);
    }

    public function getMaritalName(){
        return ArrayHelper::getValue($this->getItemMarital(),$this->marital_status);
    }

    public function getEducationName(){
        return ArrayHelper::getValue($this->getItemEducation(),$this->education_level);
    }

    public function getTitleName(){
        return ArrayHelper::getValue($this->getItemTitle(),$this->title);
    }

    public function getSkillName(){
        $skills = $this->getItemSkill();
        $skillSelected = explode(',', $this->skill);
        $skillSelectedName = [];
        foreach ($skills as $key => $skillName) {
          foreach ($skillSelected as $skillKey) {
            if($key === $skillKey){
              $skillSelectedName[] = $skillName;
            }
          }
        }

        return implode(', ', $skillSelectedName);
    }

    public function getFullName()
    {
       return $this->titleName.$this->firstname.' '.$this->lastname;
    }

    public function skillToArray()
    {
      return $this->skill = explode(',', $this->skill);
    }

}
