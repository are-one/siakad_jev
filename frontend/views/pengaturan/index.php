<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

use frontend\models\Pengaturan;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PengaturanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pengaturan Aplikasi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengaturan-index">

    <h1><?= Html::encode($this->title) ?></h1>

  <!--   <p>
        <?= Html::a('Create Pengaturan', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            'nama_aplikasi',
            'tentang',
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
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Pengaturan $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_pengaturan' => $model->id_pengaturan]);  
                },
                'visibleButtons' => [
                    'delete' => false,
                ],
            ],
        ],
    ]); ?>


</div>
