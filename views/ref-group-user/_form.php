<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RefGroupUser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ref-group-user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nm_group_user')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ket')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'path_img')->label(false)->hiddenInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'icon_map')->label(false)->hiddenInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jam_tgl')->label(false)->hiddenInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
