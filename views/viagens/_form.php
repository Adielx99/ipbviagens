<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Viagens $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="viagens-form m-3">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Id')->textInput() ?>

    <?= $form->field($model, 'Data_Partida')->textInput(['id' => 'piker']) ?>

    <?= $form->field($model, 'Data_Chegada')->textInput(['id' => 'piker2']) ?>

    <?= $form->field($model, 'Ponto_Partida')->textInput(['maxlength' => true, 'id' => 'parture']) ?>

    <?= $form->field($model, 'Ponto_Chegada')->textInput(['maxlength' => true, 'id' => 'parture']) ?>

    <?= $form->field($model, 'Preco')->textInput() ?>

    <?php
    echo $form->field($model, 'atividades_Id')
        ->dropDownList(
            $programs,
            ['prompt' => Yii::t('app', '-- Selecione uma actividade --')]
        );
    ?>


    <div class="form-group">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-success w-100 rounded-pill', 'style' => 'background-color: #816;']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

