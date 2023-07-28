<?php

namespace app\controllers;

use app\models\form\UserForm;
use app\models\search\ProductsSearch;
use app\models\User;
use app\models\search\UserSearch;
use app\models\UserProfile;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
     * Lists all User models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
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
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
//        echo "<pre>";
//        print_r(Yii::$app->user);
//        print_r(Yii::$app->authManager->getRolesByUser(Yii::$app->user->id));
//        die();
        $model = new UserForm();
        $user = new User();
        $user->created_at = time();
        $user->created_by = Yii::$app->user->identity->username;
        if ($model->load($this->request->post()) && $model->save($user)) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
    
        return $this->render('create', [
            'model' => $model, 
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $user = $this->findModel($id);
        $model = new UserForm();
        $model->setAttributes($user->attributes);

        if ($this->request->isPost && $model->load($this->request->post())) {
//            $model->password = Yii::$app->getSecurity()->generatePasswordHash($model->password);
            $user->updateValue();
            $model->save($user);
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionChangePass($id) {
        $user = $this->findModel($id);
        $model = new UserForm();
        $model->setAttributes($user->attributes);
        $model->password = "";
        if ($this->request->isPost && $model->load($this->request->post())) {
            $user->updateValue();
            $model->save($user);
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('change-pass', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionFavorite(){
        $searchModel = new ProductsSearch();
        return $this->renderAjax('favorite', ['searchModel'=>$searchModel]);
    }
}
