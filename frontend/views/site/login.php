<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\LoginForm */
/* @var $form ActiveForm */
?>
<div class="main-login">

    <?php $form = ActiveForm::begin(); ?>

    <?php if($model->scenario === 'loginWithEmail'){ ?>
        <?php echo $form->field($model, 'email') ?>
    <?php } else { ?>
        <?php echo $form->field($model, 'username') ?>
    <?php } ?>
    <?php echo $form->field($model, 'password')->passwordInput() ?>
    <?php echo $form->field($model, 'rememberMe')->checkbox() ?>

    <div class="form-group">
        <?php echo Html::submitButton('Войти', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

    <?php echo Html::a('Забыли пароль?', ['/site/send-email']) ?>

</div><!-- main-login -->
