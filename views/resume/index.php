<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Resume;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ResumeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Resumes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resume-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Resume'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            // 'id',
            // 'title',
            // 'firstname',
            // 'lastname',
            // 'education_level',
            // 'marital_status',
            // 'sex',
            // 'skill',
            'fullName',
            [
              'attribute'=>'education_level',
              'filter'=>Resume::itemsAlias('education'),
              'value'=>function($model){
                return $model->educationName;
              }
            ],
            [
              'attribute'=>'marital_status',
              'filter'=>Resume::itemsAlias('marital'),
              'value'=>function($model){
                return $model->maritalName;
              }
            ],
            [
              'attribute'=>'sex',
              'filter'=>Resume::itemsAlias('sex'),
              'value'=>function($model){
                return $model->sexName;
              }
            ],
            [
              'attribute'=>'skill',
              'filter'=>Resume::itemsAlias('sex'),
              'value'=>function($model){
                return $model->skillName;
              }
            ],
            // 'educationName',
            // 'maritalName',
            // 'sexName',
            // 'skillName',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
