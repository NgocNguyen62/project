<?php

namespace app\models;

//use dosamigos\qrcode\QrCode;
use app\models\base\Rate;
use app\models\base\View;
use app\models\Categories;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Label\Label;

use Endroid\QrCode\Logo\Logo;

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Yii;
use yii\db\Expression;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

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
    public static function getCategories(){
        $cate = Categories::find()->all();
        $options = [];
        foreach ($cate as $item) {
            $options[] = $item->name;
        }
        return $options;
    }

    public static function getStatus() {
        return [
           self::ACTIVE => 'Hoạt động',
           self::INACTIVE => 'Khóa'
        ];
    }


    public function increasingView($product_id){
        if(($view = View::findOne(['product_id'=>$product_id]))){
            $lastSeen = $view->time;
            $view->time = time();
//            if($view->lastSeen == Yii::$app->user->identity->id){
                if($view->time - $lastSeen >= 120){
                    $view->count += 1;
                }
//            } else{
//                $view->count += 1;
//            }
//            $view->lastSeen=Yii::$app->user->identity->id;
            if($view->save()){
                return true;
            }
        }
        return false;
    }

    public function createQr(){
        $writer = new PngWriter();
        $url = Url::to(['products/details', 'id' => $this->id], true);
        $qr = new QrCode($url);

//        $result = $writer->write($qr);
        $folder = 'products/'. $this->id . '-' . $this->name;
        if (!file_exists($folder)) {
            mkdir($folder, 0777, true);
        }
        $path = $folder . '/' . 'qr-' .$this->name . '.png';
        $qr->writeFile($path);
//        $result ->saveToFile($path);
        return $path;
    }

    public function getCategory()
    {
        return (string)Categories::findOne(['id'=> $this->category_id])->name;
    }
    public function getQrcodes(){
        return \app\models\base\Qrcode::findOne(['product_id'=>$this->id]);
    }
    public function  getViews(): int
    {
        $view = View::findOne(['product_id' => $this->id]);
        if($view !== null){
            return (int) $view->count;
        }
        return 0;
    }
    public function  getView360(){
        return Yii::$app->urlManager->createUrl(['products/view360', 'id' => $this->id]);
    }
    public function getProductOfCate($cate, $limit){
        return Products::find()->where(['category_id'=>$cate])->andWhere(['<>', 'id', $this->id])->limit($limit)->all();
    }
    public function getRate(){
        $rates = Rate::find()->where(['product_id'=> $this->id]);
        if($rates !== null){
            $result = round($rates->average('rate'), 1);
            return $result;
        }
        return 0;
    }
    public function getOptionRate(){
        $rate = Rate::findOne(['product_id'=>$this->id, 'user_id' => \Yii::$app->user->identity->id]);
        if($rate == null){
            return new Rate();
        }
        return $rate;
    }
    public function countRate(){
        return (int) Rate::find()->where(['product_id'=> $this->id])->count();
    }
    public function isFavorite(){
        $user = Yii::$app->user->identity;
        $favorite = $user->getFavorite();
//        var_dump($favorite);
//        die();
        return in_array($this, $favorite);
    }
    public static function getTopRate(){
        $top = Rate::find()
            ->select(['product_id', new Expression('AVG(rate) AS avg_rating')])
            ->groupBy('product_id')
            ->orderBy(['avg_rating' => SORT_DESC])
//            ->limit(10)
            ->all();
        $productIds = ArrayHelper::getColumn($top, 'product_id');
        if(Yii::$app->user->can('admin')){
            $topProducts = Products::find()
                ->where(['id' => $productIds])
                ->limit(10)
                ->all();
        } else{
            $topProducts = Products::find()
                ->where(['id' => $productIds])
                ->andWhere(['created_by'=>Yii::$app->user->identity->username])
                ->limit(10)
                ->all();
        }

        return $topProducts;
    }
    public static function getRateOfTop(){
        $top = Products::getTopRate();
        $rates = [];
        foreach ($top as $product){
            $rates[] = $product->getRate();
        }
//        var_dump($views);
//        die();
        return $rates;
    }


    public function getEachRate($rate)
    {
        $result = Rate::find()->where(['product_id'=>$this->id])->andWhere(['rate'=>$rate])->count();
        return (int) Rate::find()->where(['product_id'=>$this->id])->andWhere(['rate'=>$rate])->count();
    }

}
