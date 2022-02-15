<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

use frontend\models\Dosen;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\DosenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Dosen';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dosen-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Dosen', ['create'], ['class' => 'btn btn-info']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nip',
            'nama_dosen',
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
                'label' => 'Agama',
                'value' => function($model)
                {
                    return $model->agama->agama;
                }
            ],
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

            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Dosen $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'nip' => $model->nip]);
                },
            ],
        ],
    ]); ?>


</div>
