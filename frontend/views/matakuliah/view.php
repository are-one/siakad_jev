<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Matakuliah */

$this->title = $model->kode_mk;
$this->params['breadcrumbs'][] = ['label' => 'Mata kuliah', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="matakuliah-view">

    <p>
        <?= Html::a('Update', ['update', 'kode_mk' => $model->kode_mk], ['class' => 'btn btn-info']) ?>
        <?= Html::a('Delete', ['delete', 'kode_mk' => $model->kode_mk], [
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
            'kode_mk',
            'mata_kuliah',
            'semester',
            'sks',
            'jenis_mk',
        ],
    ]) ?>

</div>
