<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Resume */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="resume-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->inline()->radioList($model->getItemTitle()) ?>
    <div class="row">

      <div class="col-md-6">
        <?= $form->field($model, 'firstname')->textInput(['maxlength' => true]) ?>
      </div>
      <div class="col-md-6">
          <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>
      </div>
    </div>
    <?= $form->field($model, 'education_level')->dropdownList($model->getItemEducation(),['prompt'=>'เลือกการศึกษา..']) ?>
    <div class="row">
      <div class="col-md-4">
          <?= $form->field($model, 'sex')->radioList($model->getItemSex()) ?>
      </div>
      <div class="col-md-4">
        <?= $form->field($model, 'marital_status')->radioList($model->getItemMarital()) ?>
      </div>
      <div class="col-md-4">
        <?= $form->field($model, 'skill')->checkBoxList($model->getItemSkill()) ?>
      </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' =>  $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
