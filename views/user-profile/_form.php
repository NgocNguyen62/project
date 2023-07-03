<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\UserProfile $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-profile-form">

    <?php $form = ActiveForm::begin(); ?>

<!--    --><?php //= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'firstName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phoneNum')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

<!--    --><?php //= $form->field($model, 'gender')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'gender')->checkboxList([
            "male" => "Male",
            "female" => "Female"
        ]
    )  ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
