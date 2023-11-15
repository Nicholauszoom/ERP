<?php

use app\models\Pdetail;
use app\models\Product;
use app\models\Purchase;
use app\models\Supplier;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Purchase $model */
$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Purchases', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$this->context->layout = 'create_main';
$purchase=Pdetail::find()->where(['purchase_id'=>$model->id])->all();
$total_amount= 0;
foreach ($purchase as $purchase_details) {
    $total_amount += $purchase_details->amount;
}

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
            'requested_by',
            [
                'attribute' => 'created_at',
                'format' => ['date', 'php:Y-m-d H:i:s'],
            ],
           
        ],
    ]) ?>

</div>


<table class="table">
  <thead>
    <tr style="background-color: #f2f2f2;">
  
      <th scope="col">item</th>
      <th scope="col">Qty</th>
      <th scope="col">Unit price</th>
      <th scope="col">Amount</th>
      <th scope="col">Created</th>
      <th scope="col">Updated</th>
      <th scope="col">Created By</th>
      <th scope="col"></th>
    </tr>
    </thead>
<tbody>
<?php foreach ($purchase as $pdetail): ?>
    <tr>
        <?php 
        // $item=Product::findOne($pdetail->item_id);
        $item=Product::findOne(['id'=>$pdetail->item_id]);
        ?>
        <td><?= $item->name ?></td>
        <td><?= $pdetail->quantity ?></td>
        <td><?= $pdetail->unit_price ?></td>
        <td><?= $pdetail->amount ?></td>
        <td><?= Yii::$app->formatter->asDatetime($pdetail->created_at) ?></td>
        <td><?= Yii::$app->formatter->asDatetime($pdetail->updated_at) ?></td>
        
        <td>
        
                <?= Html::a('<span class="glyphicon glyphicon-edit"></span>', ['update', 'id' => $pdetail->id], [
                    'title' => 'Update',
                    'data-method' => 'post',
                    'data-pjax' => '0',
                ]) ?>
            

            <?= Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $pdetail->id], [
                'title' => 'Delete',
                'data-confirm' => 'Are you sure you want to delete this updates',
                'data-method' => 'post',
                'data-pjax' => '0',
            ]) ?>
        </td>
    </tr>
<?php endforeach; ?>
<tr>
    <td>
   
            <?= Html::a('+ create request', '#', ['data-toggle' => 'modal', 'data-target' => '#createModal']) ?>
    </td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
</tr>

<tr>
    <td></td>
  
    <td style="background-color: #f2f2f2;">Total Amonut:TSH <?= $total_amount?></td>
    <td style="background-color: #f2f2f2;"></td>
    <td style="background-color: #f2f2f2;"></td>
    <td style="background-color: #f2f2f2;"></td>
    <td style="background-color: #f2f2f2;"></td>
    <td style="background-color: #f2f2f2;"></td>
    <td style="background-color: #f2f2f2;"></td>
</tr>
</tbody>
</table>



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