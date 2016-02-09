<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace frontend\models;

use Yii;
use yii\base\Model;
/**
 * Description of SendMailForm
 *
 * @author ari
 */
class SendEmailForm extends Model {
    
    public $email;
    
    public function rules() {
        
        return [
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'exist',
                'targetClass' => User::className(),
                'filter' => [
                    'status' => User::STATUS_ACTIVE
                ],
                'message' => 'Данный емайл не зарегистрирован',
            ],
        ];
        
    }
    
    public function attributeLabels() {
        
        return [
            'email' => 'Емайл',
        ];
        
    }
    
    public function sendEmail() {
        
        $user = User::findOne([
            'status' => User::STATUS_ACTIVE,
             'email' => $this->email,
        ]);
        
        if ($user) {
            $user->generateSecretKey();
            if ($user->save()) {
            
                return Yii::$app->mailer->compose('resetPassword', ['user' => $user])
                        ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . '(отправлено роботом)'])
                        ->setTo($this->email)
                        ->setSubject('Сброс забытого пароля для '. Yii::$app->name)
                        ->send();                
            }
        }
        
    }
    //put your code here
}
