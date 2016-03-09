<?php

use app\models\Category;

?>
<?php $parent_name = Category::find('name')->where(['id' => $model->parent_id])->one()?>
    <?php
echo '<pre/>';
print_r($model);
die('ok');
      ?>
    <table class="table table-striped table-bordered detail-view">
      <tbody>
        <tr>
          <th>Родительская категория</th>
          <td><?php echo $parent_name->name; ?></td>
        </tr>
        <tr>
          <th>ID</th>
          <td><?php echo $model->id; ?></td>
        </tr>
        <tr>
          <th>Имя</th>
          <td><?php echo $model->name; ?></td>
        </tr>
        <tr>
          <th>Статус</th>
          <td><?php echo $model->status; ?></td>
        </tr>
        <tr>
          <th>Сортировка</th>
          <td><?php echo $model->sort_order; ?></td>
        </tr>
        <tr>
          <th>Описание</th>
          <td><?php echo $model->description; ?></td>
        </tr>
        <tr>
          <th>Meta Title</th>
          <td><?php echo $model->meta_title; ?></td>
        </tr>
        <tr>
          <th>Meta Description</th>
          <td><?php echo $model->meta_description; ?></td>
        </tr>
        <tr>
          <th>Meta H1</th>
          <td><?php echo $model->meta_h1; ?></td>
        </tr>
        <tr>
          <th>Meta Keywords</th>
          <td><?php echo $model->meta_keywords; ?></td>
        </tr>
        <tr>
          <th>Date Added</th>
          <td><?php echo $model->date_added; ?></td>
        </tr>
      </tbody>
    </table>