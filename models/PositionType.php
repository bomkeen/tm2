<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "position_type".
 *
 * @property integer $id
 * @property string $position_type
 */
class PositionType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'position_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['position_type'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'position_type' => 'Position Type',
        ];
    }
}
