<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ref_group_user".
 *
 * @property int $id
 * @property string $nm_group_user
 * @property string $ket
 * @property string $path_img
 * @property string $icon_map
 * @property string $jam_tgl
 */
class RefGroupUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_group_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jam_tgl'], 'safe'],
            [['nm_group_user', 'ket', 'path_img', 'icon_map'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nm_group_user' => 'Nm Group User',
            'ket' => 'Ket',
            'path_img' => 'Path Img',
            'icon_map' => 'Icon Map',
            'jam_tgl' => 'Jam Tgl',
        ];
    }
}
