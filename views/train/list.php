<?php

use yii\helpers\Html;
use yii\grid\GridView;

use app\models\Name;
include_once '../inc/thaidate.php';
/* @var $this yii\web\View */
/* @var $searchModel app\models\TrainScarch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ประวัติการอบรบของ '.$profile->name;
$this->params['breadcrumbs'][] = ['label' => 'รายชื่อทั้งหมด', 'url' => ['name/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="train-index">
    <div class="page-header">
    <h2><?= Html::encode($this->title) ?></h2>
 </div>

    <p>
        <?= Html::a('บันทึกการอบรม', ['create','code'=>$profile->code], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'train_id',
            'activity',
            'place',
                  [
            'label'=>'วันที่คัดกรอง',
            'attribute'=>'date_go',          
            'format' => 'raw',
            'value'=>function ($data) {
            return thaidate($data['date_go']);
}],
            'day_sum',

            // 'other',
            // 'date_update',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
