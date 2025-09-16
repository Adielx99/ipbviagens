<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Alunos $model */

$this->title = 'Atualizar dados do aluno: ' . $model->Id;
$this->params['breadcrumbs'][] = ['label' => 'Alunos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id, 'url' => ['view', 'Id' => $model->Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="alunos-update w-50 rounded border mx-auto mt-5 m-3">

    <h1 class="ms-3"><?= Html::encode($this->title) ?></h1>
     <hr>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
