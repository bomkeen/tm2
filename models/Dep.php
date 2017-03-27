<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dep".
 *
 * @property integer $dep_id
 * @property string $dep_name
 */
class Dep extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dep';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dep_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'dep_id' => 'Dep ID',
            'dep_name' => 'Dep Name',
        ];
    }
}
