<?php

use app\models\Supplier;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Purchase $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="purchase-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="card-body">
        <p>Inputs with the * symbol are highly required to be filled</p>
    <div class="row">
        <div class="col-md-6">
        <?php 
            $supplier = Supplier::find()->all();  ?>
    <?php echo $form->field($model, 'supplier_id')->label('Suplier * <small class="text-muted">eg.supplier name</small>')->dropDownList(
    ArrayHelper::map($supplier, 'id', 'company'),
    ['prompt' => 'select supplier']
); ?>
    </div>
    <div class="col-md-6">
    <?= $form->field($model, 'requested_by')->label('Requested_by * <small class="text-muted">eg.16 Nov 2023 2:00 PM</small>')->widget(DatePicker::class, [
    'language' => 'ru',
    'dateFormat' => 'MM/dd/yyyy',
    'options' => [
        'class' => 'form-control',
        'type' => 'date', // Use 'text' type instead of 'date' to ensure consistent behavior across browsers
        'id' => 'requested_by-input', // Add an ID to the input field for easier identification
    ],
    'value' => Yii::$app->formatter->asDate($model->requested_by, 'MM/dd/yyyy'), // Set the value of the date picker
]) ?>
    </div>
    <div class="col-md-6">

    <?= $form->field($model, 'pay_tems')->label('Payment terms * <small class="text-muted">eg.cheque / cash</small>')->dropDownList(
            [
                1 => 'cheque',
                2 => 'cash',
          
            ],
            ['prompt' => 'Select Payment Terms'] // Disable the field if the expiration date is not greater than the current date

        ); ?>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
