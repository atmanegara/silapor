<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\SignupForm;
use app\models\ContactForm;
use app\models\User;
use app\models\UserSearch;


class SiteController extends Controller
{
   
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    
   
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post())) {
            $cekhakuser = User::findByUsername($model->username);
            if($cekhakuser['id_hak_user']==1){
           if($model->login()){
            return $this->goBack();
           }else{
               return $this->render('login', [
            'model' => $model,
        ]); 
           }
            }else{
                Yii::$app->session->setFlash('danger','Pian kadada hak akses web ini, amun marasa berhak, hubungi tukangnya minta tolong tu');
               return $this->render('login', [
            'model' => $model,
        ]); 
            }
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    
    public function actionDaftarUser(){
  $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('daftar-user',[
            'dataProvider'=>$dataProvider,
            'searchModel'=>$searchModel
        ]);
    }
    
    public function actionResetPassword($id){
        $user = User::find()->where(['id'=>$id])->one();
    $user->setPassword('123456789');
        $user->generateAuthKey();
        if($user->save()){
            Yii::$app->session->setFlash('success','password berhasil di reset ke 123456789');
        return $this->redirect(Yii::$app->request->referrer);
            
        }
    }
     public function actionHapusAkun($id){
        $user = User::find()->where(['id'=>$id])->one()->delete();
   
            Yii::$app->session->setFlash('success','akun sudah dihapus');
        return $this->redirect(Yii::$app->request->referrer);
            
        
    }
}
