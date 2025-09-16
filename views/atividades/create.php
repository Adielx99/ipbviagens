<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Atividades $model */

$this->title = 'Adicionar Atividade';
$this->params['breadcrumbs'][] = ['label' => 'Atividades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="atividades-create mt-5 w-50 mx-auto rounded border">
     <div class="rounded-top text-white" style="background-color: #816;">
     <h1 class="ms-3"><?= Html::encode($this->title) ?></h1>
     </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
