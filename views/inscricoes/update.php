<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Inscricoes $model */

$this->title = 'Atualizar Inscricoes: ' . $model->user_id;
$this->params['breadcrumbs'][] = ['label' => 'Inscricoes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->user_id, 'url' => ['view', 'user_id' => $model->user_id, 'viagens_Id' => $model->viagens_Id, 'Id' => $model->Id, 'Pagamentos_Id' => $model->Pagamentos_Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="inscricoes-update">
<div class="rounded-top pb-2 text-white" style="background-color: #816;">
<h1 class="ms-2"><?= Html::encode($this->title) ?></h1>
</div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
