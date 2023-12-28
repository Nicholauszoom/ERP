<?php

use app\models\Product;
use app\models\Supplier;
use app\models\Tax;
use app\models\User;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Purchase $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Purchases', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$this->context->layout = 'create2_main';
?>
<div class="purchase-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute'=>'product',
                'format'=>'raw',
                'value'=>function ($model){
                    $product = Product::findOne($model->product);
                    $prod = $product ? $product->name : 'Unknown';
                     return $prod;
                },
            ],
            [
                'attribute' => 'price',
                'value' => function ($model) {
                    return number_format($model->price, 2, '.', ',');
                },
            ],
            'quantity',
            [
                'attribute' => 'amount',
                'value' => function ($model) {
                    return number_format($model->amount, 2, '.', ',');
                },
            ],
           
            [
                'attribute' => 'transport',
                'value' => function ($model) {
                    return number_format($model->transport, 2, '.', ',');
                },
            ],
            
             
            [
                'attribute' => 'expenses',
                'value' => function ($model) {
                    return number_format($model->expenses, 2, '.', ',');
                },
            ],

            [
                'attribute'=>'tax_id',
                'format'=>'raw',
                'value'=>function ($model){
                    $tax = Tax::findOne($model->tax_id);
                    $method = $tax ? $tax->method : 'Unknown';
                     return $method;
                },
            ],
           
            [
                'attribute' => 'profit',
                'value' => function ($model) {
                    return number_format($model->profit, 2, '.', ',');
                },
            ],
            
            [
                'attribute' => 'sale',
                'value' => function ($model) {
                    return number_format($model->sale, 2, '.', ',');
                },
            ],
            [
                'attribute'=>'supplier_id',
                'format'=>'raw',
                'value'=>function ($model){
                    $supplier = Supplier::findOne($model->supplier_id);
                    $company = $supplier ? $supplier->company : 'Unknown';
                     return $company;
                },
            ],
            [
                'attribute' => 'created_at',
                'format' => ['date', 'php:Y-m-d H:i:s'],
            ],
            [
                'attribute' => 'updated_at',
                'format' => ['date', 'php:Y-m-d H:i:s'],
            ],            
            'created_by',
            [
                'attribute'=>'created_by',
                'format'=>'raw',
                'value'=>function ($model){
                    $user = User::findOne($model->created_by);
   
                    $name = $user ? $user->username : 'Unknown';
                     return $name;
                },
            ],
        ],
    ]) ?>

</div>
