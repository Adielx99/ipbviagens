<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Inscricoes $model */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Inscricoes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="inscricoes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'user_id' => $model->user_id, 'viagens_Id' => $model->viagens_Id, 'Id' => $model->Id, 'Pagamentos_Id' => $model->Pagamentos_Id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Apagar', ['delete', 'user_id' => $model->user_id, 'viagens_Id' => $model->viagens_Id, 'Id' => $model->Id, 'Pagamentos_Id' => $model->Pagamentos_Id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Desejas mesmo remover?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'user_id',
            'viagem_Id',
            'Data',
            'Pago',
            'Id',
            'Pagamentos_Id',
        ],
    ]) ?>

</div>
