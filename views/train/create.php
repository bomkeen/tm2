<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Train */

$this->title = 'บันทึกการอบรมของ  '.$profile->name;
$this->params['breadcrumbs'][] = ['label' => 'Trains', 'url' => ['name/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="train-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
        'profile'=>$profile
    ]) ?>

</div>
