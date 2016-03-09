<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CatecorySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'id') ?>

    <?php echo $form->field($model, 'parent_id') ?>

    <?php echo $form->field($model, 'sort_order') ?>

    <?php echo $form->field($model, 'name') ?>

    <?php echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'meta_title') ?>

    <?php // echo $form->field($model, 'meta_description') ?>

    <?php // echo $form->field($model, 'meta_h1') ?>

    <?php // echo $form->field($model, 'meta_keywords') ?>

    <?php // echo $form->field($model, 'file') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'date_added') ?>

    <div class="form-group">
        <?php echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
