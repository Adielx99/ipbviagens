<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var amnah\yii2\user\models\User $user
 */

$this->title = $user->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('user', 'Alunos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="">
<div class="user-view mx-auto w-50 border rounded">

<div class="rounded-top text-white" style="background-color: #816;">
<h1 class="ms-2"><?= Html::encode($this->title) ?></h1>
</div>

<div class="p-3">
<?= DetailView::widget([
        'model' => $user,
        'attributes' => [
            'id',
            'username',
            'profile.full_name',
            'email:email',
            'password',
            
        ],
    ]) ?>
</div>

        <p class="form-group pe-3 d-grid gap-2 mt-1 d-md-flex justify-content-md-end">
        <?= Html::a(Yii::t('user', 'Atualizar'), ['update', 'id' => $user->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('user', 'Apagar'), ['delete', 'id' => $user->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('user', 'Tens certeza que quer remover este aluno?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
</div>
</div>
