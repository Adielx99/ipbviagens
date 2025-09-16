<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\InscricoesSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="inscricoes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'viagens_Id') ?>

    <?= $form->field($model, 'Data') ?>

    <?= $form->field($model, 'Pago') ?>

    <?= $form->field($model, 'Id') ?>

    <?php // echo $form->field($model, 'Pagamentos_Id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
