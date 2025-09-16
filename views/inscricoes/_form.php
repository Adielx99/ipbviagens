<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Inscricoes $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="inscricoes-form m-3">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Id')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'viagens_Id')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'Data')->textInput(['id' => 'piker']) ?>

    <?= $form->field($model, 'Pago')->dropDownList(['Sim','Não']) ?>

    <?= $form->field($model, 'Pagamentos_Id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-success w-100 rounded-pill',  'style' => 'background-color: #816;']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
