<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DataInformasiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Informasis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-informasi-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Data Informasi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

     //       'id',
      //      'id_jenis_file',
            'title',
            [
                'header'=>'Image',
                'format'=>'raw',
                'value'=>function($data){
        return Html::img("data:image/jpeg;base64,".$data['file_image'],['width'=>'70','height'=>'70']);
                }
            ],
            'keterangan:ntext',
            'aktif',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
