  <?php

use app\models\Like;
use app\models\Product;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\LikeSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Избранные товары';
$this->params['breadcrumbs'][] = $this->title;
$id_user = Yii::$app->user->id;
$like = Like::find()->where(['id_user' => $id_user])->all();
// $product = Product::find()->where(['id' => $like->id_product])->all();
// var_dump($like);
// $product = Product::find()->where([''])->all();
?>
<div class="like-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <? foreach($like as $item){
            $product = Product::find()->where(['id' => $item->id_product])->all();
            foreach($product as $item){
                echo '
                <div class="col-lg-2 product" style="background-color: #f7f7f7;
                width: 14em;
                margin: 1em 0.4em;
                border-radius: 2em;
                display: flex;
                flex-direction: column;
                ">
                    <img style="width: 13rem; padding: 1em;" src="'.$item->img.'">
                    ';
                    if($item->new_flag != NULL){
                        echo '
                        <div style="
                    background-color: rgb(252, 185, 0);
                    color: rgb(255, 255, 255);
                    padding: 0.2vw 0.8vw;
                    border-radius: 0.4vw;
                    position: relative;
                    top: -0.8vw;
                    left: 0vw;
                    transform: rotate(-6deg);
                    text-transform: uppercase;
                    font-weight: bold;
                    font-size: 1vw;
                    width: 7vw;">Новинка</div>
                        ';
                    }
                    if($item->sale_flag != NULL){
                        $proc = round((($item->price)-($item->sale_price))/(($item->price)/100));
                        echo '
                        <div style="
                    background-color: rgb(252, 82, 48);
                    color: rgb(255, 255, 255);
                    padding: 0.2vw 0.8vw;
                    border-radius: 0.4vw;
                    position: relative;
                    top: -0.8vw;
                    left: 0vw;
                    transform: rotate(-6deg);
                    text-transform: uppercase;
                    font-weight: bold;
                    font-size: 1vw;
                    width: 4vw;">-'.$proc.'%</div>
                    <div class="row align-items-center">
                        <h3 class="col-lg-4" style="color: rgb(252, 82, 48)">'.$item->sale_price.'Р</h3>
                        <h5 class="col-lg-3" style="color: #8d8d8d"><strike>'.$item->price.'Р</strike></h5>
                    </div>
                        ';
                    } else {
                        echo '<h3>'.$item->price.'Р</h3>';
                    }
                    echo '
                    <h6 style="height: 2.7vw; overflow: hidden;">
                    <a href="http://coursework/web/product/view?id='.$item->id.'" style="color: #212121;
                    text-decoration: none; ">'.$item->name.'</a></h6>
                    <p style="color: #8d8d8d;">'.$item->weight.'гр.</p>
                    <div class="row align-items-center" style="position: sticky; top: 49vw;">
                        <div class="align-self-center col-lg-7" style="
                        background: white;
                        align-content: center;
                        border-radius: 0.4vw;
                        box-shadow: 0 5px 5px -5px rgb(0 0 0 / 50%);
                        "><a href="
                        '.Url::toRoute(['basket/add', 'id' => $item->id]).'" class="btn ">В корзину</a>
                        </div>
                        '.Html::a('Удалить', ['delete', 'id' => $item->id], [
                            'class' => 'btn btn-danger col-lg-5',
                            'data' => [
                                // 'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]).'
                        </div>
                </div>
                ';
            }
        }?>
    <div>

    <p>
        <!-- <?= Html::a('Create Like', ['create'], ['class' => 'btn btn-success']) ?> -->
    </p>

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
                'urlCreator' => function ($action, Like $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?> -->


</div>
