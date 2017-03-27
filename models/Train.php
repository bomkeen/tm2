<?php

namespace app\models;

use Yii;
use app\models\TrainType;
use app\models\Devalob;
class Train extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'train';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
             [['date_go','date_back','name_id','activity','place','organize','place_type','day_sum','place_type','train_type', 'devalob_type'], 'required'],
            [[ 'day_sum', 'place_type', 'budget_hos', 'regist_price', 'allowance_price', 'travel_price', 'hotel_price', 'budget_organize', 'train_type', 'devalob_type'], 'integer'],
            [['date_go', 'date_back', 'date_update','name_id'], 'safe'],
            [['activity', 'place', 'organize', 'other'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'train_id' => 'Train ID',
            'name_id' => 'Name ID',
            'date_go' => 'วันเดินทาง',
            'date_back' => 'วันสิ้นสุด',
            'day_sum' => 'รวมจำนวนวัน',
            'activity' => 'เรื่อง',
            'place' => 'สถานที่จัดอบรม',
            'organize' => 'หน่วยงานที่จัดอบรม',
            'place_type' => 'ปรแถทสถานที่',
            'budget_hos' => 'งบต้นสังกัด',
            'regist_price' => 'ค่าลงทะเบียน',
            'allowance_price' => 'ค่าเบี้ยเลียง',
            'travel_price' => 'ค่าเดินทาง',
            'hotel_price' => 'ค่าที่พัก',
            'budget_organize' => 'งบจากผู้จัด',
            'train_type' => 'ประเภทการอบรม',
            'devalob_type' => 'ประเภทการพัฒนา',
            'other' => 'หมายเหตุอื่นๆ',
            'date_update' => 'Date Update',
            'traintypename'=>'ประเภทการอบรม',
            'devalobname'=>'ประเภทการพัฒนา',
        ];
    }
    public static function itemAlias($type,$code=NULL) {
        $_items = array(
            'place_type' => array(
                '1' => 'ภายในโรงพยาบาล',
                '2' => 'ภายนอกโรงพยาบาล',
            ),
           
        );
        if (isset($code))
            return isset($_items[$type][$code]) ? $_items[$type][$code] : false;
        else
            return isset($_items[$type]) ? $_items[$type] : false;
    }
     public function gettraintypealias() {
        return @$this->hasOne(TrainType::className(), ['train_type_id' => 'train_type']);
    }
    public function gettraintypeName() {
        return @$this->traintypealias->train_type;
    }
     public function getdevalobalias() {
        return @$this->hasOne(Devalob::className(), ['devalob_type_id' => 'devalob_type']);
    }
    public function getdevalobName() {
        return @$this->devalobalias->devalob_type;
    }
    
}
