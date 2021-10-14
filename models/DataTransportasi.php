<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "data_transportasi".
 *
 * @property int $id
 * @property int $id_detail_pelayanan
 * @property string $jns_kendaraan
 * @property int $qty
 * @property string $tgl_beli
 */
class DataTransportasi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data_transportasi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no_seri'], 'required','message'=>'No Seri Wajib di isi'],
            [['qty'], 'required','message'=>'Jumlah Wajib di isi'],
            [['id', 'id_detail_pelayanan'], 'integer'],
            [['tgl_beli'], 'safe'],
            [['jns_kendaraan','qty'], 'string', 'max' => 50],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_detail_pelayanan' => 'Id Detail Pelayanan',
            'jns_kendaraan' => 'Jns Kendaraan',
            'qty' => 'Qty',
            'tgl_beli' => 'Tgl Beli',
        ];
    }
}
