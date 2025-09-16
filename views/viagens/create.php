<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Viagens $model */

$this->title = 'Adicionar viagem';
$this->params['breadcrumbs'][] = ['label' => 'Viagens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="viagens-create rounded border w-50 mt-5 mb-3 mx-auto">

<div class="rounded-top text-white" style="background-color: #816;">
<div class="rounded-top pb-2 text-white" style="background-color: #816;">
<h1 class="ms-2"><?= Html::encode($this->title) ?></h1>
</div>
</div>
     <?= $this->render('_form', [
        'model' => $model,
        'programs' => $programs
    ]) ?>
</div>
