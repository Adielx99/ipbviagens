<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Atividades $model */

$this->title =  $model->Nome;
$this->params['breadcrumbs'][] = ['label' => 'Atividades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="atividades-view mt-5 mx-auto w-50 rounded border">
<div class="rounded-top text-white" style="background-color: #816;">
<h1 class="ms-2 pb-2"><?= Html::encode($this->title) ?></h1>
</div>
     <div class="ms-3 me-3">
     <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Id',
            'Nome',
            'Descrição',
        ],
    ]) ?>
     </div>

    <p class="form-group pe-3 d-grid gap-2 mt-1 d-md-flex justify-content-md-end">
        <?= Html::a('Atualizar', ['update', 'Id' => $model->Id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Apagar', ['delete', 'Id' => $model->Id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Desejas remover a atividade?',
                'method' => 'post',
            ],
        ]) ?>
    </p>



</div>
