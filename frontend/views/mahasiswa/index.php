<?php



use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

use app\models\Mahasiswa;
/* @var $this yii\web\View */
/* @var $searchModel app\models\MahasiswaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mahasiswa';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mahasiswa-index">

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

            'nim',
            'nama_mhs',
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
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Mahasiswa $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'nim' => $model->nim]);
                }
            ],
        ],
    ]); ?>


</div>
