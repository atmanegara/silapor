<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RefGroupUserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ref-group-user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nm_group_user') ?>

    <?= $form->field($model, 'ket') ?>

    <?= $form->field($model, 'path_img') ?>

    <?= $form->field($model, 'icon_map') ?>

    <?php // echo $form->field($model, 'jam_tgl') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
