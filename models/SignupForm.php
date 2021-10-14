<?php
namespace app\models;

use yii\base\Model;
use app\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $id_group_user;
    public $id_sub_unit;
    public $no_induk;
 
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required','message'=>'Username Wajib di isi'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Username sudah ada'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Email sudah ada'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            
              
                ['id_group_user', 'required'],
              
                ['id_sub_unit', 'required'],
//                ['nama','required'],
//                ['jabatan','required']
           
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
           return null;
        }
        
        $user = new User();
  
        $user->no_induk = $this->no_induk;
        $user->username = $this->username;
        $user->email = $this->email;
        $user->id_group_user = $this->id_group_user;
        $user->id_sub_unit = $this->id_sub_unit;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save(false) ? $user : null;
    }
}
