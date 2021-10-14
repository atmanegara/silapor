<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RefGroupUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ref Group Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-group-user-index">

    <h1>Daftar Group Unit</h1>

    <p>
        <?php // Html::a('Create Ref Group User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

 //           'id',
            'nm_group_user',
            'ket',
     //       'path_img',
     //       'icon_map',
            //'jam_tgl',

            ['class' => 'yii\grid\ActionColumn','template'=>'{view} {update}'],
        ],
    ]); ?>


</div>
