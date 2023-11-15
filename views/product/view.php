<?php

use app\models\Category;
use app\models\Supplier;
use app\models\Tax;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Product $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$this->context->layout = 'create_main';
?>
<div class="product-view">

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
            
        ],
    ]) ?>

</div>
