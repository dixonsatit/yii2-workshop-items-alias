<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Resume */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Resumes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resume-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php
    $items = [
      'id'=>'1',
      'title'=>'นาย',
      'firstname'=>'สาธิต',
      'lastname'=>'สีถาพล'
    ];
    echo DetailView::widget([
        'model' => $items,
        'attributes' => [
          'id',
          'title',
          'firstname',
          'lastname',
        ],
    ]);
    ?>
    <?= DetailView::widget([
        'model' => $model,
        //'template'=>'<tr><th>{label}</th><td><i class="glyphicon glyphicon-info-sign"></i></i> {value}</td></tr>',
        'attributes' => [
          [
                'format'=>'html',
                'label' => 'color',
                'value' => '<span style="color:green;">'.$model->educationName.'</span>'
            ],
            'fullName',
            'educationName',
            'maritalName',
            'sexName',
            'skillName'
        ],
    ]) ?>

</div>
