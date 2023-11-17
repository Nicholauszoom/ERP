<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;



$form = ActiveForm::begin([
    'id' => 'forgot-password-form',
    'options' => ['class' => 'form-horizontal'],
]) ?>

<style>
    
.content {
margin-top: 5%;
}
</style>
<div class="content">

<div class="templateux-section pt-0 pb-0">
      <div class="container">
        <div class="row">

<?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

<div class="form-group">
    <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('Send Reset Link', ['class' => 'btn btn-primary']) ?>
    </div>
</div>

</div>
      </div>
</div>
    
</div>
<?php ActiveForm::end() ?>

   