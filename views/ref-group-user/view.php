<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RefGroupUser */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ref Group Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ref-group-user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<< Kembali', ['index'], ['class' => 'btn btn-default']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
       
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
  //          'id',
            'nm_group_user',
            'ket',
  //          'path_img',
   //         'icon_map',
   //         'jam_tgl',
        ],
    ]) ?>

</div>
