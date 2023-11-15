<?php

use app\models\Category;
use app\models\Product;
use app\models\Supplier;
use app\models\Tax;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ProductSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;

$this->context->layout = 'create_main';
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'tableOptions' => ['class' => 'table table-striped table-bordered'],
    'layout' => "{items}\n{summary}\n{pager}",
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'code',
            'name',
            'material',
            [
                'attribute'=>'categorie_id',
                'format'=>'raw',
                'value'=>function ($model){
                    $category = Category::findOne($model->categorie_id);
                    $name = $category ? $category->name : 'Unknown';
                     return $name;
                },
            ],
            'cost',
            'price',
            'quantity',
            'unit',
            'rental',
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
                'attribute'=>'supplier_id',
                'format'=>'raw',
                'value'=>function ($model){
                    $supplier = Supplier::findOne($model->supplier_id);
                    $company = $supplier ? $supplier->company : 'Unknown';
                     return $company;
                },
            ],
            'supplier_cost',
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
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Product $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
