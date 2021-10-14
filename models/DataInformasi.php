<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "data_informasi".
 *
 * @property int $id
 * @property int $id_jenis_file
 * @property string $file_image
 * @property string $keterangan
 * @property string $aktif
 */
class DataInformasi extends \yii\db\ActiveRecord
{
    public $fileimage;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data_informasi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fileimage'],'file','skipOnEmpty'=>false],
            [['id_jenis_file'], 'integer'],
            [['file_image', 'keterangan', 'aktif','title'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_jenis_file' => 'Id Jenis File',
            'file_image' => 'File Image',
            'keterangan' => 'Keterangan',
            'aktif' => 'Aktif',
        ];
    }
}
