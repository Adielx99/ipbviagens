<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Atividades $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="atividades-form m-3">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Id')->textInput() ?>

    <?= $form->field($model, 'Nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Descrição')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Adicionar', ['class' => 'btn btn-success rounded-pill w-100', 'style'=>'background-color:white; color:#816; border: #816 solid 1px;', 'onmouseenter'=>'alterColorEnter(this)', 'onmouseout'=>'alterColorOut(this)']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
