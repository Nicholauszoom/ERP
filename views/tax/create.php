<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Tax $model */

$this->title = 'Create Tax';
$this->params['breadcrumbs'][] = ['label' => 'Taxes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$this->context->layout = 'create_main';
?>
<div class="tax-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
