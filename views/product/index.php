<?php

use app\models\Product;
use app\models\Purchase;
use app\models\Stock;
use app\models\Supplier;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\data\ArrayDataProvider;
use yii\helpers\ArrayHelper;


/** @var yii\web\View $this */
/** @var app\models\ProductSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;

$this->context->layout = 'create2_main';
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
      <!--  <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>-->
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php // echo $this->render('_search', ['model' => $searchModel]);
    $purchases = Purchase::find()->all();

    // Group the purchases by product and supplier_id
    $groupedPurchases = ArrayHelper::index($purchases, null, ['product', 'supplier_id']);

    // Prepare the data for the GridView
    $data = [];
    foreach ($groupedPurchases as $product => $supplierPurchases) {
        foreach ($supplierPurchases as $supplierId => $purchases) {
            $quantitySum = array_sum(ArrayHelper::getColumn($purchases, 'quantity'));
            $amountSum = array_sum(ArrayHelper::getColumn($purchases, 'amount'));
            $saleSum = array_sum(ArrayHelper::getColumn($purchases, 'sale'));
            $count = count($purchases);
            $saleAverage = $count > 0 ? $saleSum / $count : 0;
           
            $data[] = [
                'product' => $product,
                'supplier_id' => $supplierId,
                'quantity' => $quantitySum,
                'amount' => $amountSum,
                'sale'=>$saleAverage,
                'created_at' => $purchases[0]->created_at,
                'updated_at' => $purchases[0]->updated_at,
            ];
        }
    }

    // Create the data provider with the modified data
    $dataProvider = new ArrayDataProvider([
        'allModels' => $data,
        'pagination' => false,
    ]);
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            [
                'attribute' => 'product',
                'format' => 'raw',
                'value' => function ($model) {
                    $product = Product::findOne($model['product']);
                    $prod = $product ? $product->name : 'Unknown';
                    return $prod;
                },
            ],
            [
                'attribute' => 'supplier_id',
                'format' => 'raw',
                'value' => function ($model) {
                    $supplier = Supplier::findOne($model['supplier_id']);
                    $prod = $supplier ? $supplier->company : 'Unknown';
                    return $prod;
                },
               
            ],
            'quantity',
            'amount',
            'sale',
           
           
        ],
    ]); ?>



</div>



