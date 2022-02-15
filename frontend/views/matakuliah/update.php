<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Matakuliah */

$this->title = 'Update Matakuliah';
$this->params['breadcrumbs'][] = ['label' => 'Mata kuliah', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kode_mk, 'url' => ['view', 'kode_mk' => $model->kode_mk]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="matakuliah-update">

	<h1><?= Html::encode($this->title) ?></h1>

	<?= $this->render('_form', [
		'model' => $model,
	]) ?>

</div>
