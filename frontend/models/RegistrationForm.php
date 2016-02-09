<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use frontend\models\User;

class RegistrationForm extends Model {
    public $firstname;
    public $lastname;
    public $username;
    public $email;
    public $password;
    public $password_repeat;
    public $sex;
    public $day;
    public $month;
    public $year;
    public $phone;
    public $status;

    public function rules() {

        return [
                    ['username', 'required', 'message' => 'Поле обьязательно для заполнения'],
                    ['username', 'unique',
                        'targetClass' => User::className(),
                        'message' => 'Это имя уже занято.'],
                    ['firstname', 'required', 'message' => 'Поле обьязательно для заполнения'],
                    ['lastname', 'required', 'message' => 'Поле обьязательно для заполнения'],
                    ['day', 'required', 'message' => 'Поле обьязательно для заполнения'],
                    ['month', 'required', 'message' => 'Поле обьязательно для заполнения'],
                    ['year', 'required', 'message' => 'Поле обьязательно для заполнения'],
                    ['sex', 'required', 'message' => 'Поле обьязательно для заполнения'],
                    ['sex', 'required', 'message' => 'Поле обьязательно для заполнения'],
                    ['phone', 'required', 'message' => 'Поле обьязательно для заполнения'],
                    ['email', 'unique',
                        'targetClass' => User::className(),
                        'message' => 'Эта почта уже занята.'],
                    ['username', 'string', 'min' => 2, 'max' => 255],
                    ['email', 'required', 'message' => 'Поле обьязательно для заполнения'],
                    ['password', 'required', 'message' => 'Поле обьязательно для заполнения'],
                    ['password_repeat', 'required', 'message' => 'Поле обьязательно для заполнения'],
                    [['username', 'email', 'password'],'filter', 'filter' => 'trim'],
                    ['password', 'string', 'min' => \Yii::$app->params['passSize']],
                    ['email', 'email'],
                    ['status', 'default', 'value' => User::STATUS_ACTIVE, 'on' => 'default'],
                    ['status', 'in', 'range' =>[
                        User::STATUS_NOT_ACTIVE,
                        User::STATUS_ACTIVE
                    ]],
                    ['status', 'default', 'value' => User::STATUS_NOT_ACTIVE, 'on' => 'emailActivation'],
                    ['password_repeat', 'compare', 'compareAttribute' => 'password']
                ];

    }

    public function attributeLabels() {
        return [
            'verifyCode' => 'Verification Code',
        ];
    }

    public function registration() {
        
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->status = $this->status;
            $user->firstname = $this->firstname;
            $user->lastname = $this->lastname;
            $user->phone = $this->phone;
            $user->sex = $this->sex;
            $user->birthday = $this->year.'-'.$this->month.'-'.$this->day.' 00:00:00';
            $user->generateAuthKey();
            if($this->scenario === 'emailActivation')
                $user->generateSecretKey();
            if ($user->save()) {
                return $user;
            }
        }
        return null;
    }
    
    public function sendActivationEmail($user) {
        return Yii::$app->mailer->compose('activationEmail', ['user' => $user])
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name.' (отправлено роботом).'])
            ->setTo($this->email)
            ->setSubject('Активация для '.Yii::$app->name)
            ->send();
    }
}