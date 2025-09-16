<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var amnah\yii2\user\models\User $user
 * @var amnah\yii2\user\models\Profile $profile
 */

$this->title = Yii::t('user', 'Dados de ', [
  'modelClass' => 'User',
]) . ' ' . $user->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('user', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $user->id, 'url' => ['view', 'id' => $user->username]];
$this->params['breadcrumbs'][] = Yii::t('user', 'Update');
?>

<div class="p-5" style="background-color: #BDB8B8; height: 1000px;">
<div class="user-update bg-white w-50 mx-auto rounded border">
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
