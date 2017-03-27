<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TrainScarch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="train-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'train_id') ?>

    <?= $form->field($model, 'name_id') ?>

    <?= $form->field($model, 'date_go') ?>

    <?= $form->field($model, 'date_back') ?>

    <?= $form->field($model, 'day_sum') ?>

    <?php // echo $form->field($model, 'activity') ?>

    <?php // echo $form->field($model, 'place') ?>

    <?php // echo $form->field($model, 'organize') ?>

    <?php // echo $form->field($model, 'place_type') ?>

    <?php // echo $form->field($model, 'budget_hos') ?>

    <?php // echo $form->field($model, 'regist_price') ?>

    <?php // echo $form->field($model, 'allowance_price') ?>

    <?php // echo $form->field($model, 'travel_price') ?>

    <?php // echo $form->field($model, 'hotel_price') ?>

    <?php // echo $form->field($model, 'budget_organize') ?>

    <?php // echo $form->field($model, 'train_type') ?>

    <?php // echo $form->field($model, 'devalob_type') ?>

    <?php // echo $form->field($model, 'other') ?>

    <?php // echo $form->field($model, 'date_update') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
