<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Alunos $model */

$this->title = 'Adicionar Aluno';
$this->params['breadcrumbs'][] = ['label' => 'Alunos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="alunos-create mx-auto w-50 rounded border mt-5 mb-4">
<div class="rounded-top text-white" style="background-color: #816;">
<h1 class="ms-2"><?= Html::encode($this->title) ?></h1>
</div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
