<?php

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\captcha\Captcha;

$this->title = 'Perguntas frequentes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="p-5" style="background-color:#EAE9E9;">
    <div class="d-flex">
        <div class="rounded-5 mx-auto w-100 d-flex bg-white" style="border:#816 1px solid; color: #816;">
            <div class="m-3">
                <h1><?= Html::encode($this->title) ?></h1>
                <p>Navegue pelos nossos contactos abaixo ou utilize o nosso formulário para nos contactar</p>
            </div>
            <div class="rounded-5">
                <?php
                echo Html::img('@web/imagens/FAQ_img.jpg', ['alt' => Yii::$app->name, 'class' => 'h-100 rounded-5']);
                ?>
            </div>
        </div>
    </div>


    <div class="rounded-5 mx-auto w-100 mt-4 d-flex bg-white d-flex" style="border:#816 1px solid;">
        <div>
            <div class="w-50">
                <div class="ms-4 p-0" style="font-weight: bold; font-size: 40px; color:#816;">
                    <p class="p-0">Assunto</p>
                </div>
            </div>
            <div class="definicoes border-top w-100 m-0 d-flex">
                <div class="col-4 border-end p-2">
                    <div class="border-bottom">
                        <div class="w-100 p-2" name="selecao" id="selecionado" onclick="selecionar('pergunta1', this)">
                            <h6>Qual é a política de cancelamento e reembolso?</h6>
                        </div>
                    </div>
                    <div class="border-bottom">
                        <div class="w-100 p-2" name="selecao" id="selecionado" onclick="selecionar('pergunta2', this)">
                            <h6>Como posso alterar minha reserva?</h6>
                        </div>
                    </div>
                    <div>
                        <div class="w-100 p-2" name="selecao" id="selecionado" onclick="selecionar('pergunta3', this)">
                            <h6>Quais são os requisitos de documentação para minha viagem?</h6>
                        </div>
                    </div>

                    <div class="border-bottom">
                        <div class="w-100 p-2" name="selecao" id="selecionado" onclick="selecionar('pergunta4', this)">
                            <h6>Como faço para entrar em contato em caso de emergência durante a viagem?</h6>
                        </div>
                    </div>
                </div>
                <div class="col-8" id="obs">
                 <p class="text-center mt-2"><<<<<<<<<<<<< Selecione o seu assunto pertinete do lado esquerdo >>>>>>>>>></p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function selecionar(option, selecionado) {

        switch (option) {
            case 'avatar':
                document.getElementById("obs").innerHTML = getAvatar();
                break;
            case 'dados':
                document.getElementById("obs").innerHTML = getDados();
                break;
            case 'pergunta1':
                document.getElementById("obs").innerHTML = getResposta(1);
                break;
            case 'pergunta2':
                document.getElementById("obs").innerHTML = getResposta(2);
                break;
            case 'pergunta3':
                document.getElementById("obs").innerHTML = getResposta(3);
                break;
            case 'pergunta4':
                document.getElementById("obs").innerHTML = getResposta(4);
                break;
        }
        selecionarAvatar(selecionado);
    }

    function getResposta(numero) {
        var avata;
        switch (numero) {
            case 1:
                avata =
                    `    
        <p class = "mx-auto p-2 text-dark ms-2 me-4">
           Muitos clientes querem saber sobre as políticas
           de cancelamento e reembolso antes de reservar uma
           viagem. Explique claramente as condições em que é
           possível cancelar uma reserva e se há algum custo 
           associado a isso. Detalhe também como os reembolsos 
           são processados e em quanto tempo podem ser esperados.
        </p>
        `
                break;
            case 2:
                avata =
                    `    
        <p class = "mx-auto text-dark p-2 ms-2 me-4">
        Os clientes podem precisar fazer alterações em suas reservas devido a imprevistos ou mudanças de planos. Forneça informações sobre como eles podem fazer alterações em suas reservas, sejam elas datas de viagem, destinos ou outros detalhes, e se há alguma taxa associada a essas alterações.
        </p>
        `
                break;

            case 3:
                avata =
                    `    
        <p class = "mx-auto text-dark p-2 ms-2 me-4">
           Muitas vezes, os viajantes têm dúvidas sobre os documentos necessários para sua viagem, como passaportes, vistos e cartões de vacinação. Forneça orientações claras sobre os requisitos de documentação para diferentes destinos e tipos de viagem, e recomende que os clientes verifiquem os requisitos atualizados antes de viajar.
        </p>
        `
                break;

            case 4:
                avata =
                    `    
        <p class = "mx-auto text-dark p-2 ms-2 me-4">
            É importante que os clientes saibam como entrar em contato com a agência em caso de emergência durante a viagem. Forneça informações de contato de emergência, como números de telefone ou endereços de e-mail, e explique os procedimentos a serem seguidos em caso de emergência, como problemas de saúde, cancelamentos de voos ou perda de documentos.
        </p>
        `
                break;

        }
        return avata;
    }

    function selecionarAvatar(selected) {
        var limpa = document.getElementsByName('selecao');
        for (var i = 0; i < limpa.length; i++) {
            limpa[i].style.border = 'white solid 1px';
            limpa[i].style.color = 'black';
        }
        var avatar = document.getElementById("selecionado");
        avatar.src = selected.src;
        selected.style.border = '#816 solid 1px';
        selected.style.color = '#816';
    }
</script>