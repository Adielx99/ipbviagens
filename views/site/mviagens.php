<?php

use app\models\Inscricoes;
use app\models\Viagens;
use yii\helpers\Html;

/** @var yii\web\View $this */

$this->title = 'Ipbviagens - Resultado';

$inscricoesFeitas = Inscricoes::find()->where(['user_id' => Yii::$app->user->id])->all();




?>

<div class="text-center text-white pt-3 mt-4 fw-bold" style="background-color: #816; margin-bottom: 10px; height: 70px;">
    <h1>Minhas viagens</h1>
</div>

<div class="input-group mb-3 w-50 mx-auto rounded" style="border: #816 solid 1px; ">
    <input type="text" class="form-control" placeholder="filtrar partida">
    <input type="text" class="form-control" placeholder="filtrar chegada">
</div>

<div id="viagens">
    <?php

    if ($inscricoesFeitas) {
        foreach ($inscricoesFeitas as $inscricao) {
            $viagens = Viagens::find()->where(['Id' => $inscricao->viagens_Id])->all();
        }

        foreach ($viagens as $viagem) {
            echo '<div class="card w-50 mx-auto m-2 p-2" style="height: 200px; border: #816 solid 1px;">
                <div class="d-flex justify-content-between p-0">
                  <h2 style="color: #816;">Ipbviagens</h2>
                  <h2>' . Html::encode($viagem->Preco) . '€</h2>
               </div>
               <hr class="mt-2">
               <div class="mt-4 d-flex " style=" height: 120px;">
                  <div class="col-8  w-75">
                    <div class="d-flex justify-content-between">
                       <h3>' . Html::encode($viagem->Ponto_Partida) . '</h3>
                       <h3>' . Html::encode($viagem->Ponto_Chegada) . '</h3>
                    </div>
                    <div class="d-flex justify-content-between">
                       <h6>' . Html::encode($viagem->Data_Partida) . '</h6>
                       <h6>' . Html::encode($viagem->Data_Chegada) . '</h6>
                    </div>
               </div>
                
               <div class="col-4 w-25 h-100 text-end justify-content-between">
                   
                     <a style="color: #816;" href="#" id="openPopup">atividades</a>

    
    <div class="popup-overlay" id="popupOverlay"></div>

    <!-- Pop-up -->
    <div class="popup rounded" id="popup">
        <h2>Informação da Atividade</h2>
        <p>Aqui estão os detalhes da atividade...</p>
        <button class="close-btn rounded-pill" id="closePopup">Fechar</button>
    </div>
                   <div>
                   ' . Html::a('remover', ['mviagens', 'user_id' => Yii::$app->user->id, 'viagens_Id' => $viagem->Id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Queres mesmo remover a sua inscricao?',
                    'method' => 'post',
                ],
            ]) . '
                   </div>
               </div>
           </div>
           </div>
            ';
        }
    } else {
        echo '
        <div class="w-50 mx-auto text-center">
        <p>Não fizeste inscricao ainda...</p>
        </div>
        ';
    }
    ?>
</div>

