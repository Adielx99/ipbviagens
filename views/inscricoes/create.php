<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Inscricoes $model */

$this->title = 'Inscriver aluno';
$this->params['breadcrumbs'][] = ['label' => 'Inscricoes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inscricoes-create rounded border mx-auto mt-5 mb-3 w-50">
<div class="rounded-top text-white" style="background-color: #816;">
<h1 class="ms-2"><?= Html::encode($this->title) ?></h1>
</div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
