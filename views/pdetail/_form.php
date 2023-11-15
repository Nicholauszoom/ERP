<?php

use app\models\Pdetail;
use app\models\Product;
use app\models\Purchase;
use app\models\User;
use yii\bootstrap5\Modal;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PurchDetail $model */
/** @var yii\widgets\ActiveForm $form */


// Modal pop-up
Modal::begin([
    'id' => 'createModal',
    'title' => 'Create',
]);

// Header
echo '<div class="modal-header">';
echo '</div>';

// Form
$form = ActiveForm::begin([
   
]);

$products=Product::find()->all();

echo $form->field($model, 'item_id')->label('Item * <small class="text-muted">eg.3 quoter pipes</small>')->dropDownList(
    ArrayHelper::map($products, 'id', 'name'),
    ['prompt' => 'select item']
);


// $request_qty=Request::findOne(condition)

echo $form->field($model, 'purchase_id')->hiddenInput(['value' => $purchaseId])->label(false);


echo $form->field($model, 'unit_price')->textInput(['maxlength' => true, 'id' => 'unit-price', 'readonly' => false]) ;


echo $form->field($model, 'quantity')->textInput(['maxlength' => true, 'id' => 'purchase-qty', 'readonly' => false]);

echo $form->field($model, 'amount')->textInput(['maxlength' => true, 'id' => 'purchase-amount', 'readonly' => true]) ;

// Add remaining form fields...

echo '<div class="modal-footer">';
echo Html::submitButton('Save', ['class' => 'btn btn-success']);
echo '</div>';

ActiveForm::end();

Modal::end();

$purchase=Pdetail::find()->where(['purchase_id'=>$purchaseId])->all();
?>



<table class="table">
  <thead>
    <tr style="background-color: #f2f2f2;">
  
      <th scope="col">item</th>
      <th scope="col">unit price</th>
      <th scope="col">Qty</th>
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
</div>
</div>
<script>

$(document).ready(function() {
  // Function to calculate the amount
  function calculateAmount() {
    var unitPrice = parseFloat($('#unit-price').val());
    var quantity = parseFloat($('#purchase-qty').val());

    if (!isNaN(unitPrice) && !isNaN(quantity)) {
      var amount = unitPrice * quantity;
      $('#purchase-amount').val(amount.toFixed(2));
    }
  }

  // Trigger the calculation when the unit price or quantity changes
  $('#unit-price, #purchase-qty').on('input', calculateAmount);
});

</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>