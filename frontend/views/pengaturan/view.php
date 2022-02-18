<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Pengaturan */

$this->title = $model->id_pengaturan;
$this->params['breadcrumbs'][] = ['label' => 'Pengaturan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pengaturan-view">


    <p>
        <?= Html::a('Update', ['update', 'id_pengaturan' => $model->id_pengaturan], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_pengaturan' => $model->id_pengaturan], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_pengaturan',
            'nama_aplikasi',
            [
                'attribute' => 'logo',
                'label' => 'logo',
                'value' => function($model)
                {
                    $img = Html::img(['pengaturan/gambar','logo'=>$model->logo],[
                        'width' => '60px'
                    ]);
                    return $img;
                },
                'format' => 'raw'
            ],
        ],
    ]) ?>

</div>
