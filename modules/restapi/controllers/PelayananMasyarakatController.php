<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\modules\restapi\controllers;

use Yii;
use yii\rest\Controller;
use yii\web\UploadedFile;
/**
 * Description of CallCenterController
 *
 * @author Administrator
 */
class PelayananMasyarakatController extends Controller{
    //put your code here
    
    
    public function actionPelayananMasyarakat(){
        $kode_pelayanan = Yii::$app->request->post('kode_pelayanan');
        $sql ="select * from data_pelayanan where kode_pelayanan=:kode_pelayanan and aktif='Y'";
        $params=[
            ':kode_pelayanan'=>$kode_pelayanan
        ];
        $query = Yii::$app->db->createCommand($sql,$params)->queryAll();
        return $query;
    }
    
    public function actionDetailPelayanan()
    {
        $id_data_pelayanan = Yii::$app->request->post('id_data_pelayanan');
         $sql ="select * from data_detail_pelayanan where id_data_pelayanan=:id_data_pelayanan and status='Y'";
        $params=[
            ':id_data_pelayanan'=>$id_data_pelayanan
        ];
        $query = Yii::$app->db->createCommand($sql,$params)->queryAll();
        return $query;
    }
    
  
       public function actionKirimAduanDarurat(){
        
        $nope_pengguna = Yii::$app->request->post('nope_pengguna');
        $lokasi_kejadian_lat = Yii::$app->request->post('lokasi_kejadian_lat');
        $lokasi_kejadian_long = Yii::$app->request->post('lokasi_kejadian_long');
        $lokasi_pengguna_lat = Yii::$app->request->post('lokasi_pengguna_lat');
        $lokasi_pengguna_lng = Yii::$app->request->post('lokasi_pengguna_lng');
        $rincian_aduan = Yii::$app->request->post('rincian_aduan');
        $id_group_user = Yii::$app->request->post('id_group_user');
        
  //      $foto = UploadedFile::getInstanceByName($foto)
        if (Yii::$app->request->post()){
        $sql = "insert into data_aduan_darurat(nope_pelapor,id_group_user,lokasi_pengguna_lat,lokasi_pengguna_lng,lokasi_kejadian_lat,lokasi_kejadian_long,rincian_aduan,status)"
                . "value(:nope_pengguna,:id_group_user,:lokasi_pengguna_lat,:lokasi_pengguna_lng,:lokasi_kejadian_lat,:lokasi_kejadian_long,:rincian_aduan,0)";
        $params=[
            ':nope_pengguna'=>$nope_pengguna,
            ':id_group_user'=>$id_group_user,
            ':lokasi_kejadian_lat'=>$lokasi_kejadian_lat,
            ':lokasi_kejadian_long'=>$lokasi_kejadian_long,
            ':lokasi_pengguna_lat'=>$lokasi_pengguna_lat,
            ':lokasi_pengguna_lng'=>$lokasi_pengguna_lng,
            ':rincian_aduan'=>$rincian_aduan,
        ];
        try {
          Yii::$app->db->createCommand($sql, $params)->execute(); 
      if($id_group_user==1){
          $sql = "insert into data_aduan_darurat(nope_pelapor,id_group_user,lokasi_pengguna_lat,lokasi_pengguna_lng,lokasi_kejadian_lat,lokasi_kejadian_long,rincian_aduan,status)"
                . "value(:nope_pengguna,:id_group_user,:lokasi_pengguna_lat,:lokasi_pengguna_lng,:lokasi_kejadian_lat,:lokasi_kejadian_long,:rincian_aduan,0)";
        $params=[
            ':nope_pengguna'=>$nope_pengguna,
            ':id_group_user'=>5,
            ':lokasi_kejadian_lat'=>$lokasi_kejadian_lat,
            ':lokasi_kejadian_long'=>$lokasi_kejadian_long,
            ':lokasi_pengguna_lat'=>$lokasi_pengguna_lat,
            ':lokasi_pengguna_lng'=>$lokasi_pengguna_lng,
            ':rincian_aduan'=>$rincian_aduan,
        ];
          Yii::$app->db->createCommand($sql, $params)->execute(); 
      }
          $msg = [
              'code'=>'200',
              'message'=>'Data berhasil di simpan'
          ];
        } catch (Exception $ex) {
            $msg = [
                'code'=>'405',
                'message'=>'Gagal di simpan'
            ];
        }
        }else{
            $msg =[
                'code'=>'404',
                'message'=>'Apa nang di kirim sanak..sasadang kalakuan'
            ];
        }
        return $msg;
    }
    //kotak informasi
    public function actionInformasi(){
        $sql = "select * from data_informasi where aktif='Y'";
        $query = Yii::$app->db->createCommand($sql)->queryAll();
        return $query;
    }
}
