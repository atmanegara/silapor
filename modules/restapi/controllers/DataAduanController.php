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
class DataAduanController extends Controller {

    //put your code here


    public function actionById() {
        $id_group_user = Yii::$app->request->post('id');
        $sql = "select a.*,c.jenis_aduan from data_aduan a inner join detail_jenis_aduan b 
ON a.id_ref_jenis_aduan=b.id_ref_jenis_aduan 
INNER JOIN ref_jenis_aduan c ON b.id_ref_jenis_aduan=c.id
where b.id_ref_group_user=:id_ref_group_user "
                . "order by a.jam_tgl asc";
        $params = [
            ':id_ref_group_user' => $id_group_user
        ];


        $query = Yii::$app->db->createCommand($sql, $params)->queryAll();

        return $query;
    }

    public function actionDataDarurat() {

        $id_group_user = Yii::$app->request->post('id_group_user');
        $sql = "SELECT a.*,b.icon_map from data_aduan_darurat a 
INNER JOIN ref_group_user b ON a.id_group_user=b.id
WHERE a.id_group_user=:id_group_user AND a.status=0 order by id asc";
        $params = [
            ':id_group_user' => $id_group_user
        ];
        $data = Yii::$app->db->createCommand($sql, $params)->queryAll();

        return $data;
    }

    public function actionDataDaruratold() {

        $id_group_user = Yii::$app->request->post('id_group_user');
        $sql = "SELECT a.*,b.icon_map from data_aduan_darurat a 
INNER JOIN ref_group_user b ON a.id_group_user=b.id
WHERE a.id_group_user=:id_group_user AND a.status=0";
        $params = [
            ':id_group_user' => $id_group_user
        ];
        $data = Yii::$app->db->createCommand($sql, $params)->queryAll();
        $lokasi = [];
        foreach ($data as $value) {
            $lokasi[] = [
                'position' => [
                    'lng' => $value['lokasi_kejadian_lat'],
                    'lat' => $value['lokasi_kejadian_long']
                ],
                'title' => $value['rincian_aduan'],
                'snippet' => (string) $value['lokasi_kejadian_lat'] . ',' . (string) $value['lokasi_kejadian_long']
            ];
        }
        return $lokasi;
    }

    public function actionAktifitas() {
        $id = Yii::$app->request->post('id');
        $status = Yii::$app->request->post('status');

        $sql = "update data_aduan_darurat set status=:status where id=:id";
        $params = [
            ':id' => $id,
            ':status' => $status
        ];

        Yii::$app->db->createCommand($sql, $params)->execute();
        return [
            'code' => '200',
            'message' => 'Berhasil..'
        ];
    }

    public function actionAktifitasold() {
        $id_group_user = Yii::$app->request->post('id_group_user');
        $status = Yii::$app->request->post('status');

        $sql = "update data_aduan_darurat set status=:status where id_group_user=:id_group_user";
        $params = [
            ':id_group_user' => $id_group_user,
            ':status' => $status
        ];

        Yii::$app->db->createCommand($sql, $params)->execute();
        return [
            'code' => '200',
            'message' => 'Berhasil..'
        ];
    }

