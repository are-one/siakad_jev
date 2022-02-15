<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

use yii\helpers\ArrayHelper;
use frontend\models\TblJk;
use frontend\models\TblAgama;

/* @var $this yii\web\View */
/* @var $model frontend\models\Dosen */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dosen-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'nip')->textInput(['maxlength' => true, 'placeholder'=> 'NIP']) ?>

    <?= $form->field($model, 'nama_dosen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_jk')->dropDownList(ArrayHelper::map(TblJk::find()->all(),'id_jk', 'jenis_kelamin'),['prompt'=>'--Pilih--']) ?>

    <?= $form->field($model, 'id_agama')->dropDownList(ArrayHelper::map(TblAgama::find()->all(),'id_agama', 'agama'),['prompt'=>'--Pilih--']) ?>

    <?= $form->field($model, 'no_telp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'imageFile')->fileInput(['class'=> 'form-control', 'accept'=> 'image/*']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
