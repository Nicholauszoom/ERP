<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Idetail $model */

$this->title = 'Update Idetail: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Idetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
$this->context->layout = 'create_main';
?>
<div class="idetail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
