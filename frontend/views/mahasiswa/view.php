<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Mahasiswa */

$this->title = $model->nim;
$this->params['breadcrumbs'][] = ['label' => 'Mahasiswa', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="mahasiswa-view">
    <p>
        <?= Html::a('Update', ['update', 'nim' => $model->nim], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'nim' => $model->nim], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'ingin hapus data ini ?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nim',
            'nama_mhs',
            'angkatan',
            [
                'attribute' => 'id_jk',
                'label' => 'Jenis Kelamin',
                'value' => function($model)
                {
                    return $model->jk->jenis_kelamin;
                }
            ],
            [
                'attribute' => 'id_agama',
                'label' => 'agama',
                'value' => function($model)
                {
                    return $model->agama->agama;
                }
            ],
            'alamat:ntext',
            'email:email',
            [
                'attribute' => 'foto',
                'label' => 'Foto',
                'value' => function($model)
                {
                    $img = Html::img(['mahasiswa/gambar','foto'=>$model->foto],[
                        'width' => '70px'
                    ]);
                    return $img;
                },
                'format' => 'raw'
            ],
        ],
    ]) ?>

</div>
