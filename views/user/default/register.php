<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var amnah\yii2\user\Module $module
 * @var amnah\yii2\user\models\User $user
 * @var amnah\yii2\user\models\User $profile
 * @var string $userDisplayName
 */

$module = $this->context->module;

$this->title = Yii::t('user', 'Register');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="w-100 p-5" style="background-color: #BDB8B8; height: 1000px;">
<div class="user-default-register bg-white border rounded mx-auto w-25 mt-5 mb-3">
<?=  Html::img('@web/imagens/logo.png', ['alt' => Yii::$app->name,'class' => 'ms-4 mt-2', 'style' => 'height:40px; '])?>
<hr>
<div class="p-2">
<?php if ($flash = Yii::$app->session->getFlash("Register-success")): ?>

<div class="alert alert-success">
    <p><?= $flash ?></p>
</div>

<?php else: ?>

<?php $form = ActiveForm::begin([
    'id' => 'register-form',
    'options' => ['class' => 'form-horizontal'],
    'fieldConfig' => [
        'template' => "{label}\n<div class=\"col-lg-3 w-100\">{input}</div>\n<div class=\"col-lg-7\">{error}</div>",
        'labelOptions' => ['class' => 'control-label'],
    ],
    'enableAjaxValidation' => true,
]); ?>

<?php if ($module->requireEmail): ?>
    <?= $form->field($user, 'email') ?>
<?php endif; ?>

<?= $form->field($user, 'id') ?>
<?php if ($module->requireUsername): ?>
    <?= $form->field($user, 'username') ?>
<?php endif; ?>

<?= $form->field($user, 'newPassword')->passwordInput() ?>

<?= $form->field($user, 'newPasswordConfirm')->passwordInput() ?>

<?php /* uncomment if you want to add profile fields here
<?= $form->field($profile, 'full_name') ?>
*/ ?>
    <div class="mx-auto w-75 m-0 d-flex">
    <p style="font-size: 13px;">Já fez o registo?</p>
<?= Html::a(Yii::t("user", "Clique aqui"), ["/user/login"],['class'=>'p-0','style'=>'color:#816; font-size: 13px;']) ?>
</div>
<div class="form-group" >
    <div>
        <?= Html::submitButton(Yii::t('user', 'Registar'), ['class' => 'btn btn-primary mx-auto mt-0 p-2 w-100 rounded-pill','style'=>'background-color:#816; color:white; border: #816 solid 1px;', 'onmouseenter'=>'alterColorEnterr(this)', 'onmouseout'=>'alterColorOutt(this)']) ?>
    </div>
</div>

<?php ActiveForm::end(); ?>

<?php if (Yii::$app->get("authClientCollection", false)): ?>
    <div class="col-lg-offset-2 col-lg-10">
    <?php
                echo Html::a('Ok', ['site'], ['class' => 'btn btn-primary mx-auto p-2 w-50 mt-3 mb-3 rounded-pill ', 'style' => 'background-color:#816; color:white; border: #816 solid 2px;', 'onmouseenter' => 'alterColorEnterr(this)', 'onmouseout' => 'alterColorOutt(this)'])
                ?>
    </div>
<?php endif; ?>

<?php endif; ?>
</div>

</div>
</div>

<script>
    function alterColorEnterr(butao){
        butao.style.backgroundColor = 'white';
        butao.style.color = '#816';
    }

    function alterColorOutt(butao){
        butao.style.backgroundColor = '#816';
        butao.style.color = 'white';
    }
</script>