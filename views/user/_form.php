<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\User $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::className(), ['mask' => '79999999999',])->textInput(['placeholder' => $model->getAttributeLabel('phone')]);?>

    <?= $form->field($model, 'name')->textInput(['placeholder' =>  'Иванов Иван Иванович', 'maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'passwordConfirm')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_of_birth')->textInput(['placeholder' =>  '1990-01-30']) ?>

    <?= $form->field($model, 'sex')->dropDownList([ 'муж' => 'Муж', 'жен' => 'Жен', 'не укажу' => 'Не укажу', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'avatar')->fileInput() ?>

    <?= $form->field($model, 'agree')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
