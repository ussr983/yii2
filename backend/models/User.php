<?php

namespace app\models;

use Yii;

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
 * @property string $image
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }
    public $file;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'firstname', 'lastname', 'email', 'phone', 'sex', 'birthday', 'group_id'], 'required'],
            [['birthday'], 'safe'],
            [['status', 'created_at', 'updated_at', 'group_id'], 'integer'],
            [['username', 'firstname', 'lastname', 'email', 'phone', 'sex'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
            [['file'], 'file']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'email' => 'Email',
            'phone' => 'Phone',
            'sex' => 'Sex',
            'birthday' => 'Birthday',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'group_id' => 'Group ID',
            'secret_key' => 'Secret Key',
            'image' => 'image',
        ];
    }
    
    public function getCategoryDescription(){
      return $this->hasOne(CategoryDescription::className(), ['category_id' => 'id']);
    } 
}
