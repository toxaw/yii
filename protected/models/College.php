<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "college".
 *
 * @property int $id
 * @property string $name_long
 * @property string $name_short
 * @property string $date_start
 *
 * @property Students[] $students
 */
class College extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'college';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date_start'], 'safe'],
            [['name_long'], 'string', 'max' => 256],
            [['name_short'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_long' => 'Name Long',
            'name_short' => 'Name Short',
            'date_start' => 'Date Start',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Students::className(), ['college_id' => 'id']);
    }
}
