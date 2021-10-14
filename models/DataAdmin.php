<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "data_admin".
 *
 * @property int $id
 * @property int $id_user
 * @property string $nama
 * @property string $alamat
 * @property int $jkel
 * @property string $nope
 * @property int $unit
 * @property int $subunit
 * @property int $jabatan
 */
class DataAdmin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data_admin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'jkel', 'unit', 'subunit', 'jabatan','alamat','nama', 'nope'], 'required','message'=>'Tidak Boleh Kosong'],
            [['id_user', 'jkel', 'unit', 'subunit', 'jabatan'], 'integer'],
            [['alamat'], 'string'],
            [['nama', 'nope'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'nama' => 'Nama',
            'alamat' => 'Alamat',
            'jkel' => 'Jkel',
            'nope' => 'Nope',
            'unit' => 'Unit',
            'subunit' => 'Subunit',
            'jabatan' => 'Jabatan',
        ];
    }
}
