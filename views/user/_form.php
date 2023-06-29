<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\User $model */
/** @var app\models\User_profile $profile */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>
    
<!--    --><?php //= $form->field($model, 'firstName')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?php //= $form->field($model, 'lastName')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?php //= $form->field($model, 'phoneNum')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'role')->dropDownList(\app\models\User::getRoles(), ['prompt' => 'Select']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
