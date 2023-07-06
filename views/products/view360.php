<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\base\Products $model */
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auto load</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.css"/>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.js"></script>
    <style>
        #panorama {
            width: 600px;
            height: 400px;
        }
    </style>
</head>
<body>

<div id="panorama"></div>
<script>
    <?php
//    $panoramaUrl = 'https://pannellum.org/images/cerro-toco-0.jpg';
    $baseUrl = Url::base(true);
    $panoramaUrl = $baseUrl . '/' . $model->image_360;
    ?>
    pannellum.viewer('panorama', {
        "type": "equirectangular",
        "panorama": "<?php echo $panoramaUrl; ?>",
        "autoLoad": true
    });
</script>

</body>
</html>
