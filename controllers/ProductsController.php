<?php

namespace app\controllers;

use app\models\base\Rate;
use app\models\base\View;
use app\models\Products;
use app\models\form\ProductForm;
use app\models\search\ProductsSearch;
use app\models\User;
use Yii;
use yii\base\Model;
use yii\base\Theme;
use yii\helpers\FileHelper;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProductsController implements the CRUD actions for Products model.
 */
class ProductsController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Products models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProductsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Products model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Products model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
//        FileHelper::createDirectory('avatar/');
//        FileHelper::createDirectory('image_360/');
        $model = new ProductForm();
        $product = new Products();
        $product->created_at = time();
        $product->created_by = \Yii::$app->user->identity->username;
        if ($this->request->isPost) {
                $model->load($this->request->post());
                $model->avatar = UploadedFile::getInstance($model, 'avatar');
                $model->image_360 = UploadedFile::getInstance($model, 'image_360');
                if($model->save($product)){
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Products model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $product = $this->findModel($id);
        $avatar = $product->avatar;
        $image = $product->image_360;

        $model = new ProductForm();
        $model->setAttributes($product->attributes);
        $model->id = $product->id;
//        var_dump($model);
//        die();
        if ($this->request->isPost && $model->load($this->request->post())) {
            $model->avatar = UploadedFile::getInstance($model, 'avatar');
            $model->image_360 = UploadedFile::getInstance($model, 'image_360');
            $product->updated_at = time();
            $product->updated_by = \Yii::$app->user->identity->username;
            if ($model->save($product)) {
                if(file_exists($avatar)){
                    unlink($avatar);
                }
                if(file_exists($image)){
                    unlink($image);
                }

                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Products model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model =  $this->findModel($id);
        $folder = 'products/'. $model->id . '-' . $model->name;
        if (file_exists($folder)) {
            FileHelper::removeDirectory($folder);
        }
        $model->delete();

        return $this->redirect(['index']);
    }

    public function actionView360($id)
    {
        $model = Products::findOne(['id'=>$id]);
        return $this->render('view360', ['model' => $model]);
    }

    public function actionRate($id){
        $model = Products::findOne(['id'=>$id]);
        $rate = Rate::findOne(['product_id'=>$id, 'user_id' => \Yii::$app->user->identity->id]);
        if($rate == null){
            $rate = new Rate();
            $rate->product_id = $id;
            $rate->user_id = \Yii::$app->user->identity->id;
        }
        $rate->time = time();
//        var_dump($rate->load(Yii::$app->request->post()));
//        die();
        if($rate->load(Yii::$app->request->post()) && $rate->save()){
            return $this->render('view', [
                'model' => $model,
            ]);
        }
        return $this->render('rate', ['model' => $rate]);
    }
    public function actionDetails($id) {
//        $is_page_refreshed = (isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] == 'max-age=0');
        $product = $this->findModel($id);
//        if (!Yii::$app->user->can('admin') && $product->created_by != Yii::$app->user->identity->username) {
//            die();
//        }
//        if(!$is_page_refreshed){
//            if(!$product->increasingView($id)){
//                $view = new View();
//                $view->product_id = $id;
//                $view->time = time();
//                $view->count = 1;
//                $view->save();
//
//            }
//        }
        return $this->renderAjax('details', [
            'model' => $product,
        ]);
    }

    /**
     * Finds the Products model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Products the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Products::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
