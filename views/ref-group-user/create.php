<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RefGroupUser */

$this->title = 'Form Group Unit';
$this->params['breadcrumbs'][] = ['label' => 'Ref Group Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-group-user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
