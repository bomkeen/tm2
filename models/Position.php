<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "position".
 *
 * @property integer $position_id
 * @property string $position
 */
class Position extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'position';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['position'], 'required'],
            [['position'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'position_id' => 'Position ID',
            'position' => 'Position',
        ];
    }
}
