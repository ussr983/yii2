<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>

    <?php echo $form->field($model, 'parent_id')->dropDownList(ArrayHelper::map(app\models\Category::find()->all(), 'id', 'name')); ?>

    <?php echo $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'description')->textarea(['rows' => 6])->widget(CKEditor::className(), [
        'editorOptions' => [
        'preset' => 'standard', 
        'inline' => false, 
      ],
    ]) ?>

    <?php echo $form->field($model, 'meta_title')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'meta_description')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'meta_h1')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'meta_keywords')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'file')->fileInput() ?>
  
    <?php echo $form->field($model, 'sort_order')->textInput() ?>

    <?php echo $form->field($model, 'status')->dropDownList(['1' => 'Включить', '0' => 'Отключить']); ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Добавить' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
