<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PurchDetail $model */

$this->title = 'Create Purch Detail';
$this->params['breadcrumbs'][] = ['label' => 'Purch Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->context->layout = 'create2_main';

?>
<div class="pdetail-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'purchase_details'=>$purchase_details,
        'purchaseId'=>$purchaseId,
        'total_amount'=>$total_amount,
    ]) ?>

</div>