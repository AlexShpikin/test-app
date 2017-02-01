<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PersonsModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="persons-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'patronymic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sername')->textInput(['maxlength' => true]) ?>
    
    <?php

        $select = ''; 
        
        if(!is_null($model->boss_id) && $model->boss_id !=''){
            $select = $model->boss_id;
        }

    	$bossList = '<label class="control-label" for="personsmodel-boss_id">Начальник</label><div class="form-group"><select class="form-control" name="PersonsModel[boss_id]"><option value=""></option>';

    	foreach ($personsList as $item) {
            $selected  = ($item->boss_id == $select && $select != '') ? 'selected="selected"' : '';
    	 	$bossList .='<option value="'.$item->id.'" '.$selected.'>'.$item->name.' '.$item->patronymic.' '.$item->sername.'</option>';
    	}

    	$bossList .= '</select></div>'; 
    	echo $bossList;
    ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
