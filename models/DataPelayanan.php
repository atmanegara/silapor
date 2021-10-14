<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "data_pelayanan".
 *
 * @property int $id
 * @property int $id_group_user
 * @property int $kode_pelayanan
 * @property string $inisial
 * @property string $nama
 * @property string $call_center
 * @property string $path_img
 * @property string $link
 * @property string $aktif
 */
class DataPelayanan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data_pelayanan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_group_user', 'kode_pelayanan'], 'integer'],
            [['aktif'], 'string'],
            [['inisial', 'nama', 'call_center', 'path_img'], 'string', 'max' => 50],
            [['link'], 'string', 'max' => 160],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_group_user' => 'Id Group User',
            'kode_pelayanan' => 'Kode Pelayanan',
            'inisial' => 'Inisial',
            'nama' => 'Nama',
            'call_center' => 'Call Center',
            'path_img' => 'Path Img',
            'link' => 'Link',
            'aktif' => 'Aktif',
        ];
    }
}
