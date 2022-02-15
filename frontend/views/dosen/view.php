<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Dosen */

$this->title = $model->nip;
$this->params['breadcrumbs'][] = ['label' => 'Dosen', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="dosen-view">

    <p>
        <?= Html::a('Update', ['update', 'nip' => $model->nip], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'nip' => $model->nip], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Hapus data ini ?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nip',
            'nama_dosen',
            'no_telp',
            'alamat:ntext',
            [
                'attribute' => 'foto',
                'label' => 'Foto',
                'value' => function($model)
                {
                    $img = Html::img(['dosen/gambar','foto'=>$model->foto],[
                        'width' => '70px'
                    ]);
                    return $img;
                },
                'format' => 'raw'
            ],
        ],
    ]) ?>

</div>
