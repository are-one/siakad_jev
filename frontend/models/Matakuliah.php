<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "matakuliah".
 *
 * @property string $kode_mk
 * @property string $mata_kuliah
 * @property int $semester
 * @property int $sks
 * @property string $jenis_mk
 */
class Matakuliah extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'matakuliah';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode_mk', 'mata_kuliah', 'semester', 'sks', 'jenis_mk'], 'required', 'message'=> '{attribute} Tidak boleh kosong !!!'],
            [['semester', 'sks'], 'integer'],
            [['kode_mk'], 'string', 'max' => 20],
            [['mata_kuliah'], 'string', 'max' => 100],
            [['jenis_mk'], 'string', 'max' => 15],
            [['kode_mk'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'kode_mk' => 'Kode Mk',
            'mata_kuliah' => 'Mata Kuliah',
            'semester' => 'Semester',
            'sks' => 'Sks',
            'jenis_mk' => 'Jenis Mk',
        ];
    }
}
