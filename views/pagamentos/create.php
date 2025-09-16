<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Pagamentos $model */

$this->title = 'Adicionar Pagamentos';
$this->params['breadcrumbs'][] = ['label' => 'Pagamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pagamentos-create w-50 mx-auto mt-5 rounded border">
<div class="rounded-top text-white" style="background-color: #816;">
<h1 class="ms-2"><?= Html::encode($this->title) ?></h1>
</div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
