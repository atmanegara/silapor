<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $model app\models\DataPelayanan */

$this->title = false;
$this->params['breadcrumbs'][] = ['label' => 'Data Pelayanans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="data-pelayanan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('< Kembali ', ['index', 'id' => $model->kode_pelayanan], ['class' => 'btn btn-default']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
    //        'id',
    //        'kode_pelayanan',
            'inisial',
            'nama',
    //        'call_center',
    //        'path_img',
    //        'link',
     //       'aktif',
        ],
    ]) ?>
    <p>
        <?= Html::a('Tambah Sub Unit',['/data-detail-pelayanan/create','id'=>$model['id'],'id_group_user'=>$model['id_group_user']],['class'=>'btn btn-warning']) ?>
        <?=
     GridView::widget([
         'dataProvider'=>$dataProvider,
         'columns'=>[
             [
                 'header'=>'No',
                 'class'=> 'yii\grid\SerialColumn'
             ],
             'nama','inisial','call_center',
             [
                 'class'=> 'yii\grid\ActionColumn',
                 'template'=>'{view} {update} {delete}'
             ]
         ]
     ])
        ?>
    </p>
</div>
