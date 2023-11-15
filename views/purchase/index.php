<?php

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

$this->context->layout = 'create_main';
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
                'attribute' => 'requested_by',
                'format' => ['date', 'php:Y-m-d H:i:s'],
            ],
            [
                'attribute'=>'supplier_id',
                'format'=>'raw',
                'value'=>function ($model){
                    $suplier = Supplier::findOne($model->supplier_id);
                    $name = $suplier ? $suplier->company : 'Unknown';
                     return $name;
                },
            ],
           
            [
                'attribute' => 'pay_tems',
                'value' => function ($model) {
                    return getStatusLabel($model->pay_tems);
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
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Purchase $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
<?php

function getStatusLabel($status)
{
    $statusLabels = [
        1 => 'cheque',
        2 => 'cash',
        

       
    ];

    return isset($statusLabels[$status]) ? $statusLabels[$status] : '';
}

?>