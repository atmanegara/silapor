<?php
use yii\grid\GridView;
use yii\bootstrap\Html;
use yii\helpers\Url;

?>
<h3>Halaman Daftar User</h3>
<?=
GridView::widget([
    'dataProvider'=>$dataProvider,
        'filterModel' => $searchModel,
    
    'columns'=>[
        [
          'class'=> 'yii\grid\SerialColumn'  
        ],
        [
            'header'=>'Unit',
            'attribute'=>'id_sub_unit',
            'value'=>function($data){
                $model = \app\models\DataDetailPelayanan::findOne($data['id_sub_unit']);
                return $model['nama'];
            }
        ],
                'no_induk:text:No Induk',
        'username',
      //  'password_hash',
        [
            'class'=> 'yii\grid\ActionColumn',
            'template'=>'{resetpwd} {hapusakun}',
            'buttons'=>[
                'resetpwd'=>function($url,$data,$key){
            $url = Url::to(['reset-password','id'=>$key]);
                        $html = Html::a('Reset',$url,['class'=>"btn btn-warning",'data'=>[
                            'confirm'=>'Anda Yakin Akun ini passwordnya di reset ke default : 123456789 ?',
                            'method'=>'post'
                        ]]);
                        return $html;
                },
                        'hapusakun'=>function($url,$data,$key){
            $url = Url::to(['hapus-akun','id'=>$key]);
                        $html = Html::a('Hapus Akun',$url,['class'=>"btn btn-danger",'data'=>[
                            'confirm'=>'Anda Yakin Akun ini dihapus?',
                            'method'=>'post'
                        ]]);
                        return $html;
                }
            ]
        ]
    ]
])
?>