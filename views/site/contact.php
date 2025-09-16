<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\ContactForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\captcha\Captcha;

$this->title = 'Contactos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="p-5" style="background-color:#EAE9E9;">

        <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')) : ?>


            <div class="border rounded text-center bg-white p-3 w-25 h-50 mx-auto">
                <div class="mx-auto" style="height: 200px;">
                    <?php
                    echo Html::img('@web/imagens/success.png', ['alt' => Yii::$app->name, 'class' => 'h-100']);
                    ?>
                </div>
                <div>
                Obrigado por nos contatar. Responderemos o mais breve possível.
                </div>
                
                <?php
                echo Html::a('Ok', ['contact'], ['class' => 'btn btn-primary mx-auto p-2 w-50 mt-3 mb-3 rounded-pill ', 'style' => 'background-color:#816; color:white; border: #816 solid 2px;', 'onmouseenter' => 'alterColorEnterr(this)', 'onmouseout' => 'alterColorOutt(this)'])
                ?>
            </div>


        <?php else : ?>
            <div class="site-contact m-4">
        <div class="rounded-5 mx-auto w-100 d-flex mb-4 bg-white" style="border:#816 1px solid; color: #816;">
            <div class="m-3">
                <h1><?= Html::encode($this->title) ?></h1>
                <p>Navegue pelos nossos contactos abaixo ou utilize o nosso formulário para nos contactar</p>
            </div>
            <div class="rounded-5">
                <?php
                echo Html::img('@web/imagens/imagem_1.png', ['alt' => Yii::$app->name, 'class' => 'h-100 rounded-5']);
                ?>
            </div>
        </div>
            <div class="rounded-5 w-100 mx-auto bg-white" style="border:#816 1px solid;">
                <h4 class="ms-3 mt-2" style="color: #816;">Contacte-nos! A ipbviagem ficará sempre feliz por poder ajudá-lo</h4>
                <hr>
                <div class="row m-3 mt-5 border-top" >
                    <h4 style="color: #816;" class="mt-2">Formulário de contacto</h4>
                    <div>
                        <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                        <div class="d-flex">
                            <div class="w-50 pe-1">
                                <?= $form->field($model, 'nome')->textInput(['autofocus' => true]) ?>

                                <?= $form->field($model, 'email') ?>
                            </div>
                            <div class="w-50 ps-1">
                                <?= $form->field($model, 'assunto')->dropDownList(['-- Escolha uma opção --','informação sobre ipbviagens','Reclamações', 'Pedido de comprovativo']) ?>
                            </div>
                        </div>
                        <?= $form->field($model, 'mensagem')->textarea(['rows' => 6]) ?>
                        <div class="form-group d-grid gap-2 mt-1 d-md-flex justify-content-md-end">
                            <?= Html::submitButton('enviar', ['class' => 'btn btn-primary rounded-pill w-25 mt-4', 'style' => 'background-color:#816; color:#white; border: #816 solid 1px;', 'onmouseenter' => 'alterColorEnterr(this)', 'onmouseout' => 'alterColorOutt(this)']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>

                    </div>

                </div>

            <?php endif; ?>
            </div>
    </div>


    <script>
        function alterColorEnterr(butao) {
            butao.style.backgroundColor = 'white';
            butao.style.color = '#816';
        }

        function alterColorOutt(butao) {
            butao.style.backgroundColor = '#816';
            butao.style.color = 'white';
        }
    </script>