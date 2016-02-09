<?php
namespace frontend\controllers;

use Yii;
use frontend\models\RegistrationForm;
use frontend\models\LoginForm;
use frontend\models\User;
use frontend\models\Profile;
use frontend\models\SendEmailForm;
use frontend\models\ResetPasswordForm;
use frontend\models\AccountActivation;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\helpers\Html;
use yii\helpers\Url;


class MainController extends BehaviorsController
{
    public $layout = 'basic';
    public $defaultAction = 'index';

    public function actionIndex()
    {
        $hello = 'Привет МИР!!!';

        return $this->render(
            'index',
            [
                'hello' => $hello
            ]);
    }

    public function actionProfile() {
        $model = ($model = Profile::findOne(Yii::$app->user->id)) ? $model : new Profile();

        if($model->load(Yii::$app->request->post()) && $model->validate()){
            if($model->updateProfile()){
                Yii::$app->session->setFlash('success', 'Профиль изменен');
            } else {
                Yii::$app->session->setFlash('error', 'Профиль не изменен');
                Yii::error('Ошибка записи. Профиль не изменен');
                return $this->refresh();
            }
        }

        return $this->render(
            'profile',
            [
                'model' => $model
            ]
        );
    }

    public function actionRegistration() {
        $emailActivation = Yii::$app->params['emailActivation'];
        $model = $emailActivation ? new RegistrationForm(['scenario' => 'emailActivation']) : new RegistrationForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()){
            if ($user = $model->registration()){
                if ($user->status === User::STATUS_ACTIVE){
                    if (Yii::$app->getUser()->login($user)){
                        return $this->goHome();
                    }
                } else {
                    if($model->sendActivationEmail($user)){
                        Yii::$app->session->setFlash('success', 'Письмо с активацией отправлено на емайл <strong>'.Html::encode($user->email).'</strong> (проверьте папку спам).');
                    } else {
                        Yii::$app->session->setFlash('error', 'Ошибка. Письмо не отправлено.');
                        Yii::error('Ошибка отправки письма.');
                    }
                    return $this->refresh();
                }
            }else {
                Yii::$app->session->setFlash('error', 'Возникла ошибка при регистрации.');
                Yii::error('Ошибка при регистрации');
                return $this->refresh();
            }
        }

        return $this->render(
            'registration',
            [
                'model' => $model
            ]
        );
    }

    public function actionActivateAccount($key)
    {
        try {
            $user = new AccountActivation($key);
        }
        catch(InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if($user->activateAccount()){
            Yii::$app->session->setFlash('success', 'Активация прошла успешно. <strong>'.Html::encode($user->username).'</strong> вы теперь с TipTop!!!');
        } else {
            Yii::$app->session->setFlash('error', 'Ошибка активации.');
            Yii::error('Ошибка при активации.');
        }

        return $this->redirect(Url::to(['/main/login']));
    }

    public function actionLogout() {
        
        Yii::$app->user->logout();
        return $this->redirect(['/main/index']);
    }

    public function actionLogin() {
        if (!Yii::$app->user->isGuest):
            return $this->goHome();
        endif;

        $loginWithEmail = Yii::$app->params['loginWithEmail'];

        $model = $loginWithEmail ? new LoginForm(['scenario' => 'loginWithEmail']) : new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()){
            return $this->goBack();
        }

        return $this->render(
            'login',
            [
                'model' => $model
            ]
        );
    }

    public function actionSearch()
    {
        $search = Yii::$app->session->get('search');
        Yii::$app->session->remove('search');

        if ($search){
            Yii::$app->session->setFlash(
                'success',
                'Результат поиска'
            );
        } else {
            Yii::$app->session->setFlash(
                'error',
                'Не заполнена форма поиска'
            );
        }

        return $this->render(
            'search',
            [
                'search' => $search
            ]
        );
    }

    public function actionSendEmail()
    {
        $model = new SendEmailForm();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                if($model->sendEmail()){
                    Yii::$app->getSession()->setFlash('warning', 'Проверьте емайл.');
                    return $this->goHome();
                } else {
                    Yii::$app->getSession()->setFlash('error', 'Нельзя сбросить пароль.');
                }
            }
        }

        return $this->render('sendEmail', [
            'model' => $model,
        ]);
    }

    public function actionResetPassword($key)
    {
        try {
            $model = new ResetPasswordForm($key);
        }
        catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate() && $model->resetPassword()) {
                Yii::$app->getSession()->setFlash('warning', 'Пароль изменен.');
                return $this->redirect(['/main/login']);
            }
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
