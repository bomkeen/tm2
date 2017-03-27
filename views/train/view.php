<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

include_once '../inc/thaidate.php';
/* @var $this yii\web\View */
/* @var $model app\models\Train */

$this->title = $profile->name;
$this->params['breadcrumbs'][] = ['label' => 'ประวัติการอบรม', 'url' => ['list','code'=>$model->name_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="train-view">

    <h2><?= Html::encode($this->title) ?></h2>
    <br>
    <p>
        <?= Html::a('แก้ไข', ['update', 'id' => $model->train_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบ', ['delete', 'id' => $model->train_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'ต้องการลบข้อมูลใช่หรือไม่',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            
     
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
              [
             'attribute' => 'date_go',
             'format'=>'raw',
             'value'=> thaidate($model->date_go)
        ],
                    [
             'attribute' => 'date_back',
             'format'=>'raw',
             'value'=> thaidate($model->date_back)
        ],
            'day_sum',
            'activity',
            'place',
            'organize',
                        [
             'attribute' => 'place_type',
             'format'=>'raw',
             'value'=> $model->place_type== 1 ? 'ภายในโรงพยาบาล' : 'ภายนอกโรงพยาบาล'
        ],
            'budget_hos',
            'regist_price',
            'allowance_price',
            'travel_price',
            'hotel_price',
            'budget_organize',
            'traintypename',
            'devalobname',
            'other',
                           [
             'attribute' => 'date_update',
             'format'=>'raw',
             'value'=> thaidate($model->date_update)
        ],
        ],
    ]) ?>
   </div>
    </div>
</div>
