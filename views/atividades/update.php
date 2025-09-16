<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Atividades $model */

$this->title = 'Atulizar Atividade: ' . $model->Id;
$this->params['breadcrumbs'][] = ['label' => 'Atividades', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id, 'url' => ['view', 'Id' => $model->Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="atividades-update border rounded mx-auto w-50">
<div class="rounded-top pb-3 text-white" style="background-color: #816;">
<h1 class="ms-2" ><?= Html::encode($this->title) ?></h1>
</div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
