<?php

namespace app\controllers;

use app\models\Basket;
use app\models\BasketSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
use app\models\Product;

/**
 * BasketController implements the CRUD actions for Basket model.
 */
class BasketController extends Controller
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
     * Lists all Basket models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $id_user = Yii::$app->user->id;
        $basket = Basket::find()->where(['id_user' => $id_user])->with(['product'])->all();
        $context = [
            'basket'=>$basket
        ];
        $searchModel = new BasketSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAdd()
    {
        $id = Yii::$app->request->get('id');
        $product = Product::findOne($id);
        $product_basket = Basket::find()->where(['id_product' => $product])->one();
        // var_dump($product_basket->id_product);
        // var_dump($product->id)   ;

        if($product->availability > 0){
            if(!is_null($product_basket)){
                $basket = Basket::find()->where(['id_user' => Yii::$app->user->id, 'id_product' => $product])->one();
                $basket->counts += 1;
                // echo $basket;
            } else{
                $basket = new Basket();
                $basket->counts += 1;
                $basket->id_product = $product['id'];
            }
            $basket->id_user = Yii::$app->user->id;
            $product->availability -=1;
            $product->save();
            return $basket->save() ? $this->redirect(['/basket']) : null;
        } else {
            Yii::$app->session->setFlash('danger', 'Товар закончился!');
            return $this->redirect(['/basket']);
        }
    }

    public function actionMinus()
    {
        $id = Yii::$app->request->get('id');
        $basket = Basket::findOne($id);
        if($basket->counts > 1){
            $basket->counts -= 1;
            return $basket->save() ? $this->redirect(['/basket']) : null;
        } else {
            $basket = Basket::deleteAll(['id' => $id]);
        }
        return $this->redirect(['/basket']);
    }

    /**
     * Displays a single Basket model.
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
     * Creates a new Basket model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Basket();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
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
     * Updates an existing Basket model.
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
     * Deletes an existing Basket model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['/basket']);
    }

    public function actionRemove()
    {
        $id_user = Yii::$app->user->id;
        $basket = Basket::deleteAll(['id_user' => $id_user]);
        // var_dump($basket);
        
        return $this->redirect(['/basket']);
    }

    /**
     * Finds the Basket model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Basket the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Basket::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
