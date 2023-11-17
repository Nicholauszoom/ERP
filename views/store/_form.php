<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Store $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="store-form">

<div class="card">

<?php $form = ActiveForm::begin(); ?>
<div class="card-body">
    <p>Inputs with the * symbol are highly required to be filled</p>
<div class="row">
    <div class="col-md-6">
    <?= $form->field($model, 'name')->label('Store Name* <small class="text-muted">eg.warehouse A</small>')->textInput(['maxlength' => true]) ?>
    </div>
</div>
<div class="row">
<div class="col-md-6">
    <?= $form->field($model, 'address')->label('Store Address/location * <small class="text-muted">eg.Tabata</small>')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
