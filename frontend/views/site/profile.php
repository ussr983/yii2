<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Profile */
/* @var $form ActiveForm */
?>
<div class="main-profile">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/from-data']]); ?>

        <?php echo $form->field($model, 'username') ?>
        <?php echo $form->field($model, 'firstname') ?>
        <?php echo $form->field($model, 'lastname') ?>
        <?php echo $form->field($model, 'email') ?>
        <?php echo $form->field($model, 'phone') ?>
        <?php echo $form->field($model, 'sex') ?>
        <?php echo $form->field($model, 'birthday') ?>
        <?php echo $form->field($model, 'group_id') ?>
        <?php
        if(isset($model->image) && file_exists(Yii::getAlias('@webroot/img/avatar/', $model->image))) { 
        echo Html::img($model->image, ['class'=>'img-responsive']);
        echo $form->field($model,'del_img')->checkBox(['class'=>'span-1']);
        }?>
        <?php // echo $form->field($model, 'file')->fileInput() ?>
    
        <div class="form-group">
            <?php echo Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- main-profile -->
