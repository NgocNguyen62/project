<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\base\User $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pass-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
