<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 */

namespace app\components;

use yii\base\Widget;

class MyWidget extends Widget {
    
    public $a;
    public $b;


    public function init() {
        parent::init();
        if ($this->a == null) {
            $this->a = 33;
        }
        if ($this->b == null) {
            $this->b = 44;
        }
    }
    
    public function run() {
        
        $c = $this->a + $this->b;
        
        return $this->render(
                'my',
                [
                    'c' => $c
                ]
                );
    }
}