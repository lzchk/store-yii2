<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Category;
use app\models\Product;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\Product $model */

$category = Category::find()->where(['id' => $model->id_category ])->one();
$parent = Category::find()->where(['id' => $category->id_parent ])->one();
$similar = Product::find()->where(['id_category' => $category])->limit(5)->all();
$product = Product::find()->where(['id' => $model->id])->all();
// var_dump($similar);

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => $parent->name, 'url' => ['/category/view?id='.$parent->id.'']];
$this->params['breadcrumbs'][] = $this->title;
// \yii\web\YiiAsset::register($this);
?>
<div class="product-view">
<!-- <?= Html::a('Назад', ['/'], ['class' => 'btn btn-primary']) ?> -->
<div class="row justify-content-between">
    <div>
        <?
        foreach($product as $item){
            if($item->new_flag != NULL){
                echo '
                <div style="
            background-color: rgb(252, 185, 0);
            color: rgb(255, 255, 255);
            padding: 0.2vw 0.8vw;
            border-radius: 0.4vw;
            position: relative;
            top: 0vw;
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
            top: 0;
            left: 0vw;
            transform: rotate(-6deg);
            text-transform: uppercase;
            font-weight: bold;
            font-size: 1vw;
            width: 4vw;">-'.$proc.'%</div>
                ';
            }
        }
        ?>
    </div>
    <h1 class="col-lg-10" style="font-size: 7vh;"><?= Html::encode($this->title) ?></h1>
    <?
    foreach($product as $item){
        echo '<a href="'.Url::toRoute(['like/add', 'id' => $item->id]).'" class="col-lg-1" style="text-decoration: none;
    text-align: right; font-size: 3vh;">&#10084;</a>';
    }
    ?>
    
    <!-- <? var_dump($model->attributes['id']) ?> -->
</div>
    
    <div style="font-size: 2.6vh;    font-weight: 600;    color: #9b9b9b;">
    <?= $model->attributes['weight'] ?> г</div>
    <div class="d-flex row" style="margin-top: 5vh; margin-bottom: 5vh;">
    <?php
        echo '
                <div class="col-lg-5">
                    <img style="border-radius: 2em; width: autho; max-width:30vw; height: 30vw; margin-right:5vh;" src="'.$model->attributes['img'].'">
                </div>
                ';
        ?>
        <div class="col-lg-7">
            <div class="d-flex row" style="border-radius: 1em;
    border: solid 2px #eaeaea;
    padding: 1em;
    justify-content: space-between;">
    <?
        foreach($product as $item){
            if(is_null($item->sale_price)){
                echo '
                <h4 class="col-lg-8" style="font-size: 4vh;">'.$model->attributes['price'] .'₽</h4>
                ';
            } else {
                echo '
                <div class="row col-lg-8">
                <h1 class="col-lg-2" style="color: rgb(252, 82, 48)">'.$item->sale_price.'Р</h1>
                <h2 class="col-lg-2" style="color: #8d8d8d; margin-left: 2vw"><strike>'.$item->price.'Р</strike></h2>
                </div>';
            }
        }
    ?>
                <?
                    foreach($product as $item){
                        echo '
                        <div class="text-center align-self-center" style="width: 14vw;
                        backgroung:red;
                        margin-bottom: 1vw;
                        background: white;
                        height: 6vh;
                        align-content: center;
                        border-radius: 1vw;
                        box-shadow: 0 5px 5px -5px rgb(0 0 0 / 50%);"><a href="
                        '.Url::toRoute(['basket/add', 'id' => $model->attributes['id']]).'" class="btn">В корзину</a></div>
                        ';
                    }
                ?>
                
            </div>
            <div style="   
            font-size: 2.6vh;
            margin-top: 2vh;
            font-weight: 700;
            margin-bottom: 2vh;">О товаре</div>
            <hr>
            <div style="font-size: 2.4vh;
    font-weight: 600;
    color: #9b9b9b;">Состав</div>
            <div>
                <?= $model->attributes['description'] ?>
                <?php
                if($model->attributes['description'] == NULL){
                    echo '
                    '.$model->attributes['name'].'
                    ';
                }
                ?>
            </div>
            <div style="font-size: 2.4vh;
    font-weight: 600;
    color: #9b9b9b;">Срок годности</div>
            <div><?= $model->attributes['expiration_date'] ?> д</div>
            <!-- <div>Производитель</div>
            <div><?= $model->attributes['id_company'] ?></div> -->
        </div>
    </div>

    <div>
        <h2>Может, что-то еще?</h2>
        <div class="row">
            <?php
                foreach($similar as $item){
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
            ?>
        </div>
    </div>
    <p>
        <!-- <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?> -->
    </p>

    <!-- <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'description:ntext',
            'price',
            'id_category',
            'expiration_date',
            'id_company',
            'weight',
            'img',
            'availability',
            'sale_flag',
            'new_flag',
        ],
    ]) ?> -->

</div>
