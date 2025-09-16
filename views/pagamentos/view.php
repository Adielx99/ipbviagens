<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Pagamentos $model */

$this->title = "Pagamento nº ". $model->Id;
$this->params['breadcrumbs'][] = ['label' => 'Pagamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pagamentos-view mx-auto mt-5 rounded border w-50">
<div class="rounded-top pb-2 text-white" style="background-color: #816;">
<h1 class="ms-2"><?= Html::encode($this->title) ?></h1>
</div>
     <div class="m-3">
     <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Id',
            'Valor_Pago',
            'Data_Pagamento',
        ],
    ]) ?>

     </div>
    <p class="form-group pe-3 d-grid gap-2 mt-1 d-md-flex justify-content-md-end">
        <?= Html::a('Atualizar', ['update', 'Id' => $model->Id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Apagar', ['delete', 'Id' => $model->Id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Pretentdes mesmo remover?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
</div>
