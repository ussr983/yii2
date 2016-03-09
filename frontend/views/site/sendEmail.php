<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\SendEmailForm */
/* @var $form ActiveForm */
?>
<div class="main-sendEmail">

    <?php $form = ActiveForm::begin(); ?>

        <?php echo $form->field($model, 'email') ?>
    
        <div class="form-group">
            <?php echo Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- main-sendEmail -->
