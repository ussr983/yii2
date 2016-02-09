<?php
/**
 * Description of activationEmail
 *
 * @author ari
 * 
 *@var $this yii\veb\Viev
 * @var $usser app\models\User
 */

use yii\helpers\Html;


echo ''. Html::encode($user->username).'.';
echo Html::a('Для активации акаунта перейдите по ссылке', Yii::$app->urlManager->createAbsoluteUrl(
        [
            '/main/activate-account',
            'key' => $user->secret_key,
        ]));
