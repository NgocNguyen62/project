<?php

namespace app\models;

use Yii;
use app\models\Categories;

class Products extends \app\models\base\Products
{
    const ACTIVE = 1;
    const INACTIVE = 0;
    public static function getCate()
    {
        $cate = Categories::find()->all();
        $options = [];
        foreach ($cate as $item) {
            $options[(int)$item->id] = $item->name;
        }
        return $options;
    }

    public static function getStatus() {
        return [
           self::ACTIVE => 'active',
           self::INACTIVE => 'inactive'
        ];
    }

    public function increasingView($product_id, $user_id){
        if(($view = Views::findOne(['product_id'=>$product_id, 'user__id'=>$user_id])) !== null){
            $view->count += 1;
            $view->save(false, ['count']);
            return true;
        }
        return false;
    }
}
