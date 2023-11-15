<?php
use app\models\Customer;
use app\models\Idetail;
use app\models\Office;
use app\models\Product;
use app\models\Tattachmentss;
use app\models\Tdetails;
use app\models\Tender;
use app\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->context->layout = 'create_main';
?>
<style>

    h1{
        text-align: center;
        color:midnightblue;
        margin-bottom: 5;
    }
    .detail{
        align-content: end;
        margin-bottom: 5;
    }

    .customer{
        align-content: flex-start;
        margin-bottom: 5;
    }
</style>
<div id="main-content">
    <div id="page-container">
        <h1>System Invoice</h1>
       
        <div class="detail">
           <h3>Invoice</h3>
           <h5>REFERENCE: <?=$invoice->id?></h5>
           <h5>BILLING DATE: <?=$invoice->date?></h5>
           <h5>DUE DATE: <?=$invoice->due?></h5>
        </div>

        <hr>
        
        <div class="customer">
            
            <?php
            $customer=Customer::findOne(['invoice_id'=>$invoice->id]);
            ?>
            <?php if($cus !== null):?>
            <h6>Name: <?=$customer->name?></h6>
            <h6>Adress: <?=$customer->address?></h6>
            <h6>City: <?=$customer->city?></h6>
            <h6>Email: <?=$customer->email?></h6>
            <h6>Phone: <?=$customer->phone?></h6>
            <?php endif;?>
    
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
    <?php
      $idetail=Idetail::find()->where(['invoice_id'=>$invoice->id])->all();
    ?>
<?php foreach ($idetail as $invoiced): ?>
    <tr>
        <?php 
        // $item=Product::findOne($pdetail->item_id);
        $item=Product::findOne(['id'=>$invoiced->item_id]);
        ?>
        <td><?= $item->name ?></td>
        <td><?= $invoiced->quantity ?></td>
        <td><?= $invoiced->unit_price ?></td>
        <td><?= $invoiced->amount ?></td>
        <td><?= Yii::$app->formatter->asDatetime($invoiced->created_at) ?></td>
        <td><?= Yii::$app->formatter->asDatetime($invoiced->updated_at) ?></td>
        
        <td>
        
                <?= Html::a('<span class="glyphicon glyphicon-edit"></span>', ['update', 'id' => $invoiced->id], [
                    'title' => 'Update',
                    'data-method' => 'post',
                    'data-pjax' => '0',
                ]) ?>
            

            <?= Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $invoiced->id], [
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

   
<?php
function getStatusLabel($status)
{
    $statusLabels = [
        1 => '<span class="badge badge-success">awarded</span>',
        2 => '<span class="badge badge-warning">not-awarded</span>',
        3 => '<span class="badge badge-secondary">submitted</span>',
        4 => '<span class="badge badge-secondary">not-submtted</span>',
        5 => '<span class="badge badge-secondary">on-progress</span>',

        
        
    ];

    return isset($statusLabels[$status]) ? $statusLabels[$status] : '';
}

function getStatusClass($status)
{
    $statusClasses = [
       
        1 => 'status-active',
        2 => 'status-inactive',
        3 => 'status-onhold',
    ];

    return isset($statusClasses[$status]) ? $statusClasses[$status] : '';
}

function getSiteLabels($status)
{
    $statusLabels = [
      1 => '<span class="">YES</span>',
      2 => '<span class="">NO</span>',
     
    ];

    return isset($statusLabels[$status]) ? $statusLabels[$status] : '';
}

function getSecurityLabel($status)
{
    $statusLabels = [
      1 => '<span class="">Security Declaration</span>',
      2 => '<span class="">Bid/Tender Security</span>',
     
    ];

    return isset($statusLabels[$status]) ? $statusLabels[$status] : '';
}

?>