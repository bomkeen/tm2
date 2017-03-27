<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "devalob".
 *
 * @property integer $devalob_type_id
 * @property string $devalob_type
 */
class Devalob extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'devalob';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['devalob_type_id'], 'required'],
            [['devalob_type_id'], 'integer'],
            [['devalob_type'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'devalob_type_id' => 'Devalob Type ID',
            'devalob_type' => 'Devalob Type',
        ];
    }
}
