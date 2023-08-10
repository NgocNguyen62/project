<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\base\User $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute'=>'username',
                'label'=>'Tên người dùng'
            ],
            [
                    'attribute'=>'password',
                'label'=>'Mật khẩu'
            ],
//            'role',
            [
                'attribute' => 'role',
                'label'=>'Vai trò',
            ],
            [
                'attribute'=>'created_at',
                'label'=>'Thời gian tạo'
            ],
            [
                'attribute'=>'created_by',
                'label'=>'Người tạo'
            ],
            [
                'attribute'=>'updated_at',
                'label'=>'Thời gian cập nhật'
            ],
            [
                'attribute'=>'updated_by',
                'label'=>'Người cập nhật'
            ],
            [
                'attribute'=>'lock',
                'label'=>'Khóa',
                'value'=>function($model){
                    if($model->lock == 0){
                        return 'Không';
                    } else{
                        return 'Khóa';
                    }
                }
            ],
        ],
    ]) ?>

</div>
