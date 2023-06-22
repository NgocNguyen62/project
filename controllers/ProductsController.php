<?php

namespace app\controllers;

use app\models\Products;
use app\models\Qr;
use app\models\search\ProductsSearch;
use app\models\Views;
//use Da\QrCode\QrCode;
use dosamigos\qrcode\QrCode;
use yii\filters\VerbFilter;
use yii\helpers\FileHelper;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
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
        $model = $this->findModel($id);
        if($model->increasingView($id)){
            return $this->render('view', [
                'model' => $model,]);
        }
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Products model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Products();

        if ($this->request->isPost) {
            $model->load($this->request->post());
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            $model->file_360 = UploadedFile::getInstance($model, 'file_360');
            if ($model->upload()) {
                // $view = new Views();
                // $view->product_id = $model->id;
                // $view->count = 0;
                // $view->save();

                $qrCodeFolderPath = 'qrcodes/';
                FileHelper::createDirectory($qrCodeFolderPath);
                $productUrl = Url::to(['products/view', 'id' => $model->id], true);
                $qrPath = $qrCodeFolderPath . $model->id ."-". $model->name . '.png';
                
                $qrCode = QRCode::encode($productUrl);
                //$qrCode = new QrCode($productUrl);
                print_r(($qrCode));
                die;
                $qrCode->writeFile($qrPath);
                $qr = new Qr();
                $qr->product_id = $model->id;
               
                //$qrCode->saveAs($qrPath);
                $qr->qr = $qrPath;
                $qr->save();

                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
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
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
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
        $this->findModel($id)->delete();
        $view = Views::findOne(['product_id'=>$id]);
        $view->delete();

        return $this->redirect(['index']);
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
