<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use app\models\Category;
use app\models\Product;

/** @var yii\web\View $this */
/** @var app\models\Category $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = $this->title;

$category = Category::find()->where(['id_parent' => $model->id ])->all();

\yii\web\YiiAsset::register($this);
?>
<div class="category-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <div>
        <?php
        foreach ($category as $item) {
            echo '
            <div class="row justify-content-between">
                <h4>'.$item->name.'</h4>';
                $product = Product::find()->where(['id_category' => $item ])->limit(12)->all();
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
                        <div class="row align-self-center" style="width: 14vw;
                        margin-bottom: 1vw;
                        background: white;
                        height: 6vh;
                        align-content: center;
                        border-radius: 1vw;
                        box-shadow: 0 5px 5px -5px rgb(0 0 0 / 50%);
                        position: sticky;
                        top: 49vw;"><a href="
                        '.Url::toRoute(['basket/add', 'id' => $item->id]).'" class="btn">В корзину</a>
                        </div>
                    </div>
                    ';
                }
                '
            </div>
            ';
        }
        ?>
    </div>

    <!-- <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p> -->

    <!-- <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_parent',
            'name',
        ],
    ]) ?> -->

</div>
