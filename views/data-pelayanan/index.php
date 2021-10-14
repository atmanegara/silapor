<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DataPelayananSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Unit';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-pelayanan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php
        if(Yii::$app->request->get('id')=='3'){
        echo Html::a('Tambah Sub Bidang', ['create','id'=>Yii::$app->request->get('id')], ['class' => 'btn btn-success']); 
        }
                ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

       //     'id',
      //      'kode_pelayanan',
            'inisial',
            'nama',
            'call_center',
            //'path_img',
            //'link',
            //'aktif',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
