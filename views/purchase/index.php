<?php

use app\models\Product;
use app\models\Purchase;
use app\models\Supplier;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\PurchaseSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Purchases';
$this->params['breadcrumbs'][] = $this->title;
$this->context->layout = 'create2_main';
?>
<div class="purchase-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Purchase', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

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
                'attribute'=>'supplier_id',
                'format'=>'raw',
                'value'=>function ($model){
                    $supplier = Supplier::findOne($model->supplier_id);
                    $company = $supplier ? $supplier->company : 'Unknown';
                     return $company;
                },
            ],
            //'transport',
            //'expenses',
            //'tax_id',
            //'profit',
            //'sale',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Purchase $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
