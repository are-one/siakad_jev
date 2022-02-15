<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Matakuliah */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="matakuliah-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kode_mk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mata_kuliah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'semester')->textInput() ?>

    <?= $form->field($model, 'sks')->textInput() ?>

    <?= $form->field($model, 'jenis_mk')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
