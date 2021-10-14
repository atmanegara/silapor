<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DataDetailPelayananSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="data-detail-pelayanan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_data_pelayanan') ?>

    <?= $form->field($model, 'id_ref_group_user') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'inisial') ?>

    <?php // echo $form->field($model, 'call_center') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
