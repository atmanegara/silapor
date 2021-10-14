<?php

namespace app\modules\restapi\controllers;


use Yii;
use yii\filters\AccessControl;
use yii\rest\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\SignupForm;
use app\models\ContactForm;

/**
 * Default controller for the `restapi` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
     public function actionLogin(){
        $username = Yii::$app->request->post('username');
        $password =Yii::$app->request->post('password');
        
        if(Yii::$app->request->post()){
    //        return 'ada';
             $model = new LoginForm();
             $model->username=$username;
             $model->password=$password;
              if($model->login()){
                  $query = (new \yii\db\Query())
                          ->select('nama')
                          ->from('data_detail_pelayanan')
                          ->where([
                              'id'=>Yii::$app->user->identity->id_sub_unit
                          ])->one();
                  $nama_sub_unit = $query['nama'];
                  
                  $imgpath = (new \yii\db\Query())
                          ->select('path_img')
                          ->from('ref_group_user')->where(['id'=>Yii::$app->user->identity->id_group_user])->one();
                  $img_path = $imgpath['path_img'];
                  return [
                      'code'=>'200',
                      'message'=>'Login Sukses',
                      'username'=>Yii::$app->user->identity->username,
                      'id_group_user'=>Yii::$app->user->identity->id_group_user,
                      'id_sub_unit'=>Yii::$app->user->identity->id_sub_unit,
                      'nama_sub_unit'=>$nama_sub_unit,
                      'id'=>Yii::$app->user->identity->id,
                      'email'=>Yii::$app->user->identity->email,
                      'lokasi_img'=> $img_path
                  ];
              }else{
                  return [
                      'code'=>'500',
                      'message'=>$model->getErrors()
                  ];
              }
        }
        return [
            'code'=>'404',
            'message'=>'hahaha hapuk'
        ];
    }
    
        public function actionSignup() {
        $no_induk = Yii::$app->request->post('no_induk');
        $username = Yii::$app->request->post('username');
        $nama_lengkap = Yii::$app->request->post('nama_lengkap');
        $alamat = Yii::$app->request->post('alamat');
        $jkel = Yii::$app->request->post('jkel');
        $nope = Yii::$app->request->post('nope');
        $unit = Yii::$app->request->post('unit');
        $subunit = Yii::$app->request->post('subunit');
        $jabatan = Yii::$app->request->post('jabatan');
        $email = Yii::$app->request->post('email');
        $password = Yii::$app->request->post('password');

        $model = new SignupForm();
    $model->no_induk = $no_induk;
    $model->username = $username;
    $model->email = $email;
    $model->id_sub_unit = $subunit;
    $model->id_group_user = $unit;
    $model->password = $password;
        if (Yii::$app->request->post()) {
            if ($user = $model->signup()) {
                $id= $user->getPrimaryKey();
                $modeldataadmin = new \app\models\DataAdmin();
                $modeldataadmin->id_user = $id;
                $modeldataadmin->no_induk = $no_induk;
                $modeldataadmin->nama = $nama_lengkap;
                $modeldataadmin->alamat=$alamat;
                $modeldataadmin->jkel=$jkel;
                $modeldataadmin->nope=$nope;
                $modeldataadmin->unit=$unit;
                $modeldataadmin->subunit=$subunit;
                $modeldataadmin->jabatan = $jabatan;
                if($modeldataadmin->save()){
                     $msg = [
                    'code'=>'200',
                    'message'=>'Berhasil mendaftar, silahkan login..'
                ];
                }else{
//                $sql = "insert into data_admin(id_user,nama,alamat,jkel,nope,unit,subunit,jabatan)value"
//                        . "(:id_user,:nama,:alamat,:jkel,:nope,:unit,:subunit,:jabatan)";
//                $params=[
//                    ':id_user'=>$id,
//                    ':nama'=>$nama_lengkap,
//                    ':alamat'=>$alamat,
//                    ':jkel'=>$jkel,
//                    ':nope'=>$nope,
//                    ':unit'=>$unit,
//                    ':subunit'=>$subunit,
//                    ':jabatan'=>$jabatan
//                ];
//                Yii::$app->db->createCommand($sql, $params)->execute();
                $msg = [
                    'code'=>'500',
                    'message'=>$modeldataadmin->getErrors()
                ];
                }
            }else{
              $msg = [
                    'code'=>'404',
                    'message'=>$model->getErrors()
                ];  
            }
        }else{
             $msg = [
                    'code'=>'404',
                    'message'=>'Aduuhhh, ga bisa daftar nih, cek lagi isian datanya'
                ];
        }

        return $msg;
    }
    public function actionProfildiri(){
        $id = Yii::$app->request->get('id');
        
        $model = (new \yii\db\Query())
                ->select('a.no_induk,a.id,a.nama,a.alamat,a.jkel,c.nm_jkel,a.nope,b.username,b.password_hash ')
                ->from('data_admin a')->innerJoin('user b','a.id_user=b.id')
                ->innerJoin('ref_jkel c','a.jkel=c.id')
                ->where(['b.id'=>$id])->one();
        return $model;
        
    }
    
    public function actionUpdateProfil(){
      $id = Yii::$app->request->post('id');
      $nama = Yii::$app->request->post('nama');
      $alamat = Yii::$app->request->post('alamat');
      $jkel = Yii::$app->request->post('jkel');
      $nope = Yii::$app->request->post('nope');
      $no_induk = Yii::$app->request->post('no_induk');
        $model = \app\models\DataAdmin::findOne($id);
        $model->nama = $nama;
        $model->alamat= $alamat;
        $model->jkel = $jkel;
        $model->nope = $nope;
        $model->no_induk = $no_induk;
        if($model->save()){
            $msg = [
                'message'=>'Berhasil diganti'
            ];
        }else{
            $msg = [
                'message'=>'gagal diganti'
            ];
        }
        return $msg;
                  
    }
    
    public function actionUpdateAkun(){
        
      $id = Yii::$app->request->post('id');
      $username = Yii::$app->request->post('username');
      $password = Yii::$app->request->post('password');
          $model = \app\models\User::findOne($id);
  
        $model->username = $username;
        
        $model->setPassword($password);
        $model->generateAuthKey();
  if($model->save(false)){
            $msg = [
                'message'=>'Berhasil diganti'
            ];
        }else{
            $msg = [
                'message'=>'gagal diganti'
            ];
        }
        return $msg;
        
    }
    
}
