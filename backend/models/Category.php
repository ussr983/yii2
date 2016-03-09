<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property integer $sort_order
 * @property string $name
 * @property string $description
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_h1
 * @property string $meta_keywords
 * @property string $image
 * @property integer $status
 * @property string $date_added
 */
class Category extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;


    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
      return [
          [['parent_id', 'sort_order', 'name', 'status'], 'required'],
          [['parent_id', 'sort_order', 'status'], 'integer'],
          [['description'], 'string'],
          [['name', 'meta_title', 'meta_description', 'meta_h1', 'meta_keywords'], 'string', 'max' => 255],
          [['file'], 'file'],
      ];
    }

    /**
     * @inheritdoc
     */
  public function attributeLabels()
  {
    return [
        'id' => 'ID',
        'parent_id' => 'Родительская',
        'sort_order' => 'Сортировка',
        'name' => 'Имя',
        'description' => 'Описание',
        'meta_title' => 'Meta Title',
        'meta_description' => 'Meta Description',
        'meta_h1' => 'Meta H1',
        'meta_keywords' => 'Meta Keywords',
        'file' => 'Добавить картинку',
        'status' => 'Статус',
        'date_added' => 'Date Added',
    ];
  }
  
  public function getCategory() {
    
    return $this->name;
    
  }
  
  
}
