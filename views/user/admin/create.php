<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var amnah\yii2\user\models\User $user
 * @var amnah\yii2\user\models\Profile $profile
 */

$this->title = Yii::t('user', 'Criar Alunos-Usuarios', [
  'modelClass' => 'User',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('user', 'Alunos - Usuarios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="p-5" style="background-color: #BDB8B8; height: 1000px;">
<div class="user-create bg-white mx-auto w-50 border rounded mt-4 mb-5">
     <div class="rounded-top" style="background-color: #816;">
     <h1 class="ms-4 text-white"><?= Html::encode($this->title) ?></h1>
     </div>
     <div class="p-2">
     <?= $this->render('_form', [
        'user' => $user,
        'profile' => $profile,
    ]) ?>
     </div>


</div>
</div>