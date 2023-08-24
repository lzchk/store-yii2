<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ImgProduct $model */

$this->title = 'Create Img Product';
$this->params['breadcrumbs'][] = ['label' => 'Img Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="img-product-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
