<?php

use app\models\Basket;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\BasketSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Корзина';
$this->params['breadcrumbs'][] = $this->title;

$id_user = Yii::$app->user->id;
$basket = Basket::find()->where(['id_user' => $id_user ])->all();
// var_dump($basket);
?>
<div class="basket-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <!-- <?= Html::a('Create Basket', ['create'], ['class' => 'btn btn-success']) ?> -->
    </p>

    

    <div class = "row">
        <?php
        if($basket == NULL){
            echo '
            <h3>
            Тут пока ничего нет:(
            </h3>
            ';
        } else{
            foreach($basket as $item){
                echo '
                <div class="col-lg-2 product" style="background-color: #f7f7f7;
                width: 40vw;
                margin: 1em 1.4em;
                border-radius: 2em;
                display: flex;
                align-items: center;
                height: 8vw;">
                <img style="width: 7vw; padding: 1em;" src="'.$item['product']['img'].'">
                <div class="column col-lg-6" style="
                height: 8vh;">
                    <h6 style="width: 10vw;
                    max-height: 2.8vw;
                    overflow: hidden;"><a style="color: #212121;
                    text-decoration: none; " href="http://coursework/web/product/view?id='.$item['product']['id'].'">'.$item['product']['name'].'</a></h6>
                    <div class="row align-items-center col-lg-7">
                        <h6 class="col-lg-5">'.$item['product']['price'].'Р</h6>
                        <p class="col-lg-6">'.$item['product']['weight'].' гр.</p>
                    </div>
                </div>
                            <div class="row" style="align-items: center;">
                                <a href="
                                '.Url::toRoute(['basket/add', 'id' => $item->id_product]).'" class=" btn btn-success col-lg-2">+</a>
                                <div class="col-lg-2">'.$item->counts.'</div>
                                '.Html::a('-', ['basket/minus', 'id' => $item->id], [
                                    'class' => 'btn btn-danger col-lg-2',
                                    'data' => [
                                        // 'confirm' => 'Are you sure you want to delete this item?',
                                        'method' => 'post',
                                    ],
                                ]).'
                            </div>
                        </div>
                ';
            }
            echo '
            <div class="row justify-content-end">
                <div class="col-lg-2">
                    <a href="'.Url::toRoute(['/basket/remove']).'" class=" btn btn-danger">Очистить корзину</a>
                </div>
                <div class="col-lg-2">
                    <a href="'.Url::toRoute(['/purchase', 'id' => $item->id]).'" class=" btn btn-primary">Оформить заказ</a>
                </div>
            </div>
            ';
        }
        
        ?>
    </div>

    <?php
    // $id_user = Yii::$app->user->id;
    // $basket = Basket::deleteAll(['id_user' => $id_user]);
    // // var_dump($basket);
    // return $this->redirect(['basket']);
    ?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!-- <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_user',
            'id_product',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Basket $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?> -->


</div>
