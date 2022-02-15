<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_agama".
 *
 * @property int $id_agama
 * @property string $agama
 *
 * @property Mahasiswa[] $mahasiswas
 */
class TblAgama extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_agama';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['agama'], 'required'],
            [['agama'], 'string', 'max' => 25],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_agama' => 'Id Agama',
            'agama' => 'Agama',
        ];
    }

    /**
     * Gets query for [[Mahasiswas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMahasiswas()
    {
        return $this->hasMany(Mahasiswa::className(), ['id_agama' => 'id_agama']);
    }
}
