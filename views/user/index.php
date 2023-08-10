<?php

use app\models\base\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\search\UserSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

<!--    <h1>--><?php //= Html::encode($this->title) ?><!--</h1>-->

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            [
                    'attribute'=>'username',
                'label'=>'Tên người dùng'
            ],
//            'password',
//            'role',
            [
                'attribute' => 'role',
                'label'=>'Vai trò',
                'filter' => Html::activeDropDownList(
                    $searchModel,
                    'role',
                    \app\models\User::getRoles(),
                    ['class' => 'form-control', 'prompt' => 'All']
                ),
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
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, User $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
