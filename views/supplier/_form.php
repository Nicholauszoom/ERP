<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Supplier $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="supplier-form">

<div class="card">

<?php $form = ActiveForm::begin(); ?>
<div class="card-body">
    <p>Inputs with the * symbol are highly required to be filled</p>
<div class="row">
    <div class="col-md-6">
        <?= $form->field($model, 'company')->label('Company/name * <small class="text-muted">eg.WCK20113</small>')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'address')->label('Supplier Address <small class="text-muted">eg.Dar es salaam</small>')->textInput(['maxlength' => true]) ?>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <?= $form->field($model, 'phone')->label('Phone  * <small class="text-muted">(+255) 689534..</small>')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'email')->label('Email Address * <small class="text-muted">name@gmail.com</small>')->textInput(['maxlength' => true]) ?>
    </div>
</div>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
</div>
    <?php ActiveForm::end(); ?>

</div>
