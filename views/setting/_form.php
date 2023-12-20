<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Setting $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="setting-form">
<div class="card">

<?php $form = ActiveForm::begin(); ?>
<div class="card-body">
    <p>Inputs with the * symbol are highly required to be filled</p>
<div class="row">
    <div class="col-md-6">
    <?= $form->field($model, 'logo')->label('logo * <small class="text-muted">System url logo</small>')->fileInput() ?>
    </div> 
   
    <div class="col-md-6">
   <?= $form->field($model, 'website')->label('Web * <small class="text-muted">eg.System Name</small>')->textInput() ?>

   </div>
   </div>
   <div class="row">
   <div class="col-md-4">
   <?= $form->field($model, 'comapny')->label('Company Name * <small class="text-muted">eg.organization name</small>')->textInput() ?>
   </div>
   <div class="col-md-4">
   <?= $form->field($model, 'password')->label('User Default Password * <small class="text-muted">(default password for registered user)</small>')->textInput() ?>
   </div>
   <div class="col-md-4">
   <?= $form->field($model, 'email')->label('Company Email * <small class="text-muted">eg.tera@info.co.tz</small>')->textInput() ?>
   </div>
   </div>
   <div class="row">
   <div class="col-md-6">
   <?= $form->field($model, 'address')->label('Company Address * <small class="text-muted">eg.Mbezi Beach</small>')->textInput() ?>
   </div>
   <div class="col-md-6">
   <?= $form->field($model, 'phone')->label('Comapny Phone * <small class="text-muted">eg.+255 67849..</small>')->textInput() ?>

   </div>
 
   </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
</div>
</div>