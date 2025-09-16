<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Sobre Nós';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="p-5" style="background-color: #BDB8B8;">
    <div class="site-about mx-5 rounded border bg-white">
        <div class="text-white ps-3 pb-3 rounded-top" style="background-color: #816;">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>


        <div class="container">
            <div class="mx-4 border mt-4 p-3 mb-4 rounded">
                <p>Bem-vindo à ipbviagens! Fundada em 2024, nos dedicamos a fornecer os melhores passeios e visitas escolares para os alunos. Nossa missão é inovar constantemente e oferecer soluções eficazes que atendam às necessidades dos alunos do nosso instituto.</p>
            </div>
            <div class="mx-4 border mb-4 p-3 rounded">
                <h2 style="color: #816;">Nossa equipa</h2>
                <hr>
                <div class="team d-flex">
                    <div class="team-member w-25">
                    <?php
                    echo Html::img('@web/imagens/adjel.jpg', ['alt' => Yii::$app->name, 'class' => 'rounded-circle']);
                    ?>
                        <h3>Adjel Soares</h3>
                       <p>
                       <p>Com uma equipe altamente qualificada e comprometida, estamos sempre prontos para enfrentar novos desafios e garantir a satisfação dos alunos.</p>

                       </p>
                    </div>
                    <div class="team-member w-25">
                    <?php
                    echo Html::img('@web/imagens/hednelma.png', ['alt' => Yii::$app->name, 'class' => 'rounded-circle']);
                    ?>
                        <h3>Hednelma Barros</h3>
                        
                    </div>
                    <div class="team-member w-25">
                    <?php
                    echo Html::img('@web/imagens/eudes.png', ['alt' => Yii::$app->name, 'class' => 'rounded-circle']);
                    ?>
                        <h3>Eudes dos Santos</h3>
                       
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>