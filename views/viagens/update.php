<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Viagens $model */

$this->title = 'Atualização de viagem nº ' . $model->Id;
$this->params['breadcrumbs'][] = ['label' => 'Viagens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id, 'url' => ['view', 'Id' => $model->Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="viagens-update w-50 mx-auto rounded border mt-5 mb-3">
<div class="rounded-top text-white" style="background-color: #816;">
<h1 class="ms-2 pb-2"><?= Html::encode($this->title) ?></h1>
</div>
     <?= $this->render('_form', [
        'model' => $model,
        'programs' => $programs
    ]) ?>

</div>
