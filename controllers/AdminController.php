<?php

namespace app\controllers;

use app\models\User;
use app\models\RegForm;
use app\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * UserController implements the CRUD actions for User model.
 */
class AdminController extends Controller
{
    public function beforeAction($action){
        if(Yii::$app->user->isGuest || Yii::$app->user->identity->role==0){
            $this->redirect(['/site/login']);
            return false;
        }

        if(!parent::beforeAction($action)){
            return false;
        }

        return true;
    }

    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}
