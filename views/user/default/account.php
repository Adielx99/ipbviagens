<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var amnah\yii2\user\Module $module
 * @var amnah\yii2\user\models\User $user
 * @var amnah\yii2\user\models\UserToken $userToken
 */

$module = $this->context->module;

$this->title = Yii::t('user', 'Minha conta');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="p-5" style="background-color:#EAE9E9;">
    <div class="bg-white w-25 mt-4 mb-4 mx-auto border rounded">
        <div class="rounded-top text-white" style="background-color: #816;">
            <h1 class="ms-4"><?= Html::encode($this->title) ?></h1>
        </div>
        <div class="mx-auto w-75">
            <?php if ($flash = Yii::$app->session->getFlash("Account-success")) : ?>

                <div class="alert alert-success">
                    <p><?= $flash ?></p>
                </div>

            <?php elseif ($flash = Yii::$app->session->getFlash("Resend-success")) : ?>

                <div class="alert alert-success">
                    <p><?= $flash ?></p>
                </div>

            <?php elseif ($flash = Yii::$app->session->getFlash("Cancel-success")) : ?>

                <div class="alert alert-success">
                    <p><?= $flash ?></p>
                </div>

            <?php endif; ?>

            <?php $form = ActiveForm::begin([
                'id' => 'account-form',
                'options' => ['class' => 'w-100'],
                'fieldConfig' => [
                    'template' => "{label}\n<div class=\"w-100\">{input}</div>\n<div class=\"w-100\">{error}</div>",
                    'labelOptions' => ['class' => 'control-label'],
                ],
                'enableAjaxValidation' => true,
            ]); ?>

            <?php if ($module->useEmail) : ?>
                <?= $form->field($user, 'email') ?>
            <?php endif; ?>

            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">

                    <?php if (!empty($userToken->data)) : ?>

                        <p class="small"><?= Yii::t('user', "Pending email confirmation: [ {newEmail} ]", ["newEmail" => $userToken->data]) ?></p>
                        <p class="small">
                            <?= Html::a(Yii::t("user", "Resend"), ["/user/resend-change"]) ?> / <?= Html::a(Yii::t("user", "Cancel"), ["/user/cancel"]) ?>
                        </p>

                    <?php elseif ($module->emailConfirmation) : ?>

                        <p class="small"><?= Yii::t('user', 'Alterar seu e-mail requer confirmação por e-mail') ?></p>

                    <?php endif; ?>

                </div>
            </div>

            <?php if ($module->useUsername) : ?>
                <?= $form->field($user, 'username') ?>
            <?php endif; ?>

            <?php if ($user->password) : ?>
                <?= $form->field($user, 'currentPassword')->passwordInput() ?>
            <?php endif ?>

            <?= $form->field($user, 'newPassword')->passwordInput() ?>

            <div class="form-group">
                <div>
                    <?= Html::submitButton(Yii::t('user', 'salvar'), ['class' => 'btn btn-primary rounded-pill w-100', 'style'=>'background-color:white; color:#816; border: #816 solid 1px;', 'onmouseenter'=>'alterColorEnter(this)', 'onmouseout'=>'alterColorOut(this)']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>

            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                    <?php foreach ($user->userAuths as $userAuth) : ?>
                        <p>Linked Social Account: <?= ucfirst($userAuth->provider) ?> / <?= $userAuth->provider_id ?></p>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </div>
</div>