<?php

use app\models\Category;
use app\models\Supplier;
use app\models\Tax;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Product $model */
/** @var yii\widgets\ActiveForm $form */

?>


              <div class="card">

    <?php $form = ActiveForm::begin(); ?>
    <div class="card-body">
        <p>Inputs with the * symbol are highly required to be filled</p>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'code')->label('Product Code * <small class="text-muted">eg.WCK20113</small>')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'name')->label('Product Name * <small class="text-muted">eg.cement</small>')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
   
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'material')->label('Material Type * <small class="text-muted">eg.wood</small>')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6"> 
            <?php 
            $categories = Category::find()->all();  ?>
    <?php echo $form->field($model, 'categorie_id')->label('Product Category * <small class="text-muted">eg.raw material</small>')->dropDownList(
    ArrayHelper::map($categories, 'id', 'name'),
    ['prompt' => 'select category']
); ?>
      
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
        <?= $form->field($model, 'cost')->label('Product Cost * <small class="text-muted">TSH</small>')->textInput(['maxlength' => true, 'id' => 'product-cost', 'readonly' => true]) ?>
    </div>
</div>

    <div class="row">
        <div class="col-md-4">
        <?= $form->field($model, 'unit')->label('Product Unit * <small class="text-muted">eg.PC</small>')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
        <?= $form->field($model, 'rental')->label('Transport Charges <small class="text-muted">TSH.</small>')->textInput(['maxlength' => true, 'id' => 'transp-charge']) ?>
        </div>
        <div class="col-md-4">       
    
        <?php 
            $tax = Tax::find()->all();  ?>
    <?php echo $form->field($model, 'tax_id')->label('Tax Method * <small class="text-muted">eg.tax method</small>')->dropDownList(
    ArrayHelper::map($tax, 'id', 'method'),
    ['prompt' => 'select tax','id' => 'tax-charge']
); ?>
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
        <?= $form->field($model, 'supplier_cost')->label('Supplier Price * <small class="text-muted">TSH</small>')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
        
    <?= $form->field($model, 'profit')->label('Supplier Price * <small class="text-muted">%</small>')->dropDownList([
    '0' => '0%',
    '5' => '5%',
    '10' => '10%',
    '15' => '15%',
    '20' => '20%',
    '25' => '25%',
    '30' => '30%',
    '35' => '35%',
    '40' => '40%',
    '45' => '45%',
    '50' => '50%',
    '55' => '55%',
    '60' => '60%',
    '65' => '65%',

    ],['id' => 'profit-dropdown']
    ) ?>
        </div>
       
    </div>
    <div class="col-md-4">
        <?= $form->field($model, 'sale')->label('Predicted Sale * <small class="text-muted">TSH</small>')->textInput(['maxlength' => true, 'id'=>'sales-value']) ?>
        </div>
    <div class="form-group ">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
   

    </div>

    <?php ActiveForm::end(); ?>

              </div>

              <?php
$js = <<< JS
$(document).ready(function(){
    // Listen for input events on the quantity and price fields
    $('#product-quantity, #product-price,#transp-charge,#tax-charge,#profit-dropdown').on('input', function() {
        // Get the values of quantity and price
        var quantity = parseFloat($('#product-quantity').val() || 0);
        var price = parseFloat($('#product-price').val() || 0);
        var charge = parseFloat($('#transp-charge').val() || 0);
        var tax = parseFloat($('#tax-charge').val() || 0);
        var profit = parseFloat($('#profit-dropdown').val() || 0);

        // Calculate the cost by multiplying quantity and price
        var cost_pro = quantity * price;
        var cost = cost_pro + charge;

        var sale_rate =profit * 0.01 * price ;

        var sales_value =sale_rate + price;
        
        // Update the value of the cost field
        $('#product-cost').val(cost.toFixed(2));
        $('#sales-value').val( sales_value.toFixed(2));
        
    });
});
JS;

$this->registerJs($js);
?>
