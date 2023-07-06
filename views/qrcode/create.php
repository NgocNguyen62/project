<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\base\Qrcode $model */

$this->title = 'Create Qrcode';
$this->params['breadcrumbs'][] = ['label' => 'Qrcodes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="qrcode-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
