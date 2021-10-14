<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DataInformasi */

$this->title = 'Create Data Informasi';
$this->params['breadcrumbs'][] = ['label' => 'Data Informasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-informasi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
