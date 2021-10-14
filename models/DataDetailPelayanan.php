<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "data_detail_pelayanan".
 *
 * @property int $id
 * @property int $id_data_pelayanan
 * @property int $id_ref_group_user
 * @property string $nama
 * @property string $inisial
 * @property string $call_center
 * @property string $status
 */
class DataDetailPelayanan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data_detail_pelayanan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_data_pelayanan', 'id_ref_group_user'], 'integer'],
            [['status'], 'string'],
            [['nama', 'inisial', 'call_center'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_data_pelayanan' => 'Id Data Pelayanan',
            'id_ref_group_user' => 'Id Ref Group User',
            'nama' => 'Nama',
            'inisial' => 'Inisial',
            'call_center' => 'Call Center',
            'status' => 'Status',
        ];
    }
}
