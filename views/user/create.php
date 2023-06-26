<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\User $model */

/** @var app\models\User_profile $profile */

$this->title = 'Create User';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model, 
    ]) ?>

</div>
