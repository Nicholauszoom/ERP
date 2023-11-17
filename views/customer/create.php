<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Customer $model */

$this->title = 'Create Customer';
$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->context->layout = 'create2_main';
?>
<div class="customer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'invoiceId'=>$invoiceId,
    ]) ?>

</div>
