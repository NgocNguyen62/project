<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\base\Categories $model */

$this->title = 'Tạo mới';
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categories-create">

<!--    <h1>--><?php //= Html::encode($this->title) ?><!--</h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
