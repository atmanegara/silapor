<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\modules\restapi\controllers;

use Yii;
use yii\rest\Controller;
use app\models\RefGroupUser;
/**
 * Description of RefController
 *
 * @author Administrator
 */
class RefController extends Controller{
    //put your code here
    
    
    public function actionRefGroupUser(){
        
       $sql = "select * from ref_group_user";
       $data = Yii::$app->db->createCommand($sql)->queryAll();
        return $data;
        
    }
    
    public function actionGetSubUnit(){
        $id = Yii::$app->request->get('id');
        $sql = "select * from data_detail_pelayanan a where a.id_ref_group_user=:id_ref_group_user";
        $params=[
            ':id_ref_group_user'=>$id
        ];
        $data = Yii::$app->db->createCommand($sql, $params)->queryAll();
        return $data;
                
    }
    
    public function actionJenisAduan(){
        
        $sql = "select * from ref_jenis_aduan where status='Y'";
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        return $data;
        
    }
    
    public function actionTentangApp()
    {
        $sql = "select * from ref_tentang";
        $data = Yii::$app->db->createCommand($sql)->queryOne();
        return $data['tentang'];
    }
    
    //dataanggota
    
    public function actionGetAnggotaBySubunit(){
        $id_sub_unit  = Yii::$app->request->post('id_sub_unit');
        $sql = "SELECT * FROM data_admin a WHERE a.subunit=:id_sub_unit";
        $params=[
            ':id_sub_unit'=>$id_sub_unit
        ];
        $data = Yii::$app->db->createCommand($sql, $params)->queryAll();
        return $data;
    }
    //perlengkapan
     public function actionGetPerlengkapanBySubunit(){
        $id_sub_unit  = Yii::$app->request->post('id_sub_unit');
        $sql = "SELECT * FROM data_perlengkapan a WHERE a.id_detail_pelayanan=:id_sub_unit";
        $params=[
            ':id_sub_unit'=>$id_sub_unit
        ];
        $data = Yii::$app->db->createCommand($sql, $params)->queryAll();
        return $data;
    }
    
    public function actionSimpanPerlengkapan(){
     $id_detail_pelayanan = Yii::$app->request->post('id_detail_pelayanan');
     $no_seri = Yii::$app->request->post('no_seri');
     $nm_alat = Yii::$app->request->post('nm_alat');
     $kapasitas = Yii::$app->request->post('kapasitas');
     $tgl_beli = Yii::$app->request->post('tgl_beli');
     $masa_kadaluarsa = Yii::$app->request->post('masa_kadaluarsa');
     $satuan_masa = Yii::$app->request->post('satuan_masa');
     $tgl_akhir =$tgl_beli; //Yii::$app->request->post('tgl_akhir');
     $ket = Yii::$app->request->post('ket');
        $ceknoseri = \app\models\DataPerlengkapan::find()->where(['no_seri'=>$no_seri])->exists();
        if(!$ceknoseri){
        $model = new \app\models\DataPerlengkapan();
        $model->id_detail_pelayanan = $id_detail_pelayanan;
        $model->no_seri = $no_seri;
        $model->nm_alat = $nm_alat;
        $model->kapasitas = $kapasitas;
        $model->tgl_beli = $tgl_beli;
        $model->masa_kadaluarsa = $masa_kadaluarsa;
        $model->satuan_masa = $satuan_masa;
        $model->tgl_akhir = $tgl_akhir;
        $model->ket = $ket;
        if($model->save()){
            $msg = [
                'message'=>'Data Sukses di Simpan'
            ];
        }else{
            $msg = [
                'message'=>'Gagal : '. $model->getErrors()
            ];
        }
        }else{
               $msg = [
                'message'=>' Data sudah ada dengan No Seri : '.$no_seri
            ];
        }
        return $msg;
    }
    public function actionUpdatePerlengkapan(){
     $id_detail_pelayanan = Yii::$app->request->post('id_detail_pelayanan');
     $no_seri = Yii::$app->request->post('no_seri');
     $nm_alat = Yii::$app->request->post('nm_alat');
     $kapasitas = Yii::$app->request->post('kapasitas');
     $tgl_beli = Yii::$app->request->post('tgl_beli');
     $masa_kadaluarsa = Yii::$app->request->post('masa_kadaluarsa');
     $satuan_masa = Yii::$app->request->post('satuan_masa');
     $tgl_akhir =$tgl_beli; //Yii::$app->request->post('tgl_akhir');
     $ket = Yii::$app->request->post('ket');
        $ceknoseri = \app\models\DataPerlengkapan::find()->where(['no_seri'=>$no_seri]);
        if($ceknoseri->exists()){
        $model = $ceknoseri->one();
        $model->id_detail_pelayanan = $id_detail_pelayanan;
        $model->no_seri = $no_seri;
        $model->nm_alat = $nm_alat;
        $model->kapasitas = $kapasitas;
        $model->tgl_beli = $tgl_beli;
        $model->masa_kadaluarsa = $masa_kadaluarsa;
        $model->satuan_masa = $satuan_masa;
        $model->tgl_akhir = $tgl_akhir;
        $model->ket = $ket;
        if($model->save()){
            $msg = [
                'message'=>'Data Sukses di Simpan'
            ];
        }else{
            $msg = [
                'message'=>'Gagal : '. $model->getErrors()
            ];
        }
        }else{
               $msg = [
                'message'=>'Data ga ditemukan dengan No Seri : '.$no_seri .' Cek lagi deh om'
            ];
        }
        return $msg;
    }
      public function actionHapusPerlengkapan(){
     $id = Yii::$app->request->post('id');
    
        $ceknoseri = \app\models\DataPerlengkapan::find()->where(['id'=>$id])->one()->delete();
        
        if($ceknoseri){
            $msg = [
                'message'=>'Data sudah dihapus'
            ];
        }else{
            $msg = [
                'message'=>'Gagal dihapus'
            ];
        }
       
        return $msg;
    }
}
