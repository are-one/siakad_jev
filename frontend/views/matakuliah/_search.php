<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\MatakuliahSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="matakuliah-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'kode_mk') ?>

    <?= $form->field($model, 'mata_kuliah') ?>

    <?= $form->field($model, 'semester') ?>

    <?= $form->field($model, 'sks') ?>

    <?= $form->field($model, 'jenis_mk') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
