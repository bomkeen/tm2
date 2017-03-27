<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Train */

$this->title = 'แก้ไขข้อมูลของ: ' . $profile->name;
$this->params['breadcrumbs'][] = ['label' => 'Trains', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->train_id, 'url' => ['view', 'id' => $model->train_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="train-update">
    <div class="page-header">
    <h3><?= Html::encode($this->title) ?></h3>
    </div>
    <?= $this->render('_form', [
        'model' => $model,'profile'=>$profile
    ]) ?>

</div>
