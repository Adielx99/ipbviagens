<?php

use app\models\Inscricoes;
use app\models\Viagens;
use yii\helpers\Html;

/** @var yii\web\View $this */

$this->title = 'Ipbviagens - Resultado';
?>

<div class="text-center text-white pt-3 mt-4 fw-bold" style="background-color: #816; margin-bottom: 10px; height: 70px;">
    <h1>As viagens da semana</h1>
</div>

<div class="input-group mb-3 w-50 mx-auto rounded" style="border: #816 solid 1px; ">
    <input type="text" class="form-control" placeholder="filtrar partida">

    <input type="text" class="form-control" placeholder="filtrar chegada">
</div>

<div id="viagens">

    <?php
    $viagens = Viagens::find()->all();

    if ($viagens) {

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
                    <a style="color: #816;" href="" id="openPopup">atividades</a>    
                    <div class="popup-overlay" id="popupOverlay"></div>    
                        <div class="popup rounded" id="popup">
                            <h2>Informação da Atividade</h2>
                            <p>Aqui estão os detalhes da atividade...</p>
                            <button class="close-btn rounded-pill" id="closePopup">Fechar</button>
                        </div>
                    <div>
                         ' .
                $estaInscrito = Inscricoes::find()->where(['viagens_Id' => $viagem->Id, 'user_id' => Yii::$app->user->id])->exists();
                if(Yii::$app->user->can('admin')){
                   echo Html::a('Editar', ['/viagens/update?Id='.$viagem->Id], ['class' => 'btn btn-primary p-2 mt-auto mb-auto p-0', 'id' => 'reg', 'style' => 'background-color:white; color:#816; border: #816 solid 1px; width: 70px;', 'onmouseenter' => 'alterColorEnter(this)', 'onmouseout' => 'alterColorOut(this)']);
                }
           else if ($estaInscrito) {           
                echo '<button class="btn btn-success p-2 btn-sm" disabled>Já inscrito</button>';
            } else {
                echo Html::button('Inscrever-se', [
                    'class' => 'btn btn-primary p-2',
                    'onclick' => 'inscrever(' . $viagem->Id . ')',
                    'style' => 'background-color:white; color:#816; border: #816 solid 1px;',
                    'onmouseenter' => 'alterColorEnter(this)',
                    'onmouseout' => 'alterColorOut(this)'
                ]);
            }

            echo '</div>' .
                '                    
               </div>
           </div>
           </div>
            ';
        }
    } else {
        echo '<p>Nenhuma viagem encontrada.</p>';
    }
    ?>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function inscrever(viagemId) {
        $.ajax({
            url: 'create.php', // URL do script PHP para lidar com a inscrição
            method: 'POST',
            data: {
                viagens_Id: viagemId,
                user_id: <?= Yii::$app->user->id ?>,
                Pagamento_Id: 1

            },
            success: function(response) {
                alert('Inscrição realizada com sucesso!');
                location.reload();
            },
            error: function() {
                alert('Ocorreu um erro ao realizar a inscrição.');
            }
        });
    }
</script>