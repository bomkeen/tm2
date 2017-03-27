<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Position;
use app\models\PositionType;
use app\models\Dep;
use app\models\Name;
foreach ($code as $c){
    $cc=$c['code']+1;
    
}
?>

<div class="name-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'code')->hiddenInput(['value'=> $cc])->label(false); ?>
    <div class="row">
        <div class="col-md-3">
           <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?> 
        </div>
        <div class="col-md-3">
            <?=
                $form->field($model, 'position_id')->dropdownList(
                       ArrayHelper::map(Position::find()->all(), 'position_id', 'position'),
                         [
                    'prompt' => 'เลือกตำแหน่ง']);
                ?>
        </div>
        <div class="col-md-3">
            <?=
                $form->field($model, 'position_type_id')->dropdownList(
                       ArrayHelper::map(PositionType::find()->all(), 'id', 'position_type'),
                         [
                    'prompt' => 'เลือกประเภทการจ้าง']);
                ?>
        </div>
      
    </div>
    <div class="row">
         <div class="col-md-3">
            <?=
                $form->field($model, 'dep_id')->dropdownList(
                       ArrayHelper::map(Dep::find()->all(), 'dep_id', 'dep_name'),
                         [
                    'prompt' => 'เลือกแผนก']);
                ?>
        </div>
          <div class="col-md-4 col-md-offset-1">
            <?= $form->field($model, 'status')->inline()->radioList(Name::itemAlias('status')) ?>
       
        </div>
    </div>
      <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'บันทึก', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
