<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RefGroupUser */

$this->title = 'Form Group Unit: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ref Group Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ref-group-user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
