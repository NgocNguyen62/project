<?php

use yii\helpers\Html;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\base\Rate $model */

//$this->title = 'Create Rate';
$this->params['breadcrumbs'][] = ['label' => 'Rates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rate-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?= $this->render('@app/views/rate/_form', [
        'model' => $model,
    ]) ?>
    <?php Pjax::end(); ?>
</div>

