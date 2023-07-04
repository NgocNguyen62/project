<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\base\User $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

<!--    --><?php //= $form->field($model, 'role')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'role')->dropDownList(\app\models\User::getRoles(), ['prompt' => 'Select']) ?>

    <?= $form->field($model, 'lock')->dropDownList(\app\models\User::isLock(), ['prompt' => 'Select']) ?>
<!--    --><?php //= $form->field($model, 'lock')->checkboxList([
//        1 => "lock",
//        0 => "unlock",
//    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
