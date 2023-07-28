<?php

namespace app\controllers;

use app\models\Categories;
use app\models\ContactForm;
use app\models\form\LoginForm;
use app\models\Products;
use app\models\search\ProductsSearch;
use app\models\View;
use http\Env\Url;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\Response;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
                'layout'=>false,
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
//        print_r(Yii::$app->session->get('user'));
//        die();
//        $this->layout = false;

        $searchModel = new ProductsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        
//        return $this->render('page', ['dataProvider'=>$dataProvider, 'searchModel'=>$searchModel]);
        return $this->actionPage();
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->actionHome();
        }

        $model = new LoginForm();

        $model->load(Yii::$app->request->post());
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            Yii::$app->session->addFlash('user', $model->username);
            return $this->redirect(Yii::$app->request->referrer);
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response|string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    public  function  actionChart() {
        return $this->render('chart');
    }
    public  function  actionTopView() {
        return $this->render('top-view');
    }
    public  function  actionTopRate() {
        return $this->render('top-rate');
    }

    public function actionPage() {
        $top = View::find()->orderBy(['count' => SORT_DESC])->limit(10)->all();
        $productIds = ArrayHelper::getColumn($top, 'product_id');
        $dataProvider = new ActiveDataProvider([
            'query' => Products::find()
                ->where(['id' => $productIds]),
        ]);

        return $this->render('page', [
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionHome(){
        $searchModel = new ProductsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
//        $query = Products::find()->andFilterWhere(['status' => 1]);
//        $dataProvider = new ActiveDataProvider(['query'=>$query]);
        return $this->renderAjax('home2', ['dataProvider'=>$dataProvider, 'searchModel'=>$searchModel]);

    }
    public function actionCategories(){
        $searchModel = new ProductsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        return $this->renderAjax('categories', ['dataProvider'=>$dataProvider, 'searchModel'=>$searchModel]);
    }
    public function actionCategoryDetails($id){
        $searchModel = new ProductsSearch();
        $dataProvider = new ActiveDataProvider([
            'query' => Products::find()
                ->where(['category_id' => $id ]),
        ]);
        $products = Products::find()->where(['category_id'=>$id]);
        return $this->renderAjax('category-details', ['dataProvider'=>$dataProvider, 'searchModel'=>$searchModel]);
    }

}
