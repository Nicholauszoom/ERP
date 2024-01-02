<?php

use app\models\Category;
use app\models\Product;
use app\models\Setting;
use app\models\Supplier;
use app\models\Tax;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Product $model */
/** @var yii\widgets\ActiveForm $form */

$setting= Setting::findOne(1);

?>


              <div class="card">

    <?php $form = ActiveForm::begin(); ?>
    <div class="card-body">
        <p>Inputs with the * symbol are highly required to be filled</p>
    <div class="row">
        <div class="col-md-4">
        <?php 
            $product = Product::find()->all();  ?>
    <?php echo $form->field($model, 'product')->label('Product  * <small class="text-muted">eg.wire</small>')->dropDownList(
    ArrayHelper::map($product, 'id', 'name'),
    ['prompt' => 'select product']
); ?>        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'transport')->label('Transport Cost * <small class="text-muted">TSH</small>')->textInput(['maxlength' => true , 'id' => 'transport']) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'expenses')->label('Other Expenses * <small class="text-muted">TSH</small>')->textInput(['maxlength' => true, 'id' => 'expences']) ?>
        </div>
    </div>
   
    
    <div class="row">
    <div class="col-md-4">
        <?= $form->field($model, 'price')->label('Product Price * <small class="text-muted">TSH</small>')->textInput(['maxlength' => true, 'id' => 'product-price']) ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($model, 'quantity')->label('Product QTY * <small class="text-muted">eg. 100</small>')->textInput(['maxlength' => true, 'id' => 'product-quantity']) ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($model, 'amount')->label('Product Cost * <small class="text-muted">TSH</small>')->textInput(['maxlength' => true, 'id' => 'product-cost', 'readonly' => true]) ?>
    </div>
</div>

   

    <div class="row">
        <div class="col-md-4">
   
        <?php 
            $supplier = Supplier::find()->all();  ?>
    <?php echo $form->field($model, 'supplier_id')->label('Supplier * <small class="text-muted">eg.company name</small>')->dropDownList(
    ArrayHelper::map($supplier, 'id', 'company'),
    ['prompt' => 'select supplier']
); ?>
    
    </div>
        <div class="col-md-4">
        <?php 
            $tax = Tax::find()->all();  ?>
    <?php echo $form->field($model, 'tax_id')->label('Tax Method * <small class="text-muted">eg.tax method</small>')->dropDownList(
    ArrayHelper::map($tax, 'id', 'method'),
    ['prompt' => 'select tax','id' => 'tax-charge']
); ?>        </div>
        <div class="col-md-4">
        
    <?= $form->field($model, 'profit')->label('Profit  * <small class="text-muted">Profit need per each product</small>')->textInput(['maxlength' => true, 'value'=>$setting->product_profit ,'id' => 'profit-dropdown']
    ) ?>
        </div>
       
    </div>
    <div class="col-md-4">
        <?= $form->field($model, 'sale')->label('Predicted Sale * <small class="text-muted">TSH</small>')->textInput(['maxlength' => true, 'id'=>'sales-value']) ?>
        </div>
    <div class="form-group ">
        <?= Html::submitButton('Next >>', ['class' => 'btn btn-success']) ?>
    </div>
   

    </div>

    <?php ActiveForm::end(); ?>

              </div>

              <?php
$js = <<< JS
$(document).ready(function(){
    // Listen for input events on the quantity and price fields
    $('#product-quantity, #product-price,#transp-charge,#tax-charge,#profit-dropdown,#transport,#expences').on('input', function() {
        // Get the values of quantity and price
        var quantity = parseFloat($('#product-quantity').val() || 0);
        var price = parseFloat($('#product-price').val() || 0);
        var charge = parseFloat($('#transp-charge').val() || 0);
        var tax = parseFloat($('#tax-charge').val() || 0);
        var profit = parseFloat($('#profit-dropdown').val() || 0);
        var expences = parseFloat($('#expences').val() || 0);
        var transport = parseFloat($('#transport').val() || 0);

        // Calculate the cost by multiplying quantity and price
        var cost_pro = quantity * price;
        var cost = cost_pro + charge;

        // var sale_rate =profit * 0.01 * price ;

        var sale_rate =profit;

        var sales_value =sale_rate + price;

        //find the predicted saling price
        var total_cost= cost + transport + expences;
 
        var cost_per_item = total_cost / quantity;

        var selling_price_pred = cost_per_item + sale_rate ;

        // Update the value of the cost field
        $('#product-cost').val(cost.toFixed(2));
        $('#sales-value').val( selling_price_pred.toFixed(2));
        
    });
});
JS;

$this->registerJs($js);
?>
