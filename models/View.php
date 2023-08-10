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
        $querySum = new Query();
        if(!Yii::$app->user->can('admin')){
            $query->select('SUM(view.count)')
                ->where(['created_by'=>Yii::$app->user->identity->username])
                ->from('products')
                ->leftJoin('view', 'products.id = view.product_id')
                ->leftJoin('categories', 'products.category_id = categories.id')
                ->groupBy('categories.name');
            $sum = $querySum->select('SUM(view.count)')
                ->where(['created_by'=>Yii::$app->user->identity->username])
                ->from('products')
                ->leftJoin('view', 'products.id = view.product_id')
                ->scalar();
        } else{
            $query->select('SUM(view.count)')
                ->from('products')
                ->leftJoin('view', 'products.id = view.product_id')
                ->leftJoin('categories', 'products.category_id = categories.id')
                ->groupBy('categories.name');
            $sum = View::find()->sum('count');
            
        }

        $view = $query->createCommand()->queryColumn();
//        var_dump($sum);
//        die();

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
        if(Yii::$app->user->can('admin')){
            $topProducts = Products::find()
                ->where(['id' => $productIds])
                ->all();

        } else{
            $topProducts = Products::find()
                ->where(['id' => $productIds])->andWhere(['created_by'=>Yii::$app->user->identity->username])
                ->all();
        }
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
    public static function getTotalView(){
        if(Yii::$app->user->can('admin')){
            return $sum = View::find()->sum('count');
        }
        $querySum = new Query();
        return $querySum->select('SUM(view.count)')
            ->where(['created_by'=>Yii::$app->user->identity->username])
            ->from('products')
            ->leftJoin('view', 'products.id = view.product_id')
            ->scalar();
    }
}