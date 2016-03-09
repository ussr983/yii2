<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\UploadedFile;
use app\models\UserGroup;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>
  
    <?php echo $form->field($model, 'file')->fileInput() ?>

    <?php echo $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'firstname')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'sex')->dropDownList(['woman' => 'Женский', 'man' => 'Мужской'],['prompt' => 'Пол']); ?>

    <?php echo $form->field($model, 'birthday')->textInput() ?>

    <?php echo $form->field($model, 'status')->dropDownList(['1' => 'Включить', '0' => 'Отключить']); ?>

    <?php echo $form->field($model, 'updated_at')->textInput() ?>

    <?php echo $form->field($model, 'group_id')->dropDownList(ArrayHelper::map(UserGroup::find()->all(), 'id', 'name'), ['prompt' => 'Выберите групу']); ?>


    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
