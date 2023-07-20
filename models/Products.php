<?php

namespace app\models;

//use dosamigos\qrcode\QrCode;
use app\models\base\Rate;
use app\models\base\View;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Logo\Logo;

use Endroid\QrCode\Writer\PngWriter;
use Yii;
use app\models\Categories;
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

    public static function getStatus() {
        return [
           self::ACTIVE => 'active',
           self::INACTIVE => 'inactive'
        ];
    }


    public function increasingView($product_id){
        if(($view = View::findOne(['product_id'=>$product_id])) !== null){
            $view->count += 1;
            $view->time = time();
            $view->save();
            return true;
        }
        return false;
    }

    public function createQr(){
        $writer = new PngWriter();
        $url = Url::to(['products/view', 'id' => $this->id], true);
        $qr = QrCode::create($url);

        $result = $writer->write($qr);
        $path = 'qrcodes/'. $this->name.time().'.png';
        $result ->saveToFile($path);
        return $path;
    }

    public function getCategory()
    {
        return Categories::findOne(['id'=> $this->category_id])->name;
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
            return $rates->average('rate');
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
}
