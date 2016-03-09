<?php

namespace app\components;

use app\models\Category;
use yii\base\Widget;

class CategoryWidget extends Widget {
  
  public function init() {
    $model = new Category();
    parent::init();
    
  }
  
  public function run() {

    return $this->render(
          'category',
          [
              'model' => $model
          ]);
    
  }
  
}
