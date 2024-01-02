<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Customer $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="customer-form">


    <?php $form = ActiveForm::begin(); ?>
    <div class="card-body">
        <p>Inputs with the * symbol are highly required to be filled</p>
    <div class="row">
        <div class="col-md-6">
        <?= $form->field($model, 'name')->label('Full Name * <small class="text-muted">eg.Patric</small>')->textInput(['maxlength' => true]) ?>

    </div>
    <div class="col-md-6">
    <?= $form->field($model, 'phone')->label('Phone Number * <small class="text-muted">eg.07625..</small>')->textInput(['maxlength' => true]) ?>

    </div>
    </div>

        <div class="row">
    <div class="col-md-4">
    <?= $form->field($model, 'email')->label('Email * <small class="text-muted">eg.name@gmail.com</small>')->textInput(['maxlength' => true]) ?>

    </div>

    <div class="col-md-4">

    <?= $form->field($model, 'address')->label('Address * <small class="text-muted">eg.Mbezi beach ,Africana</small>')->textInput(['maxlength' => true]) ?>


    </div>
    <div class="col-md-4">

    <?= $form->field($model, 'city')->label('City * <small class="text-muted">eg.Dar es salaam, Kinondoni</small>')->textInput(['maxlength' => true]) ?>
    </div>
    
    
    <div class="row">
    <div class="col-md-4">
    <?= $form->field($model, 'tin')->label('TIN * <small class="text-muted">Customer TIN number</small>')->textInput(['maxlength' => true]) ?>

    </div>

    <div class="col-md-4">

    <?= $form->field($model, 'vrn')->label('VRN * <small class="text-muted">Customer VRN</small>')->textInput(['maxlength' => true]) ?>


    </div>
    <div class="col-md-4">

    <?= $form->field($model, 'account')->label('Account Balance * <small class="text-muted">Amount in TSH</small>')->textInput(['maxlength' => true]) ?>
    </div>
    
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    </div>
    </div>
    <?php ActiveForm::end(); ?>



</div>
