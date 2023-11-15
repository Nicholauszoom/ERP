<?php

use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Invoice $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="invoice-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="card-body">
        <p>Inputs with the * symbol are highly required to be filled</p>
    <div class="row">
        <div class="col-md-6">
        <?= $form->field($model, 'due')->label('Due Date * <small class="text-muted">eg.16 Nov 2023 2:00 PM</small>')->widget(DatePicker::class, [
    'language' => 'ru',
    'dateFormat' => 'MM/dd/yyyy',
    'options' => [
        'class' => 'form-control',
        'type' => 'date', // Use 'text' type instead of 'date' to ensure consistent behavior across browsers
        'id' => 'date-input', // Add an ID to the input field for easier identification
    ],
    'value' => Yii::$app->formatter->asDate($model->due, 'MM/dd/yyyy'), // Set the value of the date picker
]) ?>
    </div>
    <div class="col-md-6">
    <?= $form->field($model, 'date')->label('Issue Date * <small class="text-muted">eg.16 Nov 2023 2:00 PM</small>')->widget(DatePicker::class, [
    'language' => 'ru',
    'dateFormat' => 'MM/dd/yyyy',
    'options' => [
        'class' => 'form-control',
        'type' => 'date', // Use 'text' type instead of 'date' to ensure consistent behavior across browsers
        'id' => 'date-input', // Add an ID to the input field for easier identification
    ],
    'value' => Yii::$app->formatter->asDate($model->date, 'MM/dd/yyyy'), // Set the value of the date picker
]) ?>
    </div>
    </div>

        <div class="row">
    <div class="col-md-6">

    <?= $form->field($model, 'type')->label('Invoice type * <small class="text-muted">eg.invoice/receipt/Quote</small>')->dropDownList(
            [
                1 => 'Invoice',
                2 => 'Quoted',
                3=>  'Receipt',
          
            ],
            ['prompt' => 'Invoice Type'] // Disable the field if the expiration date is not greater than the current date

        ); ?>
    </div>

    <div class="col-md-6">

    <?= $form->field($model, 'status')->label('Invoice Status * <small class="text-muted">eg.open/paid</small>')->dropDownList(
    [
        1 => 'Open',
        2 => 'Paid',
        
    ],
    ['prompt' => 'Select Invoice Status',
    $model->status => ['selected' => true]
    ]
); ?>

    </div>
   
    
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    </div>
    </div>
    <?php ActiveForm::end(); ?>


</div>
