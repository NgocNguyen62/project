<?php

namespace app\models;

use Yii;
use yii\db\Query;
use yii\helpers\ArrayHelper;

class View extends \app\models\base\View
{
    public static function getProductName() {
        $productId = View::find()->select('product_id')->column();
        return Products::find()
            ->select('name')
            ->where(['id' => $productId])
            ->column();
    }
    public static function getPercent(){
        $query = new Query();
        $query->select('SUM(view.count)')
            ->from('products')
            ->leftJoin('view', 'products.id = view.product_id')
            ->leftJoin('categories', 'products.category_id = categories.id')
            ->groupBy('categories.name');
        $view = $query->createCommand()->queryColumn();

        $sum = View::find()->sum('count');
        $percents = [];

        foreach ($view as $count) {
            $percent = ($count / $sum) * 100;
            $percents[] = $percent;
        }

        return $percents;
    }
    public static function getTop(){
        $top = View::find()->orderBy(['count' => SORT_DESC])->limit(10)->all();
        $productIds = ArrayHelper::getColumn($top, 'product_id');

        $topProducts = Products::find()
            ->where(['id' => $productIds])
            ->all();
        return $topProducts;
    }

    public static function getViewTop(){
        $top = View::getTop();
        $views = [];
        foreach ($top as $product){
            $views[] = View::findOne(['product_id'=>$product->id])->count;
        }
//        var_dump($views);
//        die();
        return $views;
    }
}