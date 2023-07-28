<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\UserProfile $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-profile-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'avatar')->fileInput(['accept' => 'image/*',
        'onchange' => 'previewImage(event)']) ?>
    <div id="image-preview"></div>

<!--    --><?php //= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'firstName')->textInput(['maxlength' => true])->label('Họ') ?>

    <?= $form->field($model, 'lastName')->textInput(['maxlength' => true])->label('Tên') ?>

    <?= $form->field($model, 'phoneNum')->textInput(['maxlength' => true])->label('Số điện thoại') ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

<!--    --><?php //= $form->field($model, 'gender')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'gender')->checkboxList([
            "male" => "Nam",
            "female" => "Nữ"
        ]
    )->label('Giới tính')  ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script>
    function previewImage(event) {
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function(){
            var imgElement = document.createElement("img");
            imgElement.src = reader.result;
            imgElement.style.width = "100px";
            imgElement.style.height = "80px";
            document.getElementById("image-preview").innerHTML = "";
            document.getElementById("image-preview").appendChild(imgElement);
        };
        reader.readAsDataURL(input.files[0]);
    }
</script>

