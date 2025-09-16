<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ViagensSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="viagens-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'Id') ?>

    <?= $form->field($model, 'Data_Partida') ?>

    <?= $form->field($model, 'Data_Chegada') ?>

    <?= $form->field($model, 'Ponto_Partida') ?>

    <?= $form->field($model, 'Ponto Chegada') ?>

    <?php // echo $form->field($model, 'Preco') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
