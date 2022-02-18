<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "pengaturan".
 *
 * @property int $id_pengaturan
 * @property string $nama_aplikasi
 * @property string $logo
 */
class Pengaturan extends \yii\db\ActiveRecord
{
 public $imageFile;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pengaturan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_aplikasi', 'logo'], 'required'],
            [['nama_aplikasi'], 'string', 'max' => 80],
            [['tentang'], 'string'],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pengaturan' => 'Id Pengaturan',
            'nama_aplikasi' => 'Nama Aplikasi',
            'tentang' => 'Tentang Aplikasi',
            // 'logo' => 'Logo',
            'imageFile' => 'Upload Logo',
        ];
    }

    public function upload($logo)
    {
        if ($this->validate()) {
            $this->imageFile->saveAs('@frontend/assets/images/' . $logo, false);
            return true;
        } else {
            return false;
        }
    }
}
