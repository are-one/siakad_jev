<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "dosen".
 *
 * @property string $nip
 * @property string $nama_dosen
 * @property string $no_telp
 * @property string $alamat
 * @property string $foto
 */
class Dosen extends \yii\db\ActiveRecord
{


  public $imageFile;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dosen';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nip', 'nama_dosen', 'alamat', 'foto'], 'required','message'=>'{attribute} Tidak boleh kosong'],
            [['alamat', 'foto'], 'string'],
            [['nip'], 'string', 'max' => 20],
            [['nama_dosen'], 'string', 'max' => 80],
            [['no_telp'], 'string', 'max' => 12],
            [['nip'], 'unique'],

            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nip' => 'NIP',
            'nama_dosen' => 'Nama Dosen',
            'no_telp' => 'No Telp',
            'alamat' => 'Alamat',
            'foto' => 'Foto',
            'imageFile' => 'Upload Foto Dosen',
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
