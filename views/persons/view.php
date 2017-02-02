<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\PersonsModel;
/* @var $this yii\web\View */
/* @var $model app\models\PersonsModel */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Persons Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$boss = PersonsModel::find()->where(['id'=>$model->boss_id])->one();

?>
<div class="persons-model-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'sername',
            'patronymic',
            [
                'attribute'=>'boss_id',
                'value'=> PersonsModel::getFullName($model->boss_id)
            ],
        ],
    ]) ?>
    
</div>
