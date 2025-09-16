<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/imagens/logo.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <style>
 
    .popup {
        display: none;

        position: fixed;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        border: 1px solid #ccc;
        background-color: white;
        padding: 20px;
        z-index: 1000;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    }

  
    .popup-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.7);
        z-index: 999;
    }
    .close-btn {
        display: inline-block;
        margin-top: 20px;
        padding: 10px 20px;
        background-color: #816;
        color: white;
        cursor: pointer;
        border: none;
    }
</style>
</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

    <header class="mb-4" id="header">

        <?php
        NavBar::begin([
            'brandLabel' => Html::img('@web/imagens/logo.png', ['alt' => Yii::$app->name, 'style' => 'height:40px;']),
            'brandUrl' => Yii::$app->homeUrl,
            'options' => ['class' => 'navbar-expand-md navbar-white border-bottom bg-white fixed-top w-100 p-0']
        ]);
        echo Nav::widget([

            'options' => ['class' => 'navbar-nav text-black w-100 justify-content-between', 'style' => 'margin-left:270px;'],
            'items' => [
                ['label' => 'Inicial', 'url' => ['/site']],
                ['label' => 'Contacto', 'url' => ['/site/contact']],
                ['label' => 'FAQ', 'url' => ['/site/faq']],
                ['label' => 'Sobre nós', 'url' => ['/site/sobre']],
                [
                    'label' => 'Admin', 'url' => '#',
                    'visible' => Yii::$app->user->can('admin'),
                    'items' => [
                        ['label' => 'Gerir alunos/usuarios', 'url' => ['/user/admin']],
                        ['label' => 'Gerir atividades', 'url' => ['/atividades/index']],
                        ['label' => 'Gerir inscriçoes', 'url' => ['/inscricoes/index']],
                        ['label' => 'Gerir pagamentos', 'url' => ['/pagamentos/index']],
                        ['label' => 'Gerir viagens', 'url' => ['/viagens/index']],
                    ]
                ],

                [
                    'label' => 'aluno', 'url' => ['/user/admin'],
                    'visible' => Yii::$app->user->can('aluno'),
                    'items' => [
                        ['label' => 'Minhas viagens', 'url' => ['/site/mviagens']],
                        ['label' => 'Gerir conta', 'url' => ['/user/account']],
                    ]
                ],

                '<li class="nav-item w-50 d-grid gap-2 d-flex justify-content-md-end">' . (
                    Yii::$app->user->isGuest
                    ? Html::a('Login', ['/user/login'], ['class' => 'btn btn-success rounded-pill mt-auto mb-auto p-0', 'id' => 'log', 'style' => 'background-color:white; color:#816; border: #816 solid 1px; width: 70px;', 'onmouseenter' => 'alterColorEnter(this)', 'onmouseout' => 'alterColorOut(this)']) .
                    Html::a('Registar', ['/user/register'], ['class' => 'btn btn-success rounded-pill mt-auto mb-auto p-0', 'id' => 'reg', 'style' => 'background-color:white; color:#816; border: #816 solid 1px; width: 70px;', 'onmouseenter' => 'alterColorEnter(this)', 'onmouseout' => 'alterColorOut(this)'])
                    : Html::beginForm(['/user/logout'])
                    . Html::submitButton(
                        'Logout',
                        ['class' => 'nav-link btn btn-link rounded-pill logout mt-auto mb-auto p-0', 'style' => 'background-color:white; color:#816; border: #816 solid 1px; width: 60px;', 'onmouseenter' => 'alterColorEnter(this)', 'onmouseout' => 'alterColorOut(this)']
                    )
                    . Html::endForm()
                ) . '</li>'
            ]
        ]);
        NavBar::end();
        ?>
    </header>

    <main id="main" onload="setPartChegada('partida', 'chegada')" class="flex-shrink-0" role="main">
        <div class="myconteiner">
            <?php if (!empty($this->params['breadcrumbs'])) : ?>
                <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
            <?php endif ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </main>

    <footer id="footer" class="mt-auto py-3 bg-light">
        <div class="container">
            <div class="row text-muted">
                <div class="text-center">&copy; copyright <?= date('Y') ?></div>
            </div>
        </div>
    </footer>

    <?php $this->endBody() ?>
    <script>
        function alterColorEnter(butao) {
            butao.style.backgroundColor = '#816';
            butao.style.color = 'white';
        }

        function alterColorOut(butao) {
            butao.style.backgroundColor = 'white';
            butao.style.color = '#816';
        }
    </script>


    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="/ipbviagens/javascript/script"></script>
    <script>
        $(document).ready(function() {
            var availableLocations = [
              "Aveiro", "Águeda", "Ovar", "Ílhavo", "Espinho", "Oliveira de Azeméis", "São João da Madeira", "Albergaria-a-Velha", "Anadia", "Estarreja", "Mealhada", "Sever do Vouga", "Vagos",
                "Beja", "Aljustrel", "Castro Verde", "Moura", "Odemira", "Serpa", "Vidigueira", "Almodôvar", "Alvito", "Barrancos", "Cuba", "Ferreira do Alentejo", "Mértola", "Ourique",
                "Braga", "Barcelos", "Fafe", "Guimarães", "Vila Nova de Famalicão", "Vizela", "Amares", "Cabeceiras de Basto", "Celorico de Basto", "Esposende", "Póvoa de Lanhoso", "Terras de Bouro", "Vila Verde",
                "Bragança", "Miranda do Douro", "Macedo de Cavaleiros", "Mirandela", "Alfândega da Fé", "Carrazeda de Ansiães", "Freixo de Espada à Cinta", "Mogadouro", "Torre de Moncorvo", "Vimioso", "Vinhais",
                "Castelo Branco", "Covilhã", "Fundão", "Idanha-a-Nova", "Penamacor", "Vila Velha de Ródão", "Belmonte", "Oleiros", "Proença-a-Nova", "Sertã", "Vila de Rei",
                "Coimbra", "Figueira da Foz", "Montemor-o-Velho", "Lousã", "Miranda do Corvo", "Penacova", "Soure", "Arganil", "Cantanhede", "Condeixa-a-Nova", "Góis", "Mealhada", "Oliveira do Hospital", "Pampilhosa da Serra", "Penela", "Tábua", "Vila Nova de Poiares",
                "Évora", "Estremoz", "Montemor-o-Novo", "Redondo", "Reguengos de Monsaraz", "Vendas Novas", "Alandroal", "Arraiolos", "Borba", "Mora", "Mourão", "Portel", "Viana do Alentejo", "Vila Viçosa",
                "Faro", "Albufeira", "Loulé", "Portimão", "Lagos", "Tavira", "Silves", "Vila Real de Santo António", "Alcoutim", "Aljezur", "Castro Marim", "Lagoa", "Monchique", "Olhão", "São Brás de Alportel", "Vila do Bispo",
                "Guarda", "Seia", "Gouveia", "Trancoso", "Sabugal", "Pinhel", "Figueira de Castelo Rodrigo", "Aguiar da Beira", "Almeida", "Celorico da Beira", "Fornos de Algodres", "Manteigas", "Mêda", "Vila Nova de Foz Côa",
                "Leiria", "Alcobaça", "Caldas da Rainha", "Marinha Grande", "Nazaré", "Peniche", "Pombal", "Batalha", "Bombarral", "Castanheira de Pera", "Figueiró dos Vinhos", "Pedrógão Grande", "Porto de Mós", "Alvaiázere", "Ansião",
                "Lisboa", "Sintra", "Oeiras", "Cascais", "Loures", "Amadora", "Odivelas", "Almada", "Seixal", "Barreiro", "Montijo", "Mafra", "Sesimbra", "Vila Franca de Xira", "Azambuja", "Cadaval", "Lourinhã", "Sobral de Monte Agraço", "Torres Vedras", "Alenquer", "Arruda dos Vinhos",
                "Portalegre", "Elvas", "Ponte de Sor", "Campo Maior", "Nisa", "Gavião", "Alter do Chão", "Arronches", "Avis", "Castelo de Vide", "Crato", "Fronteira", "Marvão", "Monforte", "Sousel",
                "Porto", "Matosinhos", "Vila Nova de Gaia", "Maia", "Gondomar", "Póvoa de Varzim", "Valongo", "Vila do Conde", "Espinho", "Amarante", "Baião", "Felgueiras", "Lousada", "Marco de Canaveses", "Paços de Ferreira", "Paredes", "Penafiel", "Santo Tirso", "Trofa",
                "Santarém", "Abrantes", "Almeirim", "Cartaxo", "Tomar", "Torres Novas", "Ourém", "Rio Maior", "Alcanena", "Almeirim", "Alpiarça", "Benavente", "Chamusca", "Constância", "Coruche", "Entroncamento", "Ferreira do Zêzere", "Golegã", "Mação", "Salvaterra de Magos", "Sardoal", "Vila Nova da Barquinha",
                "Setúbal", "Alcácer do Sal", "Montijo", "Sesimbra", "Sines", "Barreiro", "Moita", "Palmela", "Santiago do Cacém", "Seixal", "Almada", "Grândola", "Alcochete",
                "Viana do Castelo", "Ponte de Lima", "Caminha", "Arcos de Valdevez", "Monção", "Melgaço", "Paredes de Coura", "Ponte da Barca", "Valença", "Vila Nova de Cerveira",
                "Vila Real", "Chaves", "Régua", "Valpaços", "Vila Pouca de Aguiar", "Alijó", "Boticas", "Mesão Frio", "Mondim de Basto", "Montalegre", "Murça", "Ribeira de Pena", "Sabrosa", "Santa Marta de Penaguião",
                "Viseu", "Lamego", "Tondela", "Oliveira de Frades", "S. Pedro do Sul", "Sátão", "Mortágua", "Nelas", "Penalva do Castelo", "Penedono", "Resende", "Santa Comba Dão", "São João da Pesqueira", "Sernancelhe", "Tabuaço", "Tarouca", "Vouzela"
            ];

            $("#parture, #exampleInput-text").autocomplete({
                source: availableLocations
            });
        });
    </script>

<script>
  
  const openPopup = document.getElementById('openPopup');
  const closePopup = document.getElementById('closePopup');
  const popup = document.getElementById('popup');
  const popupOverlay = document.getElementById('popupOverlay');


  openPopup.addEventListener('click', function(event) {
      event.preventDefault();
      popup.style.display = 'block';
      popupOverlay.style.display = 'block';
  });

 
  closePopup.addEventListener('click', function() {
      popup.style.display = 'none';
      popupOverlay.style.display = 'none';
  });


  popupOverlay.addEventListener('click', function() {
      popup.style.display = 'none';
      popupOverlay.style.display = 'none';
  });
</script>

<script>
    $(document).ready(function() {
        $("#piker").datepicker({
            dateFormat: 'yy-mm-dd'
        });

        $("#piker2").datepicker({
            dateFormat: 'yy-mm-dd'
        });
    });
</script><script>
    $(document).ready(function() {
        $("#piker").datepicker({
            dateFormat: 'yy-mm-dd'
        });

        $("#piker2").datepicker({
            dateFormat: 'yy-mm-dd'
        });
    });
</script>
</body>

</html>
<?php $this->endPage() ?>