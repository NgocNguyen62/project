<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Views $model */

$this->title = 'Create Views';
$this->params['breadcrumbs'][] = ['label' => 'Views', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="views-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
