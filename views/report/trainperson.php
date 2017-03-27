<?php

use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;
use kartik\export\ExportMenu;
include_once '../inc/thaidate.php';
$this->title = 'สรุปการอบรมรายบุคคล';
$this->params['breadcrumbs'][] = ['label' => 'ระบบรายงาน', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->code]];
$this->params['breadcrumbs'][] = 'รายงานรายบุคคล';
?>
<div class="well">
    <div class="row">

        <div class="col-md-10 col-md-offset-1">
            <form class="form-inline" method="POST">

                <div class="col-md-4">
                
                    <?php
                    echo Select2::widget([
                        'name' => 'name',
                        'id' => 'name',
                        'value' => $name,
                        'data' => ArrayHelper::map(\Yii::$app->db->createCommand("SELECT code,name from name ")->queryAll(), 'name', 'name'),
                        'options' => ['multiple' => FALSE, 'placeholder' => 'เลือกรายชื่อ...']
                    ]);
                    ?>
                </div>

                <div class="form-group">
                    <label for="date1">ระหว่าง :</label>
                    <?php
                    echo yii\jui\DatePicker::widget([
                        'name' => 'date1',
                        'value' => $date1,
                        'language' => 'th',
                        'id' => 'date1',
                        'dateFormat' => 'yyyy-MM-dd',
                        'options' => ['class' => 'form-control'],
                        'clientOptions' => [
                            'changeMonth' => true,
                            'changeYear' => true,
                        ],
                    ]);
                    ?>
                </div>
                <div class="form-group">
                    <label for="date2">ถึง:</label>

                    <?php
                    echo yii\jui\DatePicker::widget([
                        'name' => 'date2',
                        'value' => $date2,
                        'language' => 'th',
                        'id' => 'date2',
                        'class' => 'form-control',
                        'dateFormat' => 'yyyy-MM-dd',
                        'options' => ['class' => 'form-control'],
                        'clientOptions' => [
                            'changeMonth' => true,
                            'changeYear' => true,
                        ]
                    ]);
                    ?>
                </div>
                <div class="form-group">
                    <button class='btn btn-danger'>ประมวลผล</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php if(isset($dataProvider)) { ?>
<div class="row">
    <h3><p class="text-danger"><?php echo 'ข้อมูลหระหว่างวันที่   '.thaidate($date1) .'    ถึง    '.thaidate($date2) ; ?></p></h3>
    <?php 
//   echo ExportMenu::widget([
//    'dataProvider' => $dataProvider,
//    //'columns' => $gridColumns
//       'exportConfig' => [
//    ExportMenu::FORMAT_TEXT => false,
//    ExportMenu::FORMAT_HTML => false,
//    ExportMenu::FORMAT_CSV => false,
//    ExportMenu::FORMAT_EXCEL => false,
//],
//       'filename'=>$this->title,
//]); ?>
     <div class="col-md-12 col-md-offset-0">
        <?= GridView::widget([
    'dataProvider' => $dataProvider,
            'showHeader' => true,
    'panel'=>[
        'heading'=>''
            //'before' => 'ข้อมูลหระหว่างวันที่   '.thaidate($date1) .'    ถึง    '.thaidate($date2),
    ],
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
       [
                'label'=>'วันที่เดินทาง',
                'format' => 'raw',
                 'hAlign'=>'center',
                 'value'=>function ($data) {
                     return thaidate($data['date_go']);         
        
                 }
                
            ],
                     [
                'label'=>'วันที่กลับ',
                'format' => 'raw',
                 'hAlign'=>'center',
                 'value'=>function ($data) {
                     return thaidate($data['date_back']);         
        
                 }
                
            ],
        [
            'attribute' => 'day_sum',
            'label' => 'รวมจำนวนวัน'
        ],
         [
            'attribute' => 'name',
            'label' => 'ชื่อ - สกุล'
        ],
         [
            'attribute' => 'activity',
            'label' => 'เรื่องที่อบรม'
        ],
        [
            'attribute' => 'organize',
            'label' => 'ผู้จัด'
        ],
         [
            'attribute' => 'dev',
            'label' => 'ประเภทการพัฒนา'
        ],
                              [
            'attribute' => 'train_type',
            'label' => 'ประเถทการอบรม'
        ],
                    [
            'attribute' => 'place',
            'label' => 'สถานที่จัดอบรม'
        ],
        
        
        
    
    ],
            
]); ?>
    </div>
</div>

<?php } ?>