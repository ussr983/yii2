<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property string $phone
 * @property string $sex
 * @property string $birthday
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $group_id
 * @property string $secret_key
 * @property string $img
 */
class Profile extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['username', 'firstname', 'lastname', 'phone', 'sex', 'birthday'], 'required'],
            [['birthday'], 'safe'],
            [['status','group_id'], 'integer'],
            [['username', 'firstname', 'lastname', 'email', 'phone', 'sex'], 'string', 'max' => 255],
            [['username'], 'unique'],
            [['email'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'username' => 'Username',
            'firstname' => 'Имя',
            'lastname' => 'Фамилия',
            'phone' => 'Телефон',
            'sex' => 'Пол',
            'birthday' => 'Дата рождения',
            'status' => 'Статус',
            'group_id' => 'Группа',
        ];
    }
    
    public function updateProfile() {
        $profile = ($profile = Profile::findOne($this->id)) ? $profile : new Profile();
        $profile->id = $this->id;
        $profile->firstname = $this->firstname;
        $profile->secondname = $this->lastname;
        $profile->phone = $this->phone;
        $profile->birthday = $this->birthday;
        $profile->sex = $this->sex;
        
        if($profile->save()){
            $user = $this->user ? $this->user : User::findOne($this->id);
            $username = Yii::$app->request->post('User')['username'];
            $user->username = isset($username) ? $username : $this->username;
            return $user->save() ? true : false;
        }
        return false;
    }
}
