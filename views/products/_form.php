<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\base\Products $model */
/** @var yii\widgets\ActiveForm $form */
//$this->registerCssFile('css/product-form.css');
?>
<style>
    /*form label{*/
    /*    !*display: none;*!*/
    /*}*/
    /*img{*/
    /*    width:100%;*/
    /*    !*display:none;*!*/
    /*    margin-bottom:30px;*/
    /*}*/
    /*form input {*/
    /*    width:350px;*/
    /*    padding:20px;*/
    /*    background:#fff;*/
    /*    box-shadow: -3px -3px 7px rgba(94, 104, 121, 0.377),*/
    /*    3px 3px 7px rgba(94, 104, 121, 0.377);*/
    /*}*/
</style>
<div class="products-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'avatar')->fileInput(['accept' => 'image/*',
        'onchange' => 'previewImage(event)']) ?>
    <div id="image-preview"></div>

    <?= $form->field($model, 'image_360')->fileInput(['accept' => 'image/*']) ?>


    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category_id')->dropDownList(
        \app\models\Products::getCate(), ['prompt' => 'Select']
    ) ?>

    <?= $form->field($model, 'description')->textarea(['style'=>'height: 200px']) ?>

    <?= $form->field($model, 'status')->dropDownList(
            \app\models\Products::getStatus(), ['prompt' => 'Select']
    ) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

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

</div>

