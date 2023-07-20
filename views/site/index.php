<?php
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\search\ProductsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
///** @var \app\models\Products $model */
$this->title = 'Home';
$this->registerCssFile('css/product.css');
//$rows = array_chunk($dataProvider->getModels(), 4);
$row = $dataProvider->getModels();
?>
<!--<div class="content">-->
<!--<main class="container">-->
<!--    <div class="left-column">-->
<body>
<header>
    <?php
    $form = ActiveForm::begin([
        'method' => 'get',
        'action' => ['site/index'],
    ]); ?>
    <?= $form->field($searchModel, 'name') ?>
    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <!--    --><?php //= Html::a('Reset', ['user/index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end();
    ?>
<!--    </div>-->

<!--    <div class="right-column">-->
    <?php
    //echo '<div class="right-column">';
    $form = ActiveForm::begin([
        'method' => 'get',
        'action' => ['site/index'],
    ]); ?>

    <?= $form->field($searchModel, 'category_id')->dropDownList(
        \app\models\Products::getCate(), ['prompt' => 'All']
    ) ?>
    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <!--    --><?php //= Html::a('Reset', ['user/index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end();
    //echo '<div>';
    echo '<div>';
    ?>
</header>

<!--</main>-->
    <div class="product-grid">
<?php
//foreach ($rows as $row) {
//    echo '<div class="product-row">';
    foreach ($row as $model) {
        echo '<div class="product-item">';
        echo Html::a(
            Html::img($model->avatar, ['width' => '150', 'height' => '150']),
            ['products/view', 'id' => $model->id],
            ['class' => 'product-link']
        );
        echo Html::tag('div', $model->name, ['class' => 'product-name']);
        $view = \app\models\View::findOne(['product_id'=> $model->id]);
        $count = 0;
        if($view!== null){
            $count = $view->count;
        }

        echo Html::tag('div', 'Lượt xem:' . $count , ['clas' => 'product-name']);
        echo '</div>';
    }
    echo '</div>';
//}

?>
    </div>
</body>

