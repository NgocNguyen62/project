<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\rating\StarRating;

/** @var yii\web\View $this */
/** @var app\models\base\Rate $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="rate-form">

    <?php $form = ActiveForm::begin(); ?>


<!--    --><?php //= $form->field($model, 'rate')->hiddenInput(['id' => 'rating_input']) ?>

    <?php
    echo StarRating::widget(['name' => 'rating_input',
        'model' => $model,
        'attribute' => 'rate',
        'pluginOptions' => [
            'stars' => 5,
            'min' => 0,
            'max' => 5,
            'step' => 1,
            'symbol' => html_entity_decode('&#xe005;', ENT_QUOTES, "utf-8"),
            'defaultCaption' => '{rating} hearts',
            'starCaptions'=>[],
            'starCaptionsCallback' => new yii\web\JsExpression('function(rating, index) {
            return index;
        }'),
            'starClickedCallback' => new yii\web\JsExpression('function(rating, index) {
            $("#rating-input").val(rating);
        }'),
        ]
    ]);
    ?>

<!--    --><?php //= $form->field($model, 'time')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
