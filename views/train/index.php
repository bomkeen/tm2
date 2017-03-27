<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NameScarch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'บันทึกการอบรม';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="name-index">

    <h1><?= Html::encode($this->title) ?></h1>
     <?php yii\widgets\Pjax::begin(['id' => 'grid-user-pjax','timeout'=>5000]) ?>
    <div class="row">
    <div class="col-md-4 col-md-offset-4">
    <?php  //echo $this->render('_search', ['model' => $searchModel]); ?>
    </div>
    </div>
        <br>
    <p>
        <?= Html::a('สร้างรายชื่อเจ้าหน้าที่ใหม่', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
   
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => '***ขาดรายละเอียด'],
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],

            'name',
            'positionname',
          
            'positiontypename',
       
            'depname',
            //'status',
             [ // แสดงข้อมูลออกเป็นสีตามเงื่อนไข
          'attribute' => 'status',
          'format'=>'html',
          'value'=>function($model, $key, $index, $column){
            return $model->status=='Y' ? "<span style=\"color:green;\">เปิดการใช้งาน</span>":"<span style=\"color:red;\">ปิดการใช้งาน</span>";
          }
        ],
                    [
            'label'=>'บันทึกการอบรม',
            'format' => 'raw',
            'value'=>function ($data) {
            return Html::a('',['train/create','code'=>$data['code']],['class' => 'btn btn-success btn-block  glyphicon glyphicon-plus']);
}],
                            [
            'label'=>'ประวัติ',
            'format' => 'raw',
            'value'=>function ($data) {
            return Html::a('',['train/list','code'=>$data['code']],['class' => 'btn btn-warning  glyphicon glyphicon-th-list']);
}],
         [
            'class' => 'yii\grid\ActionColumn',
             'header'=>'แก้ไขข้อมูลบุคลากร',
            'options'=>['style'=>'width:120px;'],
            'buttonOptions'=>['class'=>'btn btn-default'],
            'template'=>'<div class="btn-group btn-group-sm text-center" role="group"> {name/view} {update} {delete} </div>'
         ],
 
        ],
    ]); ?>
    <?php yii\widgets\Pjax::end() ?>
</div>
<?php
$this->registerJs('
  $("#pjax-search-form").on("pjax:end", function() {
    $.pjax.reload({container:"#grid-user-pjax"});
  });
  $("#grid-user-pjax")
  .on("pjax:start", function() { console.log("start") })
  .on("pjax:end",   function() { console.log("stop") });
');
?>