<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_jk".
 *
 * @property int $id_jk
 * @property string $jenis_kelamin
 *
 * @property Mahasiswa[] $mahasiswas
 */
class TblJk extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_jk';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jenis_kelamin'], 'required'],
            [['jenis_kelamin'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_jk' => 'Id Jk',
            'jenis_kelamin' => 'Jenis Kelamin',
        ];
    }

    /**
     * Gets query for [[Mahasiswas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMahasiswas()
    {
        return $this->hasMany(Mahasiswa::className(), ['id_jk' => 'id_jk']);
    }
}
