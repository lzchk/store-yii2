<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\User $model */

$this->title = $model->name;
// $this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">
    <h1>Личный кабинет</h1>
    <div class="row align-self-center" style="margin-top:5vh; margin-bottom:5vh;">
        <?php
        echo '
                <div class="col-lg-2">
                    <img style="width: autho; max-width:10vw; height: 10vw; margin-right:5vh;" 
                    src="/web/img/'.$model->attributes['avatar'].'">
                </div>
                ';
        ?>
        <div class="col-lg-8">
            <h2><?= Html::encode($this->title) ?></h2>
            <h4><?= $model->attributes['phone'] ?></h4>
            <div class="birth" style="">День рождения: <?= $model->attributes['date_of_birth'] ?></div>
            <div class="birth" style="">Пол: <?= $model->attributes['sex'] ?></div>
        </div>
    </div>
    
    <div>
        <h2>Адрес доставки</h2>
        <div class="birth" style=""><?= $model->attributes['id_delivery'] ?></div>
        <?php
        if($model->attributes['id_delivery']==null){
            echo'<p>тут пока ничего нет</p>';
        }
        ?>
    </div>

    <div>
        <h2>Способ оплаты</h2>
        <div class="birth" style=""><?= $model->attributes['id_card'] ?></div>
        <!-- <?= Html::a('Добавить карту', ['user/create'], ['class' => 'btn btn-primary']) ?> -->
        <?php
        if($model->attributes['id_card']==null){
            echo'<p>тут пока ничего нет</p>';
        }
        ?>
    </div>

    <p>
        <?= Html::a('Изменить профиль', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить профиль', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <!-- <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'phone',
            'name',
            'password',
            'role',
            'date_of_birth',
            'sex',
            'avatar',
            'id_card',
            'id_delivery',
        ],
    ]) ?> -->

</div>
