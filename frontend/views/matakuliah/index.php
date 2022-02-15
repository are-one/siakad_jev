<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use frontend\models\Matakuliah;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\MatakuliahSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mata kuliah';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="matakuliah-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Data', ['create'], ['class' => 'btn btn-info']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'kode_mk',
            'mata_kuliah',
            'semester',
            'sks',
            'jenis_mk',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Matakuliah $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'kode_mk' => $model->kode_mk]);
                }
            ],
        ],
    ]); ?>


</div>
