<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Pengaturan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pengaturan-form">

	<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

	<?= $form->field($model, 'nama_aplikasi')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'tentang')->textarea(['rows' => 6]) ?>

	<?= $form->field($model, 'imageFile')->fileInput(['class'=> 'form-control', 'accept'=> 'image/*']) ?>

	<div class="form-group">
		<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>
