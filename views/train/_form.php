<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\daterange\DateRangePicker;
use yii\bootstrap\ActiveForm;
use yii\web\JsExpression;

use app\models\Train;
use app\models\TrainType;
use app\models\Devalob;
/* @var $this yii\web\View */
/* @var $model app\models\Train */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="train-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'name_id')->hiddenInput(['value'=> $profile->code])->label(false); ?>
    <div class="row">
        <div class="col-md-2">
             <?= $form->field($model, 'date_go')->widget(DatePicker::classname(), [
                    'language' => 'th',
                    'dateFormat' => 'yyyy-MM-dd',
                    'clientOptions' => [
                        'changeMonth' => true,
                        'changeYear' => true,                 
                    ],
                    'options' => ['class' => 'form-control','id'=>'date_go']
                ]) ?>
        </div>
         <div class="col-md-2">
             <?= $form->field($model, 'date_back')->widget(DatePicker::classname(), [
                    'language' => 'th',
                    'dateFormat' => 'yyyy-MM-dd',
                    'clientOptions' => [
                        'changeMonth' => true,
                        'changeYear' => true,
                    ],
                    'options' => ['class' => 'form-control','id'=>'date_back']
                ]) ?>
        </div>
        <div class="col-md-2">
             <?= $form->field($model, 'day_sum')->textInput(
                     ['id' => 'day_sum']
                     ) ?>
        </div>
        <div class="col-md-4 col-md-offset-1">
            <?= $form->field($model, 'place_type')->inline()->radioList(Train::itemAlias('place_type')) ?>
        </div>
    </div>   
    <div class="row">
        <div class="col-md-4">
         <?= $form->field($model, 'activity')->textInput(['maxlength' => true,'placeholder' => "รายละเอียด ชื่อการอบรม"])->hint('') ?>   
        </div>
        <div class="col-md-4">
          <?= $form->field($model, 'organize')->textInput(['maxlength' => true,'placeholder'=>"กรอกรายละเอียดผู้จัดอบรม"]) ?> 
        </div>
         <div class="col-md-4">
     <?= $form->field($model, 'place')->textInput(['maxlength' => true,'placeholder'=>"สถานที่จัดอบรม"]) ?>
        </div>
    </div>
    <div class="row">
             
        <div class="col-md-3">
             <?=
                $form->field($model, 'train_type')->dropdownList(
                       ArrayHelper::map(TrainType::find()->all(), 'train_type_id', 'train_type'),
                         [
                    'prompt' => 'เลือกประเภทการอบรม']);
                ?>
        </div>
         <div class="col-md-3">
             <?=
                $form->field($model, 'devalob_type')->dropdownList(
                       ArrayHelper::map(Devalob::find()->all(), 'devalob_type_id', 'devalob_type'),
                         [
                    'prompt' => 'เลือกประเภทการพัฒนา']);
                ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'budget_hos')->textInput(['placeholder'=>'']) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'regist_price')->textInput() ?>
        </div>
    </div>
    <div class="row">
        
        <div class="col-md-2">
           <?= $form->field($model, 'allowance_price')->textInput() ?> 
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'travel_price')->textInput() ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'hotel_price')->textInput() ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'budget_organize')->textInput() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
          <?= $form->field($model, 'other')->textarea(array('rows'=>2,'cols'=>5)); ?>
 
        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
         <?php $this->registerJs("document.getElementById('date_back').onchange=function(){
	var theDate1 = Date.parse(document.getElementById('date_go').value)/1000;
	var theDate2 = Date.parse(document.getElementById('date_back').value)/1000;
	var diff=((theDate2-theDate1)/(60*60*24))+1;
	document.getElementById('day_sum').value =diff;
}"); ?>