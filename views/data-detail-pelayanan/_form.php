<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DataDetailPelayanan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="data-detail-pelayanan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_data_pelayanan')->label(false)->hiddenInput() ?>

    <?= $form->field($model, 'id_ref_group_user')->label(false)->hiddenInput() ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inisial')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'call_center')->textInput(['maxlength' => true]) ?>
<small><i>*) Kosongkan jika tidak ada..</i></small>
    
    <?= $form->field($model, 'status')->dropDownList([ 'Y' => 'Aktif', 'N' => 'Tidak Aktif', ], ['prompt' => 'Pilih Status..']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
