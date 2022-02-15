<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mahasiswa".
 *
 * @property string $nim
 * @property string $nama_mhs
 * @property string $alamat
 * @property string $email
 */
class Mahasiswa extends \yii\db\ActiveRecord
{

 public $imageFile;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mahasiswa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nim', 'nama_mhs', 'angkatan', 'alamat', 'email'], 'required','message'=> '{attribute} wajib di isi !!!'],
            [['alamat'], 'string'],
            [['nim'], 'string', 'max' => 20],
            [['nama_mhs'], 'string', 'max' => 80],
            [['angkatan'], 'integer', 'min' => 4],
            [['email'], 'string', 'max' => 50],
            [['nim'], 'unique'],

            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nim' => 'Nim',
            'nama_mhs' => 'Nama Mahasiswa',
            'angkatan' => 'Angkatan',
            'alamat' => 'Alamat',
            'email' => 'Email',
            'imageFile' => 'Upload Foto',
        ];
    }

    public function upload($foto)
    {
        if ($this->validate()) {
            $this->imageFile->saveAs('@frontend/assets/images/' . $foto, false);
            return true;
        } else {
            return false;
        }
    }
}
