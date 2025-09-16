<?php

use app\models\Pagamentos;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\PagamentosSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Pagamentos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pagamentos-index m-3">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Adicionar Pagamentos', ['create'], ['class' => 'btn btn-success', 'style'=>'background-color:white; color:#816; border: #816 solid 1px;', 'onmouseenter'=>'alterColorEnter(this)', 'onmouseout'=>'alterColorOut(this)']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Id',
            'Valor_Pago',
            'Data_Pagamento',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Pagamentos $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'Id' => $model->Id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
