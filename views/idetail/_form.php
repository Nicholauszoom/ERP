<?php

use app\models\Idetail;
use app\models\Product;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Idetail $model */
/** @var yii\widgets\ActiveForm $form */


$products =Product::find()->all();


$invoice=Idetail::find()->where(['invoice_id'=>$invoiceId])->all();
?>
<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">General</button>
    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Item(s)</button>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
<div class="user-activity-form">
<small>The inputs with this <span style="color:red;">*</span> indicate are required to be fill </small>



<?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
        <?= $form->field($model, 'item_id')->label('Item * <small class="text-muted">eg.3 quoter pipes</small>')->dropDownList(
    ArrayHelper::map($products, 'id', 'name'),
    ['prompt' => 'select item']
)?>
    
        </div>
        <div class="col-md-6">
           
        <?=  $form->field($model, 'unit_price')->textInput(['maxlength' => true, 'id' => 'unit-price', 'readonly' => false])?>

</div>

    </div>
    <?= $form->field($model, 'invoice_id')->hiddenInput(['value' => $invoiceId])->label(false)?>
    <div class="row">
        <div class="col-6">
      
        <?= $form->field($model, 'quantity')->textInput(['maxlength' => true, 'id' => 'purchase-qty', 'readonly' => false]) ?>

        </div>

        <div class="col-6">
        <?=$form->field($model, 'amount')->textInput(['maxlength' => true, 'id' => 'purchase-amount', 'readonly' => false]) ?>


    </div>




    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

</div>
  </div>


<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">
<table class="table">
  <thead>
    <tr style="background-color: #f2f2f2;">
  
      <th scope="col">item</th>
      <th scope="col">unit price</th>
      <th scope="col">Qty</th>
      <th scope="col">Amount</th>
      <th scope="col">Created</th>
     
      <th scope="col"></th>
    </tr>
    </thead>
<tbody>
<?php foreach ($invoice as $idetail): ?>
    <tr>
        <?php 
        // $item=Product::findOne($pdetail->item_id);
        $item=Product::findOne(['id'=>$idetail->item_id]);
        ?>
        <td><?= $item->name ?></td>
        <td><?= $idetail->quantity ?></td>
        <td><?= $idetail->unit_price ?></td>
        <td><?= $idetail->amount ?></td>
        <td><?= Yii::$app->formatter->asDatetime($idetail->created_at) ?></td>
      
        
        <td>
        
                <?= Html::a('<span class="glyphicon glyphicon-edit"></span>', ['update', 'id' => $idetail->id], [
                    'title' => 'Update',
                    'data-method' => 'post',
                    'data-pjax' => '0',
                ]) ?>
            

            <?= Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $idetail->id], [
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
</div>

</div>
            </div>


<?php
$js = <<< JS
$(document).ready(function(){
    // Listen for input events on the quantity and price fields
    $('#unit-price,#purchase-qty').on('input', function() {
        // Get the values of quantity and price
        var quantity = parseFloat($('#purchase-qty').val() || 0);
        var price = parseFloat($('#unit-price').val() || 0);
       

        // Calculate the cost by multiplying quantity and price
        var amount = quantity * price;
        


        // Update the value of the cost field
        $('#purchase-amount').val(amount.toFixed(2));
       
        
    });
});
JS;

$this->registerJs($js);
?>