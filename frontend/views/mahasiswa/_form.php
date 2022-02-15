<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Mahasiswa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mahasiswa-form">

	<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

	<?= $form->field($model, 'nim')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'nama_mhs')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'angkatan')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>

	<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'imageFile')->fileInput(['class'=> 'form-control', 'accept'=> 'image/*']) ?>

	<div class="form-group">
		<?= Html::submitButton('Simpan', ['class' => 'btn btn-info']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>
