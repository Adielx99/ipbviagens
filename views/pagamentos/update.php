<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Pagamentos $model */

$this->title = 'Atualizar Pagamentos: ' . $model->Id;
$this->params['breadcrumbs'][] = ['label' => 'Pagamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id, 'url' => ['view', 'Id' => $model->Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pagamentos-update mx-auto mt-5 mb-3 rounded border w-50">

<div class="rounded-top text-white" style="background-color: #816;">
<h1 class="ms-2"><?= Html::encode($this->title) ?></h1>
</div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
