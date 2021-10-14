<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DataPelayanan */

$this->title = 'Form Update Data Unit: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Data Unit', 'url' => ['/data-pelayanan/index','id'=>$model->kode_pelayanan]];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="data-pelayanan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
