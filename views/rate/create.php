<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\base\Rate $model */

$this->title = 'Create Rate';
$this->params['breadcrumbs'][] = ['label' => 'Rates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
