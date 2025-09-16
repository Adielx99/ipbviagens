<?php

/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */
/** @var Exception$exception */

use yii\helpers\Html;

$this->title = 'Ups!...';
?>
<div class="site-error text-center m-5">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="mx-auto w-75" style="height: 350px;">
        <?php
        echo Html::img('@web/imagens/pnotf.png', ['alt' => Yii::$app->name, 'class' => 'h-100 w-100']);
        ?>
    </div>
</div>

</div>