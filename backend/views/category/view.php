<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Category;
use app\components\CategoryWidget;

/* @var $this yii\web\View */
/* @var $model app\models\Category */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-view">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <p>
        <?php echo Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php echo CategoryWidget::widget(); ?>
    
    <?php echo Html::img('@frontend/web/uploads/'. $model->image); ?>
    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'parent_id',
            'sort_order',
            'name',
            'description:ntext',
            'meta_title',
            'meta_description',
            'meta_h1',
            'meta_keywords',
//            'image',
            'status',
            'date_added',
        ],
    ]) ?>

</div>
