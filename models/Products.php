<?php

namespace app\models;

//use dosamigos\qrcode\QrCode;
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

    public function increasingView($product_id, $user_id){
        if(($view = Views::findOne(['product_id'=>$product_id, 'user__id'=>$user_id])) !== null){
            $view->count += 1;
            $view->save(false, ['count']);
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
}
