<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_group".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $privilage
 */
class UserGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name', 'description', 'privilage'], 'required'],
            [['id', 'privilage'], 'integer'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'privilage' => 'Privilage',
        ];
    }
}
