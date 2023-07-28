<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\base\Categories $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="categories-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'avatar')->fileInput(['accept' => 'image/*',
        'onchange' => 'previewImage(event)']) ?>
    <div id="image-preview"></div>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('Tên loại')?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true])->label('Mô tả') ?>

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
