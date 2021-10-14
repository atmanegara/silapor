<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DataDetailPelayanan */

$this->title = 'Form Data Unit';
$this->params['breadcrumbs'][] = ['label' => 'Data Unit', 'url' => ['/data-pelayanan/view','id'=>$model->id_data_pelayanan]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-detail-pelayanan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
