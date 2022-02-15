<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Matakuliah */

$this->title = 'Input Mata kuliah';
$this->params['breadcrumbs'][] = ['label' => 'Mata kuliah', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="matakuliah-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
