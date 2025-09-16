<?php

use yii\helpers\Html;

/** @var yii\web\View $this */

$this->title = 'Ipbviagens';
?>
<body>
<div class="d-flex h-100 mt-2">
  <div class="col-6 col-md-4 text-center row row-cols-1" style="background-color: #816;">
    <div class="mx-auto p-2 needs-validation">
      <div class="mb-3">
        <input type="text" for = "parture" name="parture" class="form-control mx-auto mt-5 p-2 w-75" id="parture" aria-describedby="textHelp" placeholder="Partida" required>
      </div>
      <div class="mb-3">
        <input type="text" name="parture" class="form-control mx-auto p-2 w-75" id="exampleInput-text" placeholder="Chegada" required>
      </div>
      <p>
        <?= Html::a('Pesquisar', ['resultadobusca'], ['class' => 'btn btn-primary mx-auto p-2 w-75 rounded-pill','style'=>'background-color:#816; color:white; border: white solid 2px;', 'onmouseenter'=>'alterColorEnterr(this)', 'onmouseout'=>'alterColorOutt(this)']) ?>
      </p>

    </div>

    <div class="ratio mx-auto p-2 ratio-16x9">
      <iframe class="embed-responsive-item" style="width: 100%;" src="https://maps.google.com/maps?width=100%&amp;height=100%&amp;hl=en&amp;q=Portugal, Bragança&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed" allowfullscreen="" loading="lazy"></iframe>
    </div>
  </div>

  <div class="col-sm-6 col-md-8 mx-auto">
    <div class="mb-5 border-bottom">
      <p class="itim-text ms-4 mt-4">Ipbviagens</p>
    </div>
    <div class="card mb-3 mx-auto" style="max-width: 90%; height: 200px;">
      <div class="row g-0">
        <div class="col-md-8" style="height: 200px;">
          <?php
          $directory = 'imagens/';
          $imageName = 'bragança.png';
          $imagePath = $directory . $imageName;
          echo '<img class="w-100 h-100 rounded-start" src="' . $imagePath . '" alt="Descrição da Imagem">';
          ?>
        </div>
        <div class="col-md-4">
          <div class="card-body">
            <p class="card-text">Encontra aqui as viagens emocionantes.</p>
            <div class="d-grid gap-2">
            <?= Html::a('encontrar', ['resultadobusca'], ['class' => 'btn btn-outline-primary','style'=>'background-color:white; color:#816; border: #816 solid 1px; height:40px;', 'onmouseenter'=>'alterColorEnter(this)', 'onmouseout'=>'alterColorOut(this)']) ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-1 mb-4 mx-auto" style="max-width: 90%;">
      <div class="col">
        <div class="card h-100">
          <div style="height: 150px;">
            <?php
            $directory = 'imagens/';
            $imageName = 'coimbra.jpg';
            $imagePath = $directory . $imageName;
            echo '<img class="card-img-top" style="height: 100%;" src="' . $imagePath . '" alt="Descrição da Imagem">';
            ?>
          </div>
          <div class="card-body rounded-bottom d-flex justify-content-between h-25" id="corpoCard">
            <p class="card-text text-lg-start" id="txt">Viagens para Coimbra.</p>
            <?= Html::a('encontrar', ['resultadobusca'], ['class' => 'btn btn-outline-primary h-50 p-0','style'=>'background-color:white; color:#816; border: #816 solid 1px;', 'onmouseenter'=>'alterColorEnter(this)', 'onmouseout'=>'alterColorOut(this)']) ?>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100">
          <div style="height: 150px;">
            <?php
            $directory = 'imagens/';
            $imageName = 'Porto.jpeg';
            $imagePath = $directory . $imageName;
            echo '<img class="card-img-top" style="height: 100%;" src="' . $imagePath . '" alt="Descrição da Imagem">';
            ?>
          </div>
          <div class="card-body rounded-bottom d-flex justify-content-between h-25" id="corpoCard">
            <p class="card-text text-lg-start" id="txt">Viagens para Porto.</p>
            <?= Html::a('encontrar', ['resultadobusca'], ['class' => 'btn btn-outline-primary h-50 p-0','style'=>'background-color:white; color:#816; border: #816 solid 1px;', 'onmouseenter'=>'alterColorEnter(this)', 'onmouseout'=>'alterColorOut(this)']) ?>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100">
          <div style="height: 150px;">
            <?php
            $directory = 'imagens/';
            $imageName = 'Lisboa.jpeg';
            $imagePath = $directory . $imageName;
            echo '<img class="card-img-top" style="height: 100%;" src="' . $imagePath . '" alt="Descrição da Imagem">';
            ?>
          </div>
          <div class="card-body rounded-bottom d-flex justify-content-between h-auto" id="corpoCard">
            <p class="card-text text-lg-start" id="txt">Viagens para Guarda.</p>
            <?= Html::a('encontrar', ['resultadobusca'], ['class' => 'btn btn-outline-primary h-50 p-0','style'=>'background-color:white; color:#816; border: #816 solid 1px;', 'onmouseenter'=>'alterColorEnter(this)', 'onmouseout'=>'alterColorOut(this)']) ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<script>
    function alterColorEnterr(butao){
        butao.style.backgroundColor = 'white';
        butao.style.color = '#816';
    }

    function alterColorOutt(butao){
        butao.style.backgroundColor = '#816';
        butao.style.color = 'white';
    }
    $(document).ready(function() {
            var availableLocations = [
                "São Paulo",
                "Rio de Janeiro",
                "Belo Horizonte",
                "Brasília",
                "Curitiba",
                "Porto Alegre",
                "Salvador",
                "Fortaleza",
                "Recife",
                "Manaus"
                // Adicione mais locais conforme necessário
            ];

            $("#parture, #exampleInput-text").autocomplete({
                source: availableLocations
            });
        });
</script>
</body>


