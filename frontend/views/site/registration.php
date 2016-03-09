<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\RegistrationForm */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;

?>

<div class="container">
    <h2 class="header-title">Регистрация</h2>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <?php $form = ActiveForm::begin([
                                            'id' => 'register-form'
                                            ]); ?>
            <div class="form-group">
                <div class="col-md-5">
                   <?php echo $form->field($model, 'firstname')->label(FALSE)->textInput(['class' => 'form-control', 'placeholder' => 'Имя']); ?>
                </div>
                <div class="col-md-5">
                    <?php echo $form->field($model, 'lastname')->label(FALSE)->textInput(['class' => 'form-control', 'placeholder' => 'Фамилия']); ?>
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-md-5">
                    <?php echo $form->field($model, 'username')->label(FALSE)->textInput(['class' => 'form-control', 'placeholder' => 'Никнейм']); ?>
                </div>
                <div class="col-md-5">
                    <?php echo $form->field($model, 'email')->label(FALSE)->textInput(['class' => 'form-control', 'placeholder' => 'E-mail']); ?>
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-md-5">
                   <?php echo HTML::label('Пароль:');?>
                </div>
                <div class="col-md-5">
                     <?php echo $form->field($model, 'password')->label(FALSE)->textInput(['class' => 'form-control'])->passwordInput(); ?>
                </div>
            </div>
                
            <div class="form-group">
                <div class="col-md-5">
                    <?php echo HTML::label('Повторите пароль:');?>
                </div>
                <div class="col-md-5">
                    <?php echo $form->field($model, 'password_repeat')->label(FALSE)->textInput(['class' => 'form-control'])->passwordInput(); ?>
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-md-5">
                    <?php echo $form->field($model, 'phone')->label(FALSE)->textInput(['class' => 'form-control', 'placeholder' => 'Телефон']); ?>
                </div>
                <div class="col-md-5">
                    <?php echo $form->field($model, 'sex')->label(FALSE)->dropDownList(['woman' => 'Женский', 'man' => 'Мужской'],['prompt' => 'Пол']); ?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-3">
                  <?php echo $form->field($model, 'day')->label(FALSE)->dropDownList(['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29'],['prompt' => 'День']); ?>
                </div>
                <div class="col-md-3">
                    <?php echo $form->field($model, 'month')->label(FALSE)->dropDownList(['январь', 'февраль', 'март', 'апрель', 'май', 'июнь', 'июль', 'август', 'сентябрь', 'октябрь', 'ноябрь', 'декабрь'],['prompt' => 'Месяц']); ?>
                </div>
                <div class="col-md-3">
                    <?php echo $form->field($model, 'year')->label(FALSE)->dropDownList(['1990' => '1990', '1989' => '1989', '1988' => '1988', '1987' => '1987', '1986' => '1986', '1985' => '1985', '1984' => '1984', '1983' => '1983', '1982' => '1982', '1981' => '1981'],['prompt' => 'Год']); ?>
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-md-12">
                    <div class="container-registration">
                        <?php echo Html::submitButton('Зарегистрироваться',['class' => 'btn btn-green btn-registration']); ?>
                        <div class="row">
                                <div class="col-md-6 col-md-offset-3 terms">
                                        Регистрируясь, я подтверждаю свое согласие с условиями <a class="link" href="#">пользовательского соглашения</a>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php ActiveForm::end(); ?>
        </div>
    </div>
    <?php if($model->scenario === 'EmailActivation') { ?>
    <i>*На указанный емаил будет отправлено письмо для активации аккаунта</i>
    <?php } ?>
</div>