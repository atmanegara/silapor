<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DataPelayanan */

$this->title = 'Form Data Unit';
$this->params['breadcrumbs'][] = ['label' => 'Data Unit', 'url' => ['/data-pelayanan/index','id'=>$model->kode_pelayanan]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-pelayanan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
