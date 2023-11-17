<?php

use app\models\Invoice;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\InvoiceSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Invoices';
$this->params['breadcrumbs'][] = $this->title;
$this->context->layout = 'create2_main';

?>
<div class="invoice-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Invoice', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'type',
                'value' => function ($model) {
                    return getTypeLabel($model->type);
                },
            ],
            [
                'attribute' => 'date',
                'format' => ['date', 'php:Y-m-d H:i:s'],
            ],
            
            [
                'attribute' => 'due',
                'format' => ['date', 'php:Y-m-d H:i:s'],
            ],
            [
                'attribute' => 'created_at',
                'format' => ['date', 'php:Y-m-d H:i:s'],
            ],
            [
                'attribute' => 'updated_at',
                'format' => ['date', 'php:Y-m-d H:i:s'],
            ],       
            //'created_by',
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    return getStatusLabel($model->status);
                },
            ],
            // [
            //     'class' => ActionColumn::className(),
            //     'urlCreator' => function ($action, Invoice $model, $key, $index, $column) {
            //         return Url::toRoute([$action, 'id' => $model->id]);
            //      }
            // ],

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Actions',
                'headerOptions' => ['style' => 'text-align:center'],
                'contentOptions' => ['style' => 'text-align:center'],
                'template' => '<div style="display:flex; justify-content:center;">{view} {update} {delete} {download}</div>',
                'buttons' => [

                    'view' => function ($url, $model, $key) {
                        return Html::a(
                            '<span class="fas fa-eye"></span>',
                            ['view', 'id' => $model->id],
                            [
                                'title' => 'View invoice',
                                'aria-label' => 'Invoice view',
                                'id' => 'view',
                                'onclick' => 'showBar();',
                            ]
                        );
                    },

                    'update' => function ($url, $model, $key) {
                        return Html::a('<span class="fas fa-pencil-alt"></span>', ['update', 'id' => $model->id], [
                            // 'class' => 'btn btn-success',
                            'title' => 'edit invoice',
                            'aria-label' => 'invoice edit',
                        ]);
                    },

                    'delete' => function ($url, $model, $key) {
                        return Html::a('<span class="fas fa-trash-alt"></span>', ['delete', 'id' => $model->id], [
                            // 'class' => 'btn btn-success',
                            'title' => 'delete invoice',
                            'aria-label' => 'invoice delete',
                        ]);
                    },

                    'download' => function ($url, $model, $key) {
                        return Html::a('<span class="fa fa-download"></span>', ['report', 'id' => $model->id], [
                            // 'class' => 'btn btn-success',
                            'title' => 'download invoice',
                            'aria-label' => 'invoice download',
                        ]);
                    },


                   
                ],
                
            ],
           
        ],
    ]); ?>


</div>
<?php

function getStatusLabel($status)
{
    $statusLabels = [
        1 => 'open',
        2 => 'paid',
        

       
    ];

    return isset($statusLabels[$status]) ? $statusLabels[$status] : '';
}

function getTypeLabel($status)
{
    $statusLabels = [
        1 => 'invoice',
        2 => 'quote',
        3 => 'receipt',
        

       
    ];

    return isset($statusLabels[$status]) ? $statusLabels[$status] : '';
}
?>