<?php

use app\models\Customer;
use app\models\Product;
use app\models\Idetail;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Invoice $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Invoices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$this->context->layout = 'create2_main';

$invoice=Idetail::find()->where(['invoice_id'=>$model->id])->all();

?>
<div class="invoice-view">

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
            
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    return getStatusLabel($model->status);
                },
            ],
            'created_by',
        ],
    ]) ?>

</div>

<h2>Invoice Details</h2>

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
<?php foreach ($invoice as $invoice): ?>
    <tr>
        <?php 
        // $item=Product::findOne($pdetail->item_id);
        $item=Product::findOne(['id'=>$invoice->item_id]);
        ?>
        <td><?= $item->name ?></td>
        <td><?= $invoice->quantity ?></td>
        <td><?= $invoice->unit_price ?></td>
        <td><?= $invoice->amount ?></td>
        <td><?= Yii::$app->formatter->asDatetime($invoice->created_at) ?></td>
        <td><?= Yii::$app->formatter->asDatetime($invoice->updated_at) ?></td>
        
        <td>
        
                <?= Html::a('<span class="glyphicon glyphicon-edit"></span>', ['update', 'id' => $invoice->id], [
                    'title' => 'Update',
                    'data-method' => 'post',
                    'data-pjax' => '0',
                ]) ?>
            

            <?= Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $invoice->id], [
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

<h2>Customer Detail</h2>

<table class="table">
  <thead>
    <tr style="background-color: #f2f2f2;">
  
      <th scope="col">Full Name </th>
      <th scope="col">Phone </th>
      <th scope="col">Email</th>
      <th scope="col">Address</th>
      <th scope="col">City</th> 
      <th scope="col"></th>
    </tr>
    </thead>
<tbody>
<?php if($cus !== null):?>
<tr>
    <td>
           
    </td>
    <td><?=$cus->name?></td>
    <td><?=$cus->phone?></td>
    <td><?=$cus->email?></td>
    <td><?=$cus->address?></td>
    <td><?=$cus->city?></td>
    <td></td>
    <td></td>
</tr>
<?php endif;?>
</tbody>
</table>

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