<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "train_type".
 *
 * @property integer $train_type_id
 * @property string $train_type
 */
class TrainType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'train_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['train_type_id'], 'required'],
            [['train_type_id'], 'integer'],
            [['train_type'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'train_type_id' => 'Train Type ID',
            'train_type' => 'Train Type',
        ];
    }
}
