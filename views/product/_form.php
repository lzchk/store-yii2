<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Product $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_category')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Category::find()->all(), 'id','name')) ?>

    <?= $form->field($model, 'expiration_date')->textInput() ?>

    <?= $form->field($model, 'id_company')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Company::find()->all(), 'id','name')) ?>

    <?= $form->field($model, 'weight')->textInput() ?>

    <?= $form->field($model, 'img')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'availability')->textInput() ?>

    <?= $form->field($model, 'sale_flag')->textInput() ?>

    <?= $form->field($model, 'new_flag')->textInput() ?>

    <?= $form->field($model, 'sale_price')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
