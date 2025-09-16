<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Viagens $model */

$this->title = "Viagem nº ". $model->Id;
$this->params['breadcrumbs'][] = ['label' => 'Viagens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="viagens-view mx-auto w-50 rounded border mt-5 mb-3">
<div class="rounded-top text-white" style="background-color: #816;">
<h1 class="ms-2 pb-2"><?= Html::encode($this->title) ?></h1>
</div>
     <div class="m-3">
     <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Id',
            'Data_Partida',
            'Data_Chegada',
            'Ponto_Partida',
            'Ponto_Chegada',
            'Preco',
        ],
    ]) ?>
     </div>
    <p class="me-3 form-group d-grid gap-2 mt-1 d-md-flex justify-content-md-end"">
        <?= Html::a('Atualizar', ['update', 'Id' => $model->Id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Apagar', ['delete', 'Id' => $model->Id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
</div>
