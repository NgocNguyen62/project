<?php

namespace app\controllers;

use app\models\base\Categories;
use app\models\form\CategoryForm;
use app\models\search\CategoriesSearch;
use Yii;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * CategoriesController implements the CRUD actions for Categories model.
 */
class CategoriesController extends Controller
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
     * Lists all Categories models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CategoriesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Categories model.
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
     * Creates a new Categories model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new CategoryForm();
        $cate = new Categories();

        if ($this->request->isPost) {
            $model->load($this->request->post());
            $model->avatar = UploadedFile::getInstance($model, 'avatar');
//            var_dump($this->request->post());
//            die();
            if($model->save($cate)){
                return $this->redirect(['categories/view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Categories model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $cate = $this->findModel($id);
        if(!Yii::$app->user->isGuest){
            if(!Yii::$app->user->can('admin') && $cate->created_by !== Yii::$app->user->identity->username){
                throw new ForbiddenHttpException('Bạn không được phép chỉnh sửa.');
            }
        }
        $avatar = $cate->avatar;
        $model = new CategoryForm();
        $model->setAttributes($cate->attributes);
        $model->id = $cate->id;
        $model->load($this->request->post());

        if ($this->request->isPost && $model->load($this->request->post())) {
            $model->avatar = UploadedFile::getInstance($model, 'avatar');
            if ($model->save($cate)) {
                if(file_exists($avatar)){
                    unlink($avatar);
                }
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Categories model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $cate = $this->findModel($id);
        if(!Yii::$app->user->isGuest){
            if(!Yii::$app->user->can('admin') && $cate->created_by !== Yii::$app->user->identity->username){
                throw new ForbiddenHttpException('Bạn không được phép xóa');
            }
        }
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Categories model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Categories the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Categories::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
