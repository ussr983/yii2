<?php
use frontend\assets\AppAsset;
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;
use yii\bootstrap\Modal;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use frontend\components\AlertWidget;
use yii\helpers\Url;
/**
 * Created by PhpStorm.
 * User: phpNT
 * Date: 28.02.2015
 * Time: 1:48
 */
/* @var $content string
 * @var $this \yii\web\View */
AppAsset::register($this);
$this->beginPage();
?>
    <!DOCTYPE html>
    <html lang="<?php echo Yii::$app->language ?>">
    <head>
        <?php echo Html::csrfMetaTags() ?>
        <meta charset="<?php echo Yii::$app->charset ?>">
        <?php $this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1']); ?>
        <title><?php echo Yii::$app->name ?></title>
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody(); ?>

    <div class="wrap">
        <?php
        NavBar::begin(
            [
                'options' => [
                    'class' => 'navbar navbar-default',
                    'id' => 'main-menu'
                ],
                'renderInnerContainer' => true,
                'innerContainerOptions' => [
                    'class' => 'container'
                ],
                'brandLabel' => '<img src="'.\Yii::$app->request->BaseUrl.'/img/logo.png"/>',
                'brandUrl' => [
                    '/site/index'
                ],
                'brandOptions' => [
                    'class' => 'navbar-brand'
                ]
            ]
        );
        if (!Yii::$app->user->isGuest):
            ?>
            <div class="navbar-form navbar-right">
                <button class="btn btn-sm btn-default"
                        data-container="body"
                        data-toggle="popover"
                        data-trigger="focus"
                        data-placement="bottom"
                        data-title="<?php echo Yii::$app->user->identity['username'] ?>"
                        data-content="
                            <a href='<?php echo Url::to(['/site/profile']) ?>' data-method='post'>Мой профиль</a><br>
                            <a href='<?php echo Url::to(['/site/logout']) ?>' data-method='post'>Выход</a>
                        ">
                    <span class="glyphicon glyphicon-user"></span>
                </button>
            </div>
        <?php
        endif;
        $menuItems = [
            [
                'label' => 'О проекте <span class="glyphicon glyphicon-question-sign"></span>',
                'url' => ['/site/about']
            ],
        ];

        if (Yii::$app->user->isGuest):
            $menuItems[] = [
                'label' => 'Регистрация',
                'url' => ['/site/registration']
            ];
            $menuItems[] = [
                'label' => 'Войти',
                'url' => ['/site/login']
            ];
        endif;

        echo Nav::widget([
            'items' => $menuItems,
            'activateParents' => true,
            'encodeLabels' => false,
            'options' => [
                'class' => 'navbar-nav navbar-right'
            ]
        ]);

        Modal::begin([
            'header' => '<h2>phpNT</h2>',
            'id' => 'modal'
        ]);
        echo 'Проект для продвинутых PHP разработчиков.';
        Modal::end();

        ActiveForm::begin(
            [
                'action' => ['/найти'],
                'method' => 'get',
                'options' => [
                    'class' => 'navbar-form navbar-right'
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
                'onClick' => 'window.location.href = this.form.action + "-" + this.form.search.value.replace(/[^\w\а-яё\А-ЯЁ]+/g, "_") + ".html";'
            ]
        );
        echo '</span></div>';
        ActiveForm::end();

        NavBar::end();
        ?>
        <div class="container">
            <?php echo AlertWidget::widget() ?>
            <?php echo $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <span class="badge">
                <span class="glyphicon glyphicon-copyright-mark"></span> phpNT <?php echo date('Y') ?>
            </span>
        </div>
    </footer>

    <?php $this->endBody(); ?>
    </body>
    </html>
<?php
$this->endPage();