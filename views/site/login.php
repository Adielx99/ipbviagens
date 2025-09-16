<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var amnah\yii2\user\models\forms\LoginForm $model
 */

$this->title = Yii::t('user', 'Login');
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="user-default-login bg-white rounded border mx-auto w-25 ">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="p-2">
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3 w-100\">{input}</div>\n<div class=\"col-lg-7\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-2 control-label'],
        ],

    ]); ?>

    <?= $form->field($model, 'email') ?>
    <?= $form->field($model, 'password')->passwordInput() ?>
   
    <div class ="d-flex w-100 text-center">
    Ainda não tens conta?
    <?= Html::a(Yii::t("user", "Regista aqui"), ["/user/register"], ['style'=> 'color:#816']) ?>
    </div>

    <div class="form-group">
        <div>
            <?= Html::submitButton(Yii::t('user', 'Login'), ['class' => 'btn btn-primary rounded-pill w-100 mt-4', 'style'=>'background-color:#816; color:#white; border: #816 solid 1px;', 'onmouseenter'=>'alterColorEnterr(this)', 'onmouseout'=>'alterColorOutt(this)']) ?>
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