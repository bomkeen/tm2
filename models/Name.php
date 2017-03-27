<?php

namespace app\models;

use Yii;
use app\models\Position;
use app\models\PositionType;
use app\models\Dep;
/**
 * This is the model class for table "name".
 *
 * @property string $code
 * @property string $name
 * @property integer $position_type_id
 * @property integer $position_id
 * @property integer $dep_id
 * @property string $update_datetime
 * @property string $status
 */
class Name extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'name';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code','name','position_type_id', 'position_id', 'dep_id'], 'required'],
            [['position_type_id', 'position_id', 'dep_id'], 'integer'],
            [['update_datetime'], 'safe'],
            [['code'], 'string', 'max' => 6],
            [['name'], 'string', 'max' => 150],
            [['status'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'code' => 'Code',
            'name' => 'ชื่อ-สกุล',
            'position_type_id' => 'Position Type ID',
            'position_id' => 'Position ID',
            'dep_id' => 'Dep ID',
            'update_datetime' => 'Update Datetime',
            'status' => 'Status',
            'positionname'=>'ตำแหน่ง'
            ,'positiontypename'=>'ประเภทการจ้าง',
            'depname'=>'หน่วยงาน'
        ];
    }
    public function getPosition() {
        return @$this->hasOne(Position::className(), ['position_id' => 'position_id']);
    }
    public function getPositionName() {
        return @$this->position->position;
    }
     public function getPositiontype() {
        return @$this->hasOne(PositionType::className(), ['id' => 'position_type_id']);
    }
    public function getPositiontypeName() {
        return @$this->positiontype->position_type;
    }
     public function getDep() {
        return @$this->hasOne(Dep::className(), ['dep_id' => 'dep_id']);
    }
    public function getDepName() {
        return @$this->dep->dep_name;
    }
      public static function itemAlias($type,$code=NULL) {
        $_items = array(
            'status' => array(
                'Y' => 'เปิดใช้งาน',
                'N' => 'ปิดการใช้งาน',
            ),
           
        );
        if (isset($code))
            return isset($_items[$type][$code]) ? $_items[$type][$code] : false;
        else
            return isset($_items[$type]) ? $_items[$type] : false;
    }
}
