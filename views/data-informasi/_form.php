<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
/* @var $this yii\web\View */
/* @var $model app\models\DataInformasi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="data-informasi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_jenis_file')->label(false)->hiddenInput() ?>

    <?= $form->field($model, 'title')->textInput() ?>
    <?= $form->field($model, 'fileimage')->widget(FileInput::class,[
        'options' => ['accept' => 'image/*'],
     'pluginOptions' => [
        'showPreview' => true,
        'showCaption' => true,
        'showRemove' => true,
        'showUpload' => false]
    ]) ?>
<?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'aktif')->dropDownList([ 'Y' => 'Aktif', 'N' => 'Tidak Aktif', ], ['prompt' => 'Pilih Status..']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
