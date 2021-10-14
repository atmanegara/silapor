<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "data_perlengkapan".
 *
 * @property int $id
 * @property int $id_detail_pelayanan sama dengan id_sub_unit
 * @property string $no_seri
 * @property string $nm_alat
 * @property string $kapasitas
 * @property string $tgl_beli
 * @property int $masa_kadaluarsa
 * @property string $satuan_masa
 * @property string $tgl_akhir
 * @property string $ket
 */
class DataPerlengkapan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data_perlengkapan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
           [['no_seri','kapasitas'],'required'],
            [['id_detail_pelayanan', 'masa_kadaluarsa'], 'integer'],
            [['kapasitas', 'ket'], 'string'],
            [['tgl_beli', 'tgl_akhir'], 'safe'],
            [['no_seri', 'nm_alat', 'satuan_masa'], 'string', 'max' => 50],
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
            'no_seri' => 'No Seri',
            'nm_alat' => 'Nm Alat',
            'kapasitas' => 'Kapasitas',
            'tgl_beli' => 'Tgl Beli',
            'masa_kadaluarsa' => 'Masa Kadaluarsa',
            'satuan_masa' => 'Statuan Masa',
            'tgl_akhir' => 'Tgl Akhir',
            'ket' => 'Ket',
        ];
    }
}
