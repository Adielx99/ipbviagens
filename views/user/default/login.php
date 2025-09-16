<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var amnah\yii2\user\models\forms\LoginForm $model
 */

$this->title = Yii::t('user', 'Ipbviagens-login');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="w-100 p-5" style="background-color: #BDB8B8; height: 1000px;">
    <div class="user-default-login bg-white rounded border mx-auto w-25">
        <?=  Html::img('@web/imagens/logo.png', ['alt' => Yii::$app->name,'class' => 'ms-4 mt-2', 'style' => 'height:40px; '])?>
        <hr>
        <div class="p-2">
        <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "<div class=\"w-100\">{label}</div>\n<div class=\"col-lg-3 w-100\">{input}</div>\n<div class=\"col-lg-7\">{error}</div>",
            'labelOptions' => ['class' => 'control-label'],
        ],

    ]); ?>

    <?= $form->field($model, 'email') ?>
    <?= $form->field($model, 'password')->passwordInput() ?>
   
    <div class="text-center mx-auto w-75 d-flex">
        <p style="font-size: 13px;">Ainda não tens conta?</p>
    <?= Html::a(Yii::t("user", "Regista aqui"), ["/user/register"],['class'=>'p-0','style'=>'color:#816; font-size: 13px;']) ?>
    </div>
    <div class="form-group mt-3">
        <div>
            <?= Html::submitButton(Yii::t('user', 'Login'), ['class' => 'btn btn-primary mx-auto p-2 w-100 rounded-pill','style'=>'background-color:#816; color:white; border: #816 solid 1px;', 'onmouseenter'=>'alterColorEnterr(this)', 'onmouseout'=>'alterColorOutt(this)']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

    <?php if (Yii::$app->get("authClientCollection", false)): ?>
        <div class="col-lg-offset-2 col-lg-10">
            <?= yii\authclient\widgets\AuthChoice::widget([
                'baseAuthUrl' => ['/user/auth/login']
            ]) ?>
        </div>
    <?php endif; ?>

    <div class="col-lg-offset-2" style="color:#999;">
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