    public function actionKirimAduan() {

        $nope_pengguna = Yii::$app->request->post('nope_pengguna');
        $lokasi_pengguna_lat = Yii::$app->request->post('lokasi_pengguna_lat');
        $lokasi_pengguna_lng = Yii::$app->request->post('lokasi_pengguna_lng');
        $lokasi_kejadian_lat = Yii::$app->request->post('lokasi_kejadian_lat');
        $lokasi_kejadian_long = Yii::$app->request->post('lokasi_kejadian_long');
        $path_foto = Yii::$app->request->post('path_foto');
        $rincian_aduan = Yii::$app->request->post('rincian_aduan');
        $id_ref_jenis_aduan = Yii::$app->request->post('id_ref_jenis_aduan');
        $sifataduan = Yii::$app->request->post('sifataduan');

 $msg = [
                        'code' => '405',
                        'message' => 'Gagal di simpan'
                    ];
        if (Yii::$app->request->post()) {
            if ($sifataduan=='true') {
                foreach ($id_ref_jenis_aduan as $valuejenis) {
                    
                    $query = (new \yii\db\Query())
                            ->select('id_ref_group_user')
                            ->from('detail_jenis_aduan')->where(['id_ref_jenis_aduan'=>$valuejenis])->one();
               $id_group_user = $query['id_ref_group_user'];
                $sql = "insert into data_aduan_darurat(nope_pelapor,id_group_user,lokasi_pengguna_lat,lokasi_pengguna_lng,lokasi_kejadian_lat,lokasi_kejadian_long,rincian_aduan,status)"
                        . "value(:nope_pengguna,:id_group_user,:lokasi_pengguna_lat,:lokasi_pengguna_lng,:lokasi_kejadian_lat,:lokasi_kejadian_long,:rincian_aduan,0)";
                $params = [
                    ':nope_pengguna' => $nope_pengguna,
                    ':id_group_user' => $id_group_user,
                    ':lokasi_kejadian_lat' => $lokasi_kejadian_lat,
                    ':lokasi_kejadian_long' => $lokasi_kejadian_long,
                    ':lokasi_pengguna_lat' => $lokasi_pengguna_lat,
                    ':lokasi_pengguna_lng' => $lokasi_pengguna_lng,
                    ':rincian_aduan' => $rincian_aduan,
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
                        'code' => '200',
                        'message' => 'Data berhasil di simpan'
                    ];
                } catch (Exception $ex) {
                    $msg = [
                        'code' => '405',
                        'message' => 'Gagal di simpan'
                    ];
                }
             }
        } else {
               foreach ($id_ref_jenis_aduan as $valuejenis) {
            $sql = "insert into data_aduan(nope_pengguna,foto,lokasi_pengguna_lat,lokasi_pengguna_lng,lokasi_kejadian_lat,lokasi_kejadian_long,rincian_aduan,id_ref_jenis_aduan)"
                    . "value(:nope_pengguna,:foto,:lokasi_pengguna_lat,:lokasi_pengguna_lng,:lokasi_kejadian_lat,:lokasi_kejadian_long,:rincian_aduan,:id_ref_jenis_aduan)";
            $params = [
                ':nope_pengguna' => $nope_pengguna,
                ':lokasi_pengguna_lat' => $lokasi_pengguna_lat,
                ':lokasi_pengguna_lng' => $lokasi_pengguna_lng,
                ':lokasi_kejadian_lat' => $lokasi_kejadian_lat,
                ':lokasi_kejadian_long' => $lokasi_kejadian_long,
                ':foto' => $path_foto,
                ':rincian_aduan' => $rincian_aduan,
                ':id_ref_jenis_aduan' => $valuejenis
            ];
      ///      return $params;
            try {
                Yii::$app->db->createCommand($sql, $params)->execute();
                $msg = [
                    'code' => '200',
                    'message' => 'Data berhasil di simpan'
                ];
            } catch (Exception $ex) {
                $msg = [
                    'code' => '405',
                    'message' => 'Gagal di simpan'
                ];
            }
        
        }
        }
        }

        return $msg;
    }
public function actionListAduanByNope(){
    $nope = Yii::$app->request->get('nope');
    $sql = "SELECT a.nope_pelapor,a.rincian_aduan,a.jam_tgl,a.lokasi_kejadian_lat,a.lokasi_kejadian_long,aa.path_img FROM data_aduan_darurat a 
INNER JOIN ref_group_user aa ON a.id_group_user=aa.id
WHERE a.nope_pelapor=:nope
UNION ALL
SELECT b.nope_pengguna,b.rincian_aduan,b.jam_tgl,b.lokasi_kejadian_lat,b.lokasi_kejadian_long,cc.path_img FROM data_aduan b 
INNER JOIN ref_jenis_aduan bb ON b.id_ref_jenis_aduan=bb.id
INNER JOIN detail_jenis_aduan c ON bb.id=c.id_ref_jenis_aduan 
INNER JOIN ref_group_user cc ON c.id_ref_group_user=cc.id
WHERE b.nope_pengguna=:nope";
    $params=[
        ':nope'=>$nope
    ];
    $query = Yii::$app->db->createCommand($sql,$params)->queryAll();
    return $query;
}
}
