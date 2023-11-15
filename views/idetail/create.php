<?php

use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\Idetail $model */

$this->title = 'Create Idetail';
$this->params['breadcrumbs'][] = ['label' => 'Idetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->context->layout = 'create2_main';
?>
<div style="margin-left:0%;">
<a href="" class="back-arrow" style="color:blue;">
    <span class="fas fa-arrow-left"></span> Back
</a>
<a href="<?= Url::to(['customer/create', 'id' => $invoiceId]) ?>" class="back-arrow" style="color:blue;">
    Next <span class="fas fa-arrow-right"></span>
</a>

</div>


<div class="idetail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'total_amount'=>$total_amount,
        'invoice_details'=>$invoice_details,
        'invoiceId'=>$invoiceId,
    ]) ?>

</div>
