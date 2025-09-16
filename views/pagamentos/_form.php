<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Pagamentos $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pagamentos-form m-3 ">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Id')->textInput() ?>

    <?= $form->field($model, 'Valor_Pago')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Data_Pagamento')->textInput(['id' => 'piker']) ?>

    <div class="form-group">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-success rounded-pill w-100', 'style'=>'background-color:white; color:#816; border: #816 solid 1px;', 'onmouseenter'=>'alterColorEnter(this)', 'onmouseout'=>'alterColorOut(this)']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
