<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Alunos $model */

$this->title = "a". $model->Id;
$this->params['breadcrumbs'][] = ['label' => 'Alunos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="alunos-view mx-auto mt-5 rounded border w-50">

    <h1 class="ms-3"><?= Html::encode($this->title) ?></h1>
     <hr>
     <div class="ms-3 me-3">
     <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Id',
            'palavra_passe',
            'Nome',
            'IsAdmin',
            'email',
        ],
    ]) ?>
    </div>
    <div class="m-3 justify-content-between">
        <?= Html::a('Atulizar', ['update', 'Id' => $model->Id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Apagar', ['delete', 'Id' => $model->Id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </div>

</div>
