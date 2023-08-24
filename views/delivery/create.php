<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Delivery $model */

$this->title = 'Create Delivery';
$this->params['breadcrumbs'][] = ['label' => 'Deliveries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="delivery-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
