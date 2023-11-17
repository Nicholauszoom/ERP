<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Pdetail $model */

$this->title = 'Update Pdetail: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pdetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
$this->context->layout = 'create2_main';

?>
<div class="pdetail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
