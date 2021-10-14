<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DataPelayanan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="data-pelayanan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kode_pelayanan')->label(false)->hiddenInput() ?>

    <?= $form->field($model, 'inisial')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'call_center')->textInput(['maxlength' => true]) ?>
<small><i>*) Kosongkan jika tidak ada..</i></small>
    <?= $form->field($model, 'path_img')->label(false)->hiddenInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'link')->label(false)->hiddenInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'aktif')->dropDownList([ 'Y' => 'Aktif', 'N' => 'Tidak Aktif', ], ['prompt' => 'Pilih Status...']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
