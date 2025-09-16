<?php

use app\models\Inscricoes;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\InscricoesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Inscrições';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inscricoes-index m-3">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Fazer Inscrição', ['create'], ['class' => 'btn btn-success', 'style'=>'background-color:white; color:#816; border: #816 solid 1px;', 'onmouseenter'=>'alterColorEnter(this)', 'onmouseout'=>'alterColorOut(this)']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'user_id',
            'viagens_Id',
            'Data',
            'Pago',
            'Id',
            //'Pagamentos_Id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Inscricoes $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'user_id' => $model->user_id, 'viagens_Id' => $model->viagens_Id, 'Id' => $model->Id, 'Pagamentos_Id' => $model->Pagamentos_Id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
