<?php
/* @var $this yii\web\View
 * @var $hello string */


use evgeniyrru\yii2slick\Slick;
use app\components\MeeWidget;
use yii\bootstrap\Modal;
use yii\jui\DatePicker;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\web\JsExpression;
?>
<h1>main/index</h1>

<p>
    <?php echo $hello ?>
</p>
<div class="panel panel-default">
   <?php echo Slick::widget([
        // HTML tag for container. Div is default.
        'itemContainer' => 'div',

        // HTML attributes for widget container
        'containerOptions' => ['class' => 'panel-body'],

        // Items for carousel. Empty array not allowed, exception will be throw, if empty 
        'items' => [
            Html::img('@web/img/gallery/112856.jpg'),
            Html::img('@web/img/gallery/112857.jpg'),
            Html::img('@web/img/gallery/112858.jpg'),
            Html::img('@web/img/gallery/112859.jpg'),
            Html::img('@web/img/gallery/112860.jpg'),
            Html::img('@web/img/gallery/112861.jpg'),
        ],

        // HTML attribute for every carousel item
        'itemOptions' => ['class' => 'autoplay'],

        // settings for js plugin
        // @see http://kenwheeler.github.io/slick/#settings
        'clientOptions' => [
            'arrows' => true,
            'dots'     => true,
            'speed'    => 300,
            'autoplay' => true,
            'infinite' => false,
            'slidesToShow' => 4,
            'slidesToScroll' => 4,
            // note, that for params passing function you should use JsExpression object
            'onAfterChange' => new JsExpression('function() {console.log("The cat has shown")}'),
            'responsive' => [
                        [
                            'breakpoint'=> 1024,
                              'settings'=> [
                                  'speed' => 200,
                                  'lazyLoad' => 'ondemand',
                              ]
                        ]
                    ],
        ],

    ]); ?>
</div>

<div class="panel panel-default">
  
    <?php
        ActiveForm::begin(
            [
                'action' => ['site/search'],
                'method' => 'get',
                'options' => [
                    'class' => 'panel-body'
                ]
            ]
        );
        echo '<div class="input-group input-group-sm">';
        echo Html::input(
            'type: text',
            'search',
            '',
            [
                'placeholder' => 'Найти ...',
                'class' => 'form-control'
            ]
        );
        echo '<span class="input-group-btn">';
        echo Html::submitButton(
            '<span class="glyphicon glyphicon-search"></span>',
            [
                'class' => 'btn btn-success',
//                'onClick' => 'window.location.href = this.form.action + "-" + this.form.search.value.replace(/[^\w\а-яё\А-ЯЁ]+/g, "_") + ".html";'
            ]
        );
        echo '</span></div>';
        ActiveForm::end();
        ?>
</div>
<div class="panel panel-default">
      <?php ActiveForm::begin(
            [
                'action' => ['site/filter'],
                'method' => 'get',
                'options' => [
                    'class' => 'panel-body'
                ]
            ]
        );
        echo '<div class="col-12">';
        echo '<div class="form-group">';
        echo Html::input(
            'type: text',
            'category',
            '',
            [
                'placeholder' => 'Рубрика ...',
                'class' => 'form-control'
            ]
        );
        echo '</div>';
        echo '<div class="form-group">';
        echo Html::input(
            'type: text',
            'sity',
            '',
            [
                'placeholder' => 'Город ...',
                'class' => 'form-control'
            ]
        );
        echo '</div>';
        echo '</div>';
        echo '<div class="col-12">';
        echo '<div class="col-5 form-group">';
        echo Html::input(
            'type: text',
            'region',
            '',
            [
                'placeholder' => 'Район ...',
                'class' => 'form-control'
            ]
        );
        echo '</div>';
        echo '<div class="col-5 form-group">';
        echo Html::input(
            'type: text',
            'street',
            '',
            [
                'placeholder' => 'Улица ...',
                'class' => 'form-control'
            ]
        );
        echo '</div>';
        echo '</div>';
        echo '<span class="input-btn">';
        echo Html::submitButton(
            'Найти <span class="glyphicon glyphicon-search"></span>',
            [
                'class' => 'btn',
//                'onClick' => 'window.location.href = this.form.action + "-" + this.form.search.value.replace(/[^\w\а-яё\А-ЯЁ]+/g, "_") + ".html";'
            ]
        );
        echo '</span></div>';
        ActiveForm::end();
        ?>
</div>