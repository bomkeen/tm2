<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Name */

$this->title = 'เพิ่มรายชื่อบุคคลากรใหม่';
$this->params['breadcrumbs'][] = ['label' => 'Names', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="name-create">
    <div class="page-header">
    <h3><?= Html::encode($this->title) ?></h3>
    </div>
    <?= $this->render('_form', [
        'model' => $model,'code'=>$code
    ]) ?>

</div>
