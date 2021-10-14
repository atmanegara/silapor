<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DataDetailPelayananSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Detail Pelayanans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-detail-pelayanan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Data Detail Pelayanan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_data_pelayanan',
            'id_ref_group_user',
            'nama',
            'inisial',
            //'call_center',
            //'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